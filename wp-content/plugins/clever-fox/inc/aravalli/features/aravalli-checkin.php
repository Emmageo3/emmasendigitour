<?php
function aravalli_checkin_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Checkin  Section
	=========================================*/
	$wp_customize->add_section(
		'checkin_setting', array(
			'title' => esc_html__( 'Checkin Section', 'clever-fox' ),
			'priority' => 2,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Setting Head // 
	$wp_customize->add_setting(
		'checkin_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'checkin_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'checkin_setting',
		)
	);
	
	// Hide Show // 
	$wp_customize->add_setting(
		'checkin_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'checkin_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'checkin_setting',
		)
	);
	
	// Checkin Content Section // 
	$wp_customize->add_setting(
		'checkin_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'checkin_contents',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'checkin_setting',
		)
	);
	
	
	//  Title // 
	$wp_customize->add_setting(
    	'checkin_title',
    	array(
	        'default'			=> __('Find a Room','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'checkin_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'checkin_setting',
			'type'           => 'text',
		)  
	);
	
	// Description // 
	$wp_customize->add_setting(
    	'checkin_desc',
    	array(
	        'default'			=> __('When you want to be our guest ?','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'checkin_desc',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'checkin_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	// shortcode // 
	$wp_customize->add_setting(
    	'checkin_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'checkin_shortcode',
		array(
		    'label'   => __('Shortcode','clever-fox'),
		    'section' => 'checkin_setting',
			'type'           => 'textarea',
		)  
	);

}

add_action( 'customize_register', 'aravalli_checkin_setting' );

// Checkin selective refresh
function aravalli_checkin_section_partials( $wp_customize ){
	
	// checkin_title
	$wp_customize->selective_refresh->add_partial( 'checkin_title', array(
		'selector'            => '.home-checkin .checkin-text h3',
		'settings'            => 'checkin_title',
		'render_callback'  => 'aravalli_checkin_title_render_callback',
	
	) );
	
	// checkin_desc
	$wp_customize->selective_refresh->add_partial( 'checkin_desc', array(
		'selector'            => '.home-checkin .checkin-text p',
		'settings'            => 'checkin_desc',
		'render_callback'  => 'aravalli_checkin_desc_render_callback',
	) );
	}

add_action( 'customize_register', 'aravalli_checkin_section_partials' );

// checkin_title
function aravalli_checkin_title_render_callback() {
	return get_theme_mod( 'checkin_title' );
}


// checkin_desc
function aravalli_checkin_desc_render_callback() {
	return get_theme_mod( 'checkin_desc' );
}
