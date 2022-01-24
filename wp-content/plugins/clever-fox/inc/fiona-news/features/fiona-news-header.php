<?php
function fiona_news_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Below Header Section
	=========================================*/
	$wp_customize->add_section(
        'below_header',
        array(
        	'priority'      => 4,
            'title' 		=> __('Below Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );
	
	//  Latest News
	$wp_customize->add_setting(
		'bh_latest_news_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'bh_latest_news_head',
		array(
			'type' => 'hidden',
			'label' => __('Latest News','clever-fox'),
			'section' => 'below_header',
		)
	);
	
	//  Hide / Show
	$wp_customize->add_setting(
		'bh_latest_news_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'bh_latest_news_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'below_header',
		)
	);
	
	
	// Title // 
	$wp_customize->add_setting(
    	'bh_latest_news_ttl',
    	array(
			'default' => __('Latest News','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'bh_latest_news_ttl',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'below_header',
			'type'           => 'text',
		)  
	);
	
	// Latest News Category
	$wp_customize->add_setting(
    'bh_latest_news_cat_id',
		array(
		'capability' => 'edit_theme_options',
		'priority' => 5,
		)
	);	
	$wp_customize->add_control( new Fiona_Blog_Category_Dropdown_Control( $wp_customize, 
	'bh_latest_news_cat_id', 
		array(
		'label'   => __('Select category','clever-fox'),
		'section' => 'below_header',
		) 
	) );
	
	
	
	//  Temprature
	$wp_customize->add_setting(
		'bh_temp_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_text',
			'priority' => 8,
		)
	);

	$wp_customize->add_control(
	'bh_temp_head',
		array(
			'type' => 'hidden',
			'label' => __('Temprature','clever-fox'),
			'section' => 'below_header',
		)
	);
	
	//  Hide / Show
	$wp_customize->add_setting(
		'bh_temp_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_checkbox',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'bh_temp_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'below_header',
		)
	);
	
	// API Key // 
	$wp_customize->add_setting(
    	'bh_temp_api',
    	array(
			'default' => 'http://api.openweathermap.org/data/2.5/weather?q=london,uk&APPID=66078b6cc6f4a920e0e653b41e1cb6ee',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_url',
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'bh_temp_api',
		array(
		    'label'   => __('API Key Link','clever-fox'),
		    'section' => 'below_header',
			'type'           => 'textarea',
		)  
	);
	
	
	//  Date
	$wp_customize->add_setting(
		'bh_date_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'bh_date_head',
		array(
			'type' => 'hidden',
			'label' => __('Date','clever-fox'),
			'section' => 'below_header',
		)
	);
	
	//  Hide / Show
	$wp_customize->add_setting(
		'bh_date_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_checkbox',
			'priority' => 12,
		)
	);

	$wp_customize->add_control(
	'bh_date_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'below_header',
		)
	);	
}
add_action( 'customize_register', 'fiona_news_header_settings' );