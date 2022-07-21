<?php

if ($this->base_admin->base_admin->db->getModuleStatus($this->base_admin->module_slug)) {

    check_ajax_referer('wceazyfsb_hashkey', 'security');

    $res_data = array();

    //calculate progress persent..
    $progress_persent = 0;
    $targetAmount   = $this->base_admin->utils->wceazy_calculate_min_shipping_amount();
    $achieveAmount  = isset( WC()->cart ) ? WC()->cart->get_displayed_subtotal() : 0;

    if ( ! empty( WC()->cart ) && WC()->cart->display_prices_including_tax() ) {
        $achieveAmount = $achieveAmount - WC()->cart->get_discount_tax();
    }
    if ( 'no' === $this->base_admin->utils->wceazy_fsb_ignore_discounts() ) {
        $achieveAmount = $achieveAmount - WC()->cart->get_discount_total();
    }

    $achieveAmount = round( $achieveAmount, wc_get_price_decimals() );

    if( $achieveAmount >= $targetAmount && $targetAmount ){
        $progress_persent = 100;
    }else{
        if( $targetAmount == 0 ){
            $progress_persent = 0;
        }else{
            $progress_persent = round( ( $achieveAmount * 100 ) / $targetAmount, 2 );
        }
    }

    ob_start();

    ?>

<div id="wceazy_free_shipping_bar" class="wceazy-free-shipping-bar fsb-style1">
    <div class="fsb-inner">
        <?php echo $this->base_admin->utils->wceazy_create_message($targetAmount, $achieveAmount); ?>

        <div class="fsb-close_button">
            <span onclick="wceazy_handle_close_fsb();" class="fsb-close-icon" data-close_icon="icon-cancel1">
                <i class="demo-icon wceazy-fsb-close-icon icon-cancel1"></i>
            </span>
        </div>
    </div>

    <?php 
        if($enable_progress_bar == 'yes'){ ?>
            <div id="wceazy_fsb_progress_bar" class="fsb-live-preview-progress-bar fsb-bar">
                <div id="wceazy_progress_bar_line" class="fsb-size" style="width:0%"></div>
            </div>
        <?php }
    ?>

</div>

<?php

    $content = ob_get_clean();

    $result = array( "status" => 'true', 'res_data' => $content, 'progress_persent' => $progress_persent );

} else {
    $result = array( "status" => 'false', 'res_data' => array(), 'progress_persent' => 0 );
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);