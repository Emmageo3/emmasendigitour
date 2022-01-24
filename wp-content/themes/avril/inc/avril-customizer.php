<?php
/**
 * Avril Theme Customizer.
 *
 * @package Avril
 */

 if ( ! class_exists( 'Avril_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Avril_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'avril_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'avril_customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'avril_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'avril_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function avril_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';			
			
			
			/**
			 * Helper files
			 */
			 require AVRIL_PARENT_INC_DIR . '/custom-controls/font-control.php';
			 require AVRIL_PARENT_INC_DIR . '/sanitization.php';
		}
		

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function avril_customize_preview_js() {
			wp_enqueue_script( 'avril-customizer', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}
		
		function avril_customizer_script() {
			 wp_enqueue_script( 'avril-customizer-section', get_template_directory_uri() .'/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}

		// Include customizer customizer settings.
			
		function avril_customizer_settings() {	
			require AVRIL_PARENT_INC_DIR . '/customize/avril-header.php';
			require AVRIL_PARENT_INC_DIR . '/customize/avril-blog.php';
			require AVRIL_PARENT_INC_DIR . '/customize/avril-footer.php';
			require AVRIL_PARENT_INC_DIR . '/customize/avril-general.php';
			require AVRIL_PARENT_INC_DIR . '/customize/customizer_recommended_plugin.php';
			require AVRIL_PARENT_INC_DIR . '/customize/customizer_import_data.php';
			require AVRIL_PARENT_INC_DIR . '/customize/avril-premium.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Avril_Customizer::get_instance();