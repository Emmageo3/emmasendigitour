<?php
if( ! function_exists( 'hantus_customizer_options' ) ):
    function hantus_customizer_options() {
			$slider_overlay_enable 				 = get_theme_mod('slider_overlay_enable','1');
			$slide_overlay_color 				 = get_theme_mod('slide_overlay_color','#000000');
			$slider_opacity						 = get_theme_mod('slider_opacity','0.4'); 
			$slide_title_color 					 = get_theme_mod('slide_title_color','#fff');
			$slide_sbtitle_color 				 = get_theme_mod('slide_sbtitle_color');
			$slide_desc_color 					 = get_theme_mod('slide_desc_color','#fff');
			 $output_css = '';
			if($slider_overlay_enable == '1') { 
				$output_css .=".header-single-slider:after {
					opacity: " .esc_attr($slider_opacity). ";
					background: " .esc_attr($slide_overlay_color). ";
				}\n";
			}
			
			$output_css .=".header-slider .theme-content h3 {
					color: " .esc_attr($slide_title_color). ";
				}.header-slider .theme-content h1 {
					color: " .esc_attr($slide_sbtitle_color). " !important;
				}.header-slider .theme-content p {
					color: " .esc_attr($slide_desc_color). ";
				}\n";
				
		$hide_show_typography= get_theme_mod('hide_show_typography','off');
		if( $hide_show_typography == '1' ){
			/**
			 *  Typography Body
			 */
			$body_typography_font_weight 	= get_theme_mod('body_typography_font_weight','normal');
			$body_font_size 				= get_theme_mod('body_font_size','16');
			$body_line_height 				= get_theme_mod('body_line_height','1.6');
			$output_css .=" body{ 
				font-size: " .esc_attr($body_font_size). "px;
				line-height: " .esc_attr($body_line_height). ";
				font-style: " .esc_attr($body_typography_font_weight). ";
			}\n";
			
			/**
			 *  Typography Menu
			 */
			$menu_text_transform 			= get_theme_mod('menu_text_transform','inherit');
			$menu_font_weight 				= get_theme_mod('menu_font_weight','normal');
			$menu_font_size 				= get_theme_mod('menu_font_size','15');
			$menu_line_height 				= get_theme_mod('menu_line_height','1.6');
			$output_css .=" .main-menu li a{ 
				text-transform:" .esc_attr($menu_text_transform). ";
				font-size: " .esc_attr($menu_font_size). "px;
				line-height: " .esc_attr($menu_line_height). ";
				font-style: " .esc_attr($menu_font_weight). ";
			}\n";
			
			/**
			 *  Typography Section
			 */
			$sec_ttl_text_transform 		= get_theme_mod('sec_ttl_text_transform','inherit');
			$section_tit_font_weight 		= get_theme_mod('section_tit_font_weight','normal');
			$section_tit_font_size 			= get_theme_mod('section_tit_font_size','36');
			$section_ttl_line_height 		= get_theme_mod('section_ttl_line_height','1.6');
			
			$sec_desc_text_transform 		= get_theme_mod('sec_desc_text_transform','inherit');
			$section_des_font_weight 		= get_theme_mod('section_des_font_weight','normal');
			$section_desc_font_size 			= get_theme_mod('section_desc_font_size','16');
			$section_desc_line_height 		= get_theme_mod('section_desc_line_height','1.6');
			
			$output_css .=" .section-title h2{ 
				text-transform:" .esc_attr($sec_ttl_text_transform). ";
				font-size: " .esc_attr($section_tit_font_size). "px;
				line-height: " .esc_attr($section_ttl_line_height). ";
				font-style: " .esc_attr($section_tit_font_weight). ";
			}\n";
			
			$output_css .=" .section-title p{ 
				text-transform:" .esc_attr($sec_desc_text_transform). ";
				font-size: " .esc_attr($section_desc_font_size). "px;
				line-height: " .esc_attr($section_desc_line_height). ";
				font-style: " .esc_attr($section_des_font_weight). ";
			}\n";
			
			/**
			 *  Typography Heading
			 */
			 for ( $i = 1; $i <= 6; $i++ ) {
			if($i  == '1'){$j=36;}elseif($i  == '2'){$j=32;}elseif($i  == '3'){$j=28;}elseif($i  == '4'){$j=24;}elseif($i  == '5'){$j=20;}else{$j=16;}
				 $heading_font_weight	    	= get_theme_mod('h' . $i . '_font_weight','normal');	
				 $heading_font_size	 			= get_theme_mod('h' . $i . '_font_size',$j);
				 $heading_line_height			= get_theme_mod('h' . $i . '_line_height','1.2');
				 $heading_text_transform		= get_theme_mod('h' . $i . '_text_transform','inherit');
				 
				 $output_css .=" h" . $i . "{ 
					font-style: " .esc_attr($heading_font_weight). ";
					text-transform: " .esc_attr($heading_text_transform). ";
					font-size: " .esc_attr($heading_font_size). "px;
					line-height: " .esc_attr($heading_line_height). ";
				}\n";
			 }	
		} 
	 wp_add_inline_style( 'hantus-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'hantus_customizer_options' );