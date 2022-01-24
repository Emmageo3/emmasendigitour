<?php
function avril_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'avril'),
		) 
	);

	/*=========================================
	Avril Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','avril'),
			'panel'  		=> 'header_section',
		)
    );
		
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Navigation','avril'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Search
	$wp_customize->add_setting(
		'hdr_nav_search'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_search',
		array(
			'type' => 'hidden',
			'label' => __('Search','avril'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Button
	$wp_customize->add_setting(
		'hdr_nav_btn'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_btn',
		array(
			'type' => 'hidden',
			'label' => __('Button','avril'),
			'section' => 'header_navigation',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_nav_btn' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_nav_btn', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// Button Label // 
	$wp_customize->add_setting(
    	'nav_btn_lbl',
    	array(
			'sanitize_callback' => 'avril_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'nav_btn_lbl',
		array(
		    'label'   		=> __('Button Label','avril'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	// Button Link // 
	$wp_customize->add_setting(
    	'nav_btn_link',
    	array(
			'sanitize_callback' => 'avril_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 8,
		)
	);	

	$wp_customize->add_control( 
		'nav_btn_link',
		array(
		    'label'   		=> __('Button Link','avril'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','avril'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','avril'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'avril_header_settings' );

// Header selective refresh
function avril_header_partials( $wp_customize ){
	
	// hide_show_nav_btn
	$wp_customize->selective_refresh->add_partial(
		'hide_show_nav_btn', array(
			'selector' => '.navigator .av-button-area',
			'container_inclusive' => true,
			'render_callback' => 'header_navigation',
			'fallback_refresh' => true,
		)
	);
	
}
add_action( 'customize_register', 'avril_header_partials' );