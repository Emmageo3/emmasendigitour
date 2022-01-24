<?php
// Customizer tabs for slider section
if ( ! function_exists( 'hantus_slider_manager_customize_register' ) ) :
function hantus_slider_manager_customize_register( $wp_customize ) {
	
	//  Setting Head
	$wp_customize->add_setting(
		'hdr_search_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_search_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'header_contact_cart',
			'priority' => 1,
		)
	);
	
	//  Search Head
	$wp_customize->add_setting(
		'hdr_search_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_search_head',
		array(
			'type' => 'hidden',
			'label' => __('Search','clever-fox'),
			'section' => 'header_contact_cart',
			'priority' => 3,
		)
	);
	
	//  Setting Head
	$wp_customize->add_setting(
		'menu_contact_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'menu_contact_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'header_menu_contact',
			'priority' => 1,
		)
	);
	
	//  Contact Head
	$wp_customize->add_setting(
		'menu_contact_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'menu_contact_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'header_menu_contact',
			'priority' => 3,
		)
	);
	
	//  Setting Head
	$wp_customize->add_setting(
		'blog_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
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
	
	//  Setting Head
	$wp_customize->add_setting(
		'blog_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'blog_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'blog_setting',
			'priority' => 5,
		)
	);
	
	
	//  Content Head
	$wp_customize->add_setting(
		'blog_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
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
	
	
	//  Setting Head
	$wp_customize->add_setting(
		'copyright_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
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
	
	//  Content Head
	$wp_customize->add_setting(
		'copyright_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'copyright_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'footer_copyright',
			'priority' => 5,
		)
	);
	
	
	//  Setting Head
	$wp_customize->add_setting(
		'footer_payment_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_payment_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'footer_icon',
			'priority' => 1,
		)
	);
	
	//  Content Head
	$wp_customize->add_setting(
		'footer_payment_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_payment_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'footer_icon',
			'priority' => 5,
		)
	);
	
}
add_action( 'customize_register', 'hantus_slider_manager_customize_register' );
endif;