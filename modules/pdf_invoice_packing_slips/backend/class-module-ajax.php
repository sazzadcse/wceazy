<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcEazyPdfInvoiceAjax')) {
    class wcEazyPdfInvoiceAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wceazy_save_pdf_invoice_settings', array($this, 'wceazy_save_pdf_invoice_settings') );

            add_action ('wp_ajax_wceazy_pdf_invoice', array($this, 'wceazy_pdf_invoice'));
            add_action( 'wp_ajax_nopriv_wceazy_pdf_invoice', array($this, 'wceazy_pdf_invoice') );

            add_action ('wp_ajax_wceazy_pdf_shipping_slip', array($this, 'wceazy_pdf_shipping_slip'));
            add_action( 'wp_ajax_nopriv_wceazy_pdf_shipping_slip', array($this, 'wceazy_pdf_shipping_slip') );

        }

        public function wceazy_pdf_invoice(){
            $order_id = $_GET['order_id'];
            $document_type = $_GET['document_type'];
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/generate-pdf-invoice.php";
            die();
        }

        public function wceazy_pdf_shipping_slip(){
            $order_id = $_GET['order_id'];
            $document_type = $_GET['document_type'];
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/generate-pdf-shipping-slip.php";
            die();
        }

        function wceazy_save_pdf_invoice_settings() {
            include_once WCEAZY_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/save-settings.php";
            wp_die();
        }

    }
}
