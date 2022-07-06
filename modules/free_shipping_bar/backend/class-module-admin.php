<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcEazyFreeShippingBarAdmin')) {
    class wcEazyFreeShippingBarAdmin
    {

        public $utils;
        public $base_admin;
        public $module_slug;
        public $module_title;
        public $wceazyfsb_settings = array();

        public function __construct ($base_admin, $module_slug, $module_title)
        {
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;

            
            add_action ('admin_enqueue_scripts', array($this, 'wceazy_module_admin_enqueue'));

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }

            $this->utils = new wcEazyFreeShippingBarUtils($this);
            new wcEazyFreeShippingBarAjax($this);

            $this->wceazyfsb_settings = get_option('wceazy_fsbar_settings', false);

            add_action('admin_head', array( $this, 'wceazy_fsb_inline_styles'), 10, 2);

        }

        //include internal style
        public function wceazy_fsb_inline_styles(){
            include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/includes/fsb-inline-style.php";
        }

        function wceazy_module_admin_enqueue ($page)
        {
            if ($page == "toplevel_page_wceazy-dashboard") {
                $this->base_admin->utils->module_enqueue_style ($this->module_slug, "admin", "admin.css");
                $this->base_admin->utils->module_enqueue_script ($this->module_slug, "admin", "admin.js", array('jquery','wp-color-picker'));

                wp_localize_script( "wceazy-".$this->module_slug."-admin", 'wceazyfsb_admin_object', array(
                    'wceazyfsb_settings' => !empty($this->wceazyfsb_settings) ? json_encode ($this->wceazyfsb_settings) : json_encode( array() )
                ));
            }
        }


        function wceazy_module_dashboard () {

            //get settings value
            $enable_fsb                 = !empty($this->wceazyfsb_settings) && isset($this->wceazyfsb_settings['wceazy_enable_fsb']) ? 'checked' : '';
            $shipping_zone              = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_shipping_zone']) ? $this->wceazyfsb_settings['wceazy_fsb_shipping_zone'] : '';
            $detect_ip                  = !empty($this->wceazyfsb_settings) && isset( $this->wceazyfsb_settings['wceazy_fsb_detect_ip'] ) ? 'checked' : '';
            $display_desktop            = !empty($this->wceazyfsb_settings) && isset($this->wceazyfsb_settings['wceazy_fsb_display_desktop']) ? 'checked' : '';
            $display_mobile             = !empty($this->wceazyfsb_settings) && isset($this->wceazyfsb_settings['wceazy_fsb_display_mobile']) ? 'checked' : '';
            $assign_pages               = !empty($this->wceazyfsb_settings) && !empty(!empty($this->wceazyfsb_settings['wceazy_fsb_show_pages'])) ? explode(',', $this->wceazyfsb_settings['wceazy_fsb_show_pages']) : [];
            $unassign_pages             = !empty($this->wceazyfsb_settings) && !empty(!empty($this->wceazyfsb_settings['wceazy_fsb_dont_show_pages'])) ? explode(',', $this->wceazyfsb_settings['wceazy_fsb_dont_show_pages']) : [];
            $include_products           = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_include_products']) ? explode(',', $this->wceazyfsb_settings['wceazy_fsb_include_products'] ) : []; 
            
            //cart&checkout
            $show_in_cart               = !empty($this->wceazyfsb_settings) && isset($this->wceazyfsb_settings['wceazy_fsb_show_in_cart']) ? 'checked' : '';
            $position_cart_subtotal     = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_position_cart_subtotal']) ? $this->wceazyfsb_settings['wceazy_fsb_position_cart_subtotal'] : '';
            $show_in_checkout           = !empty($this->wceazyfsb_settings) && isset($this->wceazyfsb_settings['wceazy_fsb_show_in_checkout']) ? 'checked' : '';
            $position_checkout_subtotal = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_position_checkout_subtotal']) ? $this->wceazyfsb_settings['wceazy_fsb_position_checkout_subtotal'] : '';
            $fsb_inside_text            = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_inside_text']) ? $this->wceazyfsb_settings['wceazy_fsb_inside_text'] : '';
            $fsb_ccpbg                  = '#8e8e8e';
            //message
            $system_announce            = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wcfsb_system_announce']) ? $this->wceazyfsb_settings['wcfsb_system_announce'] : '';
            $purchased_message          = '';
            $success_message            = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wcfsb_success_message']) ? $this->wceazyfsb_settings['wcfsb_success_message'] : '';
            $error_message              = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wcfsb_error_message']) ? $this->wceazyfsb_settings['wcfsb_error_message'] : '';
            //effect
            $initial_delay              = '';
            $close_message              = !empty($this->wceazyfsb_settings) && isset($this->wceazyfsb_settings['wceazy_fsb_close_message']) ? 'checked' : '';
            $allow_disappear_time       = '';
            $disappear_time_delay       = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_disappear_time']) ? $this->wceazyfsb_settings['wceazy_fsb_disappear_time'] : '';
            $show_gift_box              = !empty($this->wceazyfsb_settings) && isset($this->wceazyfsb_settings['wceazy_fsb_show_gift_box']) ? 'checked' : '';
            //style
            $fsb_position               = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_position']) ? $this->wceazyfsb_settings['wceazy_fsb_position'] : '';
            
            $fsb_link_color             = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_link_color']) ? $this->wceazyfsb_settings['wceazy_fsb_link_color'] : '#fff';
            $fsb_font_size              = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_font_size']) ? $this->wceazyfsb_settings['wceazy_fsb_font_size'] : 16;
            $fsb_text_align             = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_text_align']) ? $this->wceazyfsb_settings['wceazy_fsb_text_align'] : 'center';
            
            $fsb_close_icon_size        = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_close_icon_size']) ? $this->wceazyfsb_settings['wceazy_fsb_close_icon_size'] : 22;
            //style progress bar
            $enable_progress_bar        = !empty($this->wceazyfsb_settings) && isset($this->wceazyfsb_settings['wceazy_fsb_enable_progress_bar']) ? 'checked' : '';
            
            
            $fsb_progress_font_size     = !empty($this->wceazyfsb_settings) && !empty($this->wceazyfsb_settings['wceazy_fsb_progress_font_size']) ? $this->wceazyfsb_settings['wceazy_fsb_progress_font_size'] : 12;
            $fsb_progress_layout        = 'fsb-style1';

            $visable_inner_bg_style = ($fsb_progress_layout !== 'fsb-style1') ? 'show' : 'hidden';

            // load view
            include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/dashboard.php";

        }
        

    }
}
