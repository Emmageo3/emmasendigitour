<?php 
function gradiant_info_setting( $wp_customize ) {

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Info
	=========================================*/
		$wp_customize->add_section(
			'info_setting', array(
				'title' => esc_html__( 'Info Section', 'clever-fox' ),
				'panel' => 'gradiant_frontpage_sections',
				'priority' => 2,
			)
		);
	
	/*=========================================
	Info contents 
	=========================================*/
	
	// Content
	$wp_customize->add_setting(
		'info_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'info_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Please Add Info Block in Info Widget Area to Show Same AS Demo','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
}
add_action( 'customize_register', 'gradiant_info_setting' );