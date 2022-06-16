<div class="tab_body_title">
    <h1><?php _e( 'Header Settings', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Notifications?', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_header_notification" class="wffc_switcher_default_check" name="wffc_show_header_notification"
                           type="checkbox" value="yes" <?php echo ($show_notification == 'yes') ? 'checked' : ''?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please trun off if you do not show notifications.</small>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Basket-Icon?', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_header_basket_icon" class="wffc_switcher_default_check" name="wffc_show_header_basket_icon"
                           type="checkbox" value="yes" <?php echo ($show_header_basket_icon == 'yes') ? 'checked' : ''?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show basket icon in cart header.</small>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Close-Icon?', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_header_close_icon" name="wffc_show_header_close_icon" class="wffc_switcher_default_check"
                           type="checkbox" value="yes" <?php echo ($show_header_close_icon == 'yes') ? 'checked' : ''?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show close icon on cart header</small>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Notification Durations', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number"
                       name="wffc_notification_duractions" id="wffc_notification_duractions"
                       value="<?php echo !empty($notification_duractions) ? $notification_duractions : 3000 ; ?>" max="10000" min="2000"
                       placeholder="<?php _e( '3000', 'wceazy' ); ?>">
            </div>
        </div>
        <small>Please enter notification display duration in milli second (3000) like 3s.</small>
    </div>
</div>