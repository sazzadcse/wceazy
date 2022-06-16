<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyPdfInvoicetFrontendAjax')) {
    class wcEazyPdfInvoicetFrontendAjax
    {

        public $base_admin;
        public $wffc_carts = array();
        public $wfc_settings = array();

        public function __construct ($base_admin)
        {

            $this->base_admin = $base_admin;

            //add_action ('wp_ajax_#', array($this, 'wceazy_#'));

        }

        public function wceazy_init_(){

            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/#.php";
            wp_die ();
        }


    }

}