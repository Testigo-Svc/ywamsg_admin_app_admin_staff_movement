<?php

/**
 * Class To Handle WP Plugin Deactivate Event.
 */
class YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_DEACTIVATE {
    /**
     * Perform Plugin Deactivate 
     */
    public static function deactivate(){
        self::flush_cache();
        self::flush_permalink();
    }

    /**
     * Flush Cache
     */
    public static function flush_cache(){
        
    }

    /**
     * Flush Permalink
     */
    public static function flush_permalink(){
        
    }
}
?>