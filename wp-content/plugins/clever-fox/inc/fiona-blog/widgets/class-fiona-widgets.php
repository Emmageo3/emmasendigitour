<?php
/**
 * Fiona Widgets - Loader.
 *
 * @package Fiona Widget
 * @since 1.0.0
 */

if ( ! class_exists( 'Fiona_Widgets_Loader' ) ) {

	/**
	 * Customizer Initialization
	 *
	 * @since 1.0.0
	 */
	class Fiona_Widgets_Loader {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {


			// Add Widget.
			require_once CLEVERFOX_PLUGIN_DIR . '/inc/fiona-blog/widgets/class-social-icons.php';
			require_once CLEVERFOX_PLUGIN_DIR . '/inc/fiona-blog/widgets/class-social-widget.php';
			require_once CLEVERFOX_PLUGIN_DIR . '/inc/fiona-blog/widgets/class-post-slider-widget.php';
			require_once CLEVERFOX_PLUGIN_DIR . '/inc/fiona-blog/widgets/class-author-widget.php';

			 add_action( 'widgets_init', array( $this, 'register_fiona_blog_widgets' ) );
			 add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			 add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		}
		
		function enqueue_scripts() {
				wp_enqueue_style( 'fiona-blog-front-widget-css', CLEVERFOX_PLUGIN_URL . '/inc/fiona-blog/widgets/assets/css/widget.css', false );		
				wp_enqueue_style('font-awesome',FIONA_BLOG_PARENT_URI .'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
			}
			
		function enqueue_admin_scripts() {
			 wp_enqueue_style( 'wp-color-picker');
			 
			 wp_enqueue_script( 'fiona-blog-social-icon-widget-js', CLEVERFOX_PLUGIN_URL .'/inc/fiona-blog/widgets/assets/js/main.js', array( 'jquery', 'jquery-ui-sortable' ) );
			 
			 wp_enqueue_style( 'fiona-blog-social-icon-widget-css', CLEVERFOX_PLUGIN_URL . '/inc/fiona-blog/widgets/assets/css/admin.css', false );
			 
			 wp_enqueue_style('font-awesome',FIONA_BLOG_PARENT_URI .'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
			 
			 wp_enqueue_style( 'fiona-blog-icon-picker-css', CLEVERFOX_PLUGIN_URL . '/inc/fiona-blog/widgets/assets/fonticonpicker/jquery.fonticonpicker.min.css', false );
			 
			 wp_enqueue_script( 'wp-color-picker');
			 
			 wp_enqueue_script( 'fiona-blog-icon-picker-js', CLEVERFOX_PLUGIN_URL .'/inc/fiona-blog/widgets/assets/fonticonpicker/jquery.fonticonpicker.min.js', array( 'jquery', 'jquery-ui-sortable' ) );
		}
		
		/**
		 * Regiter List Icons widget
		 *
		 * @return void
		 */
		function register_fiona_blog_widgets() {
			register_widget( 'fiona_blog_social_icon_widget' );
			register_widget( 'fiona_blog_post_categories_widget' );
			register_widget( 'fiona_blog_author_widget' );
		}
		
	}
}

/**
*  Kicking this off by calling 'get_instance()' method
*/
Fiona_Widgets_Loader::get_instance();
