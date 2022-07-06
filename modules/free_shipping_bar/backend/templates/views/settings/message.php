<div class="tab_body_title">
    <h1><?php echo __( 'Message Settings', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group fsb_textarea">
    <div class="label_title">
        <h4><?php echo __('System Announce', 'wceazy'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <textarea class="wceazy_text_control wceazy-fsb-textarea h50" cols="50"
                          rows="2" type="text" name="wcfsb_system_announce" id="wcfsb_system_announce" placeholder=""><?php echo $system_announce;?></textarea>
            </div>
            <small>{minimum_order} - Minimum order amount Free Shipping</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group fsb_textarea">
    <div class="label_title">
        <h4><?php echo __('Purchased Message', 'wceazy'); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <textarea class="wceazy_text_control wceazy-fsb-textarea h50" cols="50" rows="3" type="text" disabled><?php echo $purchased_message; ?></textarea>
            </div>
            <small> Use Short Codes Like {cart_total} - The total amount of your purchases
                    {minimum_order} - Minimum order amount Free Shipping
                    {missing_amount} - The outstanding amount of the free shipping program</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group fsb_textarea">
    <div class="label_title">
        <h4><?php echo __('Success Message', 'wceazy'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <textarea class="wceazy_text_control wceazy-fsb-textarea h50" cols="50"
                          rows="2" type="text" name="wcfsb_success_message" id="wcfsb_success_message" placeholder=""><?php echo $success_message; ?></textarea>
            </div>
            <small>Write a success message and use the shortcode {checkout_page} to redirect the checkout page. </small>
        </div>
    </div>
</div>