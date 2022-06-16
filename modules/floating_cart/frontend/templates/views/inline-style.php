<?php
/**
 * wofusion floacting cart master inline style
 * inline-style.php
 */

// get settings data
$wffc_style_settings = get_option ('wceazy_floating_cart_settings', false);

//general style
$wceazy_fc_width = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fc_width']) ? $wffc_style_settings['wceazy_fc_width'] : '460';
$wceazy_fc_open_from = 'right';
$wceazy_fctbfc_style = '#ffffff';
$wceazy_fcbfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcbfs_style']) ? $wffc_style_settings['wceazy_fcbfs_style'] : '16';
$wceazy_fcbbg_style = '#000000';
$wceazy_fcbhfc_style = '#ffffff';
$wceazy_fcbhbg_style = '#000';
$wceazy_fc_button_bc = '#000';
$wceazy_fcbhc_style = '#000';
$wceazy_fcbbr_style = '5';

// header style settings
$wceazy_fchta_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fchta_style']) ? $wffc_style_settings['wceazy_fchta_style'] : '';
$wceazy_fchbis_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fchbis_style']) ? $wffc_style_settings['wceazy_fchbis_style'] : '35';
$wceazy_fchcia_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fchcia_style']) ? $wffc_style_settings['wceazy_fchcia_style'] : '';
$wceazy_fcci_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcci_style']) ? $wffc_style_settings['wceazy_fcci_style'] : '';
$wceazy_fccis_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fccis_style']) ? $wffc_style_settings['wceazy_fccis_style'] : '25';
$wceazy_fchfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fchfs_style']) ? $wffc_style_settings['wceazy_fchfs_style'] : '21';
$wceazy_fchfc_style = '#3a3a3a';
$wceazy_fchbg_style = '#F6F5FA';

//cart content style
$wceazy_fcccdis_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcccdis_style']) ? $wffc_style_settings['wceazy_fcccdis_style'] : '20';
$wceazy_fccdi_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fccdi_style']) ? $wffc_style_settings['wceazy_fccdi_style'] : '';
$wceazy_fcccfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcccfs_style']) ? $wffc_style_settings['wceazy_fcccfs_style'] : '16';
$wceazy_fccfc_style = '#000';
$wceazy_fccbc_style = '#F6F5FA';

//Cart Content Product Style
$wceazy_fcccpiw_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcccpiw_style']) ? $wffc_style_settings['wceazy_fcccpiw_style'] : '20';
$wceazy_fccpip_style = '0';
$wceazy_fcipthc_style = '#000';
$wceazy_fciptfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fciptfs_style']) ? $wffc_style_settings['wceazy_fciptfs_style'] : '16';
$wceazy_fciptc_style = '#000';
$wceazy_fccpid_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fccpid_style']) ? $wffc_style_settings['wceazy_fccpid_style'] : '';

$wceazy_fccpqibw_style = '40';
$wceazy_fccpqibbr_style = '3';
$wceazy_fccpqibbc_style = '#ccc';
$wceazy_fccpqibbgc_style = '#ffffff';
$wceazy_fccpqibtc_style = '#666';

// suggested product
$wceazy_fcspiw_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcspiw_style']) ? $wffc_style_settings['wceazy_fcspiw_style'] : '80';
$wceazy_fcspfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcspfs_style']) ? $wffc_style_settings['wceazy_fcspfs_style'] : '16';
$wceazy_fcspbg_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcspbg_style']) ? $wffc_style_settings['wceazy_fcspbg_style'] : '#fff';
$wceazy_fccpid_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fccpid_style']) ? $wffc_style_settings['wceazy_fccpid_style'] : 'after_totals';

// footer style
$wceazy_fcfpf_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcfpf_style']) ? 'yes' : 'no';
$wceazy_fcfp_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcfp_style']) ? $wffc_style_settings['wceazy_fcfp_style'] : '0';

// basket style
$wceazy_fcbs_enable = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcbs_enable']) ? $wffc_style_settings['wceazy_fcbs_enable'] : 'show_always';
$wceazy_fcbs_shape = !empty($wffc_style_settings) && !empty($wffc_style_settings['wceazy_fcbs_shape']) ? $wffc_style_settings['wceazy_fcbs_shape'] : '100';
$wceazy_fcbs_icon_size = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcbs_icon_size']) ? $wffc_style_settings['wceazy_fcbs_icon_size'] : '35';
$wceazy_fc_sc_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fc_sc_style']) ? 'yes' : 'no';
$wceazy_fc_bset_icon = 'icon-basket1';
$wceazy_fcbp_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcbp_style']) ? $wffc_style_settings['wceazy_fcbp_style'] : 'bottom_right';
$wceazy_fcbov_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcbov_style']) ? $wffc_style_settings['wceazy_fcbov_style'] : '110';
$wceazy_fcboh_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcboh_style']) ? $wffc_style_settings['wceazy_fcboh_style'] : '60';
$wceazy_fcbcp_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wceazy_fcbcp_style']) ? $wffc_style_settings['wceazy_fcbcp_style'] : 'top_left';
$wceazy_fcbc_style = '#fff';
$wceazy_fcbbc_style = '#000';
$wceazy_fcbcc_style = '#fff';
$wceazy_fcbcbc_style = '#d00';

?>


<style>
    #wceazy-fct-body .wceazy-fct-content-wrap {
        max-width: <?php echo $wceazy_fc_width . 'px'; ?>;
    }

    <?php
        if( $wceazy_fc_open_from == 'top' ){ ?>

    #wceazy-fct-body.fct-show .wceazy-fct-content-wrap {

    }

    <?php }elseif ( $wceazy_fc_open_from == 'bottom' ){ ?>

    #wceazy-fct-body.fct-show .wceazy-fct-content-wrap {

    }

    <?php }elseif ( $wceazy_fc_open_from == 'left' ){ ?>
    .wceazy-fct-main #wceazy-fct-body.fct-show .wceazy-fct-content-wrap {
        left: 0px;
    }

    .wceazy-fct-main .wceazy-fct-content-wrap {
        left: -470px;
    }

    <?php }else{ ?>
    .wceazy-fct-main #wceazy-fct-body.fct-show .wceazy-fct-content-wrap {
        right: 0px;
    }

    .wceazy-fct-main .wceazy-fct-content-wrap {
        right: -470px;
    }

    <?php } ?>

    /*#wceazy-fct-body.fct-show .wceazy-fct-content-wrap {*/
    /*    transform: translate(0);*/
    /*}*/

    #wceazy-fct-body .fct-footer .fct-checkout a,
    #wceazy-fct-body .fct-footer .fct-continue-shopping a,
    #wceazy-fct-body .fct-footer .fct-view-card a {
        font-size: <?php echo $wceazy_fcbfs_style . 'px'; ?>;
        border-radius: <?php echo $wceazy_fcbbr_style . 'px'; ?>;
    }

    #wceazy-fct-body .wceazy-fct-content .wfct-button button,
    #wceazy-fct-body .wceazy-fct-content .wfct-button a {
        font-size: <?php echo $wceazy_fcbfs_style . 'px'; ?>;
        background: <?php echo $wceazy_fcbbg_style; ?>;
        color: <?php echo $wceazy_fctbfc_style; ?>;
    }

    #wceazy-fct-body .wceazy-fct-content .wfct-button button:hover,
    #wceazy-fct-body .wceazy-fct-content .wfct-button a:hover {
        color: <?php echo $wceazy_fcbhfc_style ?>;
        background: <?php echo $wceazy_fcbhbg_style; ?>;
        border-color: <?php echo $wceazy_fcbhc_style; ?>;
    }

    #wceazy-fct-body .fct-footer .fct-checkout a,
    #wceazy-fct-body .fct-footer .fct-continue-shopping a,
    #wceazy-fct-body .fct-footer .fct-view-card a {
        border-color: <?php echo $wceazy_fc_button_bc; ?>;
    }

    #wceazy-fct-body .fct-cart-empty .fct-continue-shopping a {
        border-radius: <?php echo $wceazy_fcbbr_style . 'px'; ?>;
    }

    #wceazy-fct-body section.fct-coupon button {
        border-radius: 0px <?php echo $wceazy_fcbbr_style . 'px '; ?> <?php echo $wceazy_fcbbr_style . 'px'; ?> 0px;
    }

    #wceazy-fct-body .fct-right-header svg {
        width: <?php echo $wceazy_fccis_style;?>;
        height: <?php echo $wceazy_fccis_style;?>
    }

    #wceazy-fct-body .fct-header h4 {
        font-size: <?php echo $wceazy_fchfs_style . 'px';?>;
        color: <?php echo $wceazy_fchfc_style;?>;
    }

    #wceazy-fct-body .wceazy-cart-icon i.demo-icon {
        font-size: <?php echo $wceazy_fchbis_style . 'px';?>;
        color: <?php echo $wceazy_fchfc_style;?>;
    }

    #wceazy-fct-body .fct-header {
        background: <?php echo $wceazy_fchbg_style;?>;
    }

    .fct-product-list .fct-cart-product-qt input[type=button],
    .fct-product-list .fct-cart-product-qt input[type=text],
    .fct-product-list .fct-product-price .woocommerce-Price-amount,
    .fct-product-list .fct-cart-product-name a, {
        font-size: <?php echo $wceazy_fcccfs_style; ?>px;
    }

    .fct-product-list .wceazy-fct-remove-item i.demo-icon {
        font-size: <?php echo $wceazy_fcccdis_style; ?>px;
    }

    .wffc-qty-price,
    .fct-product-price .woocommerce-Price-amount,
    .wffc-qty-price .woocommerce-Price-amount {
        color: <?php echo $wceazy_fccfc_style; ?>;
    }

    #wceazy-fct-body .wceazy-fct-content-wrap {
        background: <?php echo $wceazy_fccbc_style; ?>;
    }

    #wceazy-fct-body .fct-product-item .fct-cart-img {
        width: <?php echo $wceazy_fcccpiw_style; ?>%;
    }

    #wceazy-fct-body .fct-product-item .fct-cart-img {
        padding: <?php echo $wceazy_fccpip_style; ?>;
    }

    #wceazy-fct-body .fct-cart-product-name a {
        color: <?php echo $wceazy_fciptc_style; ?>;
    }

    #wceazy-fct-body .fct-cart-product-name a:hover {
        color: <?php echo $wceazy_fcipthc_style; ?>;
    }

    #wceazy-fct-body .fct-cart-product-name a:hover {
        font-size: <?php echo $wceazy_fciptfs_style; ?>px;
    }

    #wceazy-fct-body .fct-cart-product-qt input[type=text] {
        width: <?php echo $wceazy_fccpqibw_style; ?>px;
    }

    #wceazy-fct-body .fct-cart-product-qt input[type=text] {
        border-radius: <?php echo $wceazy_fccpqibbr_style; ?>px;
    }

    #wceazy-fct-body .fct-cart-product-qt input[type=text] {
        border-color: <?php echo $wceazy_fccpqibbc_style; ?>;
    }

    #wceazy-fct-body .fct-cart-product-qt input[type=text] {
        color: <?php echo $wceazy_fccpqibtc_style; ?>;
    }

    #wceazy-fct-body .fct-cart-product-qt input[type=text] {
        background: <?php echo $wceazy_fccpqibbgc_style; ?>;
    }

    #wceazy-fct-body footer.fct-footer {
        padding: <?php echo $wceazy_fcfp_style; ?>;
    }

    .wceazy-fct-main div#wceazy-fct button {
        border-radius: <?php echo $wceazy_fcbs_shape; ?>%;
        background: <?php echo $wceazy_fcbbc_style; ?>;
    }

    #wceazy-fct span.wofusion-fci-total {
        color: <?php echo $wceazy_fcbcc_style; ?>;
        background: <?php echo $wceazy_fcbcbc_style; ?>;
    }

    #wceazy-fct i.demo-icon {
        color: <?php echo $wceazy_fcbc_style; ?>;
        font-size: <?php echo $wceazy_fcbs_icon_size; ?>px;
    }

    <?php
        if( $wceazy_fcbp_style == 'top_left' ){ ?>
    .wceazy-fct-main div#wceazy-fct {
        top: 110px;
        bottom: auto;
        right: auto;
        left: <?php echo $wceazy_fcboh_style;?>px;
    }

    <?php }elseif ( $wceazy_fcbp_style == 'top_right' ){ ?>
    .wceazy-fct-main div#wceazy-fct {
        top: <?php echo $wceazy_fcbov_style; ?>px;
        bottom: auto;
        right: <?php echo $wceazy_fcboh_style;?>px;
        left: auto;
    }

    <?php }elseif ( $wceazy_fcbp_style == 'bottom_left' ){ ?>
    .wceazy-fct-main div#wceazy-fct {
        top: auto;
        bottom: <?php echo $wceazy_fcbov_style; ?>px;
        right: auto;
        left: <?php echo $wceazy_fcboh_style;?>px;
    }

    <?php }else{?>
    .wceazy-fct-main div#wceazy-fct {
        top: auto;
        bottom: <?php echo $wceazy_fcbov_style; ?>px;
        right: <?php echo $wceazy_fcboh_style;?>px;
        left: auto;
    }

    <?php } ?>

    <?php
        if( $wceazy_fcbcp_style == 'top_right' ){ ?>
    #wceazy-fct span.wofusion-fci-total {
        top: 0px;
        right: -11px;
    }

    <?php }elseif ( $wceazy_fcbcp_style == 'bottom_left' ){ ?>
    #wceazy-fct span.wofusion-fci-total {
        bottom: 0px;
        left: -11px;
    }

    <?php }elseif ( $wceazy_fcbcp_style == 'bottom_right' ){ ?>
    #wceazy-fct span.wofusion-fci-total {
        bottom: 0px;
        right: -11px;
    }

    <?php }else{?>
    #wceazy-fct span.wofusion-fci-total {
        top: 0px;
        left: -11px;
    }

    <?php } ?>

</style>
