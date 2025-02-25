<?php

class YWAMSG_ADMIN_APP_ADMIN_STAFF_MOVEMENT_SETTING
{
    
    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'ywamsg_core_staff_movement_setting_add_admin_menu') );
        add_action( 'admin_init', array( $this, 'ywamsg_core_staff_movement_setting_init' ));
    }

    public function ywamsg_core_staff_movement_setting_add_admin_menu() {
        add_submenu_page( 'YWAMSG SETTING', 'YWAMSG SETTING', 'Staff Movement', 'manage_options', 'ywamsg_core_staff_movement', array( $this, 'ywamsg_core_staff_movement_setting_render_setting_page' ));
	}

    public function ywamsg_core_staff_movement_setting_init(  ) { 

        register_setting( 'ywamsg_core_staff_movement_setting_page', 'ywamsg_core_staff_movement_setting_group', array($this, 'ywamsg_core_staff_movement_options_validate') );
    
        add_settings_section(
            'ywamsg_core_staff_movement_setting_section', 
            __( '', 'domain' ), 
            array($this, 'ywamsg_core_staff_movement_setting_section_callback'), 
            'ywamsg_core_staff_movement_setting_page'
        );
    
        add_settings_field( 
            'ywamsg_core_staff_movement_setting_telegram_bot_id', 
            __( 'Telegram Bot API Token', 'domain' ), 
            array($this,'ywamsg_core_staff_movement_setting_telegram_bot_id_render'), 
            'ywamsg_core_staff_movement_setting_page', 
            'ywamsg_core_staff_movement_setting_section' 
        );

    }

    function ywamsg_core_staff_movement_options_validate( $input ) {        
        $newinput['ywamsg_core_staff_movement_setting_telegram_bot_id'] = trim( $input['ywamsg_core_staff_movement_setting_telegram_bot_id'] );        
        // if ( ! preg_match( '/^[0-9]$/i', $newinput['ywamsg_core_staff_movement_setting_telegram_bot_id'] ) ) {
        //     $newinput['ywamsg_core_staff_movement_setting_telegram_bot_id'] = '';
          
        //     add_settings_error(
        //         'ywamsg_core_staff_movement_setting_telegram_bot_id',
        //         '500',
        //         'Please Enter A Valid Telegram Bot API Token',
        //         'error'
        //     );
        // }
    
        return $newinput;
    }
    
    public function ywamsg_core_staff_movement_setting_telegram_bot_id_render(  ) { 

        $options = get_option( 'ywamsg_core_staff_movement_setting_group' );
        ?>
        <input style="width:100%;" type='text' name='ywamsg_core_staff_movement_setting_group[ywamsg_core_staff_movement_setting_telegram_bot_id]' value='<?php if(isset($options['ywamsg_core_staff_movement_setting_telegram_bot_id'])){echo esc_attr($options['ywamsg_core_staff_movement_setting_telegram_bot_id']);}else{echo'';}  ?>'>
        <br>Telegram Bot API token
        <?php
    
    }

    
    public function ywamsg_core_staff_movement_setting_section_callback(  ) { 

        echo __( '', 'domain' );
    
    }

    public function ywamsg_core_staff_movement_setting_render_setting_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>YWAMSG - External Notification</h2>

			<?php
            settings_errors();
			settings_fields( 'ywamsg_core_staff_movement_setting_page' );
			do_settings_sections( 'ywamsg_core_staff_movement_setting_page' );
			submit_button();
			?>

		</form>
		<?php

    }

}

?>