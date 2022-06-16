<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('UrlCouponUtils')) {
    class UrlCouponUtils
    {
        public $base_admin;
        public $coupon_id;

        public function __construct ($base_admin)
        {
            $this->base_admin = $base_admin;
        }

        /**
         * define url coupon admin data tab
         * include woocommerce admin coupons url tab
         *
         * return void
         *
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 22-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wceazy_url_coupon_admin_data_tab ( $tabs )
        {
            $tabs['wceazy_url_coupon'] = array(
                'label'  => _e('wcEazy URL Coupon', 'wceazy'),
                'target' => 'wceazy_url_coupon',
                'class'  => 'wceazy_url_coupon',
            );

            return $tabs;
        }

        /**
         * define url coupon admin data panel
         * include woocommerce admin data panel form
         *
         * return void
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 22-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wceazy_url_coupon_admin_data_panel () {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/templates/views/url_coupon_tab.php";
        }

        /**
         * define wceazy_save_url_coupon_data
         * @param $coupon_id //default
         *
         * return void
         *
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 22-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wceazy_save_url_coupon_data( $coupon_id ){
            $data = array();
            if( isset( $_POST ) ){
                $is_allowed_html = wp_kses_allowed_html('post');
                $data = array(
                    'wceazy_url_coupon_enable'           => isset( $_POST['wceazy_url_coupon_enable'] ) ? sanitize_text_field($_POST['wceazy_url_coupon_enable']) : '',
                    'wceazy_force_apply_url_coupon'      => isset( $_POST['wceazy_force_apply_url_coupon'] ) ? sanitize_text_field($_POST['wceazy_force_apply_url_coupon']) : 'no',
                    'wceazy_url_coupon_url'              => isset( $_POST['wceazy_url_coupon_url'] ) ? sanitize_url($_POST['wceazy_url_coupon_url']) : '',
                    'wceazy_url_coupon_override_code'    => isset( $_POST['wceazy_url_coupon_override_code'] ) ? sanitize_title($_POST['wceazy_url_coupon_override_code']) : '',
                    'wceazy_url_coupon_redirect_url'     => isset( $_POST['wceazy_url_coupon_redirect_url'] ) ? sanitize_url($_POST['wceazy_url_coupon_redirect_url']) : '',
                    'wceazy_url_coupon_success_message'  => isset( $_POST['wceazy_url_coupon_success_message'] ) ? sanitize_text_field($_POST['wceazy_url_coupon_success_message'], $is_allowed_html) : '',
                );

                $this->base_admin->base_admin->utils->wceazy_update_postmeta( $coupon_id, $data );
            }
        }

        /**
         * wceazy get coupon url.
         *
         * @param $coupon_id int
         *
         * @return string coupon url
         *
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 22-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wceazy_get_coupon_url( $coupon_id )
        {
            if ( get_post_status($coupon_id) == 'auto-draft' ) {
                return;
            }

            $get_coupon_permalink   = get_permalink($coupon_id);
            $override_code          = get_post_meta ($coupon_id, 'wceazy_url_coupon_override_code', true);
            $slug                   = $override_code ? $override_code : wc_get_coupon_code_by_id($coupon_id);
            // trim comma and colon from slug.
            $generate_url = str_replace( '?post_type=shop_coupon&p='.$coupon_id, '%shop_coupon%' , $get_coupon_permalink );

            // create coupon permalink.
            $get_coupon_permalink = str_replace( '%shop_coupon%', $slug, $generate_url );

            return rtrim($get_coupon_permalink,'/');

        }

        /**
         * wceazy get coupon by override code.
         *
         * @param $override_code string
         *
         * @return $coupon_id int
         *
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 22-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wceazy_get_coupon_id_by_override_code( $override_code )
        {
            $coupon_id = '';
            if ( empty( $override_code ) ) {
                return $coupon_id;
            }

            global $wpdb;
            $post_table = $wpdb->prefix . 'posts';
            $postmeta_table = $wpdb->prefix . 'postmeta';
            $meta_key = 'wceazy_url_coupon_override_code';

            // start query here
            $SqlQuery = "SELECT ID 
                            FROM {$post_table} AS pt 
                            INNER JOIN {$postmeta_table} AS pm ON pt.ID = pm.post_id 
                            WHERE pt.post_type = 'shop_coupon' AND pm.meta_key = '".$meta_key."' AND pm.meta_value = '".$override_code."'
                            LIMIT 1";
            $coupon_info = $wpdb->get_row($SqlQuery);
            if( !empty( $coupon_info ) ){
                $coupon_id = $coupon_info->ID;
            }

            return $coupon_id;

        }

        /**
         * wceazy is valid coupon.
         *
         * @param $coupon_slug int
         *
         * @return string coupon code
         *
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 22-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wceazy_is_valid_coupon( $coupon_slug )
        {
            $coupon_data = array();
            if ( empty( $coupon_slug ) ) {
                return $coupon_data;
            }

            $coupon_id = $this->wceazy_get_coupon_id_by_override_code($coupon_slug);

            $where = "pt.post_type = 'shop_coupon' AND pt.post_name = '". $coupon_slug ."' ";
            if( !empty( $coupon_id ) && $coupon_id > 0 ){
                $where = "pt.post_type = 'shop_coupon' AND pt.ID = '". $coupon_id ."' ";
            }

            global $wpdb;
            $post_table = $wpdb->prefix . 'posts';
            // start query here
            $SqlQuery = "SELECT ID,post_name FROM {$post_table} AS pt WHERE {$where} ";
            return $coupon_data = $wpdb->get_row($SqlQuery);

        }

        /**
         * wceazy implement url coupon.
         *
         * @return void
         *
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 22-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wceazy_implement_url_coupon (){

            global $wp_query;
            global $woocommerce;

            // retrieve coupon code from query vars
            $coupon_slug = isset($wp_query->query_vars['name']) ? sanitize_title($wp_query->query_vars['name']) : '';
            if( empty( $coupon_slug ) ){
                return;
            }

            $coupon_data = $this->wceazy_is_valid_coupon($coupon_slug);


            if ( empty( $coupon_data ) || !$coupon_data->ID || !$coupon_data->post_name ) {
                return;
            }

            // Only create when there is none, e.g may clear the existing cart item
            if ( ! $woocommerce->session->has_session() ) {
                $woocommerce->session->set_customer_session_cookie(true);

            }

            // check cart content
            if ( $woocommerce->cart->get_cart_contents_count() == 0 ) {

                $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
                wp_redirect($shop_page_url);
                wc_add_notice( _e( 'Please first add the product to the cart and then apply the URL coupon.', 'wceazy' ), 'error' );
                exit();
            }

            $_SESSION['url_coupon_id'] = $coupon_data->ID;

            // apply coupon code
            $this->coupon_id = $coupon_data->ID;

            $coupon_code = $coupon_data->post_name;
            $coupon = new \WC_Coupon($coupon_code);
            $discounts = new \WC_Discounts(WC ()->cart);

            // get force apply state
            $url_coupon_force_apply = get_post_meta ($coupon_data->ID, 'wceazy_force_apply_url_coupon', true);
            $force_apply = !empty($url_coupon_force_apply) ? $url_coupon_force_apply : 'no';
            if( $force_apply == 'yes' ){
                $this->wceazy_remove_auto_applied_coupons_from_cart($coupon);
            }

            // apply url coupon code
            $valid_response = $discounts->is_coupon_valid ($coupon);

            if (!is_wp_error ($valid_response)) {
                // add discount if not exits
                if (!$woocommerce->cart->has_discount (sanitize_text_field ($coupon_code))) {
                    $_SESSION['wceazy_url_coupon_success_msg'] = get_post_meta($this->coupon_id, 'wceazy_url_coupon_success_message', true );
                    $woocommerce->cart->add_discount (sanitize_text_field ($coupon_code));
                }
            }

            $redirect_url = get_post_meta ( $coupon_data->ID, 'wceazy_url_coupon_redirect_url', true );
            if( !empty( $redirect_url ) ){
                wp_redirect($redirect_url);
            }else{
                wp_redirect(wc_get_cart_url());
            }

            exit();
        }

        public function wceazy_coupon_error_message(){
            return _e('Invalid Coupon Code', 'wceazy');
        }

        function wceazy_coupon_success_mesage( $msg, $msg_code, $coupon ) {
            if(isset($_SESSION['wceazy_url_coupon_success_msg'])){
                if(strlen(trim($_SESSION['wceazy_url_coupon_success_msg'])) > 0){
                    $msg = $_SESSION['wceazy_url_coupon_success_msg'];
                }
                unset($_SESSION['wceazy_url_coupon_success_msg']);
            }
            return $msg;
        }

        public function wceazy_remove_auto_applied_coupons_from_cart($coupon_code)
        {

            remove_action('woocommerce_removed_coupon', array($this, 'wceazy_autoapply_after_removing_force_apply_coupon'));

            // get applied coupon list
            $applied_coupons = \WC()->cart->get_applied_coupons();

            if (!empty($applied_coupons)) {
                foreach ($applied_coupons as $key => $coupon) {
                    if ( $coupon !==  $coupon_code ) {
                        \WC()->cart->remove_coupon($coupon);
                    }
                }
            }
        }

        /**
         * wceazy apply auto coupon after remove url coupon.
         *
         * @return void
         *
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 24-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wceazy_autoapply_after_removing_force_apply_coupon(){
            $this->wceazy_implement_url_coupon();
        }

        /**
         * wceazy session unset.
         *
         * @return void
         *
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 24-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wceazy_session_unset(){
            unset($_SESSION['url_coupon_id']);
        }

    }
}
