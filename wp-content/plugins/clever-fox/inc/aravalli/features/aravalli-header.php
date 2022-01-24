<?php
function cleverfox_aravalli_header_settings( $wp_customize ) {
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
	Aravalli Site Identity
	=========================================*/
	// Logo Width // 
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'aravalli_sanitize_range_value',
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
		'hdr_top_mobile'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'hdr_top_mobile',
		array(
			'type' => 'hidden',
			'label' => __('Phone','clever-fox'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_phone_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_phone_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_phone_icon',
    	array(
	        'default' => 'fa-mobile-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control(new Aravalli_Icon_Picker_Control($wp_customize, 
		'tlh_phone_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);		
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_phone_title',
    	array(
	        'default'			=> __('+1514-2861-23','clever-fox'),
			'sanitize_callback' => 'aravalli_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'tlh_phone_title',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Email
	$wp_customize->add_setting(
		'hdr_top_email'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
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
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'transport'         => $selective_refresh,
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
	        'default' => 'fa-envelope-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 6,
		)
	);	

	$wp_customize->add_control(new Aravalli_Icon_Picker_Control($wp_customize, 
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
	        'default'			=> __('email@companyname.com','clever-fox'),
			'sanitize_callback' => 'aravalli_sanitize_text',
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
	
	
	// Social
	$wp_customize->add_setting(
		'hdr_top_social'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'hdr_top_social',
		array(
			'type' => 'hidden',
			'label' => __('Social Icons','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	$wp_customize->add_setting( 
		'hide_show_social_icon' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 7,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_social_icon', 
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
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 8,
			 'default' => aravalli_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new ARAVALLI_Repeater( $wp_customize, 
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
		class Aravalli_social__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
				if ( 'Arbuda' == $theme->name){
			?>
				<a class="customizer_social_upgrade_section up-to-pro"  href="https://www.nayrathemes.com/arbuda-pro/" target="_blank"  style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php }else{ ?>	
			
				<a class="customizer_social_upgrade_section up-to-pro"  href="https://www.nayrathemes.com/aravalli-pro/" target="_blank"  style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			} }
		}
		
		$wp_customize->add_setting( 'aravalli_social_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Aravalli_social__section_upgrade(
			$wp_customize,
			'aravalli_social_upgrade_to_pro',
				array(
					'section'				=> 'above_header',
				)
			)
		);			
}
add_action( 'customize_register', 'cleverfox_aravalli_header_settings' );

// Header selective refresh
function cleverfox_aravalli_header_partials( $wp_customize ){

	// hide show Social
	$wp_customize->selective_refresh->add_partial(
		'hide_show_social_icon', array(
			'selector' => '#above-header .widget-social',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	// hide_show_phone_details
	$wp_customize->selective_refresh->add_partial(
		'hide_show_phone_details', array(
			'selector' => '.header-top-info .phone',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	// hide_show_email_details
	$wp_customize->selective_refresh->add_partial(
		'hide_show_email_details', array(
			'selector' => '.header-top-info .email',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	
	// tlh_email_title
	$wp_customize->selective_refresh->add_partial( 'tlh_email_title', array(
		'selector'            => '.header-top-info .email span',
		'settings'            => 'tlh_email_title',
		'render_callback'  => 'aravalli_tlh_email_title_render_callback',
	) );
	
	
	// tlh_phone_title
	$wp_customize->selective_refresh->add_partial( 'tlh_phone_title', array(
		'selector'            => '.header-top-info .phone span',
		'settings'            => 'tlh_phone_title',
		'render_callback'  => 'aravalli_tlh_phone_title_render_callback',
	) );
	}

add_action( 'customize_register', 'cleverfox_aravalli_header_partials' );


// tlh_email_title
function aravalli_tlh_email_title_render_callback() {
	return get_theme_mod( 'tlh_email_title' );
}

// tlh_phone_title
function aravalli_tlh_phone_title_render_callback() {
	return get_theme_mod( 'tlh_phone_title' );
}
