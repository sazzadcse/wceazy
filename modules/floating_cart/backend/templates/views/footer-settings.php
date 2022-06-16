<div class="tab_body_title">
    <h1><?php _e( 'Footer Settings', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Subtotal?', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_subtotal" class="wffc_switcher_default_check" name="wffc_show_subtotal" type="checkbox"
                           value="yes" <?php echo $show_subtotal == 'yes' ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show subtotal on cart.</small>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Discount?', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_discount" class="wffc_switcher_default_check" name="wffc_show_discount" type="checkbox"
                           value="yes" <?php echo $show_discount == 'yes' ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you want to show discount on cart.</small>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Shipping Amount?', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_shipping_amount" class="wffc_switcher_default_check" name="wffc_show_shipping_amount"
                           type="checkbox" value="yes" <?php echo $show_shipping_amount == 'yes' ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show shipping amount on cart.</small>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Cart Total?', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_cart_total" class="wffc_switcher_default_check" name="wffc_show_cart_total" type="checkbox"
                           value="yes" <?php echo $show_cart_total == 'yes' ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show cart total on cart.</small>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Apply Coupon?', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_coupon" class="" type="checkbox" disabled>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show apply coupon on cart.</small>
    </div>
</div>