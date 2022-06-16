

<div id="wceazy_main">

    <?php include WCEAZY_PATH . "backend/templates/views/module_list.php"; ?>
    <?php include WCEAZY_PATH . "backend/templates/views/module_admin.php"; ?>

</div>


<script type="text/javascript">
    jQuery(document).ready(function($){
        'use strict';

        const host = "<?php echo WCEAZY_URL; ?>";
        wceazy_plugin_init(host);
    });

</script>