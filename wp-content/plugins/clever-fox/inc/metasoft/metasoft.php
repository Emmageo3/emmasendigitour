<?php
/**
 * @package   Metasoft
 */
 
require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/sections/above-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/features/metasoft-header.php';
// require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/features/metasoft-cta.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/features/metasoft-expertise.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/features/metasoft-info.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/features/metasoft-service.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/features/metasoft-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/features/metasoft-typography.php';

if ( ! function_exists( 'cleverfox_metasoft_frontpage_sections' ) ) :
	function cleverfox_metasoft_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/sections/section-info.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/sections/section-service.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/metasoft/sections/section-expertise.php';
    }
	add_action( 'metasoft_sections', 'cleverfox_metasoft_frontpage_sections' );
endif;

function cleverfox_metasoft_enqueue_scripts() {
	wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/animate.css');
}
add_action( 'wp_enqueue_scripts', 'cleverfox_metasoft_enqueue_scripts' );