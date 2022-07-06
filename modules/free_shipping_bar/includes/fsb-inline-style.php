<?php
/**
 * wceazy free shipping bar inline style
 * fsb-inline-style.php
 */

    // get settings data
    $wceazyfsb_settings = get_option('wceazy_fsbar_settings', false);

    //style
    $fsb_position               = !empty($wceazyfsb_settings) && !empty($wceazyfsb_settings['wceazy_fsb_position']) ? $wceazyfsb_settings['wceazy_fsb_position'] : '';
    
    $fsb_link_color             = !empty($wceazyfsb_settings) && !empty($wceazyfsb_settings['wceazy_fsb_link_color']) ? $wceazyfsb_settings['wceazy_fsb_link_color'] : '#fff';
    $fsb_font_size              = !empty($wceazyfsb_settings) && !empty($wceazyfsb_settings['wceazy_fsb_font_size']) ? $wceazyfsb_settings['wceazy_fsb_font_size'] : 16;
    $fsb_text_align             = !empty($wceazyfsb_settings) && !empty($wceazyfsb_settings['wceazy_fsb_text_align']) ? $wceazyfsb_settings['wceazy_fsb_text_align'] : 'center';
    $fsb_close_icon_color       = !empty($wceazyfsb_settings) && !empty($wceazyfsb_settings['wceazy_fsb_close_icon_color']) ? $wceazyfsb_settings['wceazy_fsb_close_icon_color'] : '#fff';
    $fsb_close_icon_size        = !empty($wceazyfsb_settings) && !empty($wceazyfsb_settings['wceazy_fsb_close_icon_size']) ? $wceazyfsb_settings['wceazy_fsb_close_icon_size'] : 22;
    //style progress bar
    $enable_progress_bar        = !empty($wceazyfsb_settings) && isset($wceazyfsb_settings['wceazy_fsb_enable_progress_bar']) ? 'checked' : '';
    
    $fsb_progress_font_size     = !empty($wceazyfsb_settings) && !empty($wceazyfsb_settings['wceazy_fsb_progress_font_size']) ? $wceazyfsb_settings['wceazy_fsb_progress_font_size'] : 12;
    $fsb_progress_layout        = 'fsb-style1';

?>

<style>
            
    .fsb-style1{
        font-size: <?php echo $fsb_font_size; ?>px;
        text-align: <?php echo $fsb_text_align; ?>;
    }

    .fsb-style1 a{
        color: <?php echo $fsb_link_color;?>;
        font-size: <?php echo $fsb_font_size; ?>px;
    }

    .fsb-style1 .fsb-size {
        font-size: <?php echo $fsb_progress_font_size; ?>;
    }


    .fsb-close-icon .demo-icon,
    .fsb-style1 i.demo-icon:after {
        color : <?php echo $fsb_close_icon_color; ?>px !important;
        font-size : <?php echo $fsb_close_icon_size; ?>px !important;
    }
    
</style>