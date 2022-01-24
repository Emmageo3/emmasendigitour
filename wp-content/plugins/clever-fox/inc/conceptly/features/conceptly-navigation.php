<?php
// Customizer tabs

function Cleverfox_conceptly_tabs_customize_register( $wp_customize ) {		
		
	// Blog Setting Head
	$wp_customize->add_setting(
		'blog_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'blog_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'blog_setting',
			'priority' => 1,
		)
	);
	
	// Blog Head
	$wp_customize->add_setting(
		'blog_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'blog_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'blog_setting',
			'priority' => 4,
		)
	);
	
	// Blog Content Head
	$wp_customize->add_setting(
		'blog_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'blog_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'blog_setting',
			'priority' => 9,
		)
	);
	
		
	// Copyright Setting Head
	$wp_customize->add_setting(
		'copyright_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'copyright_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'footer_copyright',
			'priority' => 1,
		)
	);
	
	// Copyright Content Head
	$wp_customize->add_setting(
		'copyright_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'copyright_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'footer_copyright',
			'priority' => 4,
		)
	);
	


	// Payment Setting Head
	$wp_customize->add_setting(
		'payment_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'payment_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'footer_icon',
			'priority' => 1,
		)
	);
	
	// Payment Content Head
	$wp_customize->add_setting(
		'payment_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'payment_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'footer_icon',
			'priority' => 4,
		)
	);
}

add_action( 'customize_register', 'Cleverfox_conceptly_tabs_customize_register' );