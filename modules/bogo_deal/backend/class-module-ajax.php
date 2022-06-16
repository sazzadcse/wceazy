<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcEazyBogoDealAjax')) {
    class wcEazyBogoDealAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wceazy_bogo_deal_get_rules', array($this, 'wceazy_bogo_deal_get_rules') );
            add_action( 'wp_ajax_wceazy_bogo_deal_save_rules', array($this, 'wceazy_bogo_deal_save_rules') );
            add_action( 'wp_ajax_wceazy_bogo_deal_get_products', array($this, 'wceazy_bogo_deal_get_products') );

        }

        function wceazy_bogo_deal_get_rules() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/get_rules.php";
            wp_die();
        }
        function wceazy_bogo_deal_save_rules() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/save_rules.php";
            wp_die();
        }
        function wceazy_bogo_deal_get_products() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/get_products.php";
            wp_die();
        }



    }
}
