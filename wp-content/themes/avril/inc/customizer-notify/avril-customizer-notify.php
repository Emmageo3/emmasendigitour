<?php

class Avril_Customizer_Notify {

	private $recommended_actions;

	
	private $recommended_plugins;

	
	private static $instance;

	
	private $recommended_actions_title;

	
	private $recommended_plugins_title;

	
	private $dismiss_button;

	
	private $install_button_label;

	
	private $activate_button_label;

	
	private $avril_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Avril_Customizer_Notify ) ) {
			self::$instance = new Avril_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $avril_customizer_notify_recommended_plugins;
		global $avril_customizer_notify_recommended_actions;

		global $install_button_label;
		global $activate_button_label;
		global $avril_deactivate_button_label;

		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->recommended_actions_title = isset( $this->config['recommended_actions_title'] ) ? $this->config['recommended_actions_title'] : '';
		$this->recommended_plugins_title = isset( $this->config['recommended_plugins_title'] ) ? $this->config['recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$avril_customizer_notify_recommended_plugins = array();
		$avril_customizer_notify_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$avril_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->recommended_actions ) ) {
			$avril_customizer_notify_recommended_actions = $this->recommended_actions;
		}

		$install_button_label    = isset( $this->config['install_button_label'] ) ? $this->config['install_button_label'] : '';
		$activate_button_label   = isset( $this->config['activate_button_label'] ) ? $this->config['activate_button_label'] : '';
		$avril_deactivate_button_label = isset( $this->config['avril_deactivate_button_label'] ) ? $this->config['avril_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'avril_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'avril_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'avril_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'avril_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function avril_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'avril-customizer-notify-css', get_template_directory_uri() . '/inc/customizer-notify/css/avril-customizer-notify.css', array());

		wp_enqueue_style( 'avril-plugin-install' );
		wp_enqueue_script( 'avril-plugin-install' );
		wp_add_inline_script( 'avril-plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'avril-updates' );

		wp_enqueue_script( 'avril-customizer-notify-js', get_template_directory_uri() . '/inc/customizer-notify/js/avril-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'avril-customizer-notify-js', 'AvrilCustomizercompanionObject', array(
				'avril_ajaxurl'            => esc_url(admin_url( 'admin-ajax.php' )),
				'avril_template_directory' => esc_url(get_template_directory_uri()),
				'avril_base_path'          => esc_url(admin_url()),
				'avril_activating_string'  => __( 'Activating', 'avril' ),
			)
		);

	}

	
	public function avril_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/inc/customizer-notify/avril-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Avril_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Avril_Customizer_Notify_Section(
				$wp_customize,
				'Avril-customizer-notify-section',
				array(
					'title'          => $this->recommended_actions_title,
					'plugin_text'    => $this->recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function avril_customizer_notify_dismiss_recommended_action_callback() {

		global $avril_customizer_notify_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			
			if ( get_theme_mod( 'avril_customizer_notify_show' ) ) {

				$avril_customizer_notify_show_recommended_actions = get_theme_mod( 'avril_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$avril_customizer_notify_show_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$avril_customizer_notify_show_recommended_actions[ $action_id ] = false;
						break;
				}
				echo esc_html($avril_customizer_notify_show_recommended_actions);
				
			} else {
				$avril_customizer_notify_show_recommended_actions = array();
				if ( ! empty( $avril_customizer_notify_recommended_actions ) ) {
					foreach ( $avril_customizer_notify_recommended_actions as $avril_lite_customizer_notify_recommended_action ) {
						if ( $avril_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$avril_customizer_notify_show_recommended_actions[ $avril_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$avril_customizer_notify_show_recommended_actions[ $avril_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					echo esc_html($avril_customizer_notify_show_recommended_actions);
				}
			}
		}
		die(); 
	}

	
	public function avril_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			$avril_lite_customizer_notify_show_recommended_plugins = get_theme_mod( 'avril_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$avril_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$avril_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			echo esc_html($avril_customizer_notify_show_recommended_actions);
		}
		die(); 
	}

}
