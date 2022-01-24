<?php
if( ! function_exists( 'cleverfox_metasoft_dynamic_styles' ) ):
    function cleverfox_metasoft_dynamic_styles() {
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
		 $metasoft_body_text_transform	 	 = get_theme_mod('metasoft_body_text_transform','inherit');
		 $metasoft_body_font_style	 		 = get_theme_mod('metasoft_body_font_style','inherit');
		 $metasoft_body_font_size	 		 = get_theme_mod('metasoft_body_font_size','16');
		 $metasoft_body_line_height		 = get_theme_mod('metasoft_body_line_height','1.5');
		
		 $output_css .=" body{ 
			font-size: " .esc_attr($metasoft_body_font_size). "px;
			line-height: " .esc_attr($metasoft_body_line_height). ";
			text-transform: " .esc_attr($metasoft_body_text_transform). ";
			font-style: " .esc_attr($metasoft_body_font_style). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {	
			 $metasoft_heading_text_transform 	= get_theme_mod('metasoft_h' . $i . '_text_transform','inherit');
			 $metasoft_heading_font_style	 	= get_theme_mod('metasoft_h' . $i . '_font_style','inherit');
			 $metasoft_heading_font_size	 		 = get_theme_mod('metasoft_h' . $i . '_font_size');
			 $metasoft_heading_line_height		 	 = get_theme_mod('metasoft_h' . $i . '_line_height');
			 
			 $output_css .=" h" . $i . "{ 
				font-size: " .esc_attr($metasoft_heading_font_size). "px;
				line-height: " .esc_attr($metasoft_heading_line_height). ";
				text-transform: " .esc_attr($metasoft_heading_text_transform). ";
				font-style: " .esc_attr($metasoft_heading_font_style). ";
			}\n";
		 }
		 
		 
		/**
		 * Slider
		 */
		$slider_opacity				 = get_theme_mod('slider_opacity','0.6');
			$output_css .=".theme-slider:after {
				opacity: " .esc_attr($slider_opacity). ";
			}\n";
			
	 wp_add_inline_style( 'metasoft-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'cleverfox_metasoft_dynamic_styles' );