<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyAutoApplyCouponAdmin')) {
    class wcEazyAutoApplyCouponAdmin
    {

        public $utils;
        public $base_admin;
        public $module_slug;
        public $module_title;

        public function __construct ($base_admin, $module_slug, $module_title)
        {
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;

            add_action ('admin_enqueue_scripts', array($this, 'wceazy_module_admin_enqueue'));

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }

            $this->utils = new AutoApplyCouponUtils($this);
            new wcEazyAutoApplyCouponAjax($this);

            // apply auto coupons
            add_filter('woocommerce_before_cart', array($this->utils, 'wceazyadd_apply_coupon_automatically'));

            add_action('woocommerce_thankyou', array( $this->utils, 'wceazy_session_unset'), 10, 1);


        }

        public function my_woocommerce_add_error($err, $err_code){
            return ( '103' == $err_code ) ? '' : $err;
        }

        function wceazy_module_admin_enqueue ($page)
        {
            if ($page == "toplevel_page_wceazy-dashboard") {
                $this->base_admin->utils->module_enqueue_style ($this->module_slug, "data-tables", "data-tables.css");
                $this->base_admin->utils->module_enqueue_style ($this->module_slug, "admin", "admin.css");

                $this->base_admin->utils->module_enqueue_script ($this->module_slug, "admin", "admin.js", array('jquery'));

            }
        }


        function wceazy_module_dashboard ()
        {
            include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/dashboard.php";
        }


    }
}

