<div class="tab_body_title">
    <h1><?php echo __( 'Style Settings', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Shipping Bar Position', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fsb_position" id="wceazy_fsb_position"
                    class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($fsb_position == 'wp_head') ? 'selected' : ''; ?> value="wp_head">Top</option>
                    <option <?php echo ($fsb_position == 'wp_footer') ? 'selected' : ''; ?> value="wp_footer">Bottom
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Progress Bar Layout', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select id="wceazy_fsb_progress_layout"
                    class="wceazy_select_control wceazy_select2">
                    <option disabled value=""> Please select</option>
                    <option disabled selected value="">Layout - 1</option>
                    <option disabled value="">Layout - 2</option>
                    <option disabled value="">Layout - 3</option>
                </select>
            </div>
        </div>
        <small>Choose your free shipping progress bar layout.</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Background Color', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fsb_bg" data-default-color="#0A9663">
                <label for="wceazy_fsb_bg"><?php echo __('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your free shipping bar background color.</small>
    </div>
</div>

<div class="wceazy_form_group" id="wceazy_fsb_inner_bg_control" style="display:<?php echo $visable_inner_bg_style;?>">
    <div class="label_title">
        <h4><?php echo __( 'Inner Bar Background Color', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" name="wceazy_fsb_inner_bg"
                    id="wceazy_fsb_inner_bg" data-default-color="#19212E">
                <label for="wceazy_fsb_inner_bg"><?php echo __('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your free shipping bar inner background color.</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Text Color', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fsb_text_color" data-default-color="#fff">
                <label for="wceazy_fsb_text_color"><?php echo __('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your free shipping bar text color.</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Link Color', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" name="wceazy_fsb_link_color"
                    id="wceazy_fsb_link_color" value="<?php echo $fsb_link_color; ?>"
                    data-default-color="<?php echo $fsb_link_color; ?>">
                <label for="wceazy_fsb_link_color"><?php echo __('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your free shipping bar link color.</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Font Size', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" name="wceazy_fsb_font_size"
                    id="wceazy_fsb_font_size" value="<?php echo $fsb_font_size; ?>" placeholder="0">
            </div>
            <small>Set your free shipping bar font size.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Text Align', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fsb_text_align" id="wceazy_fsb_text_align"
                    class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($fsb_text_align == 'left') ? 'selected' : '';?> value="left">Left</option>
                    <option <?php echo ($fsb_text_align == 'center') ? 'selected' : '';?> value="center">Center</option>
                    <option <?php echo ($fsb_text_align == 'right') ? 'selected' : ''; ?> value="right">Right</option>
                </select>
            </div>
        </div>
        <small>Set your free shipping bar text align.</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Shipping Bar Close Icon', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content cart-icon">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">

                <span class="wceazy-fsb-close-icon checked"
                    data-close_icon="icon-cancel1">
                    <i class="demo-icon icon-cancel1">&#xe800;</i>
                </span>

                <span class="wceazy-fsb-close-icon">
                    <i class="demo-icon icon-cancel2">&#xe801;</i><span class="wceazy_get_pro">(Pro)</span>
                </span>

                <span class="wceazy-fsb-close-icon">
                    <i class="demo-icon icon-cancel3">&#xe802;</i><span class="wceazy_get_pro">(Pro)</span>
                </span>

                <span
                    class="wceazy-fsb-close-icon">
                    <i class="demo-icon icon-cancel14">&#xe803;</i><span class="wceazy_get_pro">(Pro)</span>
                </span>

                <span
                    class="wceazy-fsb-close-icon">
                    <i class="demo-icon icon-cancel5">&#xe804;</i><span class="wceazy_get_pro">(Pro)</span>
                </span>

                <input id="wceazy_fsb_close_icon" name="wceazy_fsb_close_icon" type="hidden"
                    value="icon-cancel1">
            </div>
            <small>Set your free shipping bar close icon.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Close Icon Color', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fsb_close_icon_color"
                    data-default-color="#fff">
                <label for="wceazy_fsb_close_icon_color"><?php echo __('Select Color', 'wceazy'); ?></label>
            </div>
        </div>
        <small>Set your free shipping bar close icon color.</small>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Close Icon Size', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" name="wceazy_fsb_close_icon_size"
                    id="wceazy_fsb_close_icon_size" value="<?php echo $fsb_close_icon_size; ?>" placeholder="0">
            </div>
            <small>Set your free shipping bar close icon size.</small>
        </div>
    </div>
</div>




<div class="tab_body_sub_title mt-50">
    <h4><?php echo __ ('Progress Bar Style', 'wceazy'); ?></h4>
    <small>Process bar style settings</small>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php echo __( 'Enable Progress Bar', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_fsb_enable_progress_bar" class="wceazy_fsb_switcher_default_check"
                        name="wceazy_fsb_enable_progress_bar" type="checkbox" value="yes"
                        <?php echo $enable_progress_bar; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Show progress bar with free shipping bar.</small>
        </div>
    </div>
</div>

<div id="wceazy_fsb_progress_bar_style_wrapper" style="display:none;">

    <div class="wceazy_form_group">
        <div class="label_title">
            <h4><?php echo __( 'Progress Bar Background', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
        </div>

        <div class="label_content color-piker">
            <div class="wceazy_module_list_items">
                <div class="wceazy_module_item">
                    <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fsb_progress_bar_bg"
                        data-default-color="#fff">
                    <label for="wceazy_fsb_progress_bar_bg"><?php echo __('Select Color', 'wceazy'); ?></label>
                </div>
            </div>
            <small>Set your progress bar background color.</small>
        </div>
    </div>

    <div class="wceazy_form_group">
        <div class="label_title">
            <h4><?php echo __( 'Current Progress Background', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
        </div>

        <div class="label_content color-piker">
            <div class="wceazy_module_list_items">
                <div class="wceazy_module_item">
                    <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fsb_current_progress_bg"
                        data-default-color="#19212E">
                    <label for="wceazy_fsb_progress_bar_bg"><?php echo __('Select Color', 'wceazy'); ?></label>
                </div>
            </div>
            <small>Set your free shipping bar current progress background color.</small>
        </div>
    </div>

    <div class="wceazy_form_group">
        <div class="label_title">
            <h4><?php echo __( 'Progress Text Color', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
        </div>

        <div class="label_content color-piker">
            <div class="wceazy_module_list_items">
                <div class="wceazy_module_item">
                    <input class="wceazy-color-filed wceazy_text_control h50" type="text" id="wceazy_fsb_progress_text_color"
                        data-default-color="#fff">
                    <label for="wceazy_fsb_progress_text_color"><?php echo __('Select Color', 'wceazy'); ?></label>
                </div>
            </div>
            <small>Set your free shipping bar progress text color.</small>
        </div>
    </div>

    <div class="wceazy_form_group">
        <div class="label_title">
            <h4><?php echo __( 'Progress Bar Font Size', 'wceazy' ); ?></h4>
        </div>

        <div class="label_content">
            <div class="wceazy_module_list_items">
                <div class="wceazy_module_item">
                    <input class="wceazy_text_control h50" type="number" name="wceazy_fsb_progress_font_size"
                        id="wceazy_fsb_progress_font_size" value="<?php echo $fsb_progress_font_size; ?>"
                        placeholder="0">
                </div>
                <small>Set your free shipping bar progress font size.</small>
            </div>
        </div>
    </div>

</div>