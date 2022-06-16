<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcEazyUrlCouponAjax')) {
    class wcEazyUrlCouponAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wceazy_url_coupon_list', array($this, 'wceazy_url_coupon_list') );

        }

        function wceazy_url_coupon_list() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/coupon_list.php";
            wp_die();
        }


    }
}
