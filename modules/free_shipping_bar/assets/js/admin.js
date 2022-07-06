/** master script for free shipping bar admin **/
'use strict';

var $ = jQuery;

function wceazy_free_shipping_bar_init() {
    // init module
    $('#wceazy_fsbar_header').show();
    $('#wceazy_fsbar_container').show();
};

var $wceazyFsb = {

    wceazyfsb_settings          : JSON.parse(wceazyfsb_admin_object.wceazyfsb_settings),
    fsb_settings_form           : "#wceazy_form_free_shipping_bar",
    settings_form_selector      : ".wceazy-form-free-shipping-bar",
    close_icon_selector         : ".wceazy-fsb-close-icon",
    enable_progress_bar         : "#wceazy_fsb_enable_progress_bar",
    wceazy_fsb_switchers        : ".wceazy_fsb_switcher_default_check",

    init_wceazyfsb: function(){

        jQuery(document).ready(function($) {

            $(".wceazy_fsbar_right_content .wceazy_fsbar_tab_body").hide();
            $(".wceazy_fsbar_right_content .wceazy_fsbar_tab_body[data-id='wceazy_fsbar_settings']").show();

            $(".wceazy_fsbar_data_tabs .tab_item").unbind("click");
            $(".wceazy_fsbar_data_tabs .tab_item").bind("click", function () {

                $(".wceazy_fsbar_data_tabs .tab_item").removeClass('tab_item_active');
                $(this).addClass('tab_item_active');

                $(".wceazy_fsbar_right_content .wceazy_fsbar_tab_body").hide();
                $(".wceazy_fsbar_right_content .wceazy_fsbar_tab_body[data-id='" + $(this).data('target') + "']").show();

                //control live preview
                let $selectTab = $(this).attr('data-target');
                if( $selectTab == 'wceazy_fsbar_style' ){
                    $('#wceazy_fsb_live_preview').fadeIn( 'slow' );
                }else{
                    $('#wceazy_fsb_live_preview').fadeOut( 'slow' );
                }

            });
            
            // load handler here ..
            $wceazyFsb.wceazy_fsb_toggole_disappear_time();
            $wceazyFsb.wceazyfsb_handle_switcher();
            $wceazyFsb.wceazy_handle_progress_bar_style($wceazyFsb.enable_progress_bar);
            
            $wceazyFsb.wceazyfsb_handle_livepreview_style();

            //load submit handler here ..
            $($wceazyFsb.fsb_settings_form).on( 'submit', function(e){
                $wceazyFsb.wceazy_handle_submit_fbs_settings(e);
            });

        });

        

    },

    
    /** start inner object here **/
    wceazyfsb_handle_switcher : function(){
        if( $wceazyFsb.wceazyfsb_settings.length <= 0 ){
            $($wceazyFsb.wceazy_fsb_switchers).prop('checked', true);
        }
    },

    //deine toggole disappear time
    wceazy_fsb_toggole_disappear_time : function(){

        let $allow_disappear_time = ( $wceazyFsb.wceazyfsb_settings.hasOwnProperty('wceazy_fsb_allow_disappear_time'))  ? true : false;
        if( $allow_disappear_time ){
            $('.set-disappear-time').show();
        }else{
            $('.set-disappear-time').hide();
        }

        $('#wceazy_fsb_allow_disappear_time').on('change', function(){
            let $this = this;
            if( $($this).prop('checked') ){
                $('.set-disappear-time').fadeIn('slow');
            }else{
                $('.set-disappear-time').fadeOut('slow');
            }
        });
        
    },

    //define handle free shipping bar progres bar style control
    wceazy_handle_progress_bar_style : function() {

        if( $($wceazyFsb.enable_progress_bar).prop('checked') ){
            $('#wceazy_fsb_progress_bar_style_wrapper').show();
        }

        if( $wceazyFsb.enable_progress_bar ){
            
            $($wceazyFsb.enable_progress_bar).on('change', function(){

                if( $($wceazyFsb.enable_progress_bar).prop('checked') ){
                    $('#wceazy_fsb_progress_bar_style_wrapper').fadeIn('slow');
                }else{
                    $('#wceazy_fsb_progress_bar_style_wrapper').fadeOut('slow');
                }
                
            });

        }
    },

    // submit settings from
    wceazy_handle_submit_fbs_settings : function (e) {
        e.preventDefault();
        let $submit_button = $('.wceazy_fsbar_btn');
        $submit_button.text( 'Please Wait....' );
        $submit_button.addClass( 'wceazy-fsb-btn-disabled' );
        $submit_button.prop( 'disabled', true );

        let $post_data = {'action': 'wceazy_save_fsb_settings', 'data': $($wceazyFsb.fsb_settings_form).serializeArray()};

        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: $post_data,
            success: function(res){
                var $obj = JSON.parse(res);
                if ($obj.status == 'true') {
                    Command: toastr["success"]("Settings Saved Successfully.");
                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('wceazy-fsb-btn-disabled');
                    $submit_button.prop('disabled', false);
                }else{
                    Command: toastr["error"]("Failed. Please try again!");
                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('wceazy-fsb-btn-disabled');
                    $submit_button.prop('disabled', false);
                    console.log('Oops: something is wrong please try later!');
                }
            }
        });
    },

    //define live preview style handaler
    wceazyfsb_handle_livepreview_style : function(){
        
        $('#wceazy_fsb_progress_layout').on('change', function(){
            $('#wceazy_fsb_live_preview').removeAttr('class');
            $('#wceazy_fsb_live_preview').attr('class', 'wceazy-fsb-live-preview ' + $(this).val());

            if( $(this).val() !== 'fsb-style1' ){
                $('#wceazy_fsb_inner_bg_control').fadeIn( 'slow' );
            }else{
                $('#wceazy_fsb_inner_bg_control').fadeOut( 'slow' );
            }

        });

        //for bg
        let $fsb_bg = {
                change: function(event, ui){
                    let $bgColor = ui.color.toString();
                    $('.fsb-style1').css('background', $bgColor);
                }, 
            };
        $('#wceazy_fsb_bg').wpColorPicker($fsb_bg);
        
        // inner bg
        let $inner_bg = {
            change: function(event, ui){
                let $bgColor = ui.color.toString();
                $('#wceazy_fsb_live_preview .fsb-live-preview-inner').css('background', $bgColor);
            }, 
        };
        $('#wceazy_fsb_inner_bg').wpColorPicker($inner_bg);
        
        //for text
        let $fsb_text_color = {
                change: function(event, ui){
                    let $textColor = ui.color.toString();
                    $('#wceazy_fsb_live_preview .fsb-live-preview-inner-content').css('color', $textColor);
                }, 
            };
        $('#wceazy_fsb_text_color').wpColorPicker($fsb_text_color);
        
        //for text
        let $fsb_link_color = {
                change: function(event, ui){
                    let $linkColor = ui.color.toString();
                    $('#wceazy_fsb_live_preview .fsb-live-preview-inner-shopping').css('color', $linkColor);
                }, 
            };
            
        $('#wceazy_fsb_link_color').wpColorPicker($fsb_link_color);

        $('#wceazy_fsb_font_size').on('keyup', function(){
            $('.fsb-style1').css('font-size', $(this).val() + 'px');
        });

        $('#wceazy_fsb_text_align').on('change', function(){
            $('.fsb-style1').css('text-align', $(this).val());
        });
        

        //for close icon
        let $close_incon_color = {
            change: function(event, ui){
                const element = document.querySelector('.fsb-style1 i.demo-icon');
                let $close_incon_color = ui.color.toString();
                element.style.setProperty("--close-iconColor", $close_incon_color);
            }, 
        };
        $('#wceazy_fsb_close_icon_color').wpColorPicker($close_incon_color);

        $('#wceazy_fsb_close_icon_size').on('keyup', function(){
            const element = document.querySelector('.fsb-style1i.demo-icon');
            element.style.setProperty("--check-fontSize", $(this).val()+"px");
        });  
              
         
        let $progress_bar_bg = {
            change: function(event, ui){
                let $progress_bar_bg = ui.color.toString();
                let $layoutStyle = $('#wceazy_fsb_progress_layout').val();
                $('.fsb-style1' + ' .fsb-bar').css('background', $progress_bar_bg);
            }, 
        };
        $('#wceazy_fsb_progress_bar_bg').wpColorPicker($progress_bar_bg);
        
        let $current_progress_bg = {
            change: function(event, ui){
                let $current_progress_bg = ui.color.toString();
                $('.fsb-style1' + ' .fsb-size').css('background', $current_progress_bg);
            }, 
        };
        $('#wceazy_fsb_current_progress_bg').wpColorPicker($current_progress_bg);
        
        let $progress_text_color = {
            change: function(event, ui){
                let $progress_text_color = ui.color.toString();
                $('.fsb-style1' + ' .fsb-size').css('color', $progress_text_color);
            }, 
        };
        $('#wceazy_fsb_progress_text_color').wpColorPicker($progress_text_color);

        $('#wceazy_fsb_progress_font_size').on('keyup', function(){
            $('.fsb-style1' + ' .fsb-size').css('font-size', $(this).val() + 'px');
        });

    },


};

//load js for backend
$wceazyFsb.init_wceazyfsb();