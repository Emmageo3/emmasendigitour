<?php 
if ( ! function_exists( 'startkit_info_setting' ) ) :
function startkit_info_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
		$wp_customize->add_section(
			'info_setting', array(
				'title' => esc_html__( 'Info Section', 'clever-fox' ),
				'panel' => 'startkit_frontpage_sections',
				'priority' => apply_filters( 'startkit_section_priority', 10, 'startkit_info' ),
			)
		);
		
	//  Setting Head
	$wp_customize->add_setting(
		'info_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'info_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	// info Hide/ Show Setting // 
	if ( class_exists( 'Startkit_Customizer_Toggle_Control' ) ) {		
	$wp_customize->add_setting( 
		'hide_show_info' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_info', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'info_setting',
			'settings'    => 'hide_show_info',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	}
	/*=========================================
	Info contents Section first
	=========================================*/
	//  Info First Head
	$wp_customize->add_setting(
		'info_first_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'info_first_head',
		array(
			'type' => 'hidden',
			'label' => __('Info First','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	// info icon //
	if ( class_exists( 'Startkit_Customizer_Icon_Picker_Control' ) ) {
	$wp_customize->add_setting(
    	'info_icons',
    	array(
	        'default'			=> __('fa-envelope','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'priority' => 2,
		)
	);
	$wp_customize->add_control(new Startkit_Customizer_Icon_Picker_Control($wp_customize,   
		'info_icons',
		array(
		    'label'   => __('Icon','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_icons',
			'iconset' => 'fa',
		))  
	);
	}
	
	$theme = wp_get_theme(); // gets the current theme
		if ( 'StartBiz' == $theme->name){
			// Image // 
			$wp_customize->add_setting( 
				'info_image' , 
				array(
					'default' 			=> CLEVERFOX_PLUGIN_URL .'inc/startkit/images/info/info-01.jpg',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'startkit_sanitize_url',	
					'priority' => 2,
				) 
			);
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'info_image' ,
				array(
					'label'          => __( 'Image', 'clever-fox' ),
					'section'        => 'info_setting',
				) 
			));
		}
	
	// info title //
	$wp_customize->add_setting(
    	'info_title',
    	array(
	        'default'			=> __('Design For Business','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 3,
		)
	);
	$wp_customize->add_control( 
		'info_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_title',
			'type' => 'text',
		)  
	);
	// info Description //
	$wp_customize->add_setting(
    	'info_description',
    	array(
	        'default'			=> __('The chunk standard of Lorem Ipsum used since the 900s is reproduced below','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);
	$wp_customize->add_control( 
		'info_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_description',
			'type' => 'textarea',
		)  
	);
	/*=========================================
	Info contents Section second
	=========================================*/
	
	//  Info Second Head
	$wp_customize->add_setting(
		'info_second_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 8,
		)
	);

	$wp_customize->add_control(
	'info_second_head',
		array(
			'type' => 'hidden',
			'label' => __('Info Second','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	// info icon //
	if ( class_exists( 'Startkit_Customizer_Icon_Picker_Control' ) ) {
	$wp_customize->add_setting(
    	'info_icons2',
    	array(
	        'default'			=> __('fa-cart-plus','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'priority' => 9,
		)
	);
	
	$wp_customize->add_control(new Startkit_Customizer_Icon_Picker_Control($wp_customize,   
		'info_icons2',
		array(
		    'label'   => __('Icon','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_icons2',
			'iconset' => 'fa',
		))  
	);
	}
	
	$theme = wp_get_theme(); // gets the current theme
		if ( 'StartBiz' == $theme->name){
			// Image // 
			$wp_customize->add_setting( 
				'info_image2' , 
				array(
					'default' 			=> CLEVERFOX_PLUGIN_URL .'inc/startkit/images/info/info-02.jpg',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'startkit_sanitize_url',	
					'priority' => 9,
				) 
			);
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'info_image2' ,
				array(
					'label'          => __( 'Image', 'clever-fox' ),
					'section'        => 'info_setting',
				) 
			));
		}
		
	// info title //
	$wp_customize->add_setting(
    	'info_title2',
    	array(
	        'default'			=> __('Develop For Work','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 10,
		)
	);
	
	$wp_customize->add_control( 
		'info_title2',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_title2',
			'type' => 'text',
		)  
	);
	
	// info Description //
	$wp_customize->add_setting(
    	'info_description2',
    	array(
	        'default'			=> __('The chunk standard of Lorem Ipsum used since the 900s is reproduced below','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 11,
		)
	);
	
	$wp_customize->add_control( 
		'info_description2',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_description2',
			'type' => 'textarea',
		)  
	);
	/*=========================================
	Info contents Section third
	=========================================*/
	//  Info Third Head
	$wp_customize->add_setting(
		'info_third_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 15,
		)
	);

	$wp_customize->add_control(
	'info_third_head',
		array(
			'type' => 'hidden',
			'label' => __('Info Third','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	// info icon //
	if ( class_exists( 'Startkit_Customizer_Icon_Picker_Control' ) ) {
	$wp_customize->add_setting(
    	'info_icons3',
    	array(
	        'default'			=> __('fa-life-saver','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'priority' => 16,
		)
	);
	$wp_customize->add_control(new Startkit_Customizer_Icon_Picker_Control($wp_customize, 
		'info_icons3',
		array(
		    'label'   => __('Icon','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_icons3',
			'iconset' => 'fa',
		))  
	);
	}
	
	$theme = wp_get_theme(); // gets the current theme
		if ( 'StartBiz' == $theme->name){
			// Image // 
			$wp_customize->add_setting( 
				'info_image3' , 
				array(
					'default' 			=> CLEVERFOX_PLUGIN_URL .'inc/startkit/images/info/info-03.jpg',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'startkit_sanitize_url',	
					'priority' => 2,
				) 
			);
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'info_image3' ,
				array(
					'label'          => __( 'Image', 'clever-fox' ),
					'section'        => 'info_setting',
				) 
			));
		}
		
	// info title //
	$wp_customize->add_setting(
    	'info_title3',
    	array(
	        'default'			=> __('Maketing For Blast','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 17,
		)
	);
	$wp_customize->add_control( 
		'info_title3',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_title3',
			'type' => 'text',
		)  
	);
	
	// info Description //
	$wp_customize->add_setting(
    	'info_description3',
    	array(
	        'default'			=> __('The chunk standard of Lorem Ipsum used since the 900s is reproduced below','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 18,
		)
	);
	$wp_customize->add_control( 
		'info_description3',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_description3',
			'type' => 'textarea',
		)  
	);
	/*=========================================
	Info contents Section Fourth
	=========================================*/
			
	$theme = wp_get_theme(); // gets the current theme
		if ( 'Arowana' == $theme->name || 'Envira' == $theme->name){
			
			//  Info Fourth Head
			$wp_customize->add_setting(
				'info_fourth_head'
					,array(
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'startkit_sanitize_text',
					'priority' => 21,
				)
			);

			$wp_customize->add_control(
			'info_fourth_head',
				array(
					'type' => 'hidden',
					'label' => __('Info Fourth','clever-fox'),
					'section' => 'info_setting',
				)
			);
			
			// info icon //
			if ( class_exists( 'Startkit_Customizer_Icon_Picker_Control' ) ) {
			$wp_customize->add_setting(
				'info_contact_icon',
				array(
					'default'			=> 'fa-phone',
					'capability'     	=> 'edit_theme_options',
					'priority' => 22,
				)
			);
			$wp_customize->add_control(new Startkit_Customizer_Icon_Picker_Control($wp_customize, 
				'info_contact_icon',
				array(
					'label'   => __('Icon','clever-fox'),
					'section' => 'info_setting',
					'iconset' => 'fa',
				))  
			);
			}
			
			// info title //
			$wp_customize->add_setting(
				'info_contact_title',
				array(
					'default'			=> __('Contact Us Today!','clever-fox'),
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'startkit_sanitize_html',
					'transport'         => $selective_refresh,
					'priority' => 23,
				)
			);
			$wp_customize->add_control( 
				'info_contact_title',
				array(
					'label'   => __('Title','clever-fox'),
					'section' => 'info_setting',
					'type' => 'text',
				)  
			);
			
			// info Description //
			$wp_customize->add_setting(
				'info_contact_desc',
				array(
					'default'			=> __('+85-852-654','clever-fox'),
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'startkit_sanitize_html',
					'transport'         => $selective_refresh,
					'priority' => 24,
				)
			);
			$wp_customize->add_control( 
				'info_contact_desc',
				array(
					'label'   => __('Description','clever-fox'),
					'section' => 'info_setting',
					'type' => 'textarea',
				)  
			);
		}
	}
add_action( 'customize_register', 'startkit_info_setting' );
endif;

/**
 * Add selective refresh for Front page section section controls.
 */
function startkit_home_info_section_partials( $wp_customize ){
	//info  section first
	$wp_customize->selective_refresh->add_partial( 'info_title', array(
		'selector'            => '#features-list .first h4, #features-list .first .item--title a',
		'settings'            => 'info_title',
		'render_callback'  => 'info_section_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_icons', array(
		'selector'            => '#features-list .first .icon',
		'settings'            => 'info_icons',
		'render_callback'  => 'home_service_section_icon_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_description', array(
		'selector'            => '#features-list .first p, #features-list .first .item--content',
		'settings'            => 'info_description',
		'render_callback'  => 'home_service_section_description_render_callback',
	
	) );
// info second	
	$wp_customize->selective_refresh->add_partial( 'info_title2', array(
		'selector'            => '#features-list .second h4, #features-list .second .item--title a',
		'settings'            => 'info_title2',
		'render_callback'  => 'info_second_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_icons2', array(
		'selector'            => '#features-list .second .icon',
		'settings'            => 'info_icons2',
		'render_callback'  => 'info_second_icon_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_description2', array(
		'selector'            => '#features-list .second p, #features-list .second .item--content',
		'settings'            => 'info_description2',
		'render_callback'  => 'info_second_description_render_callback',
	
	) );
	
	// info third	
	$wp_customize->selective_refresh->add_partial( 'info_title3', array(
		'selector'            => '#features-list .third h4, #features-list .third .item--title a',
		'settings'            => 'info_title3',
		'render_callback'  => 'info_third_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_icons3', array(
		'selector'            => '#features-list .third .icon',
		'settings'            => 'info_icons3',
		'render_callback'  => 'info_third_icon_render_callback',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_description3', array(
		'selector'            => '#features-list .third p, #features-list .third .item--content',
		'settings'            => 'info_description3',
		'render_callback'  => 'info_third_description_render_callback',
	
	) );
	
	
	// info Fourth	
	$wp_customize->selective_refresh->add_partial( 'info_contact_title', array(
		'selector'            => '#features-list .fourth h4',
		'settings'            => 'info_contact_title',
		'render_callback'  => 'startkit_info_contact_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_contact_icon', array(
		'selector'            => '#features-list .fourth .icon',
		'settings'            => 'info_contact_icon',
		'render_callback'  => 'startkit_info_contact_icon_render_callback',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_contact_desc', array(
		'selector'            => '#features-list .fourth h3, #features-list .fourth p',
		'settings'            => 'info_contact_desc',
		'render_callback'  => 'startkit_info_contact_desc_render_callback',
	
	) );
	
}
add_action( 'customize_register', 'startkit_home_info_section_partials' );
// info first
function info_section_title_render_callback() {
	return get_theme_mod( 'info_title' );
}
function home_service_section_icon_render_callback() {
	return get_theme_mod( 'info_icons' );
}

function home_service_section_description_render_callback() {
	return get_theme_mod( 'info_description' );
}


// info second
function info_second_title_render_callback() {
	return get_theme_mod( 'info_title2' );
}
function info_second_icon_render_callback() {
	return get_theme_mod( 'info_icons2' );
}

function info_second_description_render_callback() {
	return get_theme_mod( 'info_description2' );
}
	
// info third
function info_third_title_render_callback() {
	return get_theme_mod( 'info_title3' );
}
function info_third_icon_render_callback() {
	return get_theme_mod( 'info_icons3' );
}

function info_third_description_render_callback() {
	return get_theme_mod( 'info_description3' );
}

// info Fourth
function startkit_info_contact_title_render_callback() {
	return get_theme_mod( 'info_contact_title' );
}
function startkit_info_contact_icon_render_callback() {
	return get_theme_mod( 'info_contact_icon' );
}

function startkit_info_contact_desc_render_callback() {
	return get_theme_mod( 'info_contact_desc' );
}