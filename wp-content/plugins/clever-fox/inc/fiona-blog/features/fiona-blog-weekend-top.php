<?php
function fiona_blog_section7_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Section &
	=========================================*/
	$wp_customize->add_section(
		'section7_setting', array(
			'title' => esc_html__( 'Weekend Top', 'clever-fox' ),
			'panel' => 'fiona_blog_frontpage_sections',
			'priority' => 7,
		)
	);
	
	//  Head
	$wp_customize->add_setting(
		'section7_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'section7_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'section7_setting',
		)
	);
	
	//  Hide / Show
	$wp_customize->add_setting(
		'section7_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_checkbox',
			'priority' => 2,
		)
	);

	$wp_customize->add_control(
	'section7_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'section7_setting',
		)
	);
	
	//  Contents
	$wp_customize->add_setting(
		'section7_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'section7_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','clever-fox'),
			'section' => 'section7_setting',
		)
	);
	
	// Title // 
	$wp_customize->add_setting(
    	'section7_title',
    	array(
			'default'   => __('Weekend Top','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'section7_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'section7_setting',
			'type'           => 'text',
		)  
	);
	
	// section7 Category
	$wp_customize->add_setting(
    'section7_category_id',
		array(
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'fiona_blog_sanitize_text',
		)
	);	
	$wp_customize->add_control( new Fiona_Blog_Category_Dropdown_Control( $wp_customize, 
	'section7_category_id', 
		array(
		'label'   => __('Select category','clever-fox'),
		'section' => 'section7_setting',
		) 
	) );
	
	// blog_display_num
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'section7_display_num',
			array(
				'default' => '4',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_range_value',
				'priority' => 8,
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'section7_display_num', 
			array(
				'label'      => __( 'No of Posts Display', 'clever-fox' ),
				'section'  => 'section7_setting',
				 'input_attrs' => array(
						'min'    => 1,
						'max'    => 500,
						'step'   => 1,
						//'suffix' => 'px', //optional suffix
					),
			) ) 
		);
	}
}

add_action( 'customize_register', 'fiona_blog_section7_setting' );