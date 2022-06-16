<?php


$base_admin = $this->base_admin;
$module_slug = "one_click_checkout";
$module_title = "One Click Checkout";

include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/includes/one-click-checkout-utils.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/frontend/class-module-frontend-ajax.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/frontend/class-module-frontend.php";
$this->modules_obj[$module_slug] = new wcEazyOneClickCheckoutAdmin($base_admin, $module_slug, $module_title);

new wcEazyOneClickCheckoutFrontend($base_admin, $module_slug, $module_title);
