<?php
/*
 *
 * Slider
 */
if ( ! function_exists( 'startkit_get_slider_default' ) ) : 
 function startkit_get_slider_default() {
	return apply_filters(
		'startkit_get_slider_default', json_encode(
			 array(
					array("image_url" => CLEVERFOX_PLUGIN_URL .'inc/startkit/images/slider/slider02.jpg',
					"link" => "#", 
					"title" => "Strengths Successful", 
					"subtitle" => "lorem ipsum text.",
					"text" => "Randomised words.", 
					"text2" => "Explore More",
					"slide_align" => "left", 
					"id" => "customizer_repeater_00071" ), 
					
					array("image_url" => CLEVERFOX_PLUGIN_URL .'inc/startkit/images/slider/slider01.jpg',
					"link" => "#", 
					"title" => "Successful Businesses",
					"subtitle" => "lorem ipsum text.",
					"text" => "Randomised words.", 
					"text2" => "Explore More",
					"slide_align" => "center", 
					"id" => "customizer_repeater_00072" ),
					
					array("image_url" => CLEVERFOX_PLUGIN_URL .'inc/startkit/images/slider/slider03.jpg',
					"link" => "#", 
					"title" => "Strengths Businesses",
					"subtitle" => "lorem ipsum text.",
					"text" => "Randomised words.", 
					"text2" => "Explore More",
					"slide_align" => "right", 
					"id" => "customizer_repeater_00073" ),
			)
		)
	);
}
endif;


/*
 *
 * Service
 */
 if ( ! function_exists( 'startkit_get_service_default' ) ) :
 function startkit_get_service_default() {
	return apply_filters(
		'startkit_get_service_default', json_encode(
						 array(
				array(
					"image_url" => CLEVERFOX_PLUGIN_URL .'inc/startkit/images/slider/slider02.jpg',
					'title'           => esc_html__( 'Idea Provide', 'clever-fox' ),
					'text'            => esc_html__( 'Idea is the ipsum consecte tempor incididuntan andolore tumber tur adipisicing elit..', 'clever-fox' ),
					"text2" => "Learn More",
					'icon_value'	  =>  esc_html__( 'fa-lightbulb-o', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_001',
					
				),
				array(
					"image_url" => CLEVERFOX_PLUGIN_URL .'inc/startkit/images/slider/slider01.jpg',
					'title'           => esc_html__( 'People Research', 'clever-fox' ),
					'text'            => esc_html__( 'People is the ipsum consecte tempor incididuntan andolore tumber tur adipisicing elit.', 'clever-fox' ),
					"text2" => "Learn More",
					'icon_value'	  =>  esc_html__( 'fa-users', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_002',
				
				),
				array(
					"image_url" => CLEVERFOX_PLUGIN_URL .'inc/startkit/images/slider/slider02.jpg',
					'title'           => esc_html__( 'Business Develop', 'clever-fox' ),
					'text'            => esc_html__( 'People is the ipsum consecte tempor incididuntan andolore tumber tur adipisicing elit.', 'clever-fox' ),
					"text2" => "Learn More",
					'icon_value'	  =>  esc_html__( 'fa-briefcase', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_003',
			
				),
			)
		)
	);
}
endif;


/*
 *
 * Testimonial
 */
 if ( ! function_exists( 'startkit_get_testimonial_default' ) ) :
 function startkit_get_testimonial_default() {
	return apply_filters(
		'startkit_get_testimonial_default', json_encode(
					 array(
				array(
					'title'           => esc_html__( 'Naiomi Watson', 'clever-fox' ),
					'subtitle'        => esc_html__( 'Lead Designer', 'clever-fox' ),
					'text'            => esc_html__( 'Established fact that a reader will be distracted by the readable content of a page when', 'clever-fox' ),
					'image_url'		  =>  CLEVERFOX_PLUGIN_URL .'inc/startkit/images/testimonial/testimonial01.png',
					'id'              => 'customizer_repeater_testimonial_001',
				),
				array(
					'title'           => esc_html__( 'Pins kumara', 'clever-fox' ),
					'subtitle'        => esc_html__( 'Lead Interaction Designer', 'clever-fox' ),
					'text'            => esc_html__( 'Established fact that a reader will be distracted by the readable content of a page when', 'clever-fox' ),
					'image_url'		  => CLEVERFOX_PLUGIN_URL .'inc/startkit/images/testimonial/testimonial02.png',
					'id'              => 'customizer_repeater_testimonial_001',
				
				),
				array(
					'title'           => esc_html__( 'Mairala Thare', 'clever-fox' ),
					'subtitle'        => esc_html__( 'Lead Interaction Designer', 'clever-fox' ),
					'text'            => esc_html__( 'Established fact that a reader will be distracted by the readable content of a page when', 'clever-fox' ),
					'image_url'		  => CLEVERFOX_PLUGIN_URL .'inc/startkit/images/testimonial/testimonial03.png',
					'id'              => 'customizer_repeater_testimonial_001',
			
				),
			)

		)
	);
}
endif;



/*
 *
 * Funfact
 */
if ( ! function_exists( 'startkit_get_funfact_default' ) ) :
function startkit_get_funfact_default() {
		return apply_filters(
			'startkit_get_funfact_default', json_encode(
				 array(
					array(
						'title'           => esc_html__( '9.1', 'clever-fox' ),
						'subtitle'		  => esc_html__( 'B', 'clever-fox' ),
						'text'            => esc_html__( 'Users', 'clever-fox' ),
						'icon_value'	=>  esc_html__( 'fa fa-users', 'clever-fox' ),
						'id'              => 'customizer_repeater_funfact_001',
					),
					array(
						'title'           => esc_html__( '8.2', 'clever-fox' ),
						'subtitle'		  => esc_html__( 'B', 'clever-fox' ),
						'text'            => esc_html__( 'Downloads', 'clever-fox' ),
						'icon_value'	=>  esc_html__( 'fal fa-download', 'clever-fox' ),
						'id'              => 'customizer_repeater_funfact_001',
					
					),
					array(
						'title'           => esc_html__( '2.26', 'clever-fox' ),
						'subtitle'		  => esc_html__( 'B', 'clever-fox' ),
						'text'            => esc_html__( 'Reviews', 'clever-fox' ),
						'icon_value'	=>  esc_html__( 'fa fa-star-half-o', 'clever-fox' ),
						'id'              => 'customizer_repeater_funfact_001',
				
					),
					array(
						'title'           => esc_html__( '9.1', 'clever-fox' ),
						'subtitle'		  => esc_html__( 'B', 'clever-fox' ),
						'text'            => esc_html__( 'Users', 'clever-fox' ),
						'icon_value'	=>  esc_html__( 'fa fa-trophy', 'clever-fox' ),
						'id'              => 'customizer_repeater_funfact_001',
						
					),
				)
			)
		);
	}
endif;		