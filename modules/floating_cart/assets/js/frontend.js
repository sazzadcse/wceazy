/**floating cart frontend master script**/
"use strict";

var $ = jQuery;

var $wceazyFcf = {

    fcfajaxurl              : wceazy_fc_fronted_object.ajaxurl,
    fcfsecurity             : wceazy_fc_fronted_object.security,
    wceazy_fcsd          : JSON.parse(wceazy_fc_fronted_object.wceazy_fc_settings),
    wofusion_fc_init        : "#wceazy_floating_cart_init",
    wofusion_fc_selector    : "#wceazy-fct",
    wofusion_fcb_selector   : "#wceazy-fct-body",
    wofusion_fchh_btn       : ".fct-right-header",
    pqty_increment_btn      : ".wceazy-fct-increment-pqty",
    pqty_decrement_btn      : ".wceazy-fct-decrement-pqty",
    single_add_to_cart      : "button.single_add_to_cart_button",
    remove_cart_item        : ".wceazy-fct-remove-item",
    wf_fc_add_cart          : "a.wceazy_added_to_cart",
    wf_fc_single_add_cart   : "button.single_add_to_cart_button",
    wf_empty_cart_content   : ".wffc-empty-cart-content",
    wffc_apply_coupon_btn   : "button.wffc-apply-coupon-btn",

    init_wffc: function(){

        jQuery(document).ready(function($) {

            if($wceazyFcf.wceazy_fcsd.length <= 0){
                $($wceazyFcf.wf_empty_cart_content).show();
            }else{
                $($wceazyFcf.wf_empty_cart_content).hide();
            }

            var $cartCount = $('.wffc_cart_contents_count').text();
            $wceazyFcf.wffc_handel_basket($cartCount);

            // init floating cart content
            $wceazyFcf.init_wffc_content($wceazyFcf.wofusion_fc_init);

            $wceazyFcf.setBodyClass($wceazyFcf.wofusion_fc_selector);

            $($wceazyFcf.wofusion_fc_selector).click(function(){
                $wceazyFcf.toggle_wceazy_floating_cart('show');
            });

            // check ajax add to cart trigger
            var $triggerEl = $($wceazyFcf.wf_fc_add_cart);
            if( $triggerEl.length > 0 ){
                $($triggerEl).click(function(){
                    setTimeout(function () {
                        $wceazyFcf.init_wffc_content($wceazyFcf.wofusion_fc_init);
                    },300);
                });

            }
            var $triggerSEl = $($wceazyFcf.wf_fc_single_add_cart);
            if( $triggerSEl.length > 0 ){
                $($triggerSEl).click(function(){
                    setTimeout(function () {
                        $wceazyFcf.init_wffc_content($wceazyFcf.wf_fc_single_add_cart);
                    },300);
                });

            }

        });

    },

    init_wffc_content: function ($el) {
        var $wffcfWrapper = $($el);

        if ($wffcfWrapper.length > 0) {

            let $post_data = {
                'action': 'wceazy_init_floating_cart_content', 'security': $wceazyFcf.fcfsecurity, 'data': {}
            };

            $.ajax({
                url: $wceazyFcf.fcfajaxurl,
                type: "POST",
                data: $post_data,
                success: function (response) {
                    var $data = JSON.parse(response);

                    if ($data.status == 'true' && $data.res_data !== '') {
                        $($el).html($data.res_data);
                        $('.wffc_cart_contents_count').text($data.cart_contents_count);
                        $wceazyFcf.wffc_handel_basket($data.cart_contents_count);
                        if( $data.cart_contents_count <= 0 ){
                            $('.wffc-empty-cart-content').fadeIn('slow');
                            $('.wceazy-fct-items-and-footer').addClass('fct-cart-empty');
                        }
                    } else {
                        console.log('Opps: something is wrong!');
                    }

                    // trigger fc hide
                    $($wceazyFcf.wofusion_fchh_btn).click(function () {
                        $wceazyFcf.toggle_wceazy_floating_cart();
                    });

                    // trigger increment/decrement
                    $wceazyFcf.increment_wffc_item($wceazyFcf.pqty_increment_btn);
                    $wceazyFcf.decrement_wffc_item($wceazyFcf.pqty_decrement_btn);

                    // trigger remove cart item
                    $wceazyFcf.trigger_wffc_remove_cart_item($wceazyFcf.remove_cart_item);

                    // trigger auto open cart
                    $wceazyFcf.trigger_wffc_auto_open();
                }

            });

        }

        // trigger fc hide
        $($wceazyFcf.wofusion_fchh_btn).click(function () {
            $wceazyFcf.toggle_wceazy_floating_cart();
        });

    },

    setBodyClass: function( $el ){
        var $elWrap =  $($el);
        if( $elWrap.length <= 0 ){
            jQuery( 'body' ).removeClass( 'wceazy-fct-main' );
        }else{
            jQuery( 'body' ).addClass( 'wceazy-fct-main' );
        }
    },

    // define toggle fct by type
    toggle_wceazy_floating_cart : function () {
        jQuery($wceazyFcf.wofusion_fcb_selector).toggleClass("fct-show");
        var $cartCount = $('.wffc_cart_contents_count').text();
        $wceazyFcf.wffc_handel_basket($cartCount);
    },

    toggle_wceazy_floating_cart_backup : function ($type) {
        if( $type == 'show' ){
            jQuery($wceazyFcf.wofusion_fcb_selector).removeClass("fct-hide");
            jQuery($wceazyFcf.wofusion_fcb_selector).addClass("fct-show");
        }else{
            jQuery($wceazyFcf.wofusion_fcb_selector).removeClass("fct-show");
            jQuery($wceazyFcf.wofusion_fcb_selector).addClass("fct-hide");
        }
        var $cartCount = $('.wffc_cart_contents_count').text();
        $wceazyFcf.wffc_handel_basket($cartCount);
    },

    // define increment wfc item
    increment_wffc_item : function ($el) {
        let $pqty_btn = $($el);

        if ($pqty_btn.length > 0) {

            $($pqty_btn).on( 'click', function () {

                $('.wceazy-fct-items-and-footer').fadeOut('slow');
                $('.wceazy-fct-loader').fadeIn('slow');

                let $this = $(this);
                let $product_id = $this.attr('data-product_id');
                let $cart_item_key = $this.attr('data-cart_item_key');
                let $exiting_pqty = $('.wceazy-fct-pqty-' + $product_id).val();

                let $pqty = parseInt($exiting_pqty) + parseInt(1);
                $('.wceazy-fct-pqty-' + $product_id).val($pqty);

                let $post_data = {
                    'action': 'wceazy_floating_cart_update',
                    'security': $wceazyFcf.fcfsecurity,
                    'data': {
                        'product_id': $product_id,
                        'product_qty': $pqty,
                        'cart_item_key': $cart_item_key,
                    }
                };

                $.ajax({
                    url: $wceazyFcf.fcfajaxurl,
                    type: "POST",
                    data: $post_data,
                    success: function (response) {
                        var $data = JSON.parse(response);

                        if ($data.status == 'true' && $data.res_data !== '') {
                            $('.wceazy-fct-pqty-' + $product_id).val($data.res_data.new_qty);
                            $('.wceazy-fct-psubtotal-' + $product_id).html($data.res_data.product_subtotal);
                            $('.wceazy-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                            $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                            $('.wceazy-fct-carttotal').html($data.res_data.cart_total);
                            $('.wofusion-fci-total').text($data.res_data.cart_contents_count);

                            setTimeout(function () {
                                $('.wceazy-fct-items-and-footer').fadeIn('slow');
                                $('.wceazy-fct-loader').fadeOut('slow');
                            }, 300);

                            if ( $wceazyFcf.wceazy_fcsd.hasOwnProperty('wffc_show_header_notification') && $wceazyFcf.wceazy_fcsd.wffc_show_header_notification == 'yes' ){
                                setTimeout(function () {
                                    if ($data.res_data.notice_type == 'success') {
                                        $('.wceazy-fct-notice').text($data.res_data.notice);
                                        $('.wceazy-fct-notice').addClass('wceazy-fct-success');
                                        $('.wceazy-fct-notice').fadeIn('slow');
                                    } else {
                                        $('.wceazy-fct-notice').text($data.res_data.notice);
                                        $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                                        $('.wceazy-fct-notice').fadeIn('slow');
                                    }
                                }, 500);
                            }

                        } else {
                            $('.wceazy-fct-pqty-' + $product_id).val($exiting_pqty);

                            setTimeout(function () {
                                $('.wceazy-fct-items-and-footer').fadeIn('slow');
                                $('.wceazy-fct-loader').fadeOut('slow');
                            }, 300);

                            setTimeout(function () {
                                $('.wceazy-fct-notice').text('Opps: something is wrong!');
                                $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                                $('.wceazy-fct-notice').fadeIn('slow');
                            }, 2000);

                        }
                    }

                });

                var $wffc_notifi_duractions  = parseInt($wceazyFcf.wceazy_fcsd.wffc_notification_duractions);
                setTimeout(function () {
                    $('.wceazy-fct-notice').fadeOut('slow');
                }, $wffc_notifi_duractions);

            });

        }

    },

    // define decrement wfc item
    decrement_wffc_item : function ($el) {

        let $pqty_btn = $($el);

        if( $pqty_btn.length > 0 ){

            $($pqty_btn).on( 'click', function () {

                $('.wceazy-fct-items-and-footer').fadeOut('slow');
                $('.wceazy-fct-loader').fadeIn('slow');

                let $this = $(this);
                let $product_id = $this.attr('data-product_id');
                let $cart_item_key = $this.attr('data-cart_item_key');
                let $exiting_pqty = $('.wceazy-fct-pqty-' + $product_id).val();

                let $pqty = parseInt($exiting_pqty) - parseInt(1);
                $('.wceazy-fct-pqty-' + $product_id).val($pqty);

                let $post_data = {
                    'action': 'wceazy_floating_cart_update', 'security': $wceazyFcf.fcfsecurity, 'data': {
                        'product_id': $product_id,
                        'product_qty': $pqty,
                        'cart_item_key': $cart_item_key,
                    }
                };

                $.ajax({
                    url: $wceazyFcf.fcfajaxurl,
                    type: "POST",
                    data: $post_data,
                    success: function (response) {
                        var $data = JSON.parse(response);

                        if ($data.status == 'true' && $data.res_data !== '') {
                            if ($data.res_data.new_qty <= 0) {
                                $('.wceazy-fct-item-' + $product_id).fadeOut('slow');
                            }

                            if( $data.res_data.cart_contents_count <= 0 ){
                                $('.wffc-empty-cart-content').fadeIn('slow');
                                $('.wceazy-fct-items-and-footer').addClass('fct-cart-empty');
                                $('.wceazy-fct-shippingtotal').text('0.00$');
                            }

                            $('.wceazy-fct-pqty-' + $product_id).val($data.res_data.new_qty);
                            $('.wceazy-fct-psubtotal-' + $product_id).html($data.res_data.product_subtotal);
                            $('.wceazy-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                            $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                            $('.wceazy-fct-carttotal').html($data.res_data.cart_total);
                            $('.wofusion-fci-total').text($data.res_data.cart_contents_count);

                            setTimeout(function () {
                                $('.wceazy-fct-items-and-footer').fadeIn('slow');
                                $('.wceazy-fct-loader').fadeOut('slow');
                            }, 300);

                            if ( $wceazyFcf.wceazy_fcsd.hasOwnProperty('wffc_show_header_notification') && $wceazyFcf.wceazy_fcsd.wffc_show_header_notification == 'yes' ) {
                                setTimeout(function () {
                                    if ($data.res_data.notice_type == 'success') {
                                        $('.wceazy-fct-notice').text($data.res_data.notice);
                                        $('.wceazy-fct-notice').addClass('wceazy-fct-success');
                                        $('.wceazy-fct-notice').fadeIn('slow');
                                    } else {
                                        $('.wceazy-fct-notice').text($data.res_data.notice);
                                        $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                                        $('.wceazy-fct-notice').fadeIn('slow');
                                    }
                                }, 500);
                            }

                        } else {
                            $('.wceazy-fct-pqty-' + $product_id).val($exiting_pqty);

                            setTimeout(function () {
                                $('.wceazy-fct-items-and-footer').fadeIn('slow');
                                $('.wceazy-fct-loader').fadeOut('slow');
                            }, 300);

                            setTimeout(function () {
                                $('.wceazy-fct-notice').text('Opps: something is wrong!');
                                $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                                $('.wceazy-fct-notice').fadeIn('slow');
                            }, 2000);

                        }
                    }

                });

                var $wffc_notifi_duractions  = parseInt($wceazyFcf.wceazy_fcsd.wffc_notification_duractions);
                setTimeout(function () {
                    $('.wceazy-fct-notice').fadeOut('slow');
                }, $wffc_notifi_duractions);

            });
        }
    },

    // define auto open cart
    trigger_wffc_auto_open : function () {
        var $wceazy_fcsd = $wceazyFcf.wceazy_fcsd;
        setTimeout(function () {
            if($wceazy_fcsd && $wceazy_fcsd.hasOwnProperty('wffc_auto_open_cart') && $wceazy_fcsd.wffc_auto_open_cart == 'yes'){
                $($wceazyFcf.wofusion_fcb_selector).removeClass('fct-hide');
                $($wceazyFcf.wofusion_fcb_selector).addClass('fct-show');
            }
        },1000);

    },

    // define remove item on cart
    trigger_wffc_remove_cart_item : function ($el) {
        let $remove_btn = $($el);

        if( $remove_btn.length > 0 ){

            $($remove_btn).on( 'click', function () {

                $('.wceazy-fct-items-and-footer').fadeOut('slow');
                $('.wceazy-fct-loader').fadeIn('slow');

                let $this = $(this);
                let $product_id = $this.attr('data-product_id');
                let $cart_item_key = $this.attr('data-cart_item_key');
                let $exiting_pqty = $('.wceazy-fct-pqty-' + $product_id).val();

                let $post_data = {
                    'action': 'wceazy_floating_cart_update', 'security': $wceazyFcf.fcfsecurity, 'data': {
                        'product_id': $product_id,
                        'product_qty': 0,
                        'cart_item_key': $cart_item_key,
                    }
                };

                $.ajax({
                    url: $wceazyFcf.fcfajaxurl,
                    type: "POST",
                    data: $post_data,
                    success: function (response) {
                        var $data = JSON.parse(response);

                        if ($data.status == 'true' && $data.res_data !== '') {

                            if ($data.res_data.new_qty <= 0) {
                                $('.wceazy-fct-item-' + $product_id).fadeOut('slow');
                            }

                            if( $data.res_data.cart_contents_count <= 0 ){
                                $('.wffc-empty-cart-content').fadeIn('slow');
                                $('.wceazy-fct-items-and-footer').addClass('fct-cart-empty');
                                $('.wceazy-fct-shippingtotal').text('0.00$');
                            }

                            $('.wceazy-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                            $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                            $('.wceazy-fct-carttotal').html($data.res_data.cart_total);
                            $('.wofusion-fci-total').text($data.res_data.cart_contents_count);

                            setTimeout(function () {
                                $('.wceazy-fct-items-and-footer').fadeIn('slow');
                                $('.wceazy-fct-loader').fadeOut('slow');
                            }, 300);

                            if ( $wceazyFcf.wceazy_fcsd.hasOwnProperty('wffc_show_header_notification') && $wceazyFcf.wceazy_fcsd.wffc_show_header_notification == 'yes' ) {
                                setTimeout(function () {
                                    if ($data.res_data.notice_type == 'success') {
                                        $('.wceazy-fct-notice').text($data.res_data.notice);
                                        $('.wceazy-fct-notice').addClass('wceazy-fct-success');
                                        $('.wceazy-fct-notice').fadeIn('slow');
                                    } else {
                                        $('.wceazy-fct-notice').text($data.res_data.notice);
                                        $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                                        $('.wceazy-fct-notice').fadeIn('slow');
                                    }
                                }, 500);
                            }

                        } else {
                            $('.wceazy-fct-pqty-' + $product_id).val($exiting_pqty);

                            setTimeout(function () {
                                $('.wceazy-fct-items-and-footer').fadeIn('slow');
                                $('.wceazy-fct-loader').fadeOut('slow');
                            }, 300);

                            setTimeout(function () {
                                $('.wceazy-fct-notice').text('Opps: something is wrong!');
                                $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                                $('.wceazy-fct-notice').fadeIn('slow');
                            }, 2000);

                        }
                    }

                });

                var $wffc_notifi_duractions  = parseInt($wceazyFcf.wceazy_fcsd.wffc_notification_duractions);
                setTimeout(function () {
                    $('.wceazy-fct-notice').fadeOut('slow');
                }, $wffc_notifi_duractions);

            });
        }
    },

    // trigger apply coupon
    wceazy_trigger_apply_coupon : function($el){
        $('button.wffc-apply-coupon-btn').on('click', function () {
            console.log('apply coupon clicked');
        });
    },

    wffc_handel_basket:function ($cartCount) {
        var $wffcbs_enable = $wceazyFcf.wceazy_fcsd.hasOwnProperty('wceazy_fcbs_enable') ? $wceazyFcf.wceazy_fcsd.wceazy_fcbs_enable : 'show_always';

        if( $wffcbs_enable == 'hide_always' ){
            $('#wceazy-fct').hide();
        }else if($wffcbs_enable == 'show_always'){
            $('#wceazy-fct').show();
        }else if($wffcbs_enable == 'hide_empty_cart'){
            if($cartCount > 0){
                $('#wceazy-fct').show();
            }else{
                $('#wceazy-fct').hide();
            }
        }else{
            $('#wceazy-fct').show();
        }
    },

};


//load js for frontend
$wceazyFcf.init_wffc();

function wceazy_qty_update(el) {
    $('.wceazy-fct-items-and-footer').fadeOut('slow');
    $('.wceazy-fct-loader').fadeIn('slow');

    let $this = $(el);
    let $product_id = $this.attr('data-product_id');
    let $cart_item_key = $this.attr('data-cart_item_key');
    let $pqty = $('.wceazy-fct-pqty-' + $product_id).val();

    let $post_data = {
        'action': 'wceazy_floating_cart_update', 'security': $wceazyFcf.fcfsecurity, 'data': {
            'product_id': $product_id,
            'product_qty': $pqty,
            'cart_item_key': $cart_item_key,
        }
    };

    $.ajax({
        url: $wceazyFcf.fcfajaxurl,
        type: "POST",
        data: $post_data,
        success: function (response) {
            var $data = JSON.parse(response);

            if ($data.status == 'true' && $data.res_data !== '') {

                $('.wceazy-fct-pqty-' + $product_id).val($data.res_data.new_qty);
                $('.wceazy-fct-psubtotal-' + $product_id).html($data.res_data.product_subtotal);
                $('.wceazy-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                $('.wceazy-fct-carttotal').html($data.res_data.cart_total);
                $('.wofusion-fci-total').text($data.res_data.cart_contents_count);

                setTimeout(function () {
                    $('.wceazy-fct-items-and-footer').fadeIn('slow');
                    $('.wceazy-fct-loader').fadeOut('slow');
                }, 300);

                if ( $wceazyFcf.wceazy_fcsd.hasOwnProperty('wffc_show_header_notification') && $wceazyFcf.wceazy_fcsd.wffc_show_header_notification == 'yes' ){
                    setTimeout(function () {
                        if ($data.res_data.notice_type == 'success') {
                            $('.wceazy-fct-notice').text($data.res_data.notice);
                            $('.wceazy-fct-notice').addClass('wceazy-fct-success');
                            $('.wceazy-fct-notice').fadeIn('slow');
                        } else {
                            $('.wceazy-fct-notice').text($data.res_data.notice);
                            $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                            $('.wceazy-fct-notice').fadeIn('slow');
                        }
                    }, 500);
                }

            } else {
                $('.wceazy-fct-pqty-' + $product_id).val($exiting_pqty);

                setTimeout(function () {
                    $('.wceazy-fct-items-and-footer').fadeIn('slow');
                    $('.wceazy-fct-loader').fadeOut('slow');
                }, 300);

                setTimeout(function () {
                    $('.wceazy-fct-notice').text('Opps: something is wrong!');
                    $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                    $('.wceazy-fct-notice').fadeIn('slow');
                }, 2000);

            }
        }

    });

    var $wffc_notifi_duractions  = parseInt($wceazyFcf.wceazy_fcsd.wffc_notification_duractions);
    setTimeout(function () {
        $('.wceazy-fct-notice').fadeOut('slow');
    }, $wffc_notifi_duractions);
}

/**
 * apply coupon on cart */
function wffc_trigger_apply_coupon() {

    var $coupon_code = $('#wffc_coupon_code').val();

    $('.wffc-appply-coupon-loader').show('slow');
    $('.wffc-apply-coupon-btn').addClass('disabled');

    if( !$coupon_code ){
        $('#wffc_coupon_code').css('border-color', 'red');
        return false;
    }

    let $post_data = {
        'action': 'wceazy_floating_cart_apply_coupon', 'security': $wceazyFcf.fcfsecurity, 'data': {
            'coupon_code': $coupon_code,
        }
    };

    var $wffc_notifi_duractions  = parseInt($wceazyFcf.wceazy_fcsd.wffc_notification_duractions);

    $.ajax({
        url: $wceazyFcf.fcfajaxurl,
        type: "POST",
        data: $post_data,
        success: function (response) {
            var $data = JSON.parse(response);

            if ($data.status == 'true' && $data.res_data !== '') {

                $('.wffc-applied-coupons').text($data.res_data.applied_coupons);
                $('.wceazy-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                $('.wceazy-fct-carttotal').html($data.res_data.cart_total);

                setTimeout(function () {
                    $('.wffc-appply-coupon-loader').hide('slow');
                    $('.wffc-apply-coupon-btn').removeClass('disabled');
                }, 1000);

                if ( $wceazyFcf.wceazy_fcsd.hasOwnProperty('wffc_show_header_notification') && $wceazyFcf.wceazy_fcsd.wffc_show_header_notification == 'yes' ){
                    setTimeout(function () {
                        if ($data.res_data.notice_type == 'success') {
                            $('.wceazy-fct-notice').text($data.res_data.notice);
                            $('.wceazy-fct-notice').addClass('wceazy-fct-success');
                            $('.wceazy-fct-notice').fadeIn('slow');
                        } else {
                            $('.wceazy-fct-notice').text($data.res_data.notice);
                            $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                            $('.wceazy-fct-notice').fadeIn('slow');
                        }
                    }, 500);
                }

            } else {
                setTimeout(function () {
                    $('.wceazy-fct-notice').text('Opps: something is wrong!');
                    $('.wceazy-fct-notice').addClass('wceazy-fct-error');
                    $('.wceazy-fct-notice').fadeIn('slow');
                }, 1000);

                var $wffc_notifi_duractions  = parseInt($wceazyFcf.wceazy_fcsd.wffc_notification_duractions);
                setTimeout(function () {
                    $('.wceazy-fct-notice').fadeOut('slow');
                }, $wffc_notifi_duractions);

                $('.wffc-appply-coupon-loader').hide('slow');
                $('.wffc-apply-coupon-btn').removeClass('disabled');

            }
        }

    });

    setTimeout(function () {
        $('.wceazy-fct-notice').fadeOut('slow');
    }, $wffc_notifi_duractions);

}