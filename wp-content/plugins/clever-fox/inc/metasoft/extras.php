<?php
/*
 *
 * Social Icon
 */
function metasoft_get_social_icon_default() {
	return apply_filters(
		'metasoft_get_social_icon_default', json_encode(
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
			)
		)
	);
}

/*
 *
 * Slider Default
 */
 function metasoft_get_slider_default() {
	return apply_filters(
		'metasoft_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/metasoft/images/slider/slider01.jpg',
					'title'           => esc_html__( '25 Years', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Experience in the Finance Industry', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ase ger et fringilla orci. Maecenas convallis nisl et massa enie are', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Get Started', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					"slide_align" => "left", 
					'id'              => 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/metasoft/images/slider/slider02.jpg',
					'title'           => esc_html__( '25 Years', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Experience in the Finance Industry', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ase ger et fringilla orci. Maecenas convallis nisl et massa enie are', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Get Started', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					"slide_align" => "center", 
					'id'              => 'customizer_repeater_slider_002',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/metasoft/images/slider/slider03.jpg',
					'title'           => esc_html__( '25 Years', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Experience in the Finance Industry', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ase ger et fringilla orci. Maecenas convallis nisl et massa enie are', 'clever-fox' ),
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
 * Info Default
 */
 function metasoft_get_info_default() {
	return apply_filters(
		'metasoft_get_info_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Consulting', 'clever-fox' ),
					'text'            => esc_html__( 'Do eiusmod tempor incididunt ut labore et dolore magna', 'clever-fox' ),
					'text2'            => esc_html__( 'Read More', 'clever-fox' ),
					'icon_value'       => 'fa-comments',
					'id'              => 'customizer_repeater_info_001',
					
				),
				array(
					'title'           => esc_html__( 'Architecture', 'clever-fox' ),
					'text'            => esc_html__( 'Do eiusmod tempor incididunt ut labore et dolore magna', 'clever-fox' ),
					'text2'            => esc_html__( 'Read More', 'clever-fox' ),
					'icon_value'       => 'fa-comments',
					'id'              => 'customizer_repeater_info_002',				
				),
				array(
					'title'           => esc_html__( 'Green buildings', 'clever-fox' ),
					'text'            => esc_html__( 'Do eiusmod tempor incididunt ut labore et dolore magna', 'clever-fox' ),
					'text2'            => esc_html__( 'Read More', 'clever-fox' ),
					'icon_value'       => 'fa-comments',
					'id'              => 'customizer_repeater_info_003',
				),
				array(
					'title'           => esc_html__( 'Flat share', 'clever-fox' ),
					'text'            => esc_html__( 'Do eiusmod tempor incididunt ut labore et dolore magna', 'clever-fox' ),
					'text2'            => esc_html__( 'Read More', 'clever-fox' ),
					'icon_value'       => 'fa-comments',
					'id'              => 'customizer_repeater_info_004',
				),
			)
		)
	);
}

/*
 *
 * Service Default
 */
 function metasoft_get_service_default() {
	return apply_filters(
		'metasoft_get_service_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Professional Consulting', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quos aperiam ipsam modi dolor suscipit asperiores perspiciatis.', 'clever-fox' ),
					'icon_value'       => 'fa-folder-open-o',
					'id'              => 'customizer_repeater_service_001',
					
				),
				array(
					'title'           => esc_html__( 'Valuable Ideas', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quos aperiam ipsam modi dolor suscipit asperiores perspiciatis.', 'clever-fox' ),
					'icon_value'       => 'fa-columns',
					'id'              => 'customizer_repeater_service_002',				
				),
				array(
					'title'           => esc_html__( 'Budget Friendly', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quos aperiam ipsam modi dolor suscipit asperiores perspiciatis.', 'clever-fox' ),
					'icon_value'       => 'fa-graduation-cap ',
					'id'              => 'customizer_repeater_service_003',
				),
			)
		)
	);
}



/*
 *
 * Expertise Default
 */
 function metasoft_get_expertise_default() {
	return apply_filters(
		'metasoft_get_expertise_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Strategy & Growth', 'clever-fox' ),
					'text'            => esc_html__( 'Defining your business goal and steps to achieve them.', 'clever-fox' ),
					'icon_value'       => 'fa-sun-o',
					'id'              => 'customizer_repeater_expertise_001',
				),
				array(
					'title'           => esc_html__( 'Global Expansion', 'clever-fox' ),
					'text'            => esc_html__( 'Defining your business goal and steps to achieve them.', 'clever-fox' ),
					'icon_value'       => 'fa-sun-o',
					'id'              => 'customizer_repeater_expertise_002',				
				),
				array(
					'title'           => esc_html__( 'Customer Strategy', 'clever-fox' ),
					'text'            => esc_html__( 'Defining your business goal and steps to achieve them.', 'clever-fox' ),
					'icon_value'       => 'fa-sun-o',
					'id'              => 'customizer_repeater_expertise_003',
				),
				array(
					'title'           => esc_html__( 'Tax Consulting', 'clever-fox' ),
					'text'            => esc_html__( 'Defining your business goal and steps to achieve them.', 'clever-fox' ),
					'icon_value'       => 'fa-sun-o',
					'id'              => 'customizer_repeater_expertise_004',
				),
				array(
					'title'           => esc_html__( 'Currencies', 'clever-fox' ),
					'text'            => esc_html__( 'Defining your business goal and steps to achieve them.', 'clever-fox' ),
					'icon_value'       => 'fa-sun-o',
					'id'              => 'customizer_repeater_expertise_005',
				),
				array(
					'title'           => esc_html__( 'Commodities', 'clever-fox' ),
					'text'            => esc_html__( 'Defining your business goal and steps to achieve them.', 'clever-fox' ),
					'icon_value'       => 'fa-sun-o',
					'id'              => 'customizer_repeater_expertise_006',
				),
			)
		)
	);
}