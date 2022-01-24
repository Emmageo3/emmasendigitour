<?php
/**
 * Gradiant Above Header Social
 */
if ( ! function_exists( 'gradiant_abv_hdr_social' ) ) {
	function gradiant_abv_hdr_social() {
		//above_header_first
		$hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
		$social_icons 				= get_theme_mod( 'social_icons',gradiant_get_social_icon_default());	
		
				 if($hide_show_social_icon == '1') { ?>
					<aside class="share-toolkit widget widget_social_widget"">
						<a href="#" class="toolkit-hover"><i class="fa fa-share-alt"></i></a>
						<ul>
							<?php
								$social_icons = json_decode($social_icons);
								if( $social_icons!='' )
								{
								foreach($social_icons as $social_item){	
								$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'gradiant_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
								$social_link = ! empty( $social_item->link ) ? apply_filters( 'gradiant_translate_single_string', $social_item->link, 'Header section' ) : '';
							?>
								<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
							<?php }} ?>
						</ul>
					</aside>
				<?php } 
	}
}
add_action( 'gradiant_abv_hdr_social', 'gradiant_abv_hdr_social' );




/**
 * Gradiant Above Header Contact Info
 */
if ( ! function_exists( 'gradiant_abv_hdr_contact_info' ) ) {
	function gradiant_abv_hdr_contact_info() {
		
			$hide_show_cntct_details 	= get_theme_mod( 'hide_show_cntct_details','1'); 
			$tlh_contct_icon 			= get_theme_mod( 'tlh_contct_icon','fa-support'); 	
			$tlh_contact_title 			= get_theme_mod( 'tlh_contact_title','Live Chat'); 
			$tlh_contact_link 			= get_theme_mod( 'tlh_contact_link'); 
				if($hide_show_cntct_details == '1') { ?>
					<aside class="widget widget-contact wgt-1">
						<div class="contact-area">
							<?php if(!empty($tlh_contct_icon)): ?>
								<div class="contact-icon">
								   <i class="fa <?php echo  esc_attr($tlh_contct_icon); ?>"></i>
								</div>
							<?php endif; ?>
							<a href="<?php echo esc_url($tlh_contact_link); ?>" class="contact-info">
								<span class="title"><?php echo esc_html($tlh_contact_title); ?></span>
							</a>
						</div>
					</aside>
				<?php }
				
					$hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
					$tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-envelope'); 	
					$tlh_email_title 			= get_theme_mod( 'tlh_email_title','info@example.com'); 
					$tlh_email_link 			= get_theme_mod( 'tlh_email_link'); 
				?>	
				<?php if($hide_show_email_details == '1') { ?>
						 <aside class="widget widget-contact wgt-2">
							<div class="contact-area">
								<?php if(!empty($tlh_email_icon)): ?>
									<div class="contact-icon">
										<i class="fa <?php echo  esc_attr($tlh_email_icon); ?>"></i>
									</div>
								<?php endif; ?>	
								<a href="<?php echo esc_url($tlh_email_link); ?>" class="contact-info">
									<span class="title"><?php echo esc_html($tlh_email_title); ?></span>
								</a>
							</div>
						</aside>
					<?php } 
					
						$hide_show_mbl_details 	= get_theme_mod( 'hide_show_mbl_details','1'); 	
						$tlh_mobile_icon 		= get_theme_mod( 'tlh_mobile_icon','fa-whatsapp');
						$tlh_mobile_title 		= get_theme_mod( 'tlh_mobile_title','+01-9876543210'); 
						$tlh_mobile_link 		= get_theme_mod( 'tlh_mobile_link'); 
					?>
					<?php if($hide_show_mbl_details == '1') { ?>
						<aside class="widget widget-contact wgt-3">
							<div class="contact-area">
								<?php if(!empty($tlh_mobile_icon)): ?>
									<div class="contact-icon">
										<i class="fa <?php echo  esc_attr($tlh_mobile_icon); ?>"></i>
									</div>
								<?php endif; ?>	
								<a href="<?php echo esc_url($tlh_mobile_link); ?>" class="contact-info">
									<span class="title"><?php echo esc_html($tlh_mobile_title); ?></span>
								</a>
							</div>
						</aside>
					<?php } ?>		
			<?php
	}
}
add_action( 'gradiant_abv_hdr_contact_info', 'gradiant_abv_hdr_contact_info' );

/*
 *
 * Social Icon
 */
function gradiant_get_social_icon_default() {
	return apply_filters(
		'gradiant_get_social_icon_default', json_encode(
				 array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-google-plus', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-linkedin', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_004',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-behance', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_005',
				)
			)
		)
	);
}

/*
 *
 * Footer Above Default
 */
 function gradiant_get_footer_above_default() {
	return apply_filters(
		'gradiant_get_footer_above_default', json_encode(
				 array(
				array(
					'icon_value'       => 'fa-clock-o',
					'title'           => esc_html__( 'Mon-Fri 9am-6pm', 'clever-fox' ),
					'text'            => esc_html__( 'Mon-Sat: 8am-5pm', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_footer_above_001',
					
				),
				array(
					'icon_value'       => 'fa-envelope-o',
					'title'           => esc_html__( 'Support Mail', 'clever-fox' ),
					'text'            => esc_html__( 'info@example.com', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_footer_above_002',
				
				),
				array(
					'icon_value'       => 'fa-map-marker',
					'title'           => esc_html__( '380 St Klida Road', 'clever-fox' ),
					'text'            => esc_html__( 'Melbourne, Australia', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_footer_above_003',
			
				),
			)
		)
	);
}


/*
 *
 * Slider Default
 */
 function gradiant_get_slider_default() {
	return apply_filters(
		'gradiant_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/gradiant/images/slider/img01.jpg',
					'title'           => esc_html__( 'Welcome innovation in business starts here', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Digital Marketing', 'clever-fox' ),
					'subtitle2'         => esc_html__( 'Agency', 'clever-fox' ),
					'text'            => esc_html__( 'We create and build flexible & creative design in your budget. Helping your get increase sales.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Get Started', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					"slide_align" => "left", 
					'id'              => 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/gradiant/images/slider/img02.jpg',
					'title'           => esc_html__( 'Welcome innovation in business starts here', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Digital Marketing', 'clever-fox' ),
					'subtitle2'         => esc_html__( 'Agency', 'clever-fox' ),
					'text'            => esc_html__( 'We create and build flexible & creative design in your budget. Helping your get increase sales.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Get Started', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					"slide_align" => "center", 
					'id'              => 'customizer_repeater_slider_002',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/gradiant/images/slider/img03.jpg',
					'title'           => esc_html__( 'Welcome innovation in business starts here', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Digital Marketing', 'clever-fox' ),
					'subtitle2'         => esc_html__( 'Agency', 'clever-fox' ),
					'text'            => esc_html__( 'We create and build flexible & creative design in your budget. Helping your get increase sales.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Get Started', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					"slide_align" => "right", 
					'id'              => 'customizer_repeater_slider_003',
				),
			)
		)
	);
}

/*
 *
 * Service Default
 */
function gradiant_get_service_default() {
	return apply_filters(
		'gradiant_get_service_default', json_encode(
				 array(
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/gradiant/images/service/service01.jpg',
					'icon_value'           => 'fa-shield',	
					'title'           => esc_html__( 'Secure Business', 'clever-fox' ),
					'subtitle'           => esc_html__( 'Cyber Security', 'clever-fox' ),
					'subtitle2'           => esc_html__( 'A Trusted Partner', 'clever-fox' ),
					'subtitle3'           => esc_html__( 'Application Security', 'clever-fox' ),
					'text2'           => esc_html__( 'View More', 'clever-fox' ),
					'link'       => '#',
					'id'              => 'customizer_repeater_service_001',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/gradiant/images/service/service02.jpg',
					'icon_value'           => 'fa-envelope-o',
					'title'           => esc_html__( 'Facebook Ads', 'clever-fox' ),
					'subtitle'           => esc_html__( 'Cyber Security', 'clever-fox' ),
					'subtitle2'           => esc_html__( 'A Trusted Partner', 'clever-fox' ),
					'subtitle3'           => esc_html__( 'Application Security', 'clever-fox' ),
					'text2'           => esc_html__( 'View More', 'clever-fox' ),
					'link'       => '#',
					'id'              => 'customizer_repeater_service_002',				
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/gradiant/images/service/service03.jpg',
					'icon_value'           => 'fa-pie-chart',
					'title'           => esc_html__( 'Marketing Analytics', 'clever-fox' ),
					'subtitle'           => esc_html__( 'Cyber Security', 'clever-fox' ),
					'subtitle2'           => esc_html__( 'A Trusted Partner', 'clever-fox' ),
					'subtitle3'           => esc_html__( 'Application Security', 'clever-fox' ),
					'text2'           => esc_html__( 'View More', 'clever-fox' ),
					'link'       => '#',
					'id'              => 'customizer_repeater_service_003',
				)
			)
		)
	);
}