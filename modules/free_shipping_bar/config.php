<?php

$base_admin = $this->base_admin;
$module_slug = "free_shipping_bar";
$module_title = "Free Shipping Bar";


include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/includes/free-shipping-bar-utils.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";

include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/frontend/class-free-shipping-bar-frontend-ajax.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/frontend/class-free-shipping-bar-frontend.php";

$this->modules_obj[$module_slug] = new wcEazyFreeShippingBarAdmin($base_admin, $module_slug, $module_title);

new wcEazyFreeShippingBarFrontend($base_admin, $module_slug, $module_title);