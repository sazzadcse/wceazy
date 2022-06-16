<div id="wceazy_module_list">
    <div class="wceazy_module_list_header">
        <div class="wceazy_module_left_header">
            <p>
                <?php _e ('wcEazy<span>' . WCEAZY_VERSION . '</span>', 'wceazy') ?>
            </p>
        </div>
        <div class="wceazy_module_right_header">
            <p class="get_pro">
                <a href="https://wceazy.com" target="_blank">Get Pro</a>
            </p>
        </div>
    </div>
    <div class="wceazy_module_title">
        <h2><?php _e ('Modules', 'wceazy') ?></h2>
    </div>
    <div class="wceazy_module_list_breadcrumb">
        <div class="wceazy_module_filter">
            <ul>
                <li class="active">All</li>
                <li>Active</li>
                <li>Inactive</li>
            </ul>
        </div>
        <div class="wceazy_module_search">
            <div class="search_bar">
                <input class="module_search" id="module_search" type="search" placeholder="Search module, please type 3 or more characters">
            </div>
        </div>
    </div>

        <div class="wceazy_module_list_items">
        <?php foreach ($this->utils->modules as $module) { ?>
            <div class="wceazy_module_item" data-slug="<?php echo esc_attr($module["module_slug"]); ?>">
                <div class="wceazy_module_item_left">
                    <div class="wceazy_module_logo">
                        <a target="_blank" href="#">
                            <img src="<?php echo esc_url(WCEAZY_MODULES_DIR . $module["module_slug"] . '/assets/img/' . $module["module_slug"].'.svg');?>" height="100" />
                        </a>
                    </div>
                    <div class="wceazy_module_settings">
                        <a target="_blank" href="#"><h3><?php echo esc_attr($module["module_title"]); ?></h3></a>
                        <div class="wceazy_module_switch">
                            <label class="toggle_switch">
                                <input type="checkbox" name="wceazy_module_toggle"
                                       onchange="wceazy_update_module_status(this)" <?php echo ($this->db->getModuleStatus ($module["module_slug"]) == 1 ? "checked" : ""); ?>>
                                <span class="slider round"></span>
                            </label>
                            <div class="settings <?php echo ($this->db->getModuleStatus ($module["module_slug"]) == 1 ? "active" : ""); ?>"
                                 onclick="wceazy_init_module_admin(this)">
                                <span class="dashicons dashicons-admin-generic"></span>
                                Settings
                            </div>
                        </div>

                    </div>
                    <p class="wceazy_module_docs"><a target="_blank" href="https://wceazy.com/docs">Documentation</a></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



