<div id="wceazy_floating_cart_dashboard">
    <form class="wceazy-form-floating-cart" id="wceazy_form_floating_cart">
        <div class="wceazy_floating_cart_content_wrapper">

            <div class="wceazy_floating_cart_bottom_form">
                <div class="content_wrapper">
                    <div class="wceazy_floating_cart_left_content">
                        <div class="wceazy_floating_cart_data_tabs">
                            <div class="tab_item tab_item_active" data-target="wceazy_floating_cart_settings">
                                <h3> <?php _e( 'General', 'wceazy' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_floating_cart_header">
                                <h3> <?php _e( 'Cart Header', 'wceazy' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_floating_cart_body">
                                <h3> <?php _e( 'Cart Body', 'wceazy' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_floating_cart_footer">
                                <h3> <?php _e( 'Cart Footer', 'wceazy' ); ?> </h3>
                            </div>
<!--                            <div class="tab_item" data-target="wceazy_floating_cart_suggested_product">-->
<!--                                <h3> --><?php //_e( 'Suggested Products', 'wceazy' ); ?><!-- </h3>-->
<!--                            </div>-->
                            <div class="tab_item" data-target="wceazy_floating_cart_typography">
                                <h3> <?php _e( 'Typography', 'wceazy' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_floating_cart_redirect_url">
                                <h3><?php _e( 'Redirect URLS', 'wceazy' ); ?></h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_floating_cart_style">
                                <h3><?php _e( 'General Style', 'wceazy' ); ?></h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_floating_cart_header_style">
                                <h3><?php _e( 'Header Style', 'wceazy' ); ?></h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_floating_cart_content_style">
                                <h3><?php _e( 'Content Style', 'wceazy' ); ?></h3>
                            </div>
<!--                            <div class="tab_item" data-target="wceazy_floating_cart_suggested_product_style">-->
<!--                                <h3>--><?php //_e( 'Suggested Product Style', 'wceazy' ); ?><!--</h3>-->
<!--                            </div>-->
                            <div class="tab_item" data-target="wceazy_floating_cart_footer_style">
                                <h3><?php _e( 'Footer Style', 'wceazy' ); ?></h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_floating_cart_basket_style">
                                <h3><?php _e( 'Basket Style', 'wceazy' ); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="wceazy_floating_cart_right_content">

                        <div data-id="wceazy_floating_cart_settings" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/general-settings.php"; ?>
                        </div><!--/.wceazy_floating_cart_tab_body -->

                        <div data-id="wceazy_floating_cart_header" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/header-settings.php"; ?>
                        </div><!--/.wceazy_floating_cart_header -->

                        <div data-id="wceazy_floating_cart_body" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/body-settings.php"; ?>
                        </div><!--/.wceazy_floating_cart_body-->

                        <div data-id="wceazy_floating_cart_footer" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/footer-settings.php"; ?>
                        </div><!--/.wceazy_floating_cart_footer-->

                        <div data-id="wceazy_floating_cart_typography" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/typography-settings.php"; ?>
                        </div><!--/.wceazy_floating_cart_typography -->

                        <div data-id="wceazy_floating_cart_redirect_url" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/redirect-url-settings.php"; ?>
                        </div><!--/.wceazy_floating_cart_redirect_url-->

                        <div data-id="wceazy_floating_cart_style" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/general-style.php"; ?>
                        </div><!--/.wceazy_floating_cart_style-->

                        <div data-id="wceazy_floating_cart_header_style" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/header-style.php"; ?>
                        </div><!--/.wceazy_floating_cart_header_style-->

                        <div data-id="wceazy_floating_cart_content_style" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/content-style.php"; ?>
                        </div><!--/.wceazy_floating_cart_content_style-->

                        <div data-id="wceazy_floating_cart_footer_style" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/footer-style.php"; ?>
                        </div><!--/.wceazy_floating_cart_footer_style-->

                        <div data-id="wceazy_floating_cart_basket_style" class="wceazy_floating_cart_tab_body">
                            <?php require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/basket-style.php"; ?>
                        </div><!--/.wceazy_floation_cart_basket_style-->

                    </div>

                </div>
                <div class="wceazy_floating_cart_btn">

                    <button type="submit"
                            class="wceazy_floating_cart_btn wceazy-fcss-btn"> <?php _e( 'Save Settings', 'wceazy' ); ?>
                    </button>

                </div>
            </div>
        </div>
    </form>

</div>