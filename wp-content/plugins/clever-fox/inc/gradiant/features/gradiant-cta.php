<?php
function gradiant_cta_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	CTA  Section
	=========================================*/
	$wp_customize->add_section(
		'cta_setting', array(
			'title' => esc_html__( 'Call to Action Section', 'clever-fox' ),
			'priority' => 6,
			'panel' => 'gradiant_frontpage_sections',
		)
	);
	
	// Setting Head
	$wp_customize->add_setting(
		'cta_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_text',
			'priority' => 1,
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
	
	// Hide / Show 
	$wp_customize->add_setting(
		'cta_hs'
			,array(
			'default'     	=> '1',	
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'cta_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
	// CTA Call Section // 
	$wp_customize->add_setting(
		'cta_call_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'cta_call_contents',
		array(
			'type' => 'hidden',
			'label' => __('Left Content','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
	// icon // 
	$wp_customize->add_setting(
    	'cta_call_icon',
    	array(
	        'default' => 'fa-user',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		)
	);	

	$wp_customize->add_control(new Gradiant_Icon_Picker_Control($wp_customize, 
		'cta_call_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'cta_setting',
			'iconset' => 'fa',
			
		))  
	);	
	
	
	// CTA Call Title // 
	$wp_customize->add_setting(
    	'cta_call_title',
    	array(
	        'default'			=> __('Call Us:','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_call_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	// CTA Call Text // 
	$wp_customize->add_setting(
    	'cta_call_text',
    	array(
	        'default'			=> '<a href="#">+(01) 246 2365</a>',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_call_text',
		array(
		    'label'   => __('Text','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	
	// CTA Content Section // 
	$wp_customize->add_setting(
		'cta_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'cta_contents',
		array(
			'type' => 'hidden',
			'label' => __('Right Content','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
	
	// icon // 
	$wp_customize->add_setting(
    	'cta_right_icon',
    	array(
	        'default' => 'fa-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control(new Gradiant_Icon_Picker_Control($wp_customize, 
		'cta_right_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'cta_setting',
			'iconset' => 'fa',
			
		))  
	);	
	
	
	// CTA Title // 
	$wp_customize->add_setting(
    	'cta_title',
    	array(
	        'default'			=> __('Professional and Dedicated Consulting Services','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	// CTA Description // 
	$wp_customize->add_setting(
    	'cta_description',
    	array(
	        'default'			=> __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_html',
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
	
	// Button // 	
	$wp_customize->add_setting(
		'cta_btn'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'cta_btn',
		array(
			'type' => 'hidden',
			'label' => __('Button','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
	
	// icon // 
	$wp_customize->add_setting(
    	'cta_btn_icon',
    	array(
	        'default' => 'fa-arrow-right',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 8,
		)
	);	

	$wp_customize->add_control(new Gradiant_Icon_Picker_Control($wp_customize, 
		'cta_btn_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'cta_setting',
			'iconset' => 'fa',
			
		))  
	);	
	
	$wp_customize->add_setting(
    	'cta_btn_lbl',
    	array(
	        'default'			=> __('Apply Now','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 8,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_lbl',
		array(
		    'label'   => __('Button Label','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'cta_btn_link',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_url',
			'priority' => 9,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_link',
		array(
		    'label'   => __('Link','clever-fox'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	
	// CTA Background // 	
	$wp_customize->add_setting(
		'cta_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_text',
			'priority' => 13,
		)
	);

	$wp_customize->add_control(
	'cta_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','clever-fox'),
			'section' => 'cta_setting',
		)
	);
	
    $wp_customize->add_setting( 
    	'cta_bg_setting' , 
    	array(
			'default' 			=> esc_url(CLEVERFOX_PLUGIN_URL . 'inc/gradiant/images/slider/img01.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_url',	
			'priority' => 14,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'cta_bg_setting' ,
		array(
			'label'          => __( 'Background Image', 'clever-fox' ),
			'section'        => 'cta_setting',
		) 
	));

	$wp_customize->add_setting( 
		'cta_bg_position' , 
			array(
			'default' => 'scroll',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_select',
			'priority' => 15,
		) 
	);
	
	$wp_customize->add_control(
		'cta_bg_position' , 
			array(
				'label'          => __( 'Image Position', 'clever-fox' ),
				'section'        => 'cta_setting',
				'type'           => 'radio',
				'choices'        => 
				array(
					'fixed'=> __( 'Fixed', 'clever-fox' ),
					'scroll' => __( 'Scroll', 'clever-fox' )
			)  
		) 
	);	
	
	// enable Effect
	$wp_customize->add_setting(
		'cta_effect_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_checkbox',
			'priority' => 17,
		)
	);

	$wp_customize->add_control(
	'cta_effect_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Water Effect on CTA?','clever-fox'),
			'section' => 'cta_setting',
		)
	);

}

add_action( 'customize_register', 'gradiant_cta_setting' );

// CTA selective refresh
function gradiant_ata_section_partials( $wp_customize ){
	
	// cta_call_title
	$wp_customize->selective_refresh->add_partial( 'cta_call_title', array(
		'selector'            => '.home-cta .call-wrapper .call-title',
		'settings'            => 'cta_call_title',
		'render_callback'  => 'gradiant_cta_call_title_render_callback',
	) );
	
	// cta_call_text
	$wp_customize->selective_refresh->add_partial( 'cta_call_text', array(
		'selector'            => '.home-cta .call-wrapper .call-phone',
		'settings'            => 'cta_call_text',
		'render_callback'  => 'gradiant_cta_call_text_render_callback',
	) );
	
	// cta_title
	$wp_customize->selective_refresh->add_partial( 'cta_title', array(
		'selector'            => '.home-cta .cta-content-wrap h4',
		'settings'            => 'cta_title',
		'render_callback'  => 'gradiant_cta_title_render_callback',
	) );
	
	// cta_description
	$wp_customize->selective_refresh->add_partial( 'cta_description', array(
		'selector'            => '.home-cta .cta-content-wrap p',
		'settings'            => 'cta_description',
		'render_callback'  => 'gradiant_cta_description_render_callback',
	) );
	
	// cta_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'cta_btn_lbl', array(
		'selector'            => '.home-cta .cta-btn a',
		'settings'            => 'cta_btn_lbl',
		'render_callback'  => 'gradiant_cta_btn_lbl_render_callback',
	) );
	}

add_action( 'customize_register', 'gradiant_ata_section_partials' );

// cta_title
function gradiant_cta_title_render_callback() {
	return get_theme_mod( 'cta_title' );
}


// cta_description
function gradiant_cta_description_render_callback() {
	return get_theme_mod( 'cta_description' );
}

// cta_btn_lbl
function gradiant_cta_btn_lbl_render_callback() {
	return get_theme_mod( 'cta_btn_lbl' );
}

// cta_call_title
function gradiant_cta_call_title_render_callback() {
	return get_theme_mod( 'cta_call_title' );
}

// cta_call_text
function gradiant_cta_call_text_render_callback() {
	return get_theme_mod( 'cta_call_text' );
}
