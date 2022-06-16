<div class="tab_body_title">
    <h1><?php _e( 'General Style', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Cart Width(px)', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fc_width; ?>"
                       name="wceazy_fc_width" id="wceazy_fc_width"
                       placeholder="<?php _e( '350', 'wceazy' ); ?>">
            </div>
        </div>
        <small>Set your cart width in px (Ex. 350)</small>
    </div>
</div>

<div class="wceazy_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Cart Open From', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fc_open_from" id="wceazy_fc_open_from"
                        class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option disabled><?php _e( 'Left <span class="wceazy_get_pro">(Pro)</span>', 'wceazy' ); ?></option>
                    <option selected value="right"><?php _e( 'Right', 'wceazy' ); ?></option>
                    <option disabled><?php _e( 'Top <span class="wceazy_get_pro">(Pro)</span>', 'wceazy' ); ?></option>
                    <option disabled><?php _e( 'Bottom <span class="wceazy_get_pro">(Pro)</span>', 'wceazy' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Font Size', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fcbfs_style; ?>"
                       name="wceazy_fcbfs_style" id="wceazy_fcbfs_style"
                       placeholder="16">
            </div>
        </div>
        <small>Set your all button font size in px (Ex. 16)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Font Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fctbfc_style" value="#FFF" data-default-color="#FFF">
                <label for="wceazy_fctbfc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your all button font color</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Background', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fcbbg_style" value="#000" data-default-color="#000">
                <label for="wceazy_fcbbg_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your all button background</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Hover Font Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fcbhfc_style" value="#FFF" data-default-color="#FFF">
                <label for="wceazy_fcbhfc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your all button hover font color</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Hover Background', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fcbhbg_style" value="#000" data-default-color="#000">
                <label for="wceazy_fcbhbg_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your all button hover background</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Border Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fc_button_bc" value="#000" data-default-color="#000">
                <label for="wceazy_fc_button_bc"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your all button border color</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Border Hover Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fcbhc_style" value="#000" data-default-color="#000">
                <label for="wceazy_fcbhc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your all button border Hover color</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Border Radius', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" id="wceazy_fcbbr_style" placeholder="5" disabled>
            </div>
        </div>
        <small>Set your all button border radius in px (Ex. 5)</small>
    </div>
</div>