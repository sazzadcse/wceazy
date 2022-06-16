<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcEazyAdminAjax')) {
    class wcEazyAdminAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;
            add_action( 'wp_ajax_wceazy_update_module_status', array($this, 'wceazy_update_module_status') );
            add_action( 'wp_ajax_wceazy_update_all_module_status', array($this, 'wceazy_update_all_module_status') );

        }

        function wceazy_update_module_status() {
            include_once WCEAZY_PATH . "backend/api/update_module_status.php";
            wp_die();
        }

        /**
         * wceazy_update_all_module_status
         */
        function wceazy_update_all_module_status(){
            include_once WCEAZY_PATH . "backend/api/update_all_module_status.php";
            wp_die();
        }

    }
}
