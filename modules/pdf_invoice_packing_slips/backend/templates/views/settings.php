<?php
/**
 *settings.php
 */
?>

<div id="wceazy_pdf_invoice_dashboard">

    <form class="wceazy-form-pdf-invoice" id="wceazy_form_pdf_invoice">

        <div class="wceazy_pdf_invoice_content_wrapper">

            <div class="wceazy_pdf_invoice_bottom_form">
                <div class="content_wrapper">
                    <div class="wceazy_pdf_invoice_left_content">
                        <div class="wceazy_pdf_invoice_data_tabs">
                            <div class="tab_item tab_item_active" data-target="wceazy_pdf_invoice_document">
                                <h3> <?php _e ('PDF Document', 'wceazy'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_pdf_invoice_general">
                                <h3> <?php _e ('General', 'wceazy'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_pdf_invoice_settings">
                                <h3> <?php _e ('Invoice', 'wceazy'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_pdf_invoice_customize">
                                <h3> <?php _e ('Customize Invoice', 'wceazy'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wceazy_pdf_shipping_label_customize">
                                <h3> <?php _e ('Customize Shipping Label', 'wceazy'); ?> </h3>
                            </div>
                        </div>
                    </div>

                    <div class="wceazy_pdf_invoice_right_content">

                        <div data-id="wceazy_pdf_invoice_document" class="wceazy_pdf_invoice_tab_body">
                            <?php
                                require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/document.php";
                            ?>
                        </div><!--/.wceazy_pdf_invoice_tab_body -->

                        <div data-id="wceazy_pdf_invoice_general" class="wceazy_pdf_invoice_tab_body">
                            <?php
                                require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/general.php";
                            ?>
                        </div><!--/.wceazy_pdf_invoice_general -->

                        <div data-id="wceazy_pdf_invoice_settings" class="wceazy_pdf_invoice_tab_body">
                            <?php
                                require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/invoice.php";
                            ?>
                        </div><!--/.wceazy_pdf_invoice -->

                        <div data-id="wceazy_pdf_invoice_customize" class="wceazy_pdf_invoice_tab_body">
                            <?php
                                require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/customize-invoice.php";
                            ?>
                        </div><!--/.wceazy_pdf_invoice_customize-->

                        <div data-id="wceazy_pdf_shipping_label_customize" class="wceazy_pdf_invoice_tab_body">
                            <?php
                                require WCEAZY_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/customize-shipping-label.php";
                            ?>
                        </div><!--/.wceazy_pdf_shipping_label_customize-->

                    </div>

                </div>

                <div class="wceazy_pdf_invoice_footer">

                    <button type="submit"
                            class="wceazy_pdf_invoice_btn wceazy-pi-btn"> <?php _e ('Save Settings', 'wceazy'); ?>
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>