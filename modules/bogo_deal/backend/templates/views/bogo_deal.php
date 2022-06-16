
<div class="wceazy_bogo_deal_no_rule" style="display: none;">
    <h3>No pricing rule has been created</h3>
    <button onclick="wceazy_bogo_deal_rule_adder()">Create First Rule</button>
</div>

<div class="wceazy_bogo_deal_loading" style="display: none;">
    <div class="wceazy_bogo_deal_loader"></div>
</div>

<div class="wceazy_bogo_deal_rules">

</div>

<!-- Copyable Blocks -->

<div id="wceazy_bogo_deal_block_single_rule" style="display: none;">
    <div class="wceazy_bogo_deal_single_rule">
        <div class="wceazy_bogo_deal_intro">
            <h2 contenteditable="true">Untitled Rule</h2>
            <div class="wceazy_bogo_deal_actions">
                <div class="wceazy_bogo_deal_action_minimize" onclick="wceazy_bogo_deal_rule_minimize(this)">
                    <img src="<?php echo WCEAZY_MODULES_DIR . "/" . $this->module_slug . "/assets/img/bogo_deal_minimize.svg"  ?>">
                </div>
                <div class="wceazy_bogo_deal_action_maximize" onclick="wceazy_bogo_deal_rule_maximize(this)">
                    <img src="<?php echo WCEAZY_MODULES_DIR . "/" . $this->module_slug . "/assets/img/bogo_deal_maximize.svg"  ?>">
                </div>
                <div class="wceazy_bogo_deal_action_del" onclick="wceazy_bogo_deal_rule_remover(this)">
                    <img src="<?php echo WCEAZY_MODULES_DIR . "/" . $this->module_slug . "/assets/img/bogo_deal_rule_del.svg"  ?>">
                    Delete Rule
                </div>
            </div>
        </div>
        <div class="wceazy_bogo_deal_top_form">
            <div class="wceazy_form_group">
                <label>Discount Type</label>
                <select class="">
                    <option value=""> Please select</option>
                    <option value="percent">Percentage discount</option>
                    <option value="fixed">Fixed discount</option>
                </select>
            </div>
            <div class="wceazy_form_group">
                <label>Discount Amount</label>
                <input placeholder="Discount Amount" type="number">
            </div>
        </div>
        <div class="wceazy_bogo_deal_data_picker">
            <h3>Products to Buy</h3>
            <div class="wceazy_bogo_deal_data_contents">
                <div class="wceazy_bogo_deal_data_buy_row_container"></div>
                <div class="wceazy_bogo_deal_data_add_more">
                    <img onclick="wceazy_bogo_deal_product_buy_adder(this)" src="<?php echo WCEAZY_MODULES_DIR . "/" . $this->module_slug . "/assets/img/add_icon.svg"  ?>">
                </div>
            </div>
        </div>
        <div class="wceazy_bogo_deal_data_picker">
            <h3>Products to Gift</h3>
            <div class="wceazy_bogo_deal_data_contents">
                <div class="wceazy_bogo_deal_data_get_row_container"></div>
                <div class="wceazy_bogo_deal_data_add_more">
                    <img onclick="wceazy_bogo_deal_product_get_adder(this)" src="<?php echo WCEAZY_MODULES_DIR . "/" . $this->module_slug . "/assets/img/add_icon.svg"  ?>">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="wceazy_bogo_deal_block_product_buy_row" style="display: none;">
    <div class="wceazy_bogo_deal_product_selection_row">
        <div class="wceazy_form_group">
            <label>Product</label>
            <select class="">
                <option value=""> Please select</option>
            </select>
        </div>
        <div class="wceazy_form_group">
            <label>Required Quantity</label>
            <input placeholder="Quantity Required" type="number">
        </div>
        <div class="wceazy_remove_field">
            <img onclick="wceazy_bogo_deal_product_removal(this)" src="<?php echo WCEAZY_MODULES_DIR . "/" . $this->module_slug . "/assets/img/remove_product.svg"  ?>">
        </div>
    </div>
</div>

<div id="wceazy_bogo_deal_block_product_get_row" style="display: none;">
    <div class="wceazy_bogo_deal_product_selection_row">
        <div class="wceazy_form_group">
            <label>Product</label>
            <select class="">
                <option value=""> Please select</option>
            </select>
        </div>
        <div class="wceazy_form_group">
            <label>Required Quantity</label>
            <input placeholder="Quantity Required" type="number">
        </div>
        <div class="wceazy_remove_field">
            <img onclick="wceazy_bogo_deal_product_removal(this)" src="<?php echo WCEAZY_MODULES_DIR . "/" . $this->module_slug . "/assets/img/remove_product.svg"  ?>">
        </div>
    </div>
</div>