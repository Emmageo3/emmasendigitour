<?php
function conceptly_call_action_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	Call Action Section Panel
	=========================================*/
		$wp_customize->add_section(
			'call_action_setting', array(
				'title' => esc_html__( 'Call to Action Section', 'clever-fox' ),
				'panel' => 'conceptly_frontpage_sections',
				'priority' => apply_filters( 'conceptly_section_priority',65, 'conceptly_call' ),
			)
		);
	
	/*=========================================
	Call Action Settings Section
	=========================================*/
	
	// cta Setting Head
	$wp_customize->add_setting(
		'cta_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'cta_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'call_action_setting',
		)
	);
	
	$wp_customize->add_setting( 
		'hide_show_cta' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Conceptly_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_cta', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'call_action_setting',
			'settings'    => 'hide_show_cta',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	// Call Action Settings Section // 
	
	// cta Content Head
	$wp_customize->add_setting(
		'cta_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'cta_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'call_action_setting',
		)
	);
	
	// Call to action title // 
	$wp_customize->add_setting(
    	'call_to_action_title',
    	array(
	        'default'			=> __('Become a Part of Community !','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'call_to_action_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'call_action_setting',
			'settings'   	 => 'call_to_action_title',
			'type'           => 'text',
		)  
	);
	
	// call-to-action Description // 
	$wp_customize->add_setting(
    	'call_to_action_description',
    	array(
	        'default'			=> __('Get in touch with us and send some basic info for a quick quote','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'call_to_action_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'call_action_setting',
			'settings'   	 => 'call_to_action_description',
			'type'           => 'textarea',
		)  
	);
	
	
	// Call_to_action Button // 
	
	//call_icon Setting // 
	$wp_customize->add_setting(
    	'cta_icon',
    	array(
	        'default'			=> __('fa-shopping-cart','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 8,
		)
	);	

	$wp_customize->add_control(new Conceptly_Icon_Picker_Control($wp_customize, 
		'cta_icon',
		array(
		    'label'   => __('CTA Button Icon','clever-fox'),
		    'section' => 'call_action_setting',
			'settings'=> 'cta_icon',
			'iconset' => 'fa',
		) ) 
	);
	// Call Button Label // 
	$wp_customize->add_setting(
    	'call_action_button_label',
    	array(
	        'default'			=> __('Purchase Now','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 9,
		)
	);	
	
	$wp_customize->add_control( 
		'call_action_button_label',
		array(
		    'label'   => __('Button Text','clever-fox'),
		    'section' => 'call_action_setting',
			'settings'       => 'call_action_button_label',
			'type'           => 'text',
		)  
	);
	
	// Call Button link // 
	$wp_customize->add_setting(
    	'call_action_button_link',
    	array(
	        'default'			=> __('#','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_url',
			'priority' => 10,
		)
	);	
	
	$wp_customize->add_control( 
		'call_action_button_link',
		array(
		    'label'   => __('Button Link','clever-fox'),
		    'section' => 'call_action_setting',
			'settings'       => 'call_action_button_link',
			'type'           => 'text',
		)  
	);
	
	
	$wp_customize->add_setting(
		'call_action_button_target'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
		'call_action_button_target',
			array(
				'type' => 'checkbox',
				'label' => __('Open link in a new tab','clever-fox'),
				'section' => 'call_action_setting',
				'settings' => 'call_action_button_target',
			)
	);
	
	
	// Call Action Background Section // 
	
	// cta Background Head
	$wp_customize->add_setting(
		'cta_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 15,
		)
	);

	$wp_customize->add_control(
	'cta_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Bg','clever-fox'),
			'section' => 'call_action_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'call_action_background_setting' , 
    	array(
			'default' 			=> CLEVERFOX_PLUGIN_URL . 'inc/conceptly/images/bg/cta-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_url',
			'priority' => 16,
			
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'call_action_background_setting' ,
		array(
			'label'          => __( 'Background Image', 'clever-fox' ),
			'section'        => 'call_action_setting',
			'settings'        => 'call_action_background_setting',
		) 
	));
	$wp_customize->add_setting( 
		'cta_background_position' , 
			array(
			'default' => __( 'scroll', 'clever-fox' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_select',
			'priority' => 17,
		) 
	);
	
	$wp_customize->add_control(
		'cta_background_position' , 
			array(
				'label'          => __( 'Image Position', 'clever-fox' ),
				'section'        => 'call_action_setting',
				'settings'       => 'cta_background_position',
				'type'           => 'radio',
				'choices'        => 
				array(
					'fixed'=> __( 'Fixed', 'clever-fox' ),
					'scroll' => __( 'Scroll', 'clever-fox' )
			)  
		) 
	);
}

add_action( 'customize_register', 'conceptly_call_action_setting' );

// selective_refresh CTA 
function conceptly_home_cta_section_partials( $wp_customize ){

	// hide show feature
	$wp_customize->selective_refresh->add_partial(
		'hide_show_cta', array(
			'selector' => '#cta',
			'container_inclusive' => true,
			'render_callback' => 'call_action_setting',
			'fallback_refresh' => true,
		)
	);
	//CTA title
	$wp_customize->selective_refresh->add_partial( 'call_to_action_title', array(
		'selector'            => '#cta h3',
		'settings'            => 'call_to_action_title',
		'render_callback'  => 'cta_section_title_render_callback',
	
	) );
	// description
	$wp_customize->selective_refresh->add_partial( 'call_to_action_description', array(
		'selector'            => '#cta p',
		'settings'            => 'call_to_action_description',
		'render_callback'  => 'cta_section_desc_render_callback',
	
	) );
	// CTA button icon
	$wp_customize->selective_refresh->add_partial( 'cta_icon', array(
		'selector'            => '#cta-btn .purchase-btn i',
		'settings'            => 'cta_icon',
		'render_callback'  => 'cta_section_description_render_callback',
	
	) );
	// CTA button label
	$wp_customize->selective_refresh->add_partial( 'call_action_button_label', array(
		'selector'            => '#cta-btn .purchase-btn',
		'settings'            => 'call_action_button_label',
		'render_callback'  => 'cta_section_button_render_callback',
	
	) );
	}

add_action( 'customize_register', 'conceptly_home_cta_section_partials' );

// cta editor
function cta_section_description_render_callback() {
	return get_theme_mod( 'conceptly_page_editor_all_action' );
}
// cta title
function cta_section_title_render_callback() {
	return get_theme_mod( 'cta_section_title_render_callback' );
}
// cta description
function cta_section_desc_render_callback() {
	return get_theme_mod( 'call_to_action_description' );
}
// cta button label
function cta_section_button_render_callback() {
	return get_theme_mod( 'call_action_button_label' );
}
