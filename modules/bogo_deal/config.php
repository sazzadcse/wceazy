<?php

$base_admin = $this->base_admin;
$module_slug = "bogo_deal";
$module_title = "BOGO Deal";

include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/includes/wcEazyBogoDealUtils.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCEAZY_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";
$this->modules_obj[$module_slug] = new wcEazyBogoDeal($base_admin, $module_slug, $module_title);