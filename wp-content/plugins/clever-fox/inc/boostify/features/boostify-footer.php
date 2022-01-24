<?php
function boostify_abv_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Footer Above
	=========================================*/	
	$wp_customize->add_section(
        'footer_above',
        array(
            'title' 		=> __('Footer Above','clever-fox'),
			'panel'  		=> 'footer_section',
			'priority'      => 2,
		)
    );
	
	// Footer Above
	$wp_customize->add_setting(
		'footer_above_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority'  => 1,
		)
	);

	$wp_customize->add_control(
	'footer_above_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'footer_above',
		)
	);
	
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_footer' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_footer', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	
	
	
	// Content Head
	$wp_customize->add_setting(
		'footer_above_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority'  => 3,
		)
	);

	$wp_customize->add_control(
	'footer_above_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','clever-fox'),
			'section' => 'footer_above',
		)
	);
	
	// title // 
	$wp_customize->add_setting(
    	'footer_above_ttl',
    	array(
	        'default'			=> __('Do you like that you see?','clever-fox'),
			'sanitize_callback' => 'boostify_sanitize_html',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	

	$wp_customize->add_control( 
		'footer_above_ttl',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'footer_above',
			'type'		 =>	'text'
		)  
	);
	
	
	// Button Label First // 
	$wp_customize->add_setting(
    	'footer_above_btn_lbl1',
    	array(
	        'default'			=> __('Request a Quote','clever-fox'),
			'sanitize_callback' => 'boostify_sanitize_html',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'footer_above_btn_lbl1',
		array(
		    'label'   		=> __('Button Label First','clever-fox'),
		    'section' 		=> 'footer_above',
			'type'		 =>	'text'
		)  
	);
	
	// Button Url First // 
	$wp_customize->add_setting(
    	'footer_above_btn_url1',
    	array(
	        'default'			=> '#',
			'sanitize_callback' => 'boostify_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 6,
		)
	);	

	$wp_customize->add_control( 
		'footer_above_btn_url1',
		array(
		    'label'   		=> __('Button Link First','clever-fox'),
		    'section' 		=> 'footer_above',
			'type'		 =>	'text'
		)  
	);
	
	
	// Middle Content // 
	$wp_customize->add_setting(
    	'footer_above_btn_mdl_text',
    	array(
	        'default'			=> __('or','clever-fox'),
			'sanitize_callback' => 'boostify_sanitize_html',
			'capability' => 'edit_theme_options',
			'priority' => 8,
		)
	);	

	$wp_customize->add_control( 
		'footer_above_btn_mdl_text',
		array(
		    'label'   		=> __('Middle Text','clever-fox'),
		    'section' 		=> 'footer_above',
			'type'		 =>	'text'
		)  
	);
	
	// Button Label Second // 
	$wp_customize->add_setting(
    	'footer_above_btn_lbl2',
    	array(
	        'default'			=> __('Contact Us','clever-fox'),
			'sanitize_callback' => 'boostify_sanitize_html',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 9,
		)
	);	

	$wp_customize->add_control( 
		'footer_above_btn_lbl2',
		array(
		    'label'   		=> __('Button Label Second','clever-fox'),
		    'section' 		=> 'footer_above',
			'type'		 =>	'text'
		)  
	);
	
	// Button Url Second // 
	$wp_customize->add_setting(
    	'footer_above_btn_url2',
    	array(
	        'default'			=> '#',
			'sanitize_callback' => 'boostify_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 10,
		)
	);	

	$wp_customize->add_control( 
		'footer_above_btn_url2',
		array(
		    'label'   		=> __('Button Link Second','clever-fox'),
		    'section' 		=> 'footer_above',
			'type'		 =>	'text'
		)  
	);
}
add_action( 'customize_register', 'boostify_abv_footer' );
// Footer selective refresh
function boostify_abv_footer_partials( $wp_customize ){
	// footer_above_ttl
	$wp_customize->selective_refresh->add_partial( 'footer_above_ttl', array(
		'selector'            => '.main-footer #action-bar .bar-text p',
		'settings'            => 'footer_above_ttl',
		'render_callback'  => 'boostify_footer_above_ttl_render_callback',
	) );
	
	// footer_above_btn_lbl1
	$wp_customize->selective_refresh->add_partial( 'footer_above_btn_lbl1', array(
		'selector'            => '.main-footer #action-bar a.white-bg',
		'settings'            => 'footer_above_btn_lbl1',
		'render_callback'  => 'boostify_footer_above_btn_lbl1_render_callback',
	) );
	
	// footer_above_btn_lbl2
	$wp_customize->selective_refresh->add_partial( 'footer_above_btn_lbl2', array(
		'selector'            => '.main-footer #action-bar a.contact-btn',
		'settings'            => 'footer_above_btn_lbl2',
		'render_callback'  => 'boostify_footer_above_btn_lbl2_render_callback',
	) );
	
	}

add_action( 'customize_register', 'boostify_abv_footer_partials' );

// footer_above_ttl
function boostify_footer_above_ttl_render_callback() {
	return get_theme_mod( 'footer_above_ttl' );
}

// footer_above_btn_lbl1
function boostify_footer_above_btn_lbl1_render_callback() {
	return get_theme_mod( 'footer_above_btn_lbl1' );
}

// footer_above_btn_lbl2
function boostify_footer_above_btn_lbl2_render_callback() {
	return get_theme_mod( 'footer_above_btn_lbl2' );
}