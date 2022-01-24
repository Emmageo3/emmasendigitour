<?php 
function avril_info_setting( $wp_customize ) {

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Info
	=========================================*/
		$wp_customize->add_section(
			'info_setting', array(
				'title' => esc_html__( 'Info Section', 'clever-fox' ),
				'panel' => 'avril_frontpage_sections',
				'priority' => 2,
			)
		);
	
	// Info Setting
	$wp_customize->add_setting(
		'info_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 2,
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
	
	$wp_customize->add_setting( 
		'hs_info' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_info', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'info_setting',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Info contents Section first
	=========================================*/
	
	// Settings
	$wp_customize->add_setting(
		'info_first_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'info_first_settings',
		array(
			'type' => 'hidden',
			'label' => __('Info First','clever-fox'),
			'section' => 'info_setting',
		)
	);

	// info section icon // 
	$wp_customize->add_setting(
    	'info_first_icon_setting',
    	array(
	        'default' => 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'info_first_icon_setting',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'info_setting',
			'iconset' => 'fa',
			'settings' 		 => 'info_first_icon_setting',
			
		))  
	);
	
	// info title //
	$wp_customize->add_setting(
    	'info_title',
    	array(
	        'default'			=> __('Opening Hours','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 6,
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
	        'default'			=> __('Monday-Friday: 09:00-22:00','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);
	
	$wp_customize->add_control( 
		'info_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_description',
			'type' => 'text',
		)  
	);
	
	// info link //
	$wp_customize->add_setting(
    	'info_link',
    	array(
	        'default'			=> __('#','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 9,
		)
	);
	
	$wp_customize->add_control( 
		'info_link',
		array(
		    'label'   => __('Link','clever-fox'),
		    'section' => 'info_setting',
			'type' => 'text',
		)  
	);
	/*=========================================
	Info contents Section second
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'info2_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'info2_settings',
		array(
			'type' => 'hidden',
			'label' => __('Info Second','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	// info section icon // 
	$wp_customize->add_setting(
    	'info_second_icon_setting',
    	array(
	        'default' => 'fa-home',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 13,
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'info_second_icon_setting',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'info_setting',
			'iconset' => 'fa',
			'settings' 		 => 'info_second_icon_setting',
			
		))  
	);
	
	// info title //
	$wp_customize->add_setting(
    	'info_title2',
    	array(
	        'default'			=> __('Our Location','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 14,
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
	        'default'			=> __('California Floor, USA 1208','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 15,
		)
	);
	
	$wp_customize->add_control( 
		'info_description2',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_description2',
			'type' => 'text',
		)  
	);
	
	// info link //
	$wp_customize->add_setting(
    	'info_link2',
    	array(
	        'default'			=> __('#','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 17,
		)
	);
	
	$wp_customize->add_control( 
		'info_link2',
		array(
		    'label'   => __('Link','clever-fox'),
		    'section' => 'info_setting',
			'type' => 'text',
		)  
	);
	/*=========================================
	Info contents Section third
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'info3_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 21,
		)
	);

	$wp_customize->add_control(
	'info3_settings',
		array(
			'type' => 'hidden',
			'label' => __('Info Third','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	// info section icon // 
	$wp_customize->add_setting(
    	'info_third_icon_setting',
    	array(
	        'default' => 'fa-calendar',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 23,
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'info_third_icon_setting',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'info_setting',
			'iconset' => 'fa',
			'settings' 		 => 'info_third_icon_setting',
			
		))  
	);
	
	// info title //
	$wp_customize->add_setting(
    	'info_title3',
    	array(
	        'default'			=> __('Booking Now','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 24,
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
	        'default'			=> __('+00-245-152-5500','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 25,
		)
	);
	
	$wp_customize->add_control( 
		'info_description3',
		array(
			'label'   => __('Description','clever-fox'),
		    'section' => 'info_setting',
			'settings'=> 'info_description3',
			'type' => 'text',
		)  
	);
	
	// info link //
	$wp_customize->add_setting(
    	'info_link3',
    	array(
	        'default'			=> __('#','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 27,
		)
	);
	
	$wp_customize->add_control( 
		'info_link3',
		array(
		    'label'   => __('Link','clever-fox'),
		    'section' => 'info_setting',
			'type' => 'text',
		)  
	);
}
add_action( 'customize_register', 'avril_info_setting' );

/**
 * Add selective refresh for Front page section section controls.
 */
function avril_home_info_section_partials( $wp_customize ){
	
	//info  section first
	$wp_customize->selective_refresh->add_partial( 'info_title', array(
		'selector'            => '#info-section .info-first .text',
		'settings'            => 'info_title',
		'render_callback'  => 'info_section_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_description', array(
		'selector'            => '#info-section .info-first .title',
		'settings'            => 'info_description',
		'render_callback'  => 'home_service_section_description_render_callback',
	
	) );
// info second	
	$wp_customize->selective_refresh->add_partial( 'info_title2', array(
		'selector'            => '#info-section .info-second .text',
		'settings'            => 'info_title2',
		'render_callback'  => 'info_second_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_description2', array(
		'selector'            => '#info-section .info-second .title',
		'settings'            => 'info_description2',
		'render_callback'  => 'info_second_description_render_callback',
	
	) );
	// info third	
	$wp_customize->selective_refresh->add_partial( 'info_title3', array(
		'selector'            => '#info-section .info-third .text',
		'settings'            => 'info_title3',
		'render_callback'  => 'info_third_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'info_description3', array(
		'selector'            => '#info-section .info-third .title',
		'settings'            => 'info_description3',
		'render_callback'  => 'info_third_description_render_callback',
	
	) );
	
}

add_action( 'customize_register', 'avril_home_info_section_partials' );
// info first
function info_section_title_render_callback() {
	return get_theme_mod( 'info_title' );
}

function home_service_section_description_render_callback() {
	return get_theme_mod( 'info_description' );
}
// info second
function info_second_title_render_callback() {
	return get_theme_mod( 'info_title2' );
}

function info_second_description_render_callback() {
	return get_theme_mod( 'info_description2' );
}	
// info third
function info_third_title_render_callback() {
	return get_theme_mod( 'info_title3' );
}

function info_third_description_render_callback() {
	return get_theme_mod( 'info_description3' );
}
