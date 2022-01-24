<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package avril
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function avril_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'avril' ),
		'id' => 'avril-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'avril' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'avril' ),
		'id' => 'avril-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'avril' ),
		'before_widget' => '<div class="av-column-3 mb-av-0 mb-4"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );	
	
}
add_action( 'widgets_init', 'avril_widgets_init' );