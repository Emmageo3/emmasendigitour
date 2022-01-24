<?php
if( ! function_exists( 'cleverfox_conceptly_dynamic_styles' ) ):
    function cleverfox_conceptly_dynamic_styles() {
		$output_css = '';
		
		/**
		 * Slider
		 */
		$slider_opacity					= get_theme_mod('slider_opacity','0.5'); 
		$output_css .=" .theme-slider:not(.azwa-slider):after{ 
				opacity: " .esc_attr($slider_opacity). ";
			}\n";
			
		/**
		 * Breadcumb
		 */
		$breadcrumb_min_height 		= get_theme_mod('breadcrumb_min_height','100');
		$output_css .=" #breadcrumb-area{ 
				 padding: " .esc_attr($breadcrumb_min_height). "px 0 " .esc_attr($breadcrumb_min_height). "px;
			}\n";
			
		$breadcrumb_align 		= get_theme_mod('breadcrumb_align','left');
		$output_css .=" #breadcrumb-area{ 
				 text-align: " .esc_attr($breadcrumb_align). ";
			}\n";
			
		$breadcrumb_opacity= get_theme_mod('breadcrumb_opacity','0.9');
		$output_css .=" #breadcrumb-area:after{ 
			 opacity: " .esc_attr($breadcrumb_opacity). ";
		}\n";
		
		$hide_show_typography= get_theme_mod('hide_show_typography','off');
		if( $hide_show_typography == '1' ){
			/**
			 *  Typography Body
			 */
			$body_font_family 				= get_theme_mod('body_font_family');
			$body_typography_font_weight 	= get_theme_mod('body_typography_font_weight','normal');
			$body_font_size 				= get_theme_mod('body_font_size','16');
			$body_line_height 				= get_theme_mod('body_line_height','1.6');
			
			 if($body_font_family !== '') { 
				if ( $body_font_family && ( strpos( $body_font_family, ',' ) != true ) ) {
					conceptly_enqueue_google_font($body_font_family);
				}	
				 $output_css .=" body{ font-family: " .esc_attr($body_font_family). ";	}\n";
			 }
		 
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
			$output_css .=" .menubar .menu-wrap > li > a{ 
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
			
	 wp_add_inline_style( 'conceptly-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'cleverfox_conceptly_dynamic_styles' );
?>