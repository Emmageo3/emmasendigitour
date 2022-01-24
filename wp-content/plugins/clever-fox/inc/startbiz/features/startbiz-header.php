<?php
function startbiz_lite_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Header Contact Info // 
	$wp_customize->add_section(
        'hdr_nav_ct_info',
        array(
        	'priority'      => 4,
            'title' 		=> esc_html__('Contact Info','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	// hide/show 
	$wp_customize->add_setting( 
		'hs_hdr_nav_ct_info' , 
			array(
			'default' => esc_html__('1','clever-fox'),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'hs_hdr_nav_ct_info', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'hdr_nav_ct_info',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
	
	// icon 
	$wp_customize->add_setting(
    	'hdr_nav_ct_info_icon',
    	array(
	        'default'			=> 'fa-phone',
			'sanitize_callback' => 'startkit_sanitize_text',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Startkit_Customizer_Icon_Picker_Control($wp_customize,  
		'hdr_nav_ct_info_icon',
		array(
		    'label'   => esc_html__('Icon','clever-fox'),
		    'section' => 'hdr_nav_ct_info',
			'iconset' => 'fa',
			'priority' => 3,
		))  
	);
	// Title
	$wp_customize->add_setting(
    	'hdr_nav_ct_info_ttl',
    	array(
			'default'   => esc_html__('CALL FOR EMRGENCY','clever-fox'),
			'sanitize_callback' => 'startkit_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'hdr_nav_ct_info_ttl',
		array(
		    'label'   => esc_html__('Title','clever-fox'),
		    'section' => 'hdr_nav_ct_info',
			'type' => 'text',
			'priority' => 4,
		)  
	);
	
	// Subtitle
	$wp_customize->add_setting(
    	'hdr_nav_ct_info_subttl',
    	array(
			'default'   => esc_html__('+1-900-242-23-23','clever-fox'),
			'sanitize_callback' => 'startkit_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'hdr_nav_ct_info_subttl',
		array(
		    'label'   => esc_html__('Subtitle','clever-fox'),
		    'section' => 'hdr_nav_ct_info',
			'type' => 'text',
			'priority' => 5,
		)  
	);
	
	
	// Link
	$wp_customize->add_setting(
    	'hdr_nav_ct_info_url',
    	array(
			'sanitize_callback' => 'startkit_sanitize_url',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'hdr_nav_ct_info_url',
		array(
		    'label'   => esc_html__('Link','clever-fox'),
		    'section' => 'hdr_nav_ct_info',
			'type' => 'text',
			'priority' => 5,
		)  
	);
	
}
add_action( 'customize_register', 'startbiz_lite_header_settings' );

// Header selective refresh
function startbiz_lite_header_partials( $wp_customize ){
	// hdr_nav_ct_info_ttl
	$wp_customize->selective_refresh->add_partial( 'hdr_nav_ct_info_ttl', array(
		'selector'            => '.navbar-area .emergency-call .text',
		'settings'            => 'hdr_nav_ct_info_ttl',
		'render_callback'  => 'startbiz_hdr_nav_ct_info_ttl_render_callback',
	) );
	
	// hdr_nav_ct_info_subttl
	$wp_customize->selective_refresh->add_partial( 'hdr_nav_ct_info_subttl', array(
		'selector'            => '.navbar-area  .emergency-call .title',
		'settings'            => 'hdr_nav_ct_info_subttl',
		'render_callback'  => 'startbiz_hdr_nav_ct_info_subttl_render_callback',
	) );
	}

add_action( 'customize_register', 'startbiz_lite_header_partials' );

// hdr_nav_ct_info_ttl
function startbiz_hdr_nav_ct_info_ttl_render_callback() {
	return get_theme_mod( 'hdr_nav_ct_info_ttl' );
}

// hdr_nav_ct_info_subttl
function startbiz_hdr_nav_ct_info_subttl_render_callback() {
	return get_theme_mod( 'hdr_nav_ct_info_subttl' );
}