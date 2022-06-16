<?php
// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyProductStickyBarFrontend')) {
    class wcEazyProductStickyBarFrontend
    {

        public $base_admin;
        public $module_slug;
        public $module_title;
        public $settings = array();
        public $styles = array();
        public $wfpsb_show_in;
        public $wfpsb_is_enable;

        public function __construct ($base_admin, $module_slug, $module_title)
        {
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;

            new wcEazyProductStickyBarAjax($this);

            if( $this->base_admin->db->getModuleStatus($this->module_slug) !== 1 ) {
                return;
            }

            add_action ('wp_enqueue_scripts', array($this, 'wceazy_module_frontend_enqueue'));
            // check settings
            $psb_settings = get_option ("wceazy_psb_settings", true);
            $wfpsb_settings = json_decode ($psb_settings);
            $this->settings   = !empty($wfpsb_settings) && isset($wfpsb_settings->settings) ? $wfpsb_settings->settings : [];
            $this->styles     = !empty($wfpsb_settings) && isset($wfpsb_settings->styles) ? $wfpsb_settings->styles : [];

            $this->wfpsb_show_in = !empty($this->settings) && !empty($this->settings->wfpsb_show_in) ? $this->settings->wfpsb_show_in : 'before';
            $this->wfpsb_is_enable = !empty($this->settings) && !empty($this->settings->wfpsb_is_enable) ? $this->settings->wfpsb_is_enable : 'no';

            add_action ('wp_footer', array($this, 'wceazy_product_sticky_bar'));

        }

        function wceazy_module_frontend_enqueue ($page)
        {

            $this->base_admin->utils->module_enqueue_style ($this->module_slug, "frontend", "frontend.css");
            $this->base_admin->utils->module_enqueue_script ($this->module_slug, "frontend", "frontend.js", array('jquery','json2'));

            // create localize
            wp_localize_script( "wceazy-".$this->module_slug."-frontend", 'wceazy_psb_jsfrontend', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'security' => wp_create_nonce( 'wceazypsbf_hashkey' ),
                'wfpsb_fronted_settings' => !empty($this->settings) ? json_encode ($this->settings) : json_encode( array() )
            ));
        }

        public function wceazy_product_sticky_bar(){
            if( !empty($this->wfpsb_is_enable) && $this->wfpsb_is_enable == 'yes'){
                include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/frontend/templates/views/sticky_bar.php";
            }
        }

    }
}