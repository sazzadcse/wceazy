<?php
// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyFreeShippingBarFrontendAjax')) {
    class wcEazyFreeShippingBarFrontendAjax
    {

        public $base_admin;
        public $fsb_settings = array();

        public function __construct ($base_admin)
        {

            $this->base_admin = $base_admin;

            // get cart settings data
            $this->fsb_settings = get_option('wceazy_fsbar_settings', false);

            add_action('wp_ajax_wceazy_init_free_shipping_bar_content', array($this, 'wceazy_init_free_shipping_bar_content'));
            add_action( 'wp_ajax_nopriv_wceazy_init_free_shipping_bar_content', array($this, 'wceazy_init_free_shipping_bar_content') );
            
            add_action( 'wp_ajax_wceazy_init_free_shipping_progress_bar_content', array($this, 'wceazy_init_free_shipping_progress_bar_content') );
            add_action( 'wp_ajax_nopriv_wceazy_init_free_shipping_progress_bar_content', array($this, 'wceazy_init_free_shipping_progress_bar_content') );
            
        }

        public function wceazy_init_free_shipping_bar_content(){
            $enable_progress_bar = !empty($this->fsb_settings) && isset($this->fsb_settings['wceazy_fsb_enable_progress_bar']) ? 'yes' : 'no';
            $fsb_progress_layout = !empty($this->fsb_settings) && !empty($this->fsb_settings['wceazy_fsb_progress_layout']) ? $this->fsb_settings['wceazy_fsb_progress_layout'] : 'fsb-style1';
            $fsb_close_icon      = !empty($this->fsb_settings) && !empty($this->fsb_settings['wceazy_fsb_close_icon']) ? $this->fsb_settings['wceazy_fsb_close_icon'] : 'icon-cancel1';
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/init-free-shipping-bar.php";
            wp_die ();
        }

        public function wceazy_init_free_shipping_progress_bar_content(){
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/init-progress-bar.php";
            wp_die ();
        }
       

    }

}