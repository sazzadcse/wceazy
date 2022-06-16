<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcEazyAdmin')) {
    class wcEazyAdmin
    {

        public $utils;
        public $db;
        public function __construct()
        {

            $this->utils = new wcEazyUtils();
            $this->db = new wcEazyDB();

            $this->utils->init($this);
            $this->db->init($this);
            new wcEazyAdminAjax($this);

            add_action("admin_menu", array($this, 'wceazy_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'wceazy_admin_enqueue'));
            add_action( 'plugin_action_links_' . WCEAZY_BASE_PATH, array( $this, 'wceazy_action_links') );

        }


        function wceazy_action_links($links) {
            $settings_url = add_query_arg( 'page', 'wceazy-dashboard', get_admin_url() . 'admin.php' );
            $setting_arr = array('<a href="' . esc_url( $settings_url ) . '">Dashboard</a>');
            $pro_arr = array('<a target="_blank" href="https://wceazy.com"><span style="color: #6E32C9; font-weight: bold;">Get Pro</span></a>');
            $links = array_merge($setting_arr, $links, $pro_arr);
            return $links;
        }

        function wceazy_admin_menu()
        {
            $icon_url = WCEAZY_IMG_DIR . "wceazy_icon.svg";
            add_menu_page("wcEazy", "wcEazy", 'manage_options', "wceazy-dashboard", array($this, 'wceazy_admin_dashboard'), $icon_url, 6);
        }

        function wceazy_admin_enqueue( $page ) {
            $screen = get_current_screen();

            if ( in_array( $screen->id, ["toplevel_page_wceazy-dashboard"] ) ) {

                $this->utils->enqueue_style('admin', 'admin.css');
                $this->utils->enqueue_style('toastr', 'toastr.min.css');
                $this->utils->enqueue_style('select2', 'select2.min.css');
                $this->utils->enqueue_style('responsive', 'responsive.css');

                $this->utils->enqueue_script('admin', 'admin.js', array('jquery'));
                $this->utils->enqueue_script('toastr', 'toastr.min.js', array('jquery'));
                $this->utils->enqueue_script('select2', 'select2.min.js', array('jquery'));
                $this->utils->enqueue_script ("data-tables", "data-tables.js", array('jquery'));
            }

        }

        function wceazy_admin_dashboard()
        {
            include_once WCEAZY_PATH . "backend/templates/dashboard.php";

        }

    }
}


new wcEazyAdmin();