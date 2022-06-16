<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcEazyAutoApplyCouponAjax')) {
    class wcEazyAutoApplyCouponAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wceazy_auto_apply_coupon_list', array($this, 'wceazy_auto_apply_coupon_list') );
            add_action( 'wp_ajax_wceazy_auto_apply_coupon_add', array($this, 'wceazy_auto_apply_coupon_add') );
            add_action( 'wp_ajax_wceazy_auto_apply_coupon_remove', array($this, 'wceazy_auto_apply_coupon_remove') );
            add_action( 'wp_ajax_wceazy_auto_apply_coupon_toggle', array($this, 'wceazy_auto_apply_coupon_toggle') );

        }

        function wceazy_auto_apply_coupon_list() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/coupon_list.php";
            wp_die();
        }

        function wceazy_auto_apply_coupon_add() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/add_to_auto_coupon.php";
            wp_die();
        }

        function wceazy_auto_apply_coupon_remove() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/remove_to_auto_coupon.php";
            wp_die();
        }

        function wceazy_auto_apply_coupon_toggle() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/toggle_auto_coupon.php";
            wp_die();
        }


    }
}
