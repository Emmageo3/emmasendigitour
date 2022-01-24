<?php
/**
 * @package   Fiona
 */
 
require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/sections/above-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-food/sections/section-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/features/fiona-blog-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/features/fiona-blog-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/features/fiona-blog-weekend-top.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/features/fiona-blog-typography.php';

if ( ! function_exists( 'cleverfox_fiona_blog_frontpage_sections' ) ) :
	function cleverfox_fiona_blog_frontpage_sections() {	
		
		require CLEVERFOX_PLUGIN_DIR . 'inc/fiona-blog/sections/section-weekend-top.php';
    }
	add_action( 'fiona_blog_sections', 'cleverfox_fiona_blog_frontpage_sections' );
endif;

function cleverfox_fiona_blog_enqueue_scripts() {
	wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/animate.css');
}
add_action( 'wp_enqueue_scripts', 'cleverfox_fiona_blog_enqueue_scripts' );