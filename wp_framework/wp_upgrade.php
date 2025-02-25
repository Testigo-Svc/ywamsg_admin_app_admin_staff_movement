<?php

/**
 * Class To Handle WP Plugin Upgrade Event.
 */
class YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_UPGRADE {
     /**
     * Perform Plugin Upgrade 
     */
    public static function upgrade($new_db_version){
        $current_db_version = get_option( "YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DB_VERSION" );
        //Db Version Is Not The Same, Hence Need To Perform Database Upgrade
        if($new_db_version != $current_db_version){
            self::create_table($new_db_version);
            self::insert_table_data();
        }
    }

    /**
    * Create Table 
    */
    public static function create_table($new_db_version){
        global $wpdb;   
        add_option( 'YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DB_VERSION', $new_db_version );
    }

    /**
    * Insert Sample Data
    */
    public static function insert_table_data(){
        global $wpdb; 

        
    }
}

?>