<?php
function conceptly_lite_header_setting( $wp_customize ){
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
		Top Left Header
	=========================================*/
	// Header Settings Section // 
	$wp_customize->add_section(
        'header_contact',
        array(
        	'priority'      => 1,
            'title' 		=> __('Top Left Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Phone
	$wp_customize->add_setting(
		'hdr_top_phone'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_top_phone',
		array(
			'type' => 'hidden',
			'label' => __('Phone','clever-fox'),
			'section' => 'header_contact',
		)
	);
	
	//Header Contact Hide/Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_contact_infot' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Conceptly_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_contact_infot', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'header_contact',
			'settings'    => 'hide_show_contact_infot',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	
	// Header Contact Number Setting // 

	$wp_customize->add_setting(
    	'header_phone_icon',
    	array(
	        'default'			=> __('fa-phone','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 3,
		)
	);	

	$wp_customize->add_control( new Conceptly_Icon_Picker_Control($wp_customize,
		'header_phone_icon',
		array(
		    'label'   => __('Phone Icon','clever-fox'),
		    'section' => 'header_contact',
			'settings'=> 'header_phone_icon',
			'iconset' => 'fa',
		) ) 
	);
	
	$wp_customize->add_setting(
    	'header_phone_number',
    	array(
	        'default'			=> __('Call Us: (210) 123-451','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control( 
		'header_phone_number',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'header_contact',
			'settings'=> 'header_phone_number',
			'type' => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'header_phone_sub',
    	array(
	        'default'			=> __('+1 231-214-3567','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'header_phone_sub',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'header_contact',
			'type' => 'text',
		)  
	);
	
	// Email
	$wp_customize->add_setting(
		'hdr_top_email'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'hdr_top_email',
		array(
			'type' => 'hidden',
			'label' => __('Email','clever-fox'),
			'section' => 'header_contact',
		)
	);
	
	//Header Email Hide/Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_email_infot' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control( new Conceptly_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_email_infot', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'header_contact',
			'settings'    => 'hide_show_email_infot',
			'type'        => 'ios', // light, ios, flat
		) 
	));
		
	// Header Email icon Setting // 
	$wp_customize->add_setting(
    	'header_email_icon',
    	array(
	        'default'			=> __('fa-envelope','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(new Conceptly_Icon_Picker_Control($wp_customize,  
		'header_email_icon',
		array(
		    'label'   => __('Email Icon','clever-fox'),
		    'section' => 'header_contact',
			'settings'=> 'header_email_icon',
			'iconset' => 'fa',
		))  
	);
	
	// Header Email Setting // 
	$wp_customize->add_setting(
    	'header_email',
    	array(
	        'default'			=> __('380 St Kilda Road','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 10,
		)
	);	

	$wp_customize->add_control( 
		'header_email',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'header_contact',
			'settings'=> 'header_email',
			'type' => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'header_email_sub',
    	array(
	        'default'			=> __('example@example.com','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 11,
		)
	);	

	$wp_customize->add_control( 
		'header_email_sub',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'header_contact',
			'type' => 'text',
		)  
	);
	
	// FAQ
	$wp_customize->add_setting(
		'hdr_top_faq'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 13,
		)
	);

	$wp_customize->add_control(
	'hdr_top_faq',
		array(
			'type' => 'hidden',
			'label' => __('FAQ','clever-fox'),
			'section' => 'header_contact',
		)
	);
	
	//Header FAQ Hide/Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_faq' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 14,
		) 
	);
	
	$wp_customize->add_control( new Conceptly_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_faq', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'header_contact',
			'settings'    => 'hide_show_faq',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	// Header faq icon Setting // 
	$wp_customize->add_setting(
    	'header_faq_icon',
    	array(
	        'default'			=> __('fa-user','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 15,
		)
	);	

	$wp_customize->add_control(new Conceptly_Icon_Picker_Control($wp_customize,  
		'header_faq_icon',
		array(
		    'label'   => __('FAQ Icon','clever-fox'),
		    'section' => 'header_contact',
			'settings'=> 'header_faq_icon',
			'iconset' => 'fa',
		))  
	);	
	// Header FAQ // 
	$wp_customize->add_setting(
    	'header_faq',
    	array(
	        'default'			=> __('Ask Your Question','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 16,
		)
	);	

	$wp_customize->add_control( 
		'header_faq',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'header_contact',
			'settings' 		 => 'header_faq',
			'description'   => __( '', 'clever-fox' ),
			'type'		 =>	'text'
		)  
	);
	$wp_customize->add_setting(
    	'header_faq_sub',
    	array(
	        'default'			=> __('On Azwa','clever-fox'),
			'sanitize_callback' => 'conceptly_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 17,
		)
	);	

	$wp_customize->add_control( 
		'header_faq_sub',
		array(
		    'label'   		=> __('Subtitle','clever-fox'),
		    'section' 		=> 'header_contact',
			'type'		 =>	'text'
		)  
	);
	
	/*=========================================
		Top Right Header
	===========================================*/
	
	// Header Settings Section // 
	$wp_customize->add_section(
        'header_setting',
        array(
        	'priority'      => 1,
            'title' 		=> __('Top Right Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Setting Head
	$wp_customize->add_setting(
		'hdr_social_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_social_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'header_setting',
		)
	);
	
	// Social Icons Hide/Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_social_icon' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Conceptly_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_social_icon', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'header_setting',
			'settings'    => 'hide_show_social_icon',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	// Content Head
	$wp_customize->add_setting(
		'hdr_social_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'hdr_social_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Social-Icon','clever-fox'),
			'section' => 'header_setting',
		)
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_icons', 
			array(
			'default' => conceptly_get_social_icon_default(),
			 'sanitize_callback' => 'conceptly_repeater_sanitize',	
			'priority' => 4,			 
		)
		);
		
		$wp_customize->add_control( 
			new Conceptly_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social Icons','clever-fox'),
						'section' => 'header_setting',
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
			) 
		);
		
	/*=========================================
		Breadcrumb
	=========================================*/
	// Breadcrumb Height // 
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting( 
			'breadcrumb_min_height' , 
				array(
				'default' => '100',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'conceptly_sanitize_number_range',
				'transport'         => 'postMessage',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'breadcrumb_min_height', 
			array(
				'section'  => 'breadcrumb_design',
				'label'    => __( 'Min Height','clever-fox' ),
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 500,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);	
	}
	// Breadcrumb Align // 
	$wp_customize->add_setting( 
		'breadcrumb_align' , 
			array(
			'default' => __('left', 'clever-fox' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_select'
		) 
	);

	$wp_customize->add_control(
	'breadcrumb_align' , 
		array(
			'label'          => __( 'Alignment', 'clever-fox' ),
			'section'        => 'breadcrumb_design',
			'type'           => 'select',
			'priority'  	 => 10,
			'choices'        => 
			array(
				'left'       => __( 'Left', 'clever-fox' ),
				'center' => __( 'Center', 'clever-fox' ),
				'right' => __( 'Right', 'clever-fox' )
			) 
		) 
	);	
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting( 
			'breadcrumb_opacity' , 
				array(
				'default' => '0.9',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'conceptly_sanitize_text',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'breadcrumb_opacity', 
			array(
				'section'  => 'breadcrumb_design',
				'settings' => 'breadcrumb_opacity',
				'label'    => __( 'Background Opacity','clever-fox' ),
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 0.9,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
	}
	
	// Header Button Setting Head
	$wp_customize->add_setting(
		'hdr_btn_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_btn_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'header_get_button',
			'priority' => 1,
		)
	);
	
	// Header Button Content Head
	$wp_customize->add_setting(
		'hdr_btn_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_btn_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Button','clever-fox'),
			'section' => 'header_get_button',
			'priority' => 5,
		)
	);
};
add_action( 'customize_register', 'conceptly_lite_header_setting' );

// header selective refresh
function conceptly_clverfox_header_section_partials( $wp_customize ){
	
	
	// hide_show_contact_infot
	$wp_customize->selective_refresh->add_partial(
		'hide_show_contact_infot', array(
			'selector' => '#header-top .tlh-phone',
			'container_inclusive' => true,
			'render_callback' => 'header_contact',
			'fallback_refresh' => true,
		)
	);
	
	// header_phone_number
		
	$wp_customize->selective_refresh->add_partial( 
	'header_phone_number', array(
		'selector'            => '#header-top .tlh-phone ',
		'settings'            => 'header_phone_number',
		'render_callback'  => 'header_section_header_phone_number_render_callback',
	
	) );
	
	// hide_show_email_infot
	$wp_customize->selective_refresh->add_partial(
		'hide_show_email_infot', array(
			'selector' => '#header-top .tlh-email',
			'container_inclusive' => true,
			'render_callback' => 'header_contact',
			'fallback_refresh' => true,
		)
	);
	// Header Email	
	$wp_customize->selective_refresh->add_partial( 
	'header_email', array(
		'selector'            => '#header-top .tlh-email',
		'settings'            => 'header_email',
		'render_callback'  => 'header_section_header_email_render_callback',
	
	) );
	
	// hide_show_header_FAQ
	$wp_customize->selective_refresh->add_partial(
		'hide_show_faq', array(
			'selector' => '#header-top .tlh-faq',
			'container_inclusive' => true,
			'render_callback' => 'header_contact',
			'fallback_refresh' => true,
		)
	);
	// Header_FAQ	
	$wp_customize->selective_refresh->add_partial( 
	'header_faq', array(
		'selector'            => '#header-top .tlh-faq',
		'settings'            => 'header_faq',
		'render_callback'  => 'header_section_header_faq_render_callback',
	
	) );
	
	
	// hide_show_social_icon
	$wp_customize->selective_refresh->add_partial(
		'hide_show_social_icon', array(
			'selector' => '.trh-social',
			'container_inclusive' => true,
			'render_callback' => 'header_setting',
			'fallback_refresh' => true,
		)
	);
	
	// social icons
	$wp_customize->selective_refresh->add_partial( 
	'social_icons', array(
		'selector'            => '#header-top .trh-social',
		'settings'            => 'social_icons',
		'render_callback'  => 'header_section_social_render_callback'
	) );
}
add_action( 'customize_register', 'conceptly_clverfox_header_section_partials' );

// header_phone_number 
function header_section_header_phone_number_render_callback() {
	return get_theme_mod( 'header_phone_number' );
}
// header_email
function header_section_header_email_render_callback() {
	return get_theme_mod( 'header_email' );
}
// header_FAQ
function header_section_header_faq_render_callback() {
	return get_theme_mod( 'header_faq' );
}

// social_icons
function header_section_social_render_callback() {
	return get_theme_mod( 'social_icons' );
}