<?php

/**
 * Plugin Name: YWAMSG - Staff Movement (Admin)
 * Description: Contains (Admin) Staff Movement Capabilities for YWAM SG
 * Version: 1.0
 * Author: TESTIGO SERVICE TEAM
 * License: GPL 2.0 or later
 */

 
// Abort, If File Is Called Directly.
if(! defined('WPINC')){ die; }

/**
 * Define Plugin DB Version
 */
$TESTIGO_PLUGIN_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DB_VERSION = "1.0";

/**
 * Call When Plugin Is Delete
 */
function ywamsg_admin_app_admin_staff_movement_uninstall(){
    require_once plugin_dir_path(__FILE__).'wp_framework/wp_uninstall.php';
    YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_UNINSTALL::uninstall();
}

/**
 * Plugin Dependency Not Met Admin Notice Error
 */
function ywamsg_admin_app_admin_staff_movement_admin_notice_plugin_dependency(){
    $msg_str =  '<div class="notice notice-error is-dismissible">';
    $msg_str .= '<p>';
    $msg_str .= '<strong>Important : Plugin [ YWAM SG - Staff Movement (Admin) ]</strong>';
    $msg_str .= ' is <strong>deactivated</strong> because its dependency plugins';
    $msg_str .= ' <br><strong>[ YWAMSG - Core ]</strong> is <strong>not found</strong> or <strong>deactivated</strong>';    
    $msg_str .= '</p>';
    $msg_str .= '</div>'; 
    echo  $msg_str; 
}

/**
 * Check Plugin Dependencies
 */
function ywamsg_admin_app_admin_staff_movement_check_plugin_dependency(){
    $requirement_met = true;
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if(!is_plugin_active('ywamsg_core/app.php')){
        return false;
    }    
    return $requirement_met;
}


/**
 * Call When Plugin Is Activate
 */
function ywamsg_admin_app_admin_staff_movement_activate(){
    global $TESTIGO_PLUGIN_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DB_VERSION;

    if(ywamsg_admin_app_admin_staff_movement_check_plugin_dependency()){
        require_once plugin_dir_path(__FILE__).'wp_framework/wp_activate.php';
        YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_ACTIVATE::activate($TESTIGO_PLUGIN_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DB_VERSION);
        register_uninstall_hook(__FILE__, 'ywamsg_admin_app_admin_staff_movement_uninstall');
    } else {
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        deactivate_plugins('ywamsg_admin_app_admin_staff_movement/app.php', true);
        add_action( 'admin_notices', 'ywamsg_admin_app_admin_staff_movement_admin_notice_plugin_dependency' );
    }
}

/**
 * Register Activation Hook
 */
register_activation_hook(__FILE__, 'ywamsg_admin_app_admin_staff_movement_activate');

/**
 * Call When Plugin Is Deactivate
 */
function ywamsg_admin_app_admin_staff_movement_deactivate(){
    require_once plugin_dir_path(__FILE__).'wp_framework/wp_deactivate.php';
    YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DEACTIVATE::deactivate();
}

/**
 * Register Deactivation Hook
 */
register_deactivation_hook(__FILE__,'ywamsg_admin_app_admin_staff_movement_deactivate');

/**
 * Call To Check Whether DB Upgrade Is Required
 */
function ywamsg_admin_app_admin_staff_movement_db_upgrade_check(){
    global $TESTIGO_PLUGIN_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DB_VERSION;
    require_once plugin_dir_path(__FILE__).'wp_framework/wp_upgrade.php';
    YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_UPGRADE::upgrade($TESTIGO_PLUGIN_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DB_VERSION);
}

/**
 * Check For Database Upgrade When Plugin Is Loaded
 */
add_action('plugins_loaded', 'ywamsg_admin_app_admin_staff_movement_db_upgrade_check');

/**
 * Check For Plugin Dependency
 */
if(!ywamsg_admin_app_admin_staff_movement_check_plugin_dependency()){
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    deactivate_plugins('ywamsg_admin_app_admin_staff_movement/app.php', true);
    add_action( 'admin_notices', 'ywamsg_admin_app_admin_staff_movement_admin_notice_plugin_dependency' );
}

/**
 * Load Plugin Setting
 */
require_once plugin_dir_path(__FILE__).'wp_framework/wp_setting.php';
new YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_SETTING();

require plugin_dir_path(__FILE__).'plugin.php';
function ywamsg_admin_app_admin_staff_movement_start_plugin(){
    $plugin = new YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_PLUGIN();
    $plugin->start();
}
ywamsg_admin_app_admin_staff_movement_start_plugin();

?>