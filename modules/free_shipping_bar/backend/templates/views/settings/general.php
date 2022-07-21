<div class="tab_body_title">
    <h1><?php echo __( 'General Settings', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php echo __( 'Enable Shipping Bar', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_enable_fsb" class="wceazy_fsb_switcher_default_check" name="wceazy_enable_fsb"
                        type="checkbox" value="yes" <?php echo $enable_fsb; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Turn ON the switch to enable the Shipping Bar.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Display in Desktop', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_enable_fsb" class="wceazy_fsb_switcher_default_check"
                        name="wceazy_fsb_display_desktop" type="checkbox" value="yes" <?php echo $display_desktop;?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Turn ON the switch to show the Shipping Bar on the Desktop Screen.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Display in Mobile', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_enable_fsb" class="wceazy_fsb_switcher_default_check"
                        name="wceazy_fsb_display_mobile" type="checkbox" value="yes" <?php echo $display_mobile;?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Turn ON the switch to show the Shipping Bar on the Mobile Screen.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Select Shipping Zone', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wceazy_fsb_shipping_zone" id="wceazy_fsb_shipping_zone"
                    class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <?php 
                        if( !empty( $shipping_zones ) ){
                            foreach( $shipping_zones as $id => $zone ){ ?>
                                <option <?php echo $shipping_zone == $id ? 'selected' : ''; ?> value="<?php echo $id ?>"><?php echo $zone; ?></option>
                        <?php }
                        }
                    ?>
                    
                </select>
            </div>
            <small style="color:#e91717">
                You must select your shipping zone, if not created please create 
                <a style="color:#f109aa;margin-left:3px" href="<?php echo admin_url('admin.php?page=wc-settings&tab=shipping'); ?>">Here</a>.
            </small>
        </div>
    </div>
</div>

<div class="wceazy_form_group">
    <div class="label_title">
        <h4><?php echo __( 'Detect IP', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content wceazy_fsb_settings">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wceazy_enable_fsb" class="wceazy_fsb_switcher_default_check" name="wceazy_fsb_detect_ip"
                        type="checkbox" value="yes" <?php echo $detect_ip; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>The person that access your website will automatically apply to the free Shipping Zone using their IP if you 
                enable Detect IP. Please take a note that there IP address is within the 'Free Shipping Zone'.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group wceazy_fsb_settings">
    <div class="label_title">
        <h4><?php echo __( 'Exclude Pages', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <?php $get_pages = get_pages(); ?>
                <select name="wceazy_fsb_dont_show_pages" id="wceazy_fsb_dont_show_pages"
                        class="wceazy_select_control wceazy_select2" multiple>
                    <option value="" disabled> Please select</option>
                    <?php
                    if ( ! empty( $get_pages ) ) {
                        foreach ( $get_pages as $row ) { ?>
                            <option <?php echo in_array($row->ID, $unassign_pages)  ? 'selected' : ''; ?> value="<?php echo $row->ID; ?>"><?php echo __( $row->post_title, 'wceazy' ); ?></option>
                        <?php }
                    }
                    ?>
                </select>
            </div>
        </div>
        <small>Select the pages where you do't want to show the Free Shipping Bar.</small>
    </div>
</div>

<div class="wceazy_form_group wceazy_fsb_settings">
    <div class="label_title">
        <h4><?php echo __( 'Exclude Products', 'wceazy' ); ?><span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select class="wceazy_select_control wceazy_select2" multiple>
                    <option value="" disabled> Please select</option>
                    <?php
                    if ( ! empty( $getWooProducts ) ) {
                        foreach ( $getWooProducts as $key => $product) { ?>
                            <option value="" disabled> <?php echo $product["text"];?></option>;
                        <?php }
                    }
                    ?>
                </select>
            </div>
        </div>
        <small>Select the products for which you don't want to allow Free Shipping Bar.</small>
    </div>
</div>