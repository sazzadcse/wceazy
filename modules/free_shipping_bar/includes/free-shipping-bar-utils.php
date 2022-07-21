<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyFreeShippingBarUtils')) {
    class wcEazyFreeShippingBarUtils
    {
        public $base_admin;
        public $fsb_settings = [];

        public function __construct ($base_admin) {
            $this->base_admin = $base_admin;
            $this->fsb_settings = get_option('wceazy_fsbar_settings', false);
        }

        /*
         * define save settings data
         * @param post_data array()
         *
         * return void
         *
         **/
        public function save_settings( $data = array() ) {
            $result = false;
            if(!empty($data)){
                update_option( 'wceazy_fsbar_settings', $data );
                $result = true;
            }

            return $result;
        }

        /*
         * define wceazy check avaliable shipping zone
         * @param 
         *
         * return void
         *
         **/
        public function wceazy_check_available_zone( $shipping_zone_id = '' ){
            global $wpdb;
            $wfspb_query = $wpdb->prepare( 
                                            "SELECT * 
                                                FROM {$wpdb->prefix}woocommerce_shipping_zone_methods 
                                                WHERE method_id = %s AND is_enabled = %d AND zone_id = %d 
                                                ORDER BY method_order ASC", 
                                                'free_shipping', 1, 
                                                $shipping_zone_id 
                                            );
            $zone_data   = $wpdb->get_results( $wfspb_query, OBJECT );

            if ( empty( $zone_data ) ) {
                return false;
            } else {
                return true;
            }
    
        }

        /*
         * define wceazy_get_default_shipping_zone
         * @param 
         *
         * return $zones[]
         *
         **/
		public function wceazy_get_default_shipping_zone() {
			
            $values = [];

            if( class_exists( 'WooCommerce' ) ){
                $shipping_zones = WC_Shipping_Zones::get_zones( );
                foreach($shipping_zones as $shipping_zone){
                    $shipping_zone_id = $shipping_zone['zone_id'];

                    if( $this->wceazy_check_available_zone($shipping_zone_id) ){
                        $shipping_zone_obj          = WC_Shipping_Zones::get_zone($shipping_zone_id);
                        $values[$shipping_zone_id]  = $shipping_zone_obj->get_zone_name();
                    }
                }
            }

            return $values;  

		}

        /**
         * define get woo products
         * @param
         * 
         * return @products[]
         */
        public function getWooProducts() {

            $results = array();
            if( class_exists( 'WooCommerce' ) ){
                $args = array('post_type' => 'product', 'posts_per_page' => -1);
                foreach (get_posts($args) as $product) {
                    $results[] = array("id" => $product->ID, "text" => $product->post_title);
                }
            }
            return $results;
        }

        //define ip base destination
        private function wceazy_get_ip_based_destination() {

            //create geolocation instance
            $geo_instance   = new WC_Geolocation();

            $user_ip        = $geo_instance->get_ip_address();
            $user_geodata   = $geo_instance->geolocate_ip( $user_ip );
            
            $destination['destination']['country']  =  $user_geodata['country'];
            $destination['destination']['state']    =  $user_geodata['state'];
            $destination['destination']['postcode'] = "";

            return $destination;

        }

        // define get user selected zone
        private function wceazy_get_user_selected_zone() {
            //woo instance
            global $woocommerce;
            if( class_exists( 'WooCommerce' ) ){
                if( isset(WC()->cart ) && is_object( WC()->cart ) ){
                    $shipping_packages = WC()->cart->get_shipping_packages();
                
                    $shipping_zone = wc_get_shipping_zone( reset( $shipping_packages ) );

                    if( is_object( $shipping_zone ) ){
                        return $shipping_zone->get_id();
                    }
                }
            }
            return false;

        }

        //define get geolocatedzone
        private function wceazy_get_geolocated_zone() {
            if( !empty( $this->fsb_settings ) && isset( $this->fsb_settings['wceazy_fsb_detect_ip'] ) ){
                $destination = $this->wceazy_get_ip_based_destination();
            }else{
                return false;
            }
    
            if( empty( $destination['country'] ) ) return false;

            $shipping_zone = WC_Shipping_Zones::get_zone_matching_package( $destination );

            if( is_object( $shipping_zone ) ){
                return $shipping_zone->get_id();
            }

            return false;

        }

        // define get user selected class
        private function wceazy_fsb_user_selected_class(){
            //woo instance
            global $woocommerce;

            $shipping_zone_id = false;
            if( class_exists( 'WooCommerce' ) ){
                if( isset( WC()->session ) ){
        
                    if( ( !empty( WC()->session ) && is_array( WC()->session->get( 'chosen_shipping_methods' ) ) ) || ( isset($_GET['wc-ajax'] ) && $_GET['wc-ajax'] == 'update_order_review') ) {
            
                        if($shipping_zone_id === false){
                            $shipping_zone_id = $this->wceazy_get_user_selected_zone();
                        }
                
                        if($shipping_zone_id === false){
                            $shipping_zone_id = $this->wceazy_get_geolocated_zone();
                        }
                    }

                }
            }
    
            return $shipping_zone_id;
            
        }

        //define get default settings zone
        private function wceazy_get_default_settings_zone() {
            return !empty( $this->fsb_settings ) && !empty( $this->fsb_settings['wceazy_fsb_shipping_zone'] ) ? $this->fsb_settings['wceazy_fsb_shipping_zone'] : false;
        }

        // define check avaliable freeshipping
        private function wceazy_check_available_freeshipping(){

            $shipping_zone = $this->wceazy_fsb_user_selected_class();
            $selected_shipping_zone = ( $shipping_zone == false ) ? $this->wceazy_get_default_settings_zone() : $shipping_zone;
            
			global $wpdb;
			$fsbQuery = $wpdb->prepare( 
                                    "SELECT * 
                                        FROM {$wpdb->prefix}woocommerce_shipping_zone_methods 
                                        WHERE method_id = %s AND is_enabled = %d AND zone_id = %d 
                                        ORDER BY method_order ASC", 
                                        'free_shipping', 
                                        1, 
                                        $selected_shipping_zone 
                                );
			$zoneData   = $wpdb->get_results( $fsbQuery, OBJECT );

			if ( empty( $zoneData ) ) {
				return false;
			} else {
				return $zoneData;
			}

        }

        public function wceazy_fsb_ignore_discounts(){
            $free_shipping_class = $this->wceazy_check_available_freeshipping();
            if ( $free_shipping_class ) {
                foreach( $free_shipping_class as $shipping_class ){
                    $first_zone       = $shipping_class;
                    $instance_id      = $first_zone->instance_id;
                    $method_id        = $first_zone->method_id;
                    $arr_method       = array( $method_id, $instance_id );
                    $implode_method   = implode( "_", $arr_method );
                    $free_option      = 'woocommerce_' . $implode_method . '_settings';
                    $free_shipping_s  = get_option( $free_option );
                    if(isset($free_shipping_s['ignore_discounts']) && $free_shipping_s['ignore_discounts'] == 'yes') return 'yes';
                }
            }
            return 'no';
        }

        //define calculate minimam shipping amount
        public function wceazy_calculate_min_shipping_amount() {
            $order_min_amount = 0;
            if ( $this->wceazy_check_available_freeshipping() ) {

                foreach($this->wceazy_check_available_freeshipping() as $shipping_class){
                    $first_zone       = $shipping_class;
                    $instance_id      = $first_zone->instance_id;
                    $method_id        = $first_zone->method_id;
                    $arr_method       = array( $method_id, $instance_id );
                    $implode_method   = implode( "_", $arr_method );
                    $free_option      = 'woocommerce_' . $implode_method . '_settings';
                    $free_shipping_s  = get_option( $free_option );

                    if(isset($free_shipping_s['min_amount']) && $free_shipping_s['min_amount'] > 0 && isset($free_shipping_s['requires']) && ($free_shipping_s['requires'] == "min_amount" || $free_shipping_s['requires'] == "either"  || $free_shipping_s['requires'] == "both" )){
                        $order_min_amount = $free_shipping_s['min_amount'];
                    }elseif(!isset($free_shipping_s['requires']) || $free_shipping_s['requires'] == ""){
                        $order_min_amount = 0;
                    }

                }

            } 

            return $order_min_amount;

		}

        //define create message
        public function wceazy_create_message( $order_min_amount, $cart_total ) {
            $order_min_amount = $this->wceazy_calculate_min_shipping_amount();
            

            $cart_total = round( $cart_total, wc_get_price_decimals() );

            if( $order_min_amount > 0 ){
                $missing_amount = $order_min_amount - $cart_total;
            }else{
                $missing_amount = 0;
            }

            $checkout_page_id = wc_get_page_id( 'checkout' );
            $checkout_page_url = $checkout_page_id ? '<a href="'. get_permalink( $checkout_page_id ).'">Checkout</a>' : '';

            $arg = array(
                'minimum_order'     => wc_price($order_min_amount),
                'cart_total'        => wc_price($cart_total),
                'missing_amount'    => wc_price($missing_amount),
                'checkout_page'     => $checkout_page_url
            );

            $get_message = $this->wveazy_get_message_text($order_min_amount, $cart_total);
    
            $message_text = $this->search_key_and_replace($get_message, $arg);
            return $message_text;
        }

        //define search key & replace
        public function search_key_and_replace( $message, $data ) {
            $openTag = '<span class="fsb-inner-content">';
            $closeTag = '</span>';
            foreach( $data as $key => $value ) {
                $message = str_replace( '{'.$key.'}', $value, $message );
            }
            return $message;
        }

        //fefine get message text
        public function wveazy_get_message_text($order_min_amount, $achieveAmount) {

            $checkout_page_id = wc_get_page_id( 'checkout' );
            $checkout_page_url = $checkout_page_id ? get_permalink( $checkout_page_id ) : '';

            $message_text = '';

            if( $order_min_amount <= 0 ){
                return 'Shipping zone not define!!';
            }

            $progress_persent = 0;
            $achieveAmount  = isset( WC()->cart ) ? WC()->cart->get_displayed_subtotal() : 0;

            if ( ! empty( WC()->cart ) && WC()->cart->display_prices_including_tax() ) {
                $achieveAmount = $achieveAmount - WC()->cart->get_discount_tax();
            }
            if ( 'no' === $this->wceazy_fsb_ignore_discounts() ) {
                $achieveAmount = $achieveAmount - WC()->cart->get_discount_total();
            }

            $achieveAmount = round( $achieveAmount, wc_get_price_decimals() );


            if( $order_min_amount > 0 ){
                $progress_persent  = round( ( $achieveAmount / $order_min_amount ) *100, 2 );
            }else{
                $progress_persent = 100;
            }

            if( $progress_persent == 0 && $order_min_amount > 0 ) {
                $message = !empty($this->fsb_settings) && !empty( $this->fsb_settings['wcfsb_system_announce'] ) ?  $this->fsb_settings['wcfsb_system_announce'] : "Free shipping for order above {minimum_order}";
            }else if( $progress_persent > 0 && $progress_persent <= 50 && $order_min_amount > 0 ) {
                $message = !empty($this->fsb_settings) && !empty( $this->fsb_settings['wcfsb_purchased_message'] ) ? $this->fsb_settings['wcfsb_purchased_message'] : "Free shipping for order above {minimum_order}";
            }else if( $progress_persent >  50 && $progress_persent < 100 && $order_min_amount > 0 ) {
                $message = !empty($this->fsb_settings) && !empty( $this->fsb_settings['wcfsb_purchased_message'] ) ?  $this->fsb_settings['wcfsb_purchased_message'] : "Free shipping for order above {minimum_order}";
            }else if( $progress_persent >= 100 && $order_min_amount > 0 ) {
                $message = !empty($this->fsb_settings) && !empty( $this->fsb_settings['wcfsb_success_message'] ) ?  $this->fsb_settings['wcfsb_success_message'] : 'You are now qualified for the Free shipping, go to {checkout_page}';
            }else if( $progress_persent >= 100 && $order_min_amount == 0 ) {
                $message = 'Free Shipping';
            }

            return $message;

        }
        


    }
}