<div id="wceazy_fsbar_header" style="display: none;">
    <div class="wceazy_fsbar_module_list_header">
        <div class="wceazy_fsbar_module_left_header">
            <p><?php _e('wcEazyPro<span>'.WCEAZY_VERSION.'</span>','wceazy') ?></p>
        </div>
        <div class="wceazy_fsbar_module_right_header">
            <p><span class="dashicons dashicons-info-outline"></span><?php _e('Need helps?', 'wceazy') ?></p>
        </div>
    </div>

    <?php include_once WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/settings/live-preview.php"; ?>

    <div class="wceazy_fsbar_single_module_title">
        <div class="wceazy_header_left">
            <h2><?php echo $this->module_title; ?></h2>
            <div class="documentation">
                <a target="_blank" href="#">Documentation</a>
            </div>
        </div>
        <div class="wceazy_header_right">
            <a class="wceazy_header_back" href="" onclick="back_modules()">
                <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.99 5L11 5L11 3L3.99 3L3.99 6.12834e-07L-3.49691e-07 4L3.99 8L3.99 5Z" fill="#FF521D"/>
                </svg>
                Back to all Modules
            </a>
        </div>
    </div>

</div>


<div id="wceazy_fsbar_container" style="display: none;">
    <?php include WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/free-shipping-bar-settings.php"; ?>
</div>