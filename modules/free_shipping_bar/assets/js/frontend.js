/**free shipping bar frontend master script**/
"use strict";

var $ = jQuery;

var $wceazyFFsb = {

    fsbajaxurl              : wceazy_fsb_fronted_object.ajaxurl,
    fsbsecurity             : wceazy_fsb_fronted_object.security,
    wceazy_fsbs             : JSON.parse(wceazy_fsb_fronted_object.wceazy_fsb_settings),
    wceazy_fsb_init         : "#wceazy_init_free_shipping_bar",
    wceazy_fspb_init        : "#wceazy_init_free_shipping_progress_bar",
    wceazy_fsb_close_icon   : ".wceazy-fsb-close-icon",

    init_wceazyffsb: function(){

        jQuery(document).ready(function($) {  

            //load fb handalers here ..
            $wceazyFFsb.init_wceazyfsb_content();
            $wceazyFFsb.init_wceazyfspbar_content();
            
            //init close handaler
            setTimeout( function(){
                $wceazyFFsb.wceazy_handle_close_fsb();
            },700 );            
            
        });

    },

    init_wceazyfsb_content: function () {
        var $fsbfWrapper = $($wceazyFFsb.wceazy_fsb_init);

        if ($fsbfWrapper.length > 0) {

            let $post_data = {
                'action': 'wceazy_init_free_shipping_bar_content', 'security': $wceazyFFsb.fsbsecurity, 'data': {}
            };

            $.ajax({
                url: $wceazyFFsb.fsbajaxurl,
                type: "POST",
                data: $post_data,
                success: function (response) {
                    var $data = JSON.parse(response);
                    
                    if ($data.status == 'true' && $data.res_data !== '') {
                        $($fsbfWrapper).html($data.res_data);

                        //init progress bar
                        setTimeout( function(){
                            $wceazyFFsb.wceazy_handaler_calculate_progress_bar($data.progress_persent);
                        },300 );

                    } else {
                        console.log('Opps: something is wrong!');
                    }

                }

            });

        }

    },

    //define free shipping progress bar only
    init_wceazyfspbar_content : function(){
        var $fspbfWrapper = $($wceazyFFsb.wceazy_fspb_init);

        if ($fspbfWrapper.length > 0) {

            let $post_data = {
                'action': 'wceazy_init_free_shipping_progress_bar_content', 'security': $wceazyFFsb.fsbsecurity, 'data': {}
            };

            $.ajax({
                url: $wceazyFFsb.fsbajaxurl,
                type: "POST",
                data: $post_data,
                success: function (response) {
                    var $data = JSON.parse(response);
                    
                    if ($data.status == 'true' && $data.res_data !== '') {
                        $($fspbfWrapper).html($data.res_data);

                        //init progress bar
                        setTimeout( function(){
                            $wceazyFFsb.wceazy_handaler_calculate_only_progress_bar($data.progress_persent);
                        },300 );

                    } else {
                        console.log('Opps: something is wrong!');
                    }

                }

            });

        }
    },

    wceazy_handle_close_fsb : function(){
        let $fsbClose = $($wceazyFFsb.wceazy_fsb_close_icon);
        if($fsbClose){
            $($fsbClose).on( 'click', function(){
                $($wceazyFFsb.wceazy_fsb_init).fadeOut('slow');
            });
        }
    },

    //define calculate progress bar
    wceazy_handaler_calculate_progress_bar : function( $totalPercent=0 ){
        
        let $j = 0;

        if ( $j == 0 ) {
            $j = 1;
            let $elem = document.getElementById("wceazy_progress_bar_line");
            let $width = 1;
            let $id = setInterval(frame, 15);
            
            function frame() {
                if ( $width >= $totalPercent ) {
                    clearInterval($id);
                    $j = 0;
                } else {
                    $width++;
                    $elem.innerText = $totalPercent.toFixed(2) + '%';
                    $elem.style.width = $width + "%";
                }
            }
        }

    },

    //define calculate only progress bar
    wceazy_handaler_calculate_only_progress_bar : function( $totalPercent=0 ){
        
        let $j = 0;

        if ( $j == 0 ) {
            $j = 1;
            let $elem = document.getElementById("wceazy_only_progress_bar_line");
            let $width = 1;
            let $id = setInterval(frame, 15);
            
            function frame() {
                if ( $width >= $totalPercent ) {
                    clearInterval($id);
                    $j = 0;
                } else {
                    $width++;
                    $elem.innerText = $totalPercent.toFixed(2) + '%';
                    $elem.style.width = $width + "%";
                }
            }
        }

    },


};


//load js for frontend
$wceazyFFsb.init_wceazyffsb();