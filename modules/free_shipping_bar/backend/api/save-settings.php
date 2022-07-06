<?php
/**
 * save settings api
 */

$result = array();

/* Check if user has manage option capabilities */
if (current_user_can ('manage_options')) {

    if ($this->base_admin->base_admin->db->getModuleStatus ($this->base_admin->module_slug)) {
        $post_data = array();
        $final_data = array();
        $wceazy_fsb_dont_show_pages = [];
        $wceazy_fsb_exclude_products = [];

        if (isset($_REQUEST) && $_REQUEST['data']) {

            $post_data = $_REQUEST['data'];

            //generate final post data
            foreach ( $post_data as $item ){
                if( $item['name'] == 'wceazy_fsb_dont_show_pages' ){
                    $wceazy_fsb_dont_show_pages[] =  $item['value'];
                    $final_data[ $item['name'] ] = implode (',', $wceazy_fsb_dont_show_pages);
                } else if( $item['name'] == 'wceazy_fsb_exclude_products' ){
                    $wceazy_fsb_exclude_products[] =  $item['value'];
                    $final_data[ $item['name'] ] = implode (',', $wceazy_fsb_exclude_products);
                } else{
                    $final_data[ $item['name'] ] = $item['value'];
                }
            }

        } else {
            $result = array("status" => 'false');
        }

        if ($this->base_admin->utils->save_settings ($final_data)) {
            $result = array("status" => 'true');
        } else {
            $result = array("status" => 'false');
        }

    } else {
        $result = array("status" => 'false');
    }

} else {
    $result = array("status" => 'false');
}

echo json_encode ($result, JSON_UNESCAPED_UNICODE);