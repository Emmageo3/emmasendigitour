<?php
/*
 *
 * Social Icon
 */
function aravalli_get_social_icon_default() {
	return apply_filters(
		'aravalli_get_social_icon_default', json_encode(
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
 function aravalli_get_slider_default() {
	return apply_filters(
		'aravalli_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/slider/slider01.jpg',
					'title'           => esc_html__( 'Book Your Room Now', 'clever-fox' ),
					'text'            => esc_html__( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when.", 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Book Now', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					"slide_align" => "left", 
					'id'              => 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/slider/slider02.jpg',
					'title'           => esc_html__( 'We Are Providing', 'clever-fox' ),
					'text'            => esc_html__( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when.", 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Book Now', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					"slide_align" => "center", 
					'id'              => 'customizer_repeater_slider_002',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/slider/slider03.jpg',
					'title'           => esc_html__( 'In Aravalli', 'clever-fox' ),
					'text'            => esc_html__( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when.", 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Book Now', 'clever-fox' ),
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
 * Features Default
 */
 function aravalli_get_features_default() {
	return apply_filters(
		'aravalli_get_features_default', json_encode(
				 array(
				array(
					'icon_value'           => 'fa-cutlery',
					'title'           => esc_html__( 'Restaurant', 'clever-fox' ),
					'text'            => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page. ', 'clever-fox' ),
					'text2'            => esc_html__( 'Book Now ', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/features/img-1.jpg',
					'id'              => 'customizer_repeater_features_001',
					
				),
				array(
					'icon_value'           => 'fa-user',
					'title'           => esc_html__( 'Wellness Spa', 'clever-fox' ),
					'text'            => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page. ', 'clever-fox' ),
					'text2'            => esc_html__( 'Book Now ', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/features/img-2.jpg',
					'id'              => 'customizer_repeater_features_002',				
				),
				array(
					'icon_value'           => 'fa-bullseye',
					'title'           => esc_html__( 'Meditation', 'clever-fox' ),
					'text'            => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page. ', 'clever-fox' ),
					'text2'            => esc_html__( 'Book Now ', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/features/img-1.jpg',
					'id'              => 'customizer_repeater_features_003',
				),
				array(
					'icon_value'           => 'fa-users',
					'title'           => esc_html__( 'Banquet Hall', 'clever-fox' ),
					'text'            => esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page. ', 'clever-fox' ),
					'text2'            => esc_html__( 'Book Now ', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/features/img-2.jpg',
					'id'              => 'customizer_repeater_features_004',
				),
			)
		)
	);
}


/*
 *
 * Amenities Default
 */
 function aravalli_get_amenities_default() {
	return apply_filters(
		'aravalli_get_amenities_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Free Parking', 'clever-fox' ),
					'icon_value'       => 'fa-car',
					'id'              => 'customizer_repeater_amenities_001',
				),
				array(
					'title'           => esc_html__( 'Wi - Internet', 'clever-fox' ),
					'icon_value'       => 'fa-wifi',
					'id'              => 'customizer_repeater_amenities_002',		
				),
				array(
					'title'           => esc_html__( '24/7 Laundry Searvice', 'clever-fox' ),
					'icon_value'       => 'fa-clock-o',
					'id'              => 'customizer_repeater_amenities_003',
				),
				array(
					'title'           => esc_html__( 'Gym & Beauty Care', 'clever-fox' ),
					'icon_value'       => 'fa-blind',
					'id'              => 'customizer_repeater_amenities_004',
				),
				array(
					'title'           => esc_html__( '24 Hour- In Room Dining', 'clever-fox' ),
					'icon_value'       => 'fa-clock-o',
					'id'              => 'customizer_repeater_amenities_005',
				),
				array(
					'title'           => esc_html__( 'Central Air Condition', 'clever-fox' ),
					'icon_value'       => 'fa-hotel',
					'id'              => 'customizer_repeater_amenities_006',
				),
				array(
					'title'           => esc_html__( 'Luxery Swimming Pool', 'clever-fox' ),
					'icon_value'       => 'fa-bath',
					'id'              => 'customizer_repeater_amenities_007',
				),
				array(
					'title'           => esc_html__( 'Airport Transfers', 'clever-fox' ),
					'icon_value'       => 'fa-taxi',
					'id'              => 'customizer_repeater_amenities_008',
				),
			)
		)
	);
}



/*
 *
 * Room Default
 */
 function aravalli_get_room_default() {
	return apply_filters(
		'aravalli_get_room_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( '$1200/Night', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Family Room', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the print and industry Lorem Ipsum', 'clever-fox' ),
					'text2'            => esc_html__( 'Book Now ', 'clever-fox' ),
					'button'            => esc_html__( '10% OFF', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/rooms/img-1.jpg',
					'id'              => 'customizer_repeater_room_001',
					
				),
				array(
					'title'           => esc_html__( '$900/Night', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Executive Room', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the print and industry Lorem Ipsum', 'clever-fox' ),
					'button'            => esc_html__( '20% OFF', 'clever-fox' ),
					'text2'            => esc_html__( 'Book Now ', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/rooms/img-2.jpg',
					'id'              => 'customizer_repeater_room_002',				
				),
				array(
					'title'           => esc_html__( '$2000/Night', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Banquet Hall', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of the print and industry Lorem Ipsum', 'clever-fox' ),
					'button'            => esc_html__( '30% OFF', 'clever-fox' ),
					'text2'            => esc_html__( 'Book Now ', 'clever-fox' ),
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/rooms/img-3.jpg',
					'id'              => 'customizer_repeater_room_003',
				)
			)
		)
	);
}


if ( ! function_exists( 'cleverfox_aravalli_lite_checkin' ) ) :
function cleverfox_aravalli_lite_checkin() {
	$checkin_title			= get_theme_mod('checkin_title','Find a Room'); 
	$checkin_desc			= get_theme_mod('checkin_desc','When you want to be our guest ?');
	$checkin_shortcode		= get_theme_mod('checkin_shortcode');
?>		
	<div id="checkin-section" class="checkin wow fadeInUp home-checkin">
		<div class="container">
			<div class="checkin-wrapper">
				<div class="row">
					<div class="col-lg-3">
						<?php if(!empty($checkin_title) || !empty($checkin_desc)): ?>
							<div class="checkin-text">
								<h3><?php echo wp_kses_post($checkin_title); ?></h3>
								<p><?php echo wp_kses_post($checkin_desc); ?></p>
							</div>
						<?php endif; ?>	
					</div>
					<div class="col-lg-9 my-auto">
						<?php if(!empty($checkin_shortcode) ): echo do_shortcode($checkin_shortcode); else:?>
							<form class="checkin-form form-icons">
								<div class="form-row">
									<div class="form-group form-caret">
										<select id="inputState1" class="form-control">
											<option selected>Room Category</option>
											<option>...</option>
										</select>
									</div>
									<div class="form-group form-caret">
										<select id="inputState2" class="form-control">
											<option selected>Room Features</option>
											<option>...</option>
										</select>
									</div>
									<div class="form-group form-caret">
										<select id="inputState3" class="form-control">
											<option selected>Adult</option>
											<option>...</option>
										</select>
									</div>
									<div class="form-group form-btn">
										<button class="btn-shape btn-line-white">Book Now</button>
									</div>
								</div>
							</form>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
add_action('cleverfox_aravalli_lite_checkin','cleverfox_aravalli_lite_checkin');
endif;



/*
 *
 * Footer Above Default
 */
 function aravalli_get_footer_above_default() {
	return apply_filters(
		'aravalli_get_footer_above_default', json_encode(
				 array(
				array(
					'icon_value'       => 'fa-map-marker',
					'title'           => esc_html__( 'Find Us:', 'clever-fox' ),
					'subtitle'           => esc_html__( 'A26, Silver Street, New York.', 'clever-fox' ),
					'id'              => 'customizer_repeater_footer_above_001',
				),
				array(
					'icon_value'       => 'fa-phone',
					'title'           => esc_html__( 'Call Us Now:', 'clever-fox' ),
					'subtitle'           => esc_html__( '(+233) 123 457789', 'clever-fox' ),
					'id'              => 'customizer_repeater_footer_above_002',
				),
				array(
					'icon_value'       => 'fa-envelope-o',
					'title'           => esc_html__( 'Email Address:', 'clever-fox' ),
					'subtitle'           => esc_html__( 'email@companyname.com', 'clever-fox' ),
					'id'              => 'customizer_repeater_footer_above_003',
				),
			)
		)
	);
}