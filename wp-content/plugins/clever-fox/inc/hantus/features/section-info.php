<?php 
function hantus_info_setting( $wp_customize ) {

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
		$wp_customize->add_section(
			'info_setting', array(
				'title' => esc_html__( 'Info Section', 'clever-fox' ),
				'panel' => 'hantus_frontpage_sections',
				'priority' => apply_filters( 'hantus_section_priority', 12, 'hantus_info' ),
			)
		);
		
	//  Setting Head
	$wp_customize->add_setting(
		'hnts_info_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hnts_info_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'info_setting',
			'priority' => 1,
		)
	);
	
	// info Hide/ Show Setting // 
	if ( class_exists( 'Hantus_Customizer_Toggle_Control' ) ) {
	$wp_customize->add_setting( 
		'hide_show_info' , 
			array(
			'default' => esc_html__( '1', 'clever-fox' ),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_info', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'info_setting',
			'settings'    => 'hide_show_info',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
	}
	/*=========================================
	Info contents Section first
	=========================================*/
	//  Info First  Head
	$wp_customize->add_setting(
		'hnts_info_first_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hnts_info_first_head',
		array(
			'type' => 'hidden',
			'label' => __('Info First','clever-fox'),
			'section' => 'info_setting',
			'priority' => 5,
		)
	);
	
		//  Image // 
    $wp_customize->add_setting( 
    	'info_first_img_setting' , 
    	array(
			'default' 			=> CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon01.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'info_first_img_setting' ,
		array(
			'label'          => __( 'Image', 'clever-fox' ),
			'section'        => 'info_setting',
			'settings'   	 => 'info_first_img_setting',
			'priority' => 6,
		) 
	));
	
	// info title //
	$wp_customize->add_setting(
    	'info_title',
    	array(
	        'default'			=> __('Opening Time','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	
	$wp_customize->add_control( 
		'info_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_title',
			'type' => 'text',
			'priority' => 7,
		)  
	);
	
	// info Description //
	$wp_customize->add_setting(
    	'info_description',
    	array(
	        'default'			=> __('Mon - Sat: 10h00 - 18h00','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	
	$wp_customize->add_control( 
		'info_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_description',
			'type' => 'text',
			'priority' => 8,
		)  
	);
	
	// info button //
	$wp_customize->add_setting(
    	'info_btn',
    	array(
	        'default'			=> __('Read More','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 
		'info_btn',
		array(
		    'label'   => __('Button Label','clever-fox'),
		    'section' => 'info_setting',
			'type' => 'text',
			'priority' => 9,
		)  
	);
	
	// info link //
	$wp_customize->add_setting(
    	'info_link',
    	array(
	        'default'			=> __('#','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',
		)
	);
	
	$wp_customize->add_control( 
		'info_link',
		array(
		    'label'   => __('Button Link','clever-fox'),
		    'section' => 'info_setting',
			'type' => 'text',
			'priority' => 10,
		)  
	);
	
	/*=========================================
	Info contents Section second
	=========================================*/
		//  Info Second  Head
	$wp_customize->add_setting(
		'hnts_info_second_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hnts_info_second_head',
		array(
			'type' => 'hidden',
			'label' => __('Info Second','clever-fox'),
			'section' => 'info_setting',
			'priority' => 15,
		)
	);
	
		//  Image // 
    $wp_customize->add_setting( 
    	'info_second_img_setting' , 
    	array(
			'default' 			=> CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon02.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'info_second_img_setting' ,
		array(
			'label'          => __( 'Image', 'clever-fox' ),
			'section'        => 'info_setting',
			'settings'   	 => 'info_second_img_setting',
			'priority' => 16,
		) 
	));
	// info title //
	$wp_customize->add_setting(
    	'info_title2',
    	array(
	        'default'			=> __('Address','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	
	$wp_customize->add_control( 
		'info_title2',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_title2',
			'type' => 'text',
			'priority' => 17,
		)  
	);
	
	// info Description //
	$wp_customize->add_setting(
    	'info_description2',
    	array(
	        'default'			=> __('40 Baria Sreet, NY USA','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	
	$wp_customize->add_control( 
		'info_description2',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_description2',
			'type' => 'text',
			'priority' => 18,
		)  
	);
	
	// info button //
	$wp_customize->add_setting(
    	'info_btn2',
    	array(
	        'default'			=> __('Read More','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 
		'info_btn2',
		array(
		    'label'   => __('Button Label','clever-fox'),
		    'section' => 'info_setting',
			'type' => 'text',
			'priority' => 19,
		)  
	);
	
	// info link //
	$wp_customize->add_setting(
    	'info_link2',
    	array(
	        'default'			=> __('#','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',
		)
	);
	
	$wp_customize->add_control( 
		'info_link2',
		array(
		    'label'   => __('Button Link','clever-fox'),
		    'section' => 'info_setting',
			'type' => 'text',
			'priority' => 20,
		)  
	);
	
	/*=========================================
	Info contents Section third
	=========================================*/
	
	//  Info Third  Head
	$wp_customize->add_setting(
		'hnts_info_third_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hnts_info_third_head',
		array(
			'type' => 'hidden',
			'label' => __('Info Third','clever-fox'),
			'section' => 'info_setting',
			'priority' => 25,
		)
	);
	
		//  Image // 
    $wp_customize->add_setting( 
    	'info_third_img_setting' , 
    	array(
			'default' 			=> CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon03.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'info_third_img_setting' ,
		array(
			'label'          => __( 'Image', 'clever-fox' ),
			'section'        => 'info_setting',
			'settings'   	 => 'info_third_img_setting',
			'priority' => 26,
		) 
	));
	// info title //
	$wp_customize->add_setting(
    	'info_title3',
    	array(
	        'default'			=> __('Telephone','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	
	$wp_customize->add_control( 
		'info_title3',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_title3',
			'type' => 'text',
			'priority' => 27,
		)  
	);
	
	// info Description //
	$wp_customize->add_setting(
    	'info_description3',
    	array(
	        'default'			=> __('+12 345 678 9101','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		)
	);
	
	$wp_customize->add_control( 
		'info_description3',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_description3',
			'type' => 'text',
			'priority' => 28,
		)  
	);
	
	// info button //
	$wp_customize->add_setting(
    	'info_btn3',
    	array(
	        'default'			=> __('Read More','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control( 
		'info_btn3',
		array(
		    'label'   => __('Button Label','clever-fox'),
		    'section' => 'info_setting',
			'type' => 'text',
			'priority' => 29,
		)  
	);
	
	// info link //
	$wp_customize->add_setting(
    	'info_link3',
    	array(
	        'default'			=> __('#','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',
		)
	);
	
	$wp_customize->add_control( 
		'info_link3',
		array(
		    'label'   => __('Button Link','clever-fox'),
		    'section' => 'info_setting',
			'type' => 'text',
			'priority' => 30,
		)  
	);
	
}
add_action( 'customize_register', 'hantus_info_setting' );

/**
 * Add selective refresh for Front page section section controls.
 */
function hantus_home_info_section_partials( $wp_customize ){
	
	// hide_show_info
	$wp_customize->selective_refresh->add_partial(
		'hide_show_info', array(
			'selector' => '#contact2',
			'container_inclusive' => true,
			'render_callback' => 'info_setting',
			'fallback_refresh' => true,
		)
	);
	
	//info  section first
	$wp_customize->selective_refresh->add_partial( 'info_title', array(
		'selector'            => '#contact2 .info-first h4',
		'settings'            => 'info_title',
		'render_callback'  => 'info_section_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_first_img_setting', array(
		'selector'            => '#contact2 .info-first img',
		'settings'            => 'info_first_img_setting',
		'render_callback'  => 'home_service_section_img_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_description', array(
		'selector'            => '#contact2 .info-first p',
		'settings'            => 'info_description',
		'render_callback'  => 'home_service_section_description_render_callback',
	
	) );
// info second	
	$wp_customize->selective_refresh->add_partial( 'info_title2', array(
		'selector'            => '#contact2 .info-second h4',
		'settings'            => 'info_title2',
		'render_callback'  => 'info_second_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_second_img_setting', array(
		'selector'            => '#contact .info-second img',
		'settings'            => 'info_second_img_setting',
		'render_callback'  => 'info_second_img_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_description2', array(
		'selector'            => '#contact2 .info-second p',
		'settings'            => 'info_description2',
		'render_callback'  => 'info_second_description_render_callback',
	
	) );
	// info third	
	$wp_customize->selective_refresh->add_partial( 'info_title3', array(
		'selector'            => '#contact2 .info-third h4',
		'settings'            => 'info_title3',
		'render_callback'  => 'info_third_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_third_img_setting', array(
		'selector'            => '#contact .info-third img',
		'settings'            => 'info_third_img_setting',
		'render_callback'  => 'info_third_img_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_description3', array(
		'selector'            => '#contact2 .info-third p',
		'settings'            => 'info_description3',
		'render_callback'  => 'info_third_description_render_callback',
	
	) );
	
}

add_action( 'customize_register', 'hantus_home_info_section_partials' );
// info first
function info_section_title_render_callback() {
	return get_theme_mod( 'info_title' );
}
function home_service_section_img_render_callback() {
	return get_theme_mod( 'info_first_img_setting' );
}

function home_service_section_description_render_callback() {
	return get_theme_mod( 'info_description' );
}
// info second
function info_second_title_render_callback() {
	return get_theme_mod( 'info_title2' );
}
function info_second_img_render_callback() {
	return get_theme_mod( 'info_second_img_setting' );
}

function info_second_description_render_callback() {
	return get_theme_mod( 'info_description2' );
}	
// info third
function info_third_title_render_callback() {
	return get_theme_mod( 'info_title3' );
}
function info_third_img_render_callback() {
	return get_theme_mod( 'info_third_img_setting' );
}

function info_third_description_render_callback() {
	return get_theme_mod( 'info_description3' );
}
