<?php
function metasoft_expertise_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Expertise  Section
	=========================================*/
	$wp_customize->add_section(
		'expertise_setting', array(
			'title' => esc_html__( 'Expertise Section', 'clever-fox' ),
			'priority' => 7,
			'panel' => 'metasoft_frontpage_sections',
		)
	);

	/*=========================================
	Expertise Setting 
	=========================================*/
	$wp_customize->add_setting(
		'expertise_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_control(
	'expertise_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'expertise_setting',
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting(
		'expertise_home_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_checkbox',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_control(
	'expertise_home_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'expertise_setting',
		)
	);
	
	// Expertise Header Section // 
	$wp_customize->add_setting(
		'expertise_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'expertise_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'expertise_setting',
		)
	);
	
	// Expertise Title // 
	$wp_customize->add_setting(
    	'expertise_title',
    	array(
	        'default'			=> __('Our <span class="text-primary">Core Expertise</span>','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'expertise_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'expertise_setting',
			'type'           => 'text',
		)  
	);
	
	// Expertise Description // 
	$wp_customize->add_setting(
    	'expertise_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'expertise_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'expertise_setting',
			'type'           => 'textarea',
		)  
	);

	// Expertise content Section // 
	
	$wp_customize->add_setting(
		'expertise_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'expertise_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Expertise','clever-fox'),
			'section' => 'expertise_setting',
		)
	);
	
	
	$wp_customize->add_setting(
		'expertise_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'expertise_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'expertise_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add expertise
	 */
	
		$wp_customize->add_setting( 'expertise_contents', 
			array(
			 'sanitize_callback' => 'metasoft_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => metasoft_get_expertise_default()
			)
		);
		
		$wp_customize->add_control( 
			new MetaSoft_Repeater( $wp_customize, 
				'expertise_contents', 
					array(
						'label'   => esc_html__('Expertise','clever-fox'),
						'section' => 'expertise_setting',
						'add_field_label'                   => esc_html__( 'Add New Expertise', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Expertise', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
			
	//Pro feature
		class Metasoft_expertise__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if( 'Belltech' == $theme->name ){
			?>
			
				<a class="customizer_expertise_upgrade_section up-to-pro" href="https://www.nayrathemes.com/belltech-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php }else{ ?>		
			
				<a class="customizer_expertise_upgrade_section up-to-pro" href="https://www.nayrathemes.com/metasoft-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			} }
		}
		
		$wp_customize->add_setting( 'metasoft_expertise_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Metasoft_expertise__section_upgrade(
			$wp_customize,
			'metasoft_expertise_upgrade_to_pro',
				array(
					'section'				=> 'expertise_setting',
				)
			)
		);
		
	// Success content Section // 
	
	$wp_customize->add_setting(
		'success_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'success_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Success Info','clever-fox'),
			'section' => 'expertise_setting',
		)
	);
	
	
	$wp_customize->add_setting(
		'expt_success_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 10,
		)
	);

	$wp_customize->add_control(
	'expt_success_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'expertise_setting',
		)
	);
	
	// Image
	$wp_customize->add_setting( 
    	'expt_success_img' , 
    	array(
			'default' 			=> CLEVERFOX_PLUGIN_URL .'inc/metasoft/images/thumbsup.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'expt_success_img' ,
		array(
			'label'          => esc_html__( 'Image', 'clever-fox'),
			'section'        => 'expertise_setting',
		) 
	));
	
	
	// Title
	$wp_customize->add_setting(
		'expt_success_ttl'
			,array(
			'default'     	=> __('We deliver success to our traders','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'expt_success_ttl',
		array(
			'type' => 'text',
			'label' => __('Title','clever-fox'),
			'section' => 'expertise_setting',
		)
	);
	
	// Description
	$wp_customize->add_setting(
		'expt_success_desc'
			,array(
			'default'     	=> __('Need guidance in creating and managing successful investment portfolio?','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'expt_success_desc',
		array(
			'type' => 'textarea',
			'label' => __('Description','clever-fox'),
			'section' => 'expertise_setting',
		)
	);
	
	
	// Button icon // 
	$wp_customize->add_setting(
    	'expt_success_btn_icon',
    	array(
	        'default' => 'fa-angle-right',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 12,
		)
	);	

	$wp_customize->add_control(new MetaSoft_Icon_Picker_Control($wp_customize, 
		'expt_success_btn_icon',
		array(
		    'label'   		=> __('Button Icon','clever-fox'),
		    'section' 		=> 'expertise_setting',
			'iconset' => 'fa',
			
		))  
	);	
	
	//  Button Label  // 
	$wp_customize->add_setting(
    	'expt_success_btn_lbl',
    	array(
	        'default'			=> __('Contact Us','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_html',
			'priority' => 13,
		)
	);	
	
	$wp_customize->add_control( 
		'expt_success_btn_lbl',
		array(
		    'label'   => __('Button Label','clever-fox'),
		    'section' => 'expertise_setting',
			'type'           => 'text',
		)  
	);
	
	//  Button URL  // 
	$wp_customize->add_setting(
    	'expt_success_btn_url',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_url',
			'priority' => 14,
		)
	);	
	
	$wp_customize->add_control( 
		'expt_success_btn_url',
		array(
		    'label'   => __('Button URL','clever-fox'),
		    'section' => 'expertise_setting',
			'type'           => 'text',
		)  
	);
}

add_action( 'customize_register', 'metasoft_expertise_setting' );

// expertise selective refresh
function metasoft_home_expertise_section_partials( $wp_customize ){	
	// expertise title
	$wp_customize->selective_refresh->add_partial( 'expertise_title', array(
		'selector'            => '.expertise-home .heading-seprator h1',
		'settings'            => 'expertise_title',
		'render_callback'  => 'metasoft_expertise_title_render_callback',
	) );
	
	// expertise description
	$wp_customize->selective_refresh->add_partial( 'expertise_description', array(
		'selector'            => '.expertise-home .heading-seprator p',
		'settings'            => 'expertise_description',
		'render_callback'  => 'metasoft_expertise_desc_render_callback',
	) ); 
	// expertise content
	$wp_customize->selective_refresh->add_partial( 'expertise_contents', array(
		'selector'            => '.expertise-home .expertise-content'
	) );
	
	// expt_success_ttl
	$wp_customize->selective_refresh->add_partial( 'expt_success_ttl', array(
		'selector'            => '.expertise-home .success-info h5',
		'settings'            => 'expt_success_ttl',
		'render_callback'  => 'metasoft_expt_success_ttl_render_callback',
	) );
	
	// expt_success_desc
	$wp_customize->selective_refresh->add_partial( 'expt_success_desc', array(
		'selector'            => '.expertise-home .success-info p',
		'settings'            => 'expt_success_desc',
		'render_callback'  => 'metasoft_expt_success_desc_render_callback',
	) ); 
	
	// expt_success_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'expt_success_btn_lbl', array(
		'selector'            => '.expertise-home .success-info a',
		'settings'            => 'expt_success_btn_lbl',
		'render_callback'  => 'metasoft_expt_success_btn_lbl_render_callback',
	) ); 
	
	}

add_action( 'customize_register', 'metasoft_home_expertise_section_partials' );

// expertise title
function metasoft_expertise_title_render_callback() {
	return get_theme_mod( 'expertise_title' );
}

// expertise description
function metasoft_expertise_desc_render_callback() {
	return get_theme_mod( 'expertise_description' );
}


// expertise expt_success_ttl
function metasoft_expt_success_ttl_render_callback() {
	return get_theme_mod( 'expt_success_ttl' );
}

// expt_success_desc
function metasoft_expt_success_desc_render_callback() {
	return get_theme_mod( 'expt_success_desc' );
}

// expt_success_btn_lbl
function metasoft_expt_success_btn_lbl_render_callback() {
	return get_theme_mod( 'expt_success_btn_lbl' );
}