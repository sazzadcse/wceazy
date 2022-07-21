<?php
/**
 * Plugin Name:       wcEazy
 * Plugin URI:        https://wceazy.com
 * Description:       wcEazy provides multiple WooCommerce extensions in a single package you’ll ever require.
 * Version:           1.0.3
 * Author:            wcEazy
 * Author URI:        https://wceazy.com
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wceazy
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}


define ('WCEAZY_VERSION', '1.0.3');
defined ('WCEAZY_PATH') or define ('WCEAZY_PATH', plugin_dir_path (__FILE__));
defined ('WCEAZY_URL') or define ('WCEAZY_URL', plugin_dir_url (__FILE__));
defined ('WCEAZY_BASE_FILE') or define ('WCEAZY_BASE_FILE', __FILE__);
defined ('WCEAZY_BASE_PATH') or define ('WCEAZY_BASE_PATH', plugin_basename (__FILE__));
defined ('WCEAZY_IMG_DIR') or define ('WCEAZY_IMG_DIR', plugin_dir_url (__FILE__) . 'assets/img/');
defined ('WCEAZY_CSS_DIR') or define ('WCEAZY_CSS_DIR', plugin_dir_url (__FILE__) . 'assets/css/');
defined ('WCEAZY_JS_DIR') or define ('WCEAZY_JS_DIR', plugin_dir_url (__FILE__) . 'assets/js/');
defined ('WCEAZY_MODULES_PATH') or define ('WCEAZY_MODULES_PATH', plugin_dir_path (__FILE__) . 'modules');
defined ('WCEAZY_MODULES_DIR') or define ('WCEAZY_MODULES_DIR', plugin_dir_url (__FILE__) . 'modules/');

function wceazy_check_premium_activation() {
    if ( !in_array( 'wceazy-pro/wceazy-pro.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        require_once WCEAZY_PATH . 'includes/WcEazyUtils.php';
        require_once WCEAZY_PATH . 'includes/WcEazyDB.php';
        require_once WCEAZY_PATH . 'backend/class-wceazy-ajax.php';
        require_once WCEAZY_PATH . 'backend/class-wceazy-admin.php';

    }
}
add_action( 'wceazy_pro_check_init', 'wceazy_check_premium_activation', 10, 2 );
do_action( 'wceazy_pro_check_init');





