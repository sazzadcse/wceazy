<div class="tab_body_title">
    <h1><?php _e( 'Footer Style', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Position Fixed', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_fcfpf_style" class="wffc_switcher_default_check" name="wceazy_fcfpf_style"
                           type="checkbox" value="yes" <?php $wceazy_fcfpf_style == 'yes' ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Please turn off if do not fixed footer.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php _e( 'Padding', 'wceazy' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="number" value="<?php echo $wceazy_fcfp_style; ?>"
                       name="wceazy_fcfp_style" id="wceazy_fcfp_style"
                       placeholder="15px 20px">
            </div>
        </div>
        <small>Set your footer padding in px (Ex. 15px(top-bottom) 20px(left-right) )</small>
    </div>
</div>