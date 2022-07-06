<div id="wceazy_fsbar_dashboard">
    <form class="wceazy-form-free-shipping-bar" id="wceazy_form_free_shipping_bar">
        <div class="wceazy_fsbar_content_wrapper">

            <div class="wceazy_fsbar_bottom_form">
                <div class="content_wrapper">
                    <div class="wceazy_fsbar_left_content">
                        <div class="wceazy_fsbar_data_tabs">
                            <div class="tab_item tab_item_active" data-target="wceazy_fsbar_settings">
                                <h3> <?php echo __( 'General', 'wceazy' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_fsbar_cart_checkout">
                                <h3> <?php echo __( 'Cart & Checkout', 'wceazy' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_fsbar_message">
                                <h3> <?php echo __( 'Message', 'wceazy' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_fsbar_effect">
                                <h3> <?php echo __( 'Effect', 'wceazy' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_fsbar_style">
                                <h3> <?php echo __( 'Style', 'wceazy' ); ?> </h3>
                            </div>
                        </div>
                    </div>

                    <div class="wceazy_fsbar_right_content">

                        <div data-id="wceazy_fsbar_settings" class="wceazy_fsbar_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/settings/general.php"; ?>
                        </div>
                        
                        <div data-id="wceazy_fsbar_cart_checkout" class="wceazy_fsbar_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/settings/cart-checkout.php"; ?>
                        </div>

                        <div data-id="wceazy_fsbar_message" class="wceazy_fsbar_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/settings/message.php"; ?>
                        </div>
                        
                        <div data-id="wceazy_fsbar_effect" class="wceazy_fsbar_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/settings/effect.php"; ?>
                        </div>
                        
                        <div data-id="wceazy_fsbar_style" class="wceazy_fsbar_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/settings/style.php"; ?>
                        </div>

                    </div>

                </div>
                <div class="wceazy_fsb_footer">

                    <button type="submit"
                            class="wceazy_fsbar_btn wceazy-fsb-btn"> <?php echo __( 'Save Settings', 'wceazy' ); ?>
                    </button>

                </div>
            </div>
        </div>
    </form>

</div>