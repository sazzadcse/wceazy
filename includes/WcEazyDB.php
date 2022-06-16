<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'wcEazyDB' ) ) {
    class wcEazyDB
    {

        public $base_admin;

        function __construct() {

            $defaultOption = array();
            if(!get_option("wceazy_modules")){
                update_option( 'wceazy_modules', $defaultOption );
            }

        }

        public function init($base_admin){
            $this->base_admin = $base_admin;
            $this->initModuleStatus();
        }


        public function initModuleStatus(){
            $dataResults = get_option("wceazy_modules");
            foreach ($this->base_admin->utils->modules as $module){
                $is_exits = false;
                foreach ($dataResults as $singleData){
                    if(isset($singleData['module_slug'])){
                        if($singleData['module_slug'] == $module['module_slug']){
                            $is_exits = true;
                            break;
                        }
                    }
                }
                if(!$is_exits){
                    $dataResults[] = array("module_slug" => $module['module_slug'], "module_status" => 0);
                }
            }
            update_option( 'wceazy_modules', $dataResults );
        }

        public function updateModuleStatus($module_slug, $module_status){
            $dataNewResults = array();
            $dataResults = get_option("wceazy_modules");
            foreach ($dataResults as $singleData){
                if(isset($singleData['module_slug'])){
                    if($singleData['module_slug'] == $module_slug){
                        $singleData['module_status'] = (int) $module_status;
                    }
                }
                $dataNewResults[] = $singleData;
            }
            update_option( 'wceazy_modules', $dataNewResults );
        }

        /*
         * updateAllModuleStatus
         * @param $module_status - int
         *
         * return void
         */
        public function updateAllModuleStatus ($module_status)
        {
            $dataNewResults = array();
            $dataResults = get_option ("wceazy_modules");
            foreach ($dataResults as $singleData) {
                if (isset($singleData['module_slug'])) {
                    $singleData['module_status'] = (int)$module_status;
                }
                $dataNewResults[] = $singleData;
            }
            update_option ('wceazy_modules', $dataNewResults);
        }

        public function getModuleStatus($module_slug){
            $dataResults = get_option("wceazy_modules");
            foreach ($dataResults as $singleData){
                if(isset($singleData['module_slug'])){
                    if($singleData['module_slug'] == $module_slug){
                        return (int) $singleData['module_status'];
                    }
                }
            }
            return 0;
        }


    }
}
