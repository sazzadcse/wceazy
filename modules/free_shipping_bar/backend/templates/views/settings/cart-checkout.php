<div class="tab_body_title">
    <h1><?php echo __( 'Cart & Checkout Page Settings', 'wceazy' ); ?></h1>
</div>

<div class="tab_body_sub_title">
    <h4><?php echo __ ('Cart Page', 'wceazy'); ?></h4>
    <small>Cart page settings</small>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php echo __( 'Show in Cart Subtotal Area', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_fsb_show_in_cart" class="wceazy_fsb_switcher_default_check" name="wceazy_fsb_show_in_cart"
                        type="checkbox" value="yes" <?php echo $show_in_cart; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Turn ON the switch to show the free shipping notification in cart page subtotal area.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Select Position on Cart Page', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fsb_position_cart_subtotal" id="wceazy_fsb_position_cart_subtotal"
                    class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($position_cart_subtotal == 'woocommerce_cart_totals_before_shipping') ? 'selected' : ''; ?> value="woocommerce_cart_totals_before_shipping">Before shipping block</option>
                    <option <?php echo ($position_cart_subtotal == 'woocommerce_cart_totals_after_shipping') ? 'selected' : ''; ?> value="woocommerce_cart_totals_after_shipping">After shipping block</option>
                </select>
            </div>
            <small>Select position of the free shipping notification in cart page.</small>
        </div>
    </div>
</div>


<div class="tab_body_sub_title mt-50">
    <h4><?php echo __ ('Checkout Page', 'wceazy'); ?></h4>
    <small>Checkout page settings</small>
</div>
<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php echo __( 'Show in Checkout Subtotal Area', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_fsb_show_in_checkout" class="wceazy_fsb_switcher_default_check" name="wceazy_fsb_show_in_checkout"
                        type="checkbox" value="yes" <?php echo $show_in_checkout; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Turn ON the switch to show the free shipping notification in checkout subtotal area.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Select Position on Checkout Page', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fsb_position_checkout_subtotal" id="wceazy_fsb_position_checkout_subtotal"
                    class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($position_checkout_subtotal == 'woocommerce_review_order_before_shipping' ) ? 'selected' : ''; ?> value="woocommerce_review_order_before_shipping">Before shipping block</option>
                    <option <?php echo ($position_checkout_subtotal == 'woocommerce_review_order_after_shipping' ) ? 'selected' : ''; ?> value="woocommerce_review_order_after_shipping">After shipping block</option>
                </select>
            </div>
            <small>Select position where the free shipping notification will be displayed on checkout page.</small>
        </div>
    </div>
</div>

<div class="tab_body_sub_title mt-50">
    <h4><?php echo __ ('Style', 'wceazy'); ?></h4>
    <small>Progress bar style settings</small>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Inside Progress Bar Text', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="text"
                       name="wceazy_fsb_inside_text" id="wceazy_fsb_inside_text" value="<?php echo $fsb_inside_text; ?>"
                       placeholder="Free Shipping">
            </div>
            <small>Enter cart & checkout page free shipping progress bar text.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Progress Bar\'s Background', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" value="" data-default-color="<?php echo $fsb_ccpbg; ?>">
                <label for="wceazy_fsb_ccpbg"><?php echo __('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set the color of Free Shipping Bar's which is show in cart & checkout page.</small>
    </div>
</div>