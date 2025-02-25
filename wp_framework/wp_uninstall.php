<?php

/**
 * Class To Handle WP Plugin Delete Event.
 */
class YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_UNINSTALL {
    /**
     * Perform Plugin Delete 
     */
    public static function uninstall(){
        self::remove_table();
        self::remove_option();
    }

    /**
     * Remove Plugin Table
     */
    public static function remove_table(){
        global $wpdb;
 
    }

    /**
     * Remove Option
     */
    public static function remove_option(){
        delete_option("YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DB_VERSION");        
    }
}
?>