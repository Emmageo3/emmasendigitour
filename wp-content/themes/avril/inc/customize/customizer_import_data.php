<?php
class avril_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof avril_import_dummy_data ) ) {
			self::$instance = new avril_import_dummy_data;
			self::$instance->avril_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function avril_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'avril_import_customize_scripts' ), 0 );

	}
	
	

	public function avril_import_customize_scripts() {

	wp_enqueue_script( 'avril-import-customizer-js', get_template_directory_uri() . '/assets/js/avril-import-customizer.js', array( 'customize-controls' ) );
	}
}

$avril_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
avril_import_dummy_data::init( apply_filters( 'avril_import_customizer', $avril_import_customizers ) );