<?php

$base_admin = $this->base_admin;
$module_slug = "url_coupon";
$module_title = "URL Coupon";

include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/includes/UrlCouponUtils.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";
$this->modules_obj[$module_slug] = new wcEazyUrlCouponAdmin($base_admin, $module_slug, $module_title);