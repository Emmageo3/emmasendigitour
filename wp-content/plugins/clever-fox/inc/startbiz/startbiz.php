<?php
/**
 * @package   StartBiz
 */

require CLEVERFOX_PLUGIN_DIR . 'inc/startbiz/sections/contact-info.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/extras.php'; 
require CLEVERFOX_PLUGIN_DIR . 'inc/startbiz/features/startbiz-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-info.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-service.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-testimonial.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/navigation.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/features/section-typography.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/typography_style.php';


if ( ! function_exists( 'cleverfox_startbiz_frontpage_sections' ) ) :
	function cleverfox_startbiz_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/startbiz/sections/section-flash.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/startbiz/sections/section-service.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/startkit/sections/section-testimonial.php';
    }
	add_action( 'startkit_sections', 'cleverfox_startbiz_frontpage_sections' );
endif;

function cleverfox_startbiz_enqueue_scripts() {
	wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/animate.css');
	//wp_enqueue_style('owl-theme-default-min',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/owl.theme.default.min.css');
	wp_enqueue_style('owl-carousel-min',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/owl.carousel.min.css');
	wp_enqueue_script( 'owl-carousel', CLEVERFOX_PLUGIN_URL . 'inc/assets/js/owl.carousel.min.js', array('jquery'), false, true);
}
add_action( 'wp_enqueue_scripts', 'cleverfox_startbiz_enqueue_scripts' );
