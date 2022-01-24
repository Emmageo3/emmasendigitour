<?php
/**
 * Social Icon Default
 *
 */
 function conceptly_get_social_icon_default() {
	return apply_filters(
		'conceptly_get_social_icon_default', json_encode(
			array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_social_001',
					
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-linkedin', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_social_002',
				
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_social_003',
			
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-google-plus', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),								
				)
			)
		)
	);
}
/**
 * Slider Section Default
 *
 */
 
 function conceptly_get_slides_default() {
	 $theme = wp_get_theme(); // gets the current theme
		if ( 'Azwa' == $theme->name){
			return apply_filters(
			'conceptly_get_slides_default', json_encode(
			 array(
				 
				/*Repeater's first item*/
				array("image_url" => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/sliders/slider01.jpg' ,"image_url2" => CLEVERFOX_PLUGIN_URL .'inc/azwa/images/sliders/slider01.png',"link" => "#", "title" => "We Build Your", "subtitle" => "Business IDEA", "text" => "There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.", "text2" => "Read More","slide_align" => "left", "id" => "customizer_repeater_00070" ), 
				
				/*Repeater's second item*/
				array("image_url" => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/sliders/slider02.jpg',"image_url2" => CLEVERFOX_PLUGIN_URL .'inc/azwa/images/sliders/slider02.png',"link" => "#", "title" => "We Build Your", "subtitle" => "Business IDEA", "text" => "There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.", "text2" => "Read More","slide_align" => "right", "id" => "customizer_repeater_00071" ), 
				
				/*Repeater's third item*/
				array("image_url" => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/sliders/slider03.jpg',"image_url2" => CLEVERFOX_PLUGIN_URL .'inc/azwa/images/sliders/slider03.png',"link" => "#", "title" => "We Build Your", "subtitle" => "Business IDEA", "text" => "There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.", "text2" => "Read More","slide_align" => "left", "id" => "customizer_repeater_00072" ), 
				)
			)
		);
	}else{
			return apply_filters(
			'conceptly_get_slides_default', json_encode(
			 array(
				 
				/*Repeater's first item*/
				array("image_url" => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/sliders/slider01.jpg' ,"image_url2" => CLEVERFOX_PLUGIN_URL .'inc/azwa/images/sliders/slider01.png',"link" => "#", "title" => "We Build Your", "subtitle" => "Business IDEA", "text" => "There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.", "text2" => "Read More","slide_align" => "left", "id" => "customizer_repeater_00070" ), 
				
				/*Repeater's second item*/
				array("image_url" => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/sliders/slider02.jpg',"image_url2" => CLEVERFOX_PLUGIN_URL .'inc/azwa/images/sliders/slider02.png',"link" => "#", "title" => "We Build Your", "subtitle" => "Business IDEA", "text" => "There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.", "text2" => "Read More","slide_align" => "center", "id" => "customizer_repeater_00071" ), 
				
				/*Repeater's third item*/
				array("image_url" => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/sliders/slider03.jpg',"image_url2" => CLEVERFOX_PLUGIN_URL .'inc/azwa/images/sliders/slider03.png',"link" => "#", "title" => "We Build Your", "subtitle" => "Business IDEA", "text" => "There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.", "text2" => "Read More","slide_align" => "right", "id" => "customizer_repeater_00072" ), 
				)
			)
		);
	}
}


/**
 * Service Section Default
 *
 */
function conceptly_get_service_default() {
	return apply_filters(
		'conceptly_get_service_default', json_encode(
			 array(
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/service/service02.jpg',
					'icon_value'	=>  esc_html__( 'fa-cubes', 'clever-fox' ),
					'title'           => esc_html__( 'Explore', 'clever-fox' ),
					'subtitle'           => esc_html__( ' Customer Assistance ', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations of dummy that passages of Lorem Ipsum available but an the majority have suffered that is  dummy alteration in some.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Read More ', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_001',
					
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/service/service003.jpg',
					'icon_value'	=>  esc_html__( 'fa-american-sign-language-interpreting', 'clever-fox' ),
					'title'           => esc_html__( 'Explore', 'clever-fox' ),
					'subtitle'           => esc_html__( ' Innovative Ideas', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations of dummy that passages of Lorem Ipsum available but an the majority have suffered that is  dummy alteration in some.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Read More', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_002',
				
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/service/service02.jpg',
					'icon_value'	=>  esc_html__( 'fa-laptop', 'clever-fox' ),
					'title'           => esc_html__( 'Explore', 'clever-fox' ),
					'subtitle'           => esc_html__( 'Global Presence', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations of dummy that passages of Lorem Ipsum available but an the majority have suffered that is  dummy alteration in some.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Read More', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_003',
			
				),
			)
		)
	);
}

/**
 * Feature Section Default
 *
 */
function conceptly_get_feature_default() {
	return apply_filters(
		'conceptly_get_feature_default', json_encode(
			 array(
				array(
					'title'           => esc_html__( 'Business Growth', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum available but the abo majority have suffered.', 'clever-fox' ),
					'icon_value'	=>  esc_html__( 'fa-cubes', 'clever-fox' ),
					'id'              => 'customizer_repeater_features_001',
				),
				array(
					'title'           => esc_html__( 'Sustainability', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum available but the abo majority have suffered.', 'clever-fox' ),
					'icon_value'	=>  esc_html__( 'fa-cog', 'clever-fox' ),
					'id'              => 'customizer_repeater_features_002',
				
				),
				array(
					'title'           => esc_html__( 'Performance', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum available but the abo majority have suffered.', 'clever-fox' ),
					'icon_value'	=>  esc_html__( 'fa-american-sign-language-interpreting', 'clever-fox' ),
					'id'              => 'customizer_repeater_features_003',
			
				),
				array(
					'title'           => esc_html__( 'Organization', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum available but the abo majority have suffered.', 'clever-fox' ),
					'icon_value'	=>  esc_html__( 'fa-area-chart', 'clever-fox' ),
					'id'              => 'customizer_repeater_features_004',
					
				),
				array(
					'title'           => esc_html__( 'Saving Strategy', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum available but the abo majority have suffered.', 'clever-fox' ),
					'icon_value'	=>  esc_html__( 'fa-coffee', 'clever-fox' ),
					'id'              => 'customizer_repeater_features_005',
					
				),
				array(
					'title'           => esc_html__( 'Retirement Planning', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations passages of Lorem Ipsum available but the abo majority have suffered.', 'clever-fox' ),
					'icon_value'	=>  esc_html__( 'fa-child', 'clever-fox' ),
					'id'              => 'customizer_repeater_features_006',
					
				),
			)
		)
	);
}



/**
 * Sponsor Section Default
 *
 */
 function conceptly_get_sponsers_default() {
	return apply_filters(
		'conceptly_get_sponsers_default', json_encode(
			 array(
				array(
					'link'            => esc_html__( '#', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/partner/partner01.png',
					'id'              => 'customizer_repeater_sponsers_001',
				),
				array(
					'link'           => esc_html__( '#', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/partner/partner02.png',
					'id'              => 'customizer_repeater_sponsers_002',
				
				),
				array(
					'link'           => esc_html__( '#', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/partner/partner03.png',
					'id'              => 'customizer_repeater_sponsers_003',
			
				),
				array(
					'link'           => esc_html__( '#', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/partner/partner04.png',
					'id'              => 'customizer_repeater_sponsers_004',
					
				)
			) 
		)
	);
}