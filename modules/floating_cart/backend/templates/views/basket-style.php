<div class="tab_body_title">
    <h1><?php _e( 'Basket Style', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Enable', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fcbs_enable" id="wceazy_fcbs_enable"
                        class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($wceazy_fcbs_enable == 'show_always') ? 'selected' : ''; ?> value="show_always"><?php _e( 'Always Show', 'wceazy' ); ?></option>
                    <option <?php echo ($wceazy_fcbs_enable == 'hide_always') ? 'selected' : ''; ?> value="hide_always"><?php _e( 'Always Hide', 'wceazy' ); ?></option>
                    <option <?php echo ($wceazy_fcbs_enable == 'hide_empty_cart') ? 'selected' : ''; ?> value="hide_empty_cart"><?php _e( 'Hide when cart is empty', 'wceazy' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Shape', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fcbs_shape" id="wceazy_fcbs_shape"
                        class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($wceazy_fcbs_shape == '100') ? 'selected' : ''; ?> value="100"><?php _e( 'Round', 'wceazy' ); ?></option>
                    <option <?php echo ($wceazy_fcbs_shape == '20') ? 'selected' : ''; ?> value="20"><?php _e( 'Square', 'wceazy' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Icon Size', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fcbs_icon_size; ?>"
                       name="wceazy_fcbs_icon_size" id="wceazy_fcbs_icon_size"
                       placeholder="<?php _e( '35', 'wceazy' ); ?>">
            </div>
        </div>
        <small>Set your basket icon size in px (Ex. 35)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Show Count?', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_fc_sc_style" class="wffc_switcher_default_check" name="wceazy_fc_sc_style"
                           type="checkbox" value="yes" <?php echo ($wceazy_fc_sc_style == 'yes') ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Please turn off if do not show basket count.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Icon', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wffc-cart-icon">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">

                <span class="wceazy-cart-icon checked">
                    <i class="demo-icon icon-basket1">&#xe805;</i>
                </span>
                <span class="wceazy-cart-icon">
                    <i class="demo-icon icon-basket2">&#xe806;</i><span class="wceazy_get_pro">(Pro)</span>
                </span>
                <span class="wceazy-cart-icon">
                    <i class="demo-icon icon-basket3">&#xe807;</i><span class="wceazy_get_pro">(Pro)</span>
                </span>
                <span class="wceazy-cart-icon">
                    <i class="demo-icon icon-basket6">&#xe80a;</i><span class="wceazy_get_pro">(Pro)</span>
                </span>

                <input id="wceazy_fc_bset_icon" name="wceazy_fc_bset_icon"
                       type="hidden" value="icon-basket1">
            </div>
            <small>Please select your basket icon.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Basket Position', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fcbp_style" id="wceazy_fcbp_style"
                        class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($wceazy_fcbp_style == 'top_left') ? 'selected' : ''; ?> value="top_left"><?php _e( 'Top Left', 'wceazy' ); ?></option>
                    <option <?php echo ($wceazy_fcbp_style == 'top_right') ? 'selected' : ''; ?> value="top_right"><?php _e( 'Top Right', 'wceazy' ); ?></option>
                    <option <?php echo ($wceazy_fcbp_style == 'bottom_left') ? 'selected' : ''; ?> value="bottom_left"><?php _e( 'Bottom Left', 'wceazy' ); ?></option>
                    <option <?php echo ($wceazy_fcbp_style == 'bottom_right') ? 'selected' : ''; ?> value="bottom_right"><?php _e( 'Bottom Right', 'wceazy' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Offset(vertical)', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fcbov_style; ?>"
                       name="wceazy_fcbov_style" id="wceazy_fcbov_style"
                       placeholder="<?php _e( '110', 'wceazy' ); ?>">
            </div>
        </div>
        <small>Set your basket vertical offset in px (Ex. 110)</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Offset(horizontal)', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fcboh_style; ?>"
                       name="wceazy_fcboh_style" id="wceazy_fcboh_style"
                       placeholder="<?php _e( '60', 'wceazy' ); ?>">
            </div>
        </div>
        <small>Set your basket horizontal offset in px (Ex. 60)</small>
    </div>
</div>

<div class="wceazy_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Basket Count Position', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fcbcp_style" id="wceazy_fcbcp_style"
                        class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($wceazy_fcbcp_style == 'top_left') ? 'selected' : ''; ?> value="top_left"><?php _e( 'Top Left', 'wceazy' ); ?></option>
                    <option <?php echo ($wceazy_fcbcp_style == 'top_right') ? 'selected' : ''; ?> value="top_right"><?php _e( 'Top Right', 'wceazy' ); ?></option>
                    <option <?php echo ($wceazy_fcbcp_style == 'bottom_left') ? 'selected' : ''; ?> value="bottom_left"><?php _e( 'Botton Left', 'wceazy' ); ?></option>
                    <option <?php echo ($wceazy_fcbcp_style == 'bottom_right') ? 'selected' : ''; ?> value="bottom_right"><?php _e( 'Bottom Right', 'wceazy' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Icon Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fcbc_style" value="#fff" data-default-color="#fff">
                <label for="wceazy_fchtc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Background Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fcbbc_style" value="#000" data-default-color="#000">
                <label for="wceazy_fchtc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Count Color', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span> </h4>
    </div>

    <div class="label_content  color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text"
                       name="wceazy_fcbcc_style" id="wceazy_fcbcc_style" value="#fff" data-default-color="#fff">
                <label for="wceazy_fcbcc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Count Background Color', 'wceazy' );?> <span class="wceazy_get_pro">(Pro)</span> </h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fcbcbc_style" value="#d00" data-default-color="#d00">
                <label for="wceazy_fchtc_style"><?php _e ('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
    </div>
</div>