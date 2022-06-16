<div class="tab_body_title">
    <h1><?php _e( 'Cart Content Style', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Delete Icon', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wffc-cart-icon">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">

                <span class="wceazy-item-remove-icon checked">
                    <i class="demo-icon icon-cancel1">&#xe800;</i>
                </span>

                <span class="wceazy-item-remove-icon">
                    <i class="demo-icon icon-cancel2">&#xe801;</i> <span class="wceazy_get_pro">(Pro)</span>
	            </span>

                <span class="wceazy-item-remove-icon">
                    <i class="demo-icon icon-cancel3">&#xe802;</i> <span class="wceazy_get_pro">(Pro)</span>
                </span>

                <span class="wceazy-item-remove-icon">
                    <i class="demo-icon icon-cancel14">&#xe803;</i> <span class="wceazy_get_pro">(Pro)</span>
                </span>

                <span class="wceazy-item-remove-icon">
                    <i class="demo-icon icon-cancel5">&#xe804;</i><span class="wceazy_get_pro">(Pro)</span>
                </span>

                <input id="wffc_item_remove_icon" name="wffc_item_remove_icon"
                       type="hidden" value="icon-cancel1">
            </div>
            <small>Please select your delete icon.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Delete Icon Size(px)', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fcccdis_style; ?>"
                       name="wceazy_fcccdis_style" id="wceazy_fcccdis_style"
                       placeholder="18">
            </div>
        </div>
        <small>Set your cart content delete icon size in px (Ex. 18)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Content Font Size(px)', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fcccfs_style; ?>"
                       name="wceazy_fcccfs_style" id="wceazy_fcccfs_style"
                       placeholder="16">
            </div>
        </div>
        <small>Set your cart content font size in px (Ex. 18)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Content Font Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" name="wceazy_fccfc_style" id="wceazy_fccfc_style" value="#000" data-default-color="#000">
                <label for="wceazy_fchtc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Content Background Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text"
                       name="wceazy_fccbc_style" id="wceazy_fccbc_style" value="#F6F5FA" data-default-color="#F6F5FA">
                <label for="wceazy_fccbc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<!-- Cart Content Product Style -->
<div class="tab_body_title top-space">
    <h1><?php _e( 'Cart Content Product Style', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Product Image Width', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fcccpiw_style; ?>"
                       name="wceazy_fcccpiw_style" id="wceazy_fcccpiw_style"
                       placeholder="80">
            </div>
        </div>
        <small>Set your cart content product image width in percent(%) (Ex. 20)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Product Image Padding', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" id="wceazy_fccpip_style"
                       placeholder="20px 15px 20px 15px" disabled>
            </div>
        </div>
        <small>Set your cart content product image padding in px (Ex. 20px(top) 15px(right)
            20px(bottom) 15px(left) )
        </small>
    </div>
</div>

<div class="wceazy_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Product Title Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fciptc_style" value="#000" data-default-color="#9b51e0">
                <label for="wceazy_fciptc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Product Title Hover Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fcipthc_style" value="#000" data-default-color="#000">
                <label for="wceazy_fcipthc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Product Title Font Size', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fciptfs_style; ?>"
                       name="wceazy_fciptfs_style" id="wceazy_fciptfs_style"
                       placeholder="16">
            </div>
        </div>
        <small>Set your cart content product title font size in px (Ex. 16)</small>
    </div>
</div>

<div class="tab_body_title  top-space">
    <h1><?php _e( 'Product Quantity Input Style', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Width', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" id="wceazy_fccpqibw_style"
                       placeholder="40" disabled>
            </div>
        </div>
        <small>Set your cart content product quantity input box width in px (Ex. 40)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Border Radius', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" id="wceazy_fccpqibbr_style"
                       placeholder="3" disabled>
            </div>
        </div>
        <small>Set your cart content product quantity input box border radius in px (Ex. 3)
        </small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Border Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fccpqibbc_style" value="#ccc" data-default-color="#ccc">
                <label for="wceazy_fchtc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Background Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fccpqibbgc_style" value="#ffffff" data-default-color="#ffffff">
                <label for="wceazy_fccpqibbgc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Text Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fccpqibtc_style" value="#666" data-default-color="#666">
                <label for="wceazy_fccpqibtc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>