<?php
function boostify_abv_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'clever-fox'),
		) 
	);
	
	/*=========================================
	Boostify Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );

	// Logo Width // 
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'boostify_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'clever-fox' ),
				'section'  => 'title_tagline',
				'input_attrs' => array(
				'min'    => 0,
				'max'    => 500,
				'step'   => 1,
				//'suffix' => 'px', //optional suffix
			),
			) ) 
		);
	}
	
	
	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Mobile
	$wp_customize->add_setting(
		'hdr_top_mbl'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_top_mbl',
		array(
			'type' => 'hidden',
			'label' => __('Phone','clever-fox'),
			'section' => 'above_header',
			
		)
	);
	$wp_customize->add_setting( 
		'hide_show_mbl_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_mbl_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_mobile_icon',
    	array(
	        'default' => 'fa-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Boostify_Icon_Picker_Control($wp_customize, 
		'tlh_mobile_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);
	
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_mobile_title',
    	array(
	        'default'			=> __('Call: 0 (123) 456 7891','clever-fox'),
			'sanitize_callback' => 'boostify_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 3,
		)
	);	

	$wp_customize->add_control( 
		'tlh_mobile_title',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Link // 
	$wp_customize->add_setting(
    	'tlh_mobile_link',
    	array(
			'sanitize_callback' => 'boostify_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control( 
		'tlh_mobile_link',
		array(
		    'label'   		=> __('Link','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	// Mobile
	$wp_customize->add_setting(
		'hdr_top_email'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'hdr_top_email',
		array(
			'type' => 'hidden',
			'label' => __('Email','clever-fox'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_email_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_checkbox',
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_email_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_email_icon',
    	array(
	        'default' => 'fa-envelope',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Boostify_Icon_Picker_Control($wp_customize, 
		'tlh_email_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);	
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_email_title',
    	array(
	        'default'			=> __('info@example.com','clever-fox'),
			'sanitize_callback' => 'boostify_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email_title',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Link // 
	$wp_customize->add_setting(
    	'tlh_email_link',
    	array(
			'sanitize_callback' => 'boostify_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 8,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email_link',
		array(
		    'label'   		=> __('Link','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	

	

	// Social Head
	$wp_customize->add_setting(
		'hdr_top_social'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'hdr_top_social',
		array(
			'type' => 'hidden',
			'label' => __('Social Icon','clever-fox'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hs_hdr_social' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_checkbox',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
	'hs_hdr_social', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_icons', 
			array(
			 'sanitize_callback' => 'boostify_repeater_sanitize',
			 'priority' => 13,
			 'default' => boostify_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new BOOSTIFY_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social Icons','clever-fox'),
						'section' => 'above_header',
						'add_field_label'                   => esc_html__( 'Add New Social', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Social', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
		//Pro feature
		class Boostify_social__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_social_upgrade_section up-to-pro"  href="https://www.nayrathemes.com/boostify-pro/"  target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}
		}
		
		$wp_customize->add_setting( 'boostify_social_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Boostify_social__section_upgrade(
			$wp_customize,
			'boostify_social_upgrade_to_pro',
				array(
					'section'				=> 'above_header',
				)
			)
		);		
}
add_action( 'customize_register', 'boostify_abv_header_settings' );

// Header selective refresh
function boostify_abv_header_partials( $wp_customize ){
	
	// tlh_mobile_title
	$wp_customize->selective_refresh->add_partial( 'tlh_mobile_title', array(
		'selector'            => '#header-top .phone a',
		'settings'            => 'tlh_mobile_title',
		'render_callback'  => 'boostify_tlh_mobile_title_render_callback',
	) );

	
	// tlh_email_title
	$wp_customize->selective_refresh->add_partial( 'tlh_email_title', array(
		'selector'            => '#header-top .email a',
		'settings'            => 'tlh_email_title',
		'render_callback'  => 'boostify_tlh_email_title_render_callback',
	) );
	
	}

add_action( 'customize_register', 'boostify_abv_header_partials' );

// tlh_mobile_title
function boostify_tlh_mobile_title_render_callback() {
	return get_theme_mod( 'tlh_mobile_title' );
}


// tlh_email_title
function boostify_tlh_email_title_render_callback() {
	return get_theme_mod( 'tlh_email_title' );
}
