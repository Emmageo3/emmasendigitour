<?php
/**
 * @package   Aravalli
 */
 
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/above-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-checkin.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-room.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-amenities.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-features.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-typography.php';

if ( ! function_exists( 'cleverfox_aravalli_frontpage_sections' ) ) :
	function cleverfox_aravalli_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/section-checkin.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/section-room.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/section-amenities.php';
	    require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/section-features.php';
    }
	add_action( 'aravalli_sections', 'cleverfox_aravalli_frontpage_sections' );
endif;

// function cleverfox_aravalli_enqueue_scripts() {
	// wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/animate.css');
	// wp_enqueue_style('owl-carousel-min',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/owl.carousel.min.css');
	// wp_enqueue_script( 'owl-carousel', CLEVERFOX_PLUGIN_URL . 'inc/assets/js/owl.carousel.min.js', array('jquery'), false, true);
// }
// add_action( 'wp_enqueue_scripts', 'cleverfox_aravalli_enqueue_scripts' );