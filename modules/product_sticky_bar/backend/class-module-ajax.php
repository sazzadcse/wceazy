<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyProductStickyBarAjax')) {
    class wcEazyProductStickyBarAjax
    {

        public $base_admin;

        public function __construct ($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action ('wp_ajax_wceazy_product_sticky_bar_settings', array($this, 'wceazy_product_sticky_bar_settings'));

        }

        function wceazy_product_sticky_bar_settings ()
        {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/settings_product_sticky_bar.php";
            wp_die ();
        }

    }

}