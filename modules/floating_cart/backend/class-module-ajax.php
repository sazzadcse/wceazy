<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcEazyFloatingCartAjax')) {
    class wcEazyFloatingCartAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wceazy_save_floating_cart_settings', array($this, 'wceazy_save_floating_cart_settings') );

        }

        function wceazy_save_floating_cart_settings() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/save-settings.php";
            wp_die();
        }


    }
}
