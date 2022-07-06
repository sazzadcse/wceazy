<div class="tab_body_title">
    <h1><?php echo __( 'Effect Settings', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Initial Delay Time', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number"
                       name="wceazy_fsb_initial_delay" id="wceazy_fsb_initial_delay" value=""
                       placeholder="0" disabled>
            </div>
            <small>Set initial delay time in mili second. The Free Shipping Bar will appear according to your setting time.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php echo __( 'Allow Disappear Time', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_fsb_allow_disappear_time" class="" type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Turn ON the switch to allow disappear time.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group set-disappear-time">
    <div class="label_title">
        <h4><?php echo __( 'Set Disappear Time', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" id="wceazy_fsb_disappear_time" placeholder="0" disabled>
            </div>
            <small>Set initial delay time in mili second. The Free Shipping Bar will disappear according to your setting time.</small>
        </div>
    </div>
</div>