<?php

$base_admin = $this->base_admin;
$module_slug = "product_sticky_bar";
$module_title = "Product Sticky Bar";


include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/includes/wcEazyProductStickyBarUtils.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/frontend/class-sticky-bar-frontend-ajax.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/frontend/class-sticky-bar-frontend.php";

$this->modules_obj[$module_slug] = new wcEazyProductStickyBar($base_admin, $module_slug, $module_title);

new wcEazyProductStickyBarFrontend($base_admin, $module_slug, $module_title);

