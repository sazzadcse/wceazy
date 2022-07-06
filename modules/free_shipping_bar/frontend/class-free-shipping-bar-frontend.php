<?php
// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyFreeShippingBarFrontend')) {
    class wcEazyFreeShippingBarFrontend
    {

        public $base_admin;
        public $utils;
        public $module_slug;
        public $module_title;
        public $show_in;
        public $fsb_settings;
        public $current_pages_id = '';
        public $show_pages = array();
        public $dont_show_pages = array();
        public $include_products = array();
        public $exclude_products = array();
        public $WC;

        public function __construct ($base_admin, $module_slug, $module_title)
        {
            $this->base_admin   = $base_admin;
            $this->module_slug  = $module_slug;
            $this->module_title = $module_title;

            add_action ('wp_enqueue_scripts', array($this, 'wceazy_module_frontend_enqueue'));

            if( $this->base_admin->db->getModuleStatus($this->module_slug) !== 1 ) {
                return;
            }

            // get cart settings data
            $this->fsb_settings = get_option('wceazy_fsbar_settings', false);

            // load ajax controller
            new wcEazyFreeShippingBarFrontendAjax($this);
            $this->utils = new wcEazyFreeShippingBarUtils($this);
            
            $this->__wceazy_fsb_run();
            

        }

        private function __wceazy_fsb_run() {
            add_action('wp_head', array( $this, 'wceazy_fsb_custom_styles'), 100);

            if( !empty( $this->fsb_settings ) ) {
                if( isset( $this->fsb_settings['wceazy_fsb_show_in_cart'] )){
                    $position_cart_subtotal = !($this->fsb_settings['wceazy_fsb_position_cart_subtotal']) ? $this->fsb_settings['wceazy_fsb_position_cart_subtotal'] : 'woocommerce_cart_totals_before_shipping';
                    add_action( $position_cart_subtotal, [ $this, 'wceazy_init_fsb_progress_only' ] );
                }

                if( isset( $this->fsb_settings['wceazy_fsb_show_in_checkout'] ) ){
                    $position_checkout_subtotal = !($this->fsb_settings['wceazy_fsb_position_checkout_subtotal']) ? $this->fsb_settings['wceazy_fsb_position_checkout_subtotal'] : 'woocommerce_review_order_before_shipping';
                    add_action( $position_checkout_subtotal, [ $this, 'wceazy_init_fsb_progress_only' ] );
                }

            }
            
            
            if( !empty($this->fsb_settings) && !empty( $this->fsb_settings['wceazy_fsb_dont_show_pages'] ) ){
                $this->dont_show_pages = explode (',', $this->fsb_settings['wceazy_fsb_dont_show_pages']);
            }

            add_action('template_redirect', function(){

                if( ! in_array ( get_the_ID(), $this->dont_show_pages ) ) {
                    
                    if( !empty( $this->fsb_settings ) && isset( $this->fsb_settings['wceazy_enable_fsb'] ) ){
                
                        $get_screen         = wp_is_mobile();
                        $switchInDesktop    = isset($this->fsb_settings['wceazy_fsb_display_desktop']) ? 'yes' : 'no';
                        $switchInMobile     = isset($this->fsb_settings['wceazy_fsb_display_mobile']) ? 'yes' : 'no';
        
                        if( !$get_screen && $switchInDesktop == 'yes' ){
                            $position = !empty($this->fsb_settings['wceazy_fsb_position']) ? $this->fsb_settings['wceazy_fsb_position'] : 'wp_head';
                            add_action ($position, array($this, 'wceazy_load_free_shipping_bar'), 10, 2);
                        }else if( $get_screen && $switchInMobile == 'yes' ) {
                            $position = !empty($this->fsb_settings['wceazy_fsb_position']) ? $this->fsb_settings['wceazy_fsb_position'] : 'wp_head';
                            add_action ($position, array($this, 'wceazy_load_free_shipping_bar'), 10, 2);
                        }else if( $switchInMobile == 'yes' && $switchInDesktop == 'yes' ) {
                            $position = !empty($this->fsb_settings['wceazy_fsb_position']) ? $this->fsb_settings['wceazy_fsb_position'] : 'wp_head';
                            add_action ($position, array($this, 'wceazy_load_free_shipping_bar'), 10, 2);
                        }
        
                    }

                }

            });
            
        }

        public function wceazy_fsb_custom_styles(){
            include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/includes/fsb-inline-style.php";
        }

        function wceazy_module_frontend_enqueue ()
        {

            $this->base_admin->utils->module_enqueue_style ($this->module_slug, "frontend", "frontend.css");
            $this->base_admin->utils->module_enqueue_script ($this->module_slug, "frontend", "frontend.js", array('jquery'));

            // create localize
            wp_localize_script( "wceazy-".$this->module_slug."-frontend", 'wceazy_fsb_fronted_object', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'security' => wp_create_nonce( 'wceazyfsb_hashkey' ),
                'wceazy_fsb_settings' => !empty($this->fsb_settings) ? json_encode ($this->fsb_settings) : json_encode( array() )
            ));
        }


        public function wceazy_load_free_shipping_bar() {         
            include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/frontend/templates/views/free-shipping-bar-content.php";
        }

        public function wceazy_init_fsb_progress_only() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/frontend/templates/views/free-shipping-progress-bar.php";
        }
        

    }

}