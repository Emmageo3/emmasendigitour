<?php
/**
 * @package   Conceptly
 */
 
require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/azwa/sections/above-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/azwa/features/azwa-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/features/conceptly-call-to-action.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/features/conceptly-features.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/features/conceptly-info.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/features/conceptly-service.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/azwa/features/azwa-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/features/conceptly-sponsers.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/features/conceptly-typography.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/features/conceptly-navigation.php';

if ( ! function_exists( 'cleverfox_conceptly_frontpage_sections' ) ) :
	function cleverfox_conceptly_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/azwa/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/sections/section-flash.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/azwa/sections/section-service.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/sections/section-features.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/sections/section-cta.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/conceptly/sections/section-sponser.php';
    }
	add_action( 'conceptly_sections', 'cleverfox_conceptly_frontpage_sections' );
endif;

function cleverfox_conceptly_enqueue_scripts() {
	wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/animate.css');
	wp_enqueue_style('owl-carousel-min',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/owl.carousel.min.css');
	wp_enqueue_script( 'owl-carousel', CLEVERFOX_PLUGIN_URL . 'inc/assets/js/owl.carousel.min.js', array('jquery'), false, true);
	wp_enqueue_script('owlCarousel2Thumbs', CLEVERFOX_PLUGIN_URL . 'inc/assets/js/owlCarousel2Thumbs.min.js', array('jquery'), false, true);
}
add_action( 'wp_enqueue_scripts', 'cleverfox_conceptly_enqueue_scripts' );