<?php
function hantus_abv_header_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Section
	=========================================*/
	// Header Settings Section // 
	$wp_customize->add_section(
        'header_setting',
        array(
        	'priority'      => 1,
            'title' 		=> __('Top Left Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Setting Head 
	$wp_customize->add_setting(
		'hdr_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'header_setting',
		)
	);
	
	// Social Icons Hide/Show Setting // 
	if ( class_exists( 'Hantus_Customizer_Toggle_Control' ) ) {	
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
		
		$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
		'hide_show_social_icon', 
			array(
				'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
				'section'     => 'header_setting',
				'settings'    => 'hide_show_social_icon',
				'type'        => 'ios', // light, ios, flat
			) 
		));
	}
	
	// Time Head 
	$wp_customize->add_setting(
		'hdr_time_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'hdr_time_head',
		array(
			'type' => 'hidden',
			'label' => __('Time','clever-fox'),
			'section' => 'header_setting',
		)
	);
	
	// address info icon hantus // 
	$wp_customize->add_setting(
    	'hantus_time_icon',
    	array(
	        'default' => 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control(new Hantus_Icon_Picker_Control($wp_customize, 
		'hantus_time_icon',
		array(
		    'label'   		=> __('Time Icon','clever-fox'),
		    'section' 		=> 'header_setting',
			'iconset' => 'fa',
			'settings' 		 => 'hantus_time_icon',
			'description'   => __( '', 'clever-fox' ),
			
		))  
	);
	
	// address info hantus // 
	$wp_customize->add_setting(
    	'hantus_timing',
    	array(
	        'default'			=> __('Opening Hours - 10 Am to 6 PM','clever-fox'),
			'sanitize_callback' => 'hantus_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	

	$wp_customize->add_control( 
		'hantus_timing',
		array(
		    'label'   		=> __('Address','clever-fox'),
		    'section' 		=> 'header_setting',
			'settings' 		 => 'hantus_timing',
			'description'   => __( '', 'clever-fox' ),
			'type'		 =>	'textarea'
		)  
	);
	
	
	// Social Head 
	$wp_customize->add_setting(
		'hdr_social_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'hdr_social_head',
		array(
			'type' => 'hidden',
			'label' => __('Social Icon','clever-fox'),
			'section' => 'header_setting',
		)
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_icons', 
			array(
			 'sanitize_callback' => 'hantus_repeater_sanitize',
			 'priority' => 10,
			 'default' => hantus_get_social_icon_default(),
		)
		);
		
		$wp_customize->add_control( 
			new Hantus_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social Icons','clever-fox'),
						'section' => 'header_setting',
						'add_field_label'                   => esc_html__( 'Add New Social', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Social', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
	//Pro feature
		class Hantus_Header_Social_section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_hdr_social_upgrade_section up-to-pro" href="https://www.nayrathemes.com/thaispa-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'hantus_hdr_social_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Hantus_Header_Social_section_upgrade(
			$wp_customize,
			'hantus_hdr_social_upgrade_to_pro',
				array(
					'section'				=> 'header_setting',
					'priority' => 10,
				)
			)
		);
		
	/*=========================================
	Header Contact Settings Section
	=========================================*/
	// Header Contact Setting Section // 
	$wp_customize->add_section(
        'header_contact',
        array(
        	'priority'      => 2,
            'title' 		=> __('Top Right Header','clever-fox'),
            'description' 	=>'',
			'panel'  		=> 'header_section',
		)
    );
	
	// Header Contact Indo Hide/Show Setting // 
	// Right Header Setting  Head 
	$wp_customize->add_setting(
		'right_hdr_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'right_hdr_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'header_contact',
		)
	);
	
	// Social Icons Hide/Show Setting // 
	if ( class_exists( 'Hantus_Customizer_Toggle_Control' ) ) {	
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
		
		$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
		'hide_show_contact_infot', 
			array(
				'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
				'section'     => 'header_contact',
				'settings'    => 'hide_show_contact_infot',
				'type'        => 'ios', // light, ios, flat
			) 
		));
	}	
	
	
	// Right Header Email  Head 
	$wp_customize->add_setting(
		'right_hdr_email_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'right_hdr_email_head',
		array(
			'type' => 'hidden',
			'label' => __('Email','clever-fox'),
			'section' => 'header_contact',
		)
	);
	
	// Header Email icon Setting // 
	$wp_customize->add_setting(
    	'header_email_icon',
    	array(
	        'default'			=> __('fa-envelope-o','clever-fox'),
			'sanitize_callback' => 'hantus_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control(new Hantus_Icon_Picker_Control($wp_customize,  
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
	        'default'			=> __('email@companyname.com','clever-fox'),
			'sanitize_callback' => 'hantus_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'header_email',
		array(
		    'label'   => __('Email','clever-fox'),
		    'section' => 'header_contact',
			'settings'=> 'header_email',
			'type' => 'text',
		)  
	);
	
	// Right Header Contact  Head 
	$wp_customize->add_setting(
		'right_hdr_contact_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
			'priority' => 6,
		)
	);

	$wp_customize->add_control(
	'right_hdr_contact_head',
		array(
			'type' => 'hidden',
			'label' => __('Phone','clever-fox'),
			'section' => 'header_contact',
		)
	);
	
	// Header Contact Number Setting // 
	$wp_customize->add_setting(
    	'header_phone_icon',
    	array(
	        'default'			=> __('fa-phone','clever-fox'),
			'sanitize_callback' => 'hantus_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( new Hantus_Icon_Picker_Control($wp_customize,
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
	        'default'			=> __('+12 345 678 910','clever-fox'),
			'sanitize_callback' => 'hantus_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 8,
		)
	);	

	$wp_customize->add_control( 
		'header_phone_number',
		array(
		    'label'   => __('Phone Number','clever-fox'),
		    'section' => 'header_contact',
			'settings'=> 'header_phone_number',
			'type' => 'text',
		)  
	);
}

add_action( 'customize_register', 'hantus_abv_header_setting' );


// header selective refresh
function hantus_above_header_section_partials( $wp_customize ){
	// hide_show_social_icon
	$wp_customize->selective_refresh->add_partial(
		'hide_show_social_icon', array(
			'selector' => '.header-social, .time-details',
			'container_inclusive' => true,
			'render_callback' => 'header_setting',
			'fallback_refresh' => true,
		)
	);
	// hide_show_contact_infot
	$wp_customize->selective_refresh->add_partial(
		'hide_show_contact_infot', array(
			'selector' => '.header-top-right',
			'container_inclusive' => true,
			'render_callback' => 'header_contact',
			'fallback_refresh' => true,
		)
	);
	
	// social icons
	$wp_customize->selective_refresh->add_partial( 'social_icons', array(
		'selector'            => '#header-top .header-social',
	) );
	
	// hantus_timing 
	$wp_customize->selective_refresh->add_partial( 'hantus_timing', array(
		'selector'            => '#header-top p',
		'settings'            => 'hantus_timing',
		'render_callback'  => 'header_section_hantus_timing_render_callback',
	) );	
	
	// email text
	$wp_customize->selective_refresh->add_partial( 'header_email', array(
		'selector'            => '#header-top .h-t-e ',
		'settings'            => 'header_email',
		'render_callback'  => 'header_section_header_email_render_callback',
	) );
	
	
	// header_phone_number
	$wp_customize->selective_refresh->add_partial( 'header_phone_number', array(
		'selector'            => '#header-top .h-t-p ',
		'settings'            => 'header_phone_number',
		'render_callback'  => 'header_section_header_phone_number_render_callback',
	) );
}
add_action( 'customize_register', 'hantus_above_header_section_partials' );

// hantus_timing
function header_section_hantus_timing_render_callback() {
	return get_theme_mod( 'hantus_timing' );
}
// header_email
function header_section_header_email_render_callback() {
	return get_theme_mod( 'header_email' );
}
// header_phone_number 
function header_section_header_phone_number_render_callback() {
	return get_theme_mod( 'header_phone_number' );
}




/*
 *
 * Social Icon
 */
function hantus_get_social_icon_default() {
	return apply_filters(
		'hantus_get_social_icon_default', json_encode(
				 array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook', 'thai-spa' ),
					'link'	  =>  esc_html__( '#', 'thai-spa' ),
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-google-plus', 'thai-spa' ),
					'link'	  =>  esc_html__( '#', 'thai-spa' ),
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'thai-spa' ),
					'link'	  =>  esc_html__( '#', 'thai-spa' ),
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-linkedin', 'thai-spa' ),
					'link'	  =>  esc_html__( '#', 'thai-spa' ),
					'id'              => 'customizer_repeater_header_social_004',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-behance', 'thai-spa' ),
					'link'	  =>  esc_html__( '#', 'thai-spa' ),
					'id'              => 'customizer_repeater_header_social_005',
				),
			)
		)
	);
}