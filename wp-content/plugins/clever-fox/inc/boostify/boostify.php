<?php
/**
 * @package   Boostify
 */
 
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/sections/above-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/sections/above-footer.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/features/boostify-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/features/boostify-footer.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/features/boostify-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/features/boostify-info.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/features/boostify-service.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/features/boostify-features.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/features/boostify-testimonial.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/features/boostify-typography.php';

if ( ! function_exists( 'cleverfox_boostify_frontpage_sections' ) ) :
	function cleverfox_boostify_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/sections/section-info.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/sections/section-features.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/sections/section-service.php';
	    require CLEVERFOX_PLUGIN_DIR . 'inc/boostify/sections/section-testimonial.php';
    }
	add_action( 'boostify_sections', 'cleverfox_boostify_frontpage_sections' );
endif;

function cleverfox_boostify_enqueue_scripts() {
	wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/animate.css');
}
add_action( 'wp_enqueue_scripts', 'cleverfox_boostify_enqueue_scripts' );