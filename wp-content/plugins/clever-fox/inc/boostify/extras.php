<?php
/*
 *
 * Social Icon
 */
function boostify_get_social_icon_default() {
	return apply_filters(
		'boostify_get_social_icon_default', json_encode(
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
				),
			)
		)
	);
}


/*
 *
 * Contact Info Default
 */
 function boostify_get_contact_info_default() {
	return apply_filters(
		'boostify_get_contact_info_default', json_encode(
				 array(
				array(
					'icon_value'       => 'fa-map-marker',
					'title'           => esc_html__( 'Company Location', 'clever-fox' ),
					'subtitle'            => esc_html__( '121 King Street, USA', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_contact_info_001',
				),
				array(
					'icon_value'       => 'fa-envelope',
					'title'           => esc_html__( 'Mail Us On', 'clever-fox' ),
					'subtitle'            => esc_html__( 'info@example.com', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_contact_info_002',
				),
				array(
					'icon_value'       => 'fa-clock-o',
					'title'           => esc_html__( 'Working Hours', 'clever-fox' ),
					'subtitle'            => esc_html__( 'Mon-Sat 8:00 - 18:00', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_contact_info_003',
				),
			)
		)
	);
}
add_action('boostify_get_contact_info_default','boostify_get_contact_info_default');

/*
 *
 * Slider Default
 */
 function boostify_get_slider_default() {
	return apply_filters(
		'boostify_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/slider/img01.jpg',
					'image_url2'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/slider/img01.jpg',
					'title'           => esc_html__( 'Business litigation expert', 'clever-fox' ),
					'subtitle'         => esc_html__( 'we are for your invest', 'clever-fox' ),
					'text'            => esc_html__( "Randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum", 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Explore more  ...', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					"slide_align" => "left", 
					'id'              => 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/slider/img02.jpg',
					'image_url2'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/slider/img02.jpg',
					'title'           => esc_html__( 'Business litigation expert', 'clever-fox' ),
					'subtitle'         => esc_html__( 'we are for your invest', 'clever-fox' ),
					'text'            => esc_html__( "Randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum", 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Explore more  ...', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					"slide_align" => "center", 
					'id'              => 'customizer_repeater_slider_002',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/slider/img03.jpg',
					'image_url2'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/slider/img03.jpg',
					'title'           => esc_html__( 'Business litigation expert', 'clever-fox' ),
					'subtitle'         => esc_html__( 'we are for your invest', 'clever-fox' ),
					'text'            => esc_html__( "Randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum", 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Explore more  ...', 'clever-fox' ),
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
 * Info Default
 */
 function boostify_get_info_default() {
	return apply_filters(
		'boostify_get_info_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( '24x7 Support', 'clever-fox' ),
					'subtitle'        => esc_html__( '0 (123) 456 7891', 'clever-fox' ),
					'icon_value'      => 'fa-phone',
					'id'              => 'customizer_repeater_info_001',
				),
				array(
					'title'           => esc_html__( 'Quick Contact Us', 'clever-fox' ),
					'subtitle'        => esc_html__( '+880-123-456890', 'clever-fox' ),
					'icon_value'      => 'fa-map-o',
					'id'              => 'customizer_repeater_info_002',			
				),
				array(
					'title'           => esc_html__( 'Send Us an Email', 'clever-fox' ),
					'subtitle'        => esc_html__( 'email@gmail.com', 'clever-fox' ),
					'icon_value'      => 'fa-envelope-open-o',
					'id'              => 'customizer_repeater_info_003',
				),
				array(
					'title'           => esc_html__( 'Our Working Hours', 'clever-fox' ),
					'subtitle'        => esc_html__( 'Monday to Friday', 'clever-fox' ),
					'icon_value'      => 'fa-clock-o',
					'id'              => 'customizer_repeater_info_001',
				),
			)
		)
	);
}


/*
 *
 * Service Default
 */
 function boostify_get_service_default() {
	return apply_filters(
		'boostify_get_service_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Startup Business', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum popularised a with trelease for urvived.', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/icon/icon01.png',
					'text2'           => esc_html__( 'Read More', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_001',
					
				),
				array(
					'title'           => esc_html__( 'Business Growth', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum popularised a with trelease for urvived.', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/icon/icon02.png',
					'text2'           => esc_html__( 'Read More', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_002',				
				),
				array(
					'title'           => esc_html__( 'Follow Policy', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum popularised a with trelease for urvived.', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/icon/icon03.png',
					'text2'           => esc_html__( 'Read More', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_003',
				),
				array(
					'title'           => esc_html__( 'Marketing', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum popularised a with trelease for urvived.', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/icon/icon04.png',
					'text2'           => esc_html__( 'Read More', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_004',
				),
				array(
					'title'           => esc_html__( 'Business Advise', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum popularised a with trelease for urvived.', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/icon/icon05.png',
					'text2'           => esc_html__( 'Read More', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_005',
				),
				array(
					'title'           => esc_html__( 'Business Pakage', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum popularised a with trelease for urvived.', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/icon/icon06.png',
					'text2'           => esc_html__( 'Read More', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_006',
				),
			)
		)
	);
}


/*
 *
 * Features Default
 */
 function boostify_get_features_default() {
	return apply_filters(
		'boostify_get_features_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Business planning', 'clever-fox' ),
					'text'            => esc_html__( 'My point of using Lorem Ipsum is that distribution', 'clever-fox' ),
					'icon_value'      => 'fa-connectdevelop',
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/features/features01.jpg',
					'id'              => 'customizer_repeater_features_001',
				),
				array(
					'title'           => esc_html__( 'Business Growp', 'clever-fox' ),
					'text'            => esc_html__( 'My point of using Lorem Ipsum is that distribution', 'clever-fox' ),
					'icon_value'      => 'fa-bar-chart',
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/features/features01.jpg',
					'id'              => 'customizer_repeater_features_002',			
				),
				array(
					'title'           => esc_html__( 'Marketing', 'clever-fox' ),
					'text'            => esc_html__( 'My point of using Lorem Ipsum is that distribution', 'clever-fox' ),
					'icon_value'      => 'fa-line-chart',
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/features/features01.jpg',
					'id'              => 'customizer_repeater_features_003',
				),
				array(
					'title'           => esc_html__( 'Stratup advise', 'clever-fox' ),
					'text'            => esc_html__( 'My point of using Lorem Ipsum is that distribution', 'clever-fox' ),
					'icon_value'      => 'fa-tachometer',
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/features/features01.jpg',
					'id'              => 'customizer_repeater_features_004',
				),
				array(
					'title'           => esc_html__( 'Business planning', 'clever-fox' ),
					'text'            => esc_html__( 'My point of using Lorem Ipsum is that distribution', 'clever-fox' ),
					'icon_value'      => 'fa-file-zip-o',
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/boostify/images/features/features01.jpg',
					'id'              => 'customizer_repeater_features_005',
				),
			)
		)
	);
}


/*
 *
 * Testimonial Default
 */
 
 function boostify_get_testimonial_default() {
	return apply_filters(
		'boostify_get_testimonial_default', json_encode(
			array(
				array(
					'title'           => esc_html__( 'All Raihan', 'clever-fox' ),
					'subtitle'        => esc_html__( 'Interection Design', 'clever-fox' ),
					'text'            => esc_html__( 'Donec scelerisque dolor id nunc dictum, nterdum mauris rhoncus. Aliquam at ultrices nunc. In sem fermentum at lorem in, porta mauris.', 'clever-fox' ),
					'image_url'		  =>  CLEVERFOX_PLUGIN_URL .'inc/boostify/images/testimonial/testimonial01.jpg',
					'id'              => 'customizer_repeater_testimonial_001',
				),
				array(
					'title'           => esc_html__( 'Ali Sayed', 'clever-fox' ),
					'subtitle'        => esc_html__( 'UI/UX Design', 'clever-fox' ),
					'text'            => esc_html__( 'Donec scelerisque dolor id nunc dictum, nterdum mauris rhoncus. Aliquam at ultrices nunc. In sem fermentum at lorem in, porta mauris.', 'clever-fox' ),
					'image_url'		  =>  CLEVERFOX_PLUGIN_URL .'inc/boostify/images/testimonial/testimonial02.jpg',
					'id'              => 'customizer_repeater_testimonial_002',
				),
		    )
		)
	);
}