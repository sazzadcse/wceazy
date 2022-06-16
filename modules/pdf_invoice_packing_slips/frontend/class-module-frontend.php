<?php
// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyPdfInvoiceFrontend')) {
    class wcEazyPdfInvoiceFrontend
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

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }

            new wcEazyPdfInvoicetFrontendAjax($this);

            //add_action( 'woocommerce_order_status_processing', array($this, 'wceazy_process_new_order_notification'), 20, 2 );
            //add_action( 'woocommerce_order_status_processing', 'wceazy_process_new_order_notification', 20, 2 );

        }

        public function wceazy_process_new_order_notification ($order_id, $order) {
            // Send "New Email" notification (to admin)
            //WC()->mailer()->get_emails()['WC_Email_New_Order']->trigger( $order_id );
        }


    }
}
