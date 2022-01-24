<?php
if( ! function_exists( 'cleverfox_fiona_blog_dynamic_styles' ) ):
    function cleverfox_fiona_blog_dynamic_styles() {
		$output_css = '';
		
		
		/**
		 * Logo Width 
		 */
		 $logo_width			= get_theme_mod('logo_width','140');		 
		if($logo_width !== '') { 
				$output_css .=".logo img, .mobile-logo img {
					max-width: " .esc_attr($logo_width). "px;
				}\n";
			}
		
		/**
		 *  Typography Body
		 */
		 $fiona_blog_body_text_transform	 	 = get_theme_mod('fiona_blog_body_text_transform','inherit');
		 $fiona_blog_body_font_style	 		 = get_theme_mod('fiona_blog_body_font_style','inherit');
		 $fiona_blog_body_font_size	 		 = get_theme_mod('fiona_blog_body_font_size','15');
		 $fiona_blog_body_line_height		 = get_theme_mod('fiona_blog_body_line_height','1.5');
		
		 $output_css .=" body{ 
			font-size: " .esc_attr($fiona_blog_body_font_size). "px;
			line-height: " .esc_attr($fiona_blog_body_line_height). ";
			text-transform: " .esc_attr($fiona_blog_body_text_transform). ";
			font-style: " .esc_attr($fiona_blog_body_font_style). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {	
			 $fiona_blog_heading_text_transform 	= get_theme_mod('fiona_blog_h' . $i . '_text_transform','inherit');
			 $fiona_blog_heading_font_style	 	= get_theme_mod('fiona_blog_h' . $i . '_font_style','inherit');
			 $fiona_blog_heading_font_size	 		 = get_theme_mod('fiona_blog_h' . $i . '_font_size');
			 $fiona_blog_heading_line_height		 	 = get_theme_mod('fiona_blog_h' . $i . '_line_height');
			 
			 $output_css .=" h" . $i . "{ 
				font-size: " .esc_attr($fiona_blog_heading_font_size). "px;
				line-height: " .esc_attr($fiona_blog_heading_line_height). ";
				text-transform: " .esc_attr($fiona_blog_heading_text_transform). ";
				font-style: " .esc_attr($fiona_blog_heading_font_style). ";
			}\n";
		 }
		 
		 
		/**
		 * Slider
		 */
		$slider_opacity						 = get_theme_mod('slider_opacity','0.5');
				$output_css .=".theme-slider:after {
					opacity: " .esc_attr($slider_opacity). ";
					background: #000000;
				}\n";
			
	 wp_add_inline_style( 'fiona-blog-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'cleverfox_fiona_blog_dynamic_styles' );