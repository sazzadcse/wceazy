<div class="tab_body_title">
    <h1><?php _e( 'Cart Settings', 'wceazy' ); ?></h1>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Is Auto Open Cart?', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content ">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <label class="toggle_switch">
                    <input id="wffc_auto_open_cart" name="wffc_auto_open_cart" type="checkbox"
                           value="yes" <?php echo !empty($auto_open_cart) && $auto_open_cart == 'yes' ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Please turn on if you want to auto open floating cart.</small>
        </div>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Cart Item Order', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wffc_cart_item_order" id="wffc_cart_item_order"
                        class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo !empty($cart_item_order) && $cart_item_order == 'asc' ? 'selected' : ''; ?> value="asc"><?php _e( 'ASC', 'wceazy' ); ?></option>
                    <option <?php echo !empty($cart_item_order) && $cart_item_order == 'desc' ? 'selected' : ''; ?> value="desc"><?php _e( 'DESC', 'wceazy' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Basket Count', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <select name="wffc_bascket_count" id="wffc_bascket_count"
                        class="wceazy_select_control wceazy_select2">
                    <option value=""> Please select</option>
                    <option <?php echo !empty($bascket_count) && $bascket_count == 'number_of_products' ? 'selected':''; ?> value="number_of_products"><?php _e( 'Number Of Products', 'wceazy' ); ?></option>
                    <option <?php echo !empty($bascket_count) && $bascket_count == 'number_of_items' ? 'selected':''; ?> value="number_of_items"><?php _e( 'Total Number Of Items', 'wceazy' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'URL of Empty Cart Button', 'wceazy' ); ?> <span class="wceazy_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <input class="wceazy_text_control h50" type="text" id="wffc_redirect_url_empty_cart_btn"
                       placeholder="<?php _e( home_url() . '/shop/', 'wceazy' ); ?>" disabled>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Select Don\'t Show Pages', 'wceazy' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wceazy_module_list_items">
            <div class="wceazy_module_item">
                <?php $get_pages = get_pages(); ?>
                <select name="wffc_dont_show_cart_pages" id="wffc_dont_show_cart_pages"
                        class="wceazy_select_control wceazy_select2" multiple>
                    <option value=""> Please select</option>
                    <?php
                    if ( ! empty( $get_pages ) ) {
                        foreach ( $get_pages as $row ) { ?>
                            <option <?php echo ( !empty($dont_show_pages) && in_array($row->ID, $dont_show_pages) ) ? 'selected' : ''; ?> value="<?php echo $row->ID; ?>"><?php _e( $row->post_title, 'wceazy' ); ?></option>
                        <?php }
                    }
                    ?>
                </select>
            </div>
        </div>
        <small>Please select pages where you do not show floating cart.</small>
    </div>
</div>