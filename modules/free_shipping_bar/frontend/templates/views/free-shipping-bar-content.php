<!--style 1-->
<div id="wceazy_init_free_shipping_bar" class="wceazy-init-free-shipping-bar"></div>

<script>
    jQuery(document).ready(function () {

        jQuery(window).scroll(function () {
            var scroll = jQuery(window).scrollTop();
            // for top scroll
            if (scroll >= 10) {
                jQuery("#wceazy_init_free_shipping_bar").addClass("sticky");
            }
            if (scroll <= 0) {
                jQuery("#wceazy_init_free_shipping_bar").removeClass("sticky");
            }
        });

    });
</script>
<style>
	.wceazy-init-free-shipping-bar.sticky {
		box-shadow:0 13px 22px -5px rgb(0 0 0 / 6%);
		position: sticky;
		top: 25px;
		bottom: 0px;
		/*padding: 8px 0;*/
		transition: all .3s;
		z-index: 999;
		width: 100%;
	}
</style>