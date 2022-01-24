<?php
if( ! function_exists( 'cleverfox_aravalli_dynamic_style' ) ):
    function cleverfox_aravalli_dynamic_style() {

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
		$slide_overlay_color 		 = get_theme_mod('slide_overlay_color','#000000');
		$slider_opacity				 = get_theme_mod('slider_opacity','0.5');
		list($r, $g, $b) = sscanf($slide_overlay_color, "#%02x%02x%02x");
			$output_css .=".theme-slider {
				background: rgba($r, $g, $b, $slider_opacity);
			}\n";
		
		

		/**
		 *  Typography Body
		 */
		 $aravalli_body_text_transform	 	 = get_theme_mod('aravalli_body_text_transform','inherit');
		 $aravalli_body_font_style	 		 = get_theme_mod('aravalli_body_font_style','inherit');
		 $aravalli_body_font_size	 		 = get_theme_mod('aravalli_body_font_size','15');
		 $aravalli_body_line_height		 = get_theme_mod('aravalli_body_line_height','1.5');
		
		 $output_css .=" body{ 
			font-size: " .esc_attr($aravalli_body_font_size). "px;
			line-height: " .esc_attr($aravalli_body_line_height). ";
			text-transform: " .esc_attr($aravalli_body_text_transform). ";
			font-style: " .esc_attr($aravalli_body_font_style). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {	
			 $aravalli_heading_text_transform 	= get_theme_mod('aravalli_h' . $i . '_text_transform','inherit');
			 $aravalli_heading_font_style	 	= get_theme_mod('aravalli_h' . $i . '_font_style','inherit');
			 $aravalli_heading_font_size	 		 = get_theme_mod('aravalli_h' . $i . '_font_size');
			 $aravalli_heading_line_height		 	 = get_theme_mod('aravalli_h' . $i . '_line_height');
			 
			 $output_css .=" h" . $i . "{ 
				font-size: " .esc_attr($aravalli_heading_font_size). "px;
				line-height: " .esc_attr($aravalli_heading_line_height). ";
				text-transform: " .esc_attr($aravalli_heading_text_transform). ";
				font-style: " .esc_attr($aravalli_heading_font_style). ";
			}\n";
		 }
		
        wp_add_inline_style( 'aravalli-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'cleverfox_aravalli_dynamic_style' );