<?php

/**
 * Entry Point To This Plugin
 */

 class YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_PLUGIN{

    public function start(){
        self::load_action();
        self::load_shortcode();
    }

    /**
     * Load Plugin Actions
     */
    public static function load_action(){
       
    }

    /**
     * Load Plugin Short Codes
     */
    public static function load_shortcode(){
        // require_once plugin_dir_path(__FILE__).'shortcode/ywamsg_admin_app_admin_staff_movement_sc_m_organization_chart/shortcode.php';
        // require_once plugin_dir_path(__FILE__).'shortcode/ywamsg_admin_app_admin_staff_movement_sc_m_ministry_member/shortcode.php';    
        // require_once plugin_dir_path(__FILE__).'shortcode/ywamsg_admin_app_admin_staff_movement_sc_m_base_leadership/shortcode.php';                  
    }
 }
?>