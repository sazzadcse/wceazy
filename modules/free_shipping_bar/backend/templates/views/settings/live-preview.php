<!--Style 1-->
<div id="wceazy_fsb_live_preview" class="wceazy-fsb-live-preview fsb-style1" style="display:none;">
    <div class="fsb-live-preview-inner">
        <span class="fsb-live-preview-inner-content">You have purchased $100 of $120. Continue</span>
        <a class="fsb-live-preview-inner-shopping" href="#">Shopping</a>

        <div class="fsb-close_button">
            <span class="fsb-close-icon" data-close_icon="icon-cancel1">
                <i class="demo-icon icon-cancel1" id="fsb_cicnon"></i>
            </span>
        </div>
    </div>
    <div class="fsb-live-preview-progress-bar fsb-bar">
        <div class="fsb-size" style="width:25%">25%</div>
    </div>
</div>

<style>
	#wceazy_fsb_live_preview.sticky {
		box-shadow:0 13px 22px -5px rgb(0 0 0 / 6%);
		position: fixed;
		top: 40px;
		padding: 8px 0;
		transition: all .3s;
		z-index: 999;
		width: 87%;
	}
</style>
<script>
    jQuery(document).ready(function () {

        jQuery(window).scroll(function () {
            var scroll = jQuery(window).scrollTop();
            // for top scroll
            if (scroll >= 0) {
                jQuery("#wceazy_fsb_live_preview").addClass("sticky");
            }
            if (scroll <= 0) {
                jQuery("#wceazy_fsb_live_preview").removeClass("sticky");
            }
        });

    });
</script>