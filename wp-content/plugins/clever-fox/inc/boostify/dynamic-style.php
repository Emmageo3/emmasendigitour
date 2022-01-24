<?php
if( ! function_exists( 'cleverfox_boostify_dynamic_style' ) ):
    function cleverfox_boostify_dynamic_style() {

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
		 * Slider
		 */
		$slider_overlay_enable 				 = get_theme_mod('slider_overlay_enable');
		$slide_overlay_color 				 = get_theme_mod('slide_overlay_color','#fff');
		$slider_opacity						 = get_theme_mod('slider_opacity');
		if($slider_overlay_enable == '1') { 
				$output_css .=".theme-slider:after {
					opacity: " .esc_attr($slider_opacity). ";
					background: " .esc_attr($slide_overlay_color). ";
				}\n";
			}
		
		
		/**
		 *  Typography Body
		 */
		 $boostify_body_text_transform	 	 = get_theme_mod('boostify_body_text_transform','inherit');
		 $boostify_body_font_style	 		 = get_theme_mod('boostify_body_font_style','inherit');
		 $boostify_body_font_size	 		 = get_theme_mod('boostify_body_font_size','15');
		 $boostify_body_line_height		 	= get_theme_mod('boostify_body_line_height','1.5');
		
		 $output_css .=" body,p{ 
			font-size: " .esc_attr($boostify_body_font_size). "px;
			line-height: " .esc_attr($boostify_body_line_height). ";
			text-transform: " .esc_attr($boostify_body_text_transform). ";
			font-style: " .esc_attr($boostify_body_font_style). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {	
			 $boostify_heading_text_transform 	= get_theme_mod('boostify_h' . $i . '_text_transform','inherit');
			 $boostify_heading_font_style	 	= get_theme_mod('boostify_h' . $i . '_font_style','inherit');
			 $boostify_heading_font_size	 		 = get_theme_mod('boostify_h' . $i . '_font_size');
			 $boostify_heading_line_height		 	 = get_theme_mod('boostify_h' . $i . '_line_height');
			 
			 $output_css .=" h" . $i . "{ 
				font-size: " .esc_attr($boostify_heading_font_size). "px;
				line-height: " .esc_attr($boostify_heading_line_height). ";
				text-transform: " .esc_attr($boostify_heading_text_transform). ";
				font-style: " .esc_attr($boostify_heading_font_style). ";
			}\n";
		 }
		
		
        wp_add_inline_style( 'boostify-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'cleverfox_boostify_dynamic_style' );