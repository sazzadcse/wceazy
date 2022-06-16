<div class="tab_body_title">
    <h1><?php _e( 'Header Style', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Cross Icon Size(px)', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fccis_style; ?>"
                       name="wceazy_fccis_style" id="wceazy_fccis_style"
                       placeholder="18px">
            </div>
        </div>
        <small>Set your cart header cross icon in px (Ex. 18px)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Heading Basket Icon Size(px)', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fchbis_style; ?>"
                       name="wceazy_fchbis_style" id="wceazy_fchbis_style"
                       placeholder="35">
            </div>
        </div>
        <small>Set your cart header basket icon in px (Ex. 35)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Heading Font Size(px)', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content ">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fchfs_style; ?>"
                       name="wceazy_fchfs_style" id="wceazy_fchfs_style"
                       placeholder="20">
            </div>
        </div>
        <small>Set your cart header font size in px (Ex. 20)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Heading Font Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fchfc_style" value="#3a3a3a" data-default-color="#3a3a3a">
                <label for="wceazy_fchfc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Heading Background Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fchbg_style" value="#F6F5FA" data-default-color="">
                <label for="wceazy_fchbg_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>