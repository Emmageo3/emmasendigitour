<?php
function avril_cta_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	CTA  Section
	=========================================*/
	$wp_customize->add_section(
		'cta_setting', array(
			'title' => esc_html__( 'Call to Action Section', 'clever-fox' ),
			'priority' => 12,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// CTA Setting
	$wp_customize->add_setting(
		'cta_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 2,
		)
	);

	$wp_customize->add_control(
	'cta_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_cta' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_cta', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'cta_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// CTA Content Section // 
	$wp_customize->add_setting(
		'cta_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'cta_contents',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
	// CTA Image // 
	$wp_customize->add_setting( 
    	'cta_image' , 
    	array(
			'default' 			=> CLEVERFOX_PLUGIN_URL . '/inc/avail/images/cta-image.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 3,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'cta_image' ,
		array(
			'label'          => __( 'Image', 'clever-fox' ),
			'section'        => 'cta_setting',
		) 
	));
	
	// CTA Title // 
	$wp_customize->add_setting(
    	'cta_title',
    	array(
	        'default'			=> __('We work in partnership with all the major <span class="primary-color"><em>technology</em></span> solutions','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'textarea',
		)  
	);
	
	// CTA Description // 
	$wp_customize->add_setting(
    	'cta_description',
    	array(
	        'default'			=> __('There are many variations of passages of lorem Ipsum available, but the majority','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Button First //  
	$wp_customize->add_setting(
		'cta_btn_first'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'cta_btn_first',
		array(
			'type' => 'hidden',
			'label' => __('Button First','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'cta_btn_lbl1',
    	array(
	        'default'			=> __('Purchase Now','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 8,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_lbl1',
		array(
		    'label'   => __('Button Label','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'cta_btn_link1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 9,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_link1',
		array(
		    'label'   => __('Link','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	// Button Second //  
	$wp_customize->add_setting(
		'cta_btn_second'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 10,
		)
	);
	
	$wp_customize->add_control(
	'cta_btn_second',
		array(
			'type' => 'hidden',
			'label' => __('Button Second','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
		$wp_customize->add_setting(
		'cta_btn_second_ttl'
			,array(
			'default' => __('Get Quick Support','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 10,
		)
	);

	$wp_customize->add_control(
	'cta_btn_second_ttl',
		array(
			'type' => 'text',
			'label' => __('Title','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'cta_btn_lbl2',
    	array(
	        'default'			=> __('+22 24588-55069','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 11,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_lbl2',
		array(
		    'label'   => __('Label','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'cta_btn_link2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 12,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_link2',
		array(
		    'label'   => __('Link','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
}

add_action( 'customize_register', 'avril_cta_setting' );

// CTA selective refresh
function avril_ata_section_partials( $wp_customize ){
	
	// cta_title
	$wp_customize->selective_refresh->add_partial( 'cta_title', array(
		'selector'            => '.home-cta .cta-content h4',
		'settings'            => 'cta_title',
		'render_callback'  => 'avril_cta_title_render_callback',
	
	) );
	
	// cta_description
	$wp_customize->selective_refresh->add_partial( 'cta_description', array(
		'selector'            => '.home-cta .cta-content p',
		'settings'            => 'cta_description',
		'render_callback'  => 'avril_cta_description_render_callback',
	) );
	
	// cta_btn_lbl1
	$wp_customize->selective_refresh->add_partial( 'cta_btn_lbl1', array(
		'selector'            => '.home-cta  a.av-btn-white',
		'settings'            => 'cta_btn_lbl1',
		'render_callback'  => 'avril_cta_btn_lbl1_render_callback',
	) );
	
	// cta_btn_lbl2
	$wp_customize->selective_refresh->add_partial( 'cta_btn_lbl2', array(
		'selector'            => '.home-cta span.cta-label-dis',
		'settings'            => 'cta_btn_lbl2',
		'render_callback'  => 'avril_cta_btn_lbl2_render_callback',
	) );
	
	// cta_btn_second_ttl
	$wp_customize->selective_refresh->add_partial( 'cta_btn_second_ttl', array(
		'selector'            => '.home-cta span.cta-label-title',
		'settings'            => 'cta_btn_second_ttl',
		'render_callback'  => 'avril_cta_btn_second_ttl_render_callback',
	) );
	
	}

add_action( 'customize_register', 'avril_ata_section_partials' );

// cta_title
function avril_cta_title_render_callback() {
	return get_theme_mod( 'cta_title' );
}


// cta_description
function avril_cta_description_render_callback() {
	return get_theme_mod( 'cta_description' );
}

// cta_btn_lbl1
function avril_cta_btn_lbl1_render_callback() {
	return get_theme_mod( 'cta_btn_lbl1' );
}

// cta_btn_lbl2
function avril_cta_btn_lbl2_render_callback() {
	return get_theme_mod( 'cta_btn_lbl2' );
}

// cta_btn_second_ttl
function avril_cta_btn_second_ttl_render_callback() {
	return get_theme_mod( 'cta_btn_second_ttl' );
}