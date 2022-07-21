<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyPdfInvoiceAdmin')) {
    class wcEazyPdfInvoiceAdmin
    {

        public $utils;
        public $base_admin;
        public $module_slug;
        public $module_title;
        public $dompdf;
        public $shop_info = array();
        public $wfpi_settings = array();

        public function __construct ($base_admin, $module_slug, $module_title)
        {
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;

            add_action ('admin_enqueue_scripts', array($this, 'wceazy_module_admin_enqueue'));
            add_action('init', array($this, 'get_shop_info'));

            $this->utils = new wcEazyPdfInvoiceUtils($this);
            new wcEazyPdfInvoiceAjax($this);

            // get settings data
            $this->wfpi_settings = get_option( 'wceazy_pdf_invoice_settings', false );

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }

            add_filter( 'woocommerce_admin_order_actions', array($this, 'wofusion_edit_shop_order_action_column'), 10, 2 );
            add_action( 'admin_head', array($this, 'wceazy_custom_order_status_actions_button_css'), 10, 2 );


        }

        public function wofusion_edit_shop_order_action_column($actions, $order){
            $get_status = !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_disabled_status']) ? explode (',',$this->wfpi_settings['wfpi_disabled_status']) : array();
            $disabled_status = str_replace ('wc-', '', $get_status);

            $disabled_statuses = array_map( function($status){
                $status = 'wc-' === substr( $status, 0, 3 ) ? substr( $status, 3 ) : $status;
                return $status;
            }, $disabled_status );

            if ( !$order->has_status( $disabled_statuses ) ) {

                // for invoice
                if(!empty($this->wfpi_settings) && isset( $this->wfpi_settings['wfpi_deactivate_invoice'] )){
                    $actions[$this->module_slug] = array(
                        'url'       => wp_nonce_url( admin_url( 'admin-ajax.php?action=wceazy_pdf_invoice&document_type=invoice&order_id=' . $order->get_id() ), 'wceazy' ),
                        'name'      => __( 'Print Invoice', 'wceazy' ),
                        'action'    => 'wceazy_'.$this->module_slug,
                    );
                }

                // for shipping slip
                if(!empty($this->wfpi_settings) && isset( $this->wfpi_settings['wfpi_deactivate_shipping_label'] )){
                    $actions[$this->module_slug.'_pslip'] = array(
                        'url'       => wp_nonce_url( admin_url( 'admin-ajax.php?action=wceazy_pdf_shipping_slip&document_type=shipping_slip&order_id=' . $order->get_id() ), 'wceazy' ),
                        'name'      => __( 'Print Shipping Slip', 'wceazy' ),
                        'action'    => 'wceazy_'.$this->module_slug . '_pslip',
                    );
                }

            }

            return $actions;

        }

        public function wceazy_custom_order_status_actions_button_css(){
            echo '<style>.wceazy_'.$this->module_slug.'::after { font-family: "Dashicons" !important; content: "\f190" !important; font-size:25px; line-height: 1 !important; } .wceazy_'.$this->module_slug.'_pslip::after { font-family: "Dashicons" !important; content: "\f193" !important; font-size:25px; line-height: 1 !important; }</style>';

            //check settings
            if(!empty($this->wfpi_settings) && $this->wfpi_settings['wfpi_display_download'] == 'display_new_window'){
                echo '<script> jQuery(document).ready(function($) {
                    $("a.wceazy_pdf_invoice_packing_slips").attr("target", "_blank"); $("a.wceazy_pdf_invoice_packing_slips_pslip").attr("target", "_blank");
                }); </script>';
            }

        }


        function wceazy_module_admin_enqueue ($page)
        {
            if ($page == "toplevel_page_wceazy-dashboard") {
                wp_enqueue_media();
                $this->base_admin->utils->module_enqueue_style ($this->module_slug, "admin", "admin.css");
                $this->base_admin->utils->module_enqueue_script ($this->module_slug, "admin", "admin.js", array('jquery','wp-color-picker'));

                // create localize
                wp_localize_script( "wceazy-".$this->module_slug."-admin", 'wceazy_pi_admin_object', array(
                    'security' => wp_create_nonce( 'wceazypissl_hashkey' ),
                    'wceazy_pi_settings' => !empty($this->wfpi_settings) ? json_encode ($this->wfpi_settings) : json_encode( array() )
                ));
            }
        }


        function wceazy_module_dashboard ()
        {
            // load view
            include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/dashboard.php";
        }

        /*
         * define get shop info
         * @param
         *
         * return []
         *
         * Author :
         * Develop on : 28-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function get_shop_info(){
            
            if( !empty($this->wfpi_settings) && !empty( $this->wfpi_settings['wfpi_country_state'] )){
                $country_state = explode(":",$this->wfpi_settings['wfpi_country_state']);
            }

            if( class_exists( 'WooCommerce' ) ){
                $country = !empty($country_state) && isset($country_state[0]) ? $country_state[0] : array_search(WC()->countries->countries[WC()->countries->get_base_country()], WC()->countries->countries);
                $state = !empty($country_state) && isset($country_state[1]) ? $country_state[1] : WC()->countries->get_base_state();
                $this->shop_info = array(
                        'shop_name' => !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_sender_name']) ? $this->wfpi_settings['wfpi_sender_name'] : get_option( 'blogname' ),
                        'address1'  => !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_address_line_one']) ? $this->wfpi_settings['wfpi_address_line_one'] : get_option( 'woocommerce_store_address' ),
                        'address2'  => !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_address_line_two']) ? $this->wfpi_settings['wfpi_address_line_two'] : get_option( 'woocommerce_store_address_2' ),
                        'city'      => !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_address_city']) ? $this->wfpi_settings['wfpi_address_city'] : get_option( 'woocommerce_store_city' ),
                        'postcode'  => !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_postal_code']) ? $this->wfpi_settings['wfpi_postal_code'] : get_option( 'woocommerce_store_postcode' ),
                        'state'     => $state,
                        'country'   => $country,
                );
            }

        }

    }
}
