<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyProductStickyBar')) {
    class wcEazyProductStickyBar
    {

        public $utils;
        public $base_admin;
        public $module_slug;
        public $module_title;
        public $settings = array();
        public $styles = array();

        public function __construct ($base_admin, $module_slug, $module_title)
        {
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;

            add_action ('admin_enqueue_scripts', array($this, 'wceazy_module_admin_enqueue'));
            $this->utils = new wcEazyProductStickyBarUtils($this);
            new wcEazyProductStickyBarAjax($this);

            $get_settings = get_option('wceazy_psb_settings', true);

            $wfpsb_settings = json_decode ($get_settings);
            $this->settings   = !empty($wfpsb_settings) && isset($wfpsb_settings->settings) ? $wfpsb_settings->settings : [];
            $this->styles     = !empty($wfpsb_settings) && isset($wfpsb_settings->styles) ? $wfpsb_settings->styles : [];

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }
        }


        function wceazy_module_admin_enqueue ($page)
        {
            if ($page == "toplevel_page_wceazy-dashboard") {

                $this->base_admin->utils->module_enqueue_style ($this->module_slug, "admin", "admin.css");
                $this->base_admin->utils->module_enqueue_script ($this->module_slug, "admin", "admin.js", array('jquery'));

                // create localize
                wp_localize_script( "wceazy-".$this->module_slug."-admin", 'wceazy_psb_jsadmin', array(
                    'security' => wp_create_nonce( 'wceazypsb_hashkey' ),
                    'wceazy_psb_settings' => !empty($this->settings) ? json_encode ($this->settings) : json_encode( array() )
                ));

            }
        }

        function wceazy_module_dashboard ()
        {
            include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/dashboard.php";
        }

    }
}

