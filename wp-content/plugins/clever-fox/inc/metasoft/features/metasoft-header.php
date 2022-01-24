<?php
function metasoft_lite_header_settings( $wp_customize ) {
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
	MetaSoft Site Identity
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
				'sanitize_callback' => 'metasoft_sanitize_range_value',
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
	
	// Setting Head
	$wp_customize->add_setting(
		'hdr_top_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_top_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	// Setting Head
	$wp_customize->add_setting(
		'hdr_top_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hdr_top_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	// Links
	$wp_customize->add_setting(
		'hdr_top_contact_links'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'hdr_top_contact_links',
		array(
			'type' => 'hidden',
			'label' => __('Links','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	// Setting Head
	$wp_customize->add_setting(
		'abv_hdr_link_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'abv_hdr_link_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	// Label 1 // 
	$wp_customize->add_setting(
    	'abv_hdr_lbl1',
    	array(
	        'default'			=> __('careers','clever-fox'),
			'sanitize_callback' => 'metasoft_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 1,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_lbl1',
		array(
		    'label'   		=> __('Label 1','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Link 1 // 
	$wp_customize->add_setting(
    	'abv_hdr_url1',
    	array(
			'sanitize_callback' => 'metasoft_sanitize_url',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 2,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_url1',
		array(
		    'label'   		=> __('Link 1','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	
	
	// Label 2 // 
	$wp_customize->add_setting(
    	'abv_hdr_lbl2',
    	array(
	        'default'			=> __('help desk','clever-fox'),
			'sanitize_callback' => 'metasoft_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 3,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_lbl2',
		array(
		    'label'   		=> __('Label 2','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Link 2 // 
	$wp_customize->add_setting(
    	'abv_hdr_url2',
    	array(
			'sanitize_callback' => 'metasoft_sanitize_url',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_url2',
		array(
		    'label'   		=> __('Link 2','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	
	// Label 3 // 
	$wp_customize->add_setting(
    	'abv_hdr_lbl3',
    	array(
	        'default'			=> __('login','clever-fox'),
			'sanitize_callback' => 'metasoft_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_lbl3',
		array(
		    'label'   		=> __('Label 3','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Link 3 // 
	$wp_customize->add_setting(
    	'abv_hdr_url3',
    	array(
			'sanitize_callback' => 'metasoft_sanitize_url',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_url3',
		array(
		    'label'   		=> __('Link 3','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Social
	$wp_customize->add_setting(
		'hdr_top_contact_social'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'hdr_top_contact_social',
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
			'sanitize_callback' => 'metasoft_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 6,
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
			 'sanitize_callback' => 'metasoft_repeater_sanitize',
			 'priority' => 7,
			 'default' => metasoft_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new METASOFT_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social','clever-fox'),
						'section' => 'above_header',
						'add_field_label'                   => esc_html__( 'Add New Social', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Social', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	
	
	//Pro feature
		class Metasoft_social__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if( 'Belltech' == $theme->name ){
			?>
			
				<a class="customizer_social_upgrade_section up-to-pro" href="https://www.nayrathemes.com/belltech-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php }else{ ?>		
			
				<a class="customizer_social_upgrade_section up-to-pro" href="https://www.nayrathemes.com/metasoft-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			} }
		}
		
		$wp_customize->add_setting( 'metasoft_social_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 7,
		));
		$wp_customize->add_control(
			new Metasoft_social__section_upgrade(
			$wp_customize,
			'metasoft_social_upgrade_to_pro',
				array(
					'section'				=> 'above_header',
				)
			)
		);
		
	// Contact
	$wp_customize->add_setting(
		'hdr_top_contact'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'hdr_top_contact',
		array(
			'type' => 'hidden',
			'label' => __('Contact','clever-fox'),
			'section' => 'above_header',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_cntct_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cntct_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_contct_icon',
    	array(
	        'default' => 'fa-clock-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new MetaSoft_Icon_Picker_Control($wp_customize, 
		'tlh_contct_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);		
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_contact_title',
    	array(
	        'default'			=> __('Mon to Fri 9:00am to 6:00pm','clever-fox'),
			'sanitize_callback' => 'metasoft_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 7,
		)
	);	

	$wp_customize->add_control( 
		'tlh_contact_title',
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
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 9,
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
			'sanitize_callback' => 'metasoft_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 10,
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
		)
	);	

	$wp_customize->add_control(new MetaSoft_Icon_Picker_Control($wp_customize, 
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
			'sanitize_callback' => 'metasoft_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 11,
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
}
add_action( 'customize_register', 'metasoft_lite_header_settings' );

// Header selective refresh
function metasoft_lite_header_partials( $wp_customize ){

	// hide show Social
	$wp_customize->selective_refresh->add_partial(
		'hide_show_social_icon', array(
			'selector' => '#above-header .widget_social_widget',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	// hide_show_cntct_details
	$wp_customize->selective_refresh->add_partial(
		'hide_show_cntct_details', array(
			'selector' => '#above-header .wgt-1',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	// hide_show_email_details
	$wp_customize->selective_refresh->add_partial(
		'hide_show_email_details', array(
			'selector' => '#above-header .wgt-2',
			'container_inclusive' => true,
			'render_callback' => 'header_top_right',
			'fallback_refresh' => true,
		)
	);
	
	// abv_hdr_lbl1
	$wp_customize->selective_refresh->add_partial( 'abv_hdr_lbl1', array(
		'selector'            => '#above-header li.link1 a',
		'settings'            => 'abv_hdr_lbl1',
		'render_callback'  => 'metasoft_abv_hdr_lbl1_render_callback',
	) );
	
	// abv_hdr_lbl2
	$wp_customize->selective_refresh->add_partial( 'abv_hdr_lbl2', array(
		'selector'            => '#above-header li.link2 a',
		'settings'            => 'abv_hdr_lbl2',
		'render_callback'  => 'metasoft_abv_hdr_lbl2_render_callback',
	) );
	
	
	// abv_hdr_lbl3
	$wp_customize->selective_refresh->add_partial( 'abv_hdr_lbl3', array(
		'selector'            => '#above-header li.link3 a',
		'settings'            => 'abv_hdr_lbl3',
		'render_callback'  => 'metasoft_abv_hdr_lbl3_render_callback',
	) );
	
	
	// tlh_email_title
	$wp_customize->selective_refresh->add_partial( 'tlh_email_title', array(
		'selector'            => '#above-header .wgt-2 .text',
		'settings'            => 'tlh_email_title',
		'render_callback'  => 'metasoft_tlh_email_title_render_callback',
	) );
	
	
	// tlh_contact_title
	$wp_customize->selective_refresh->add_partial( 'tlh_contact_title', array(
		'selector'            => '#above-header .wgt-1 .text',
		'settings'            => 'tlh_contact_title',
		'render_callback'  => 'metasoft_tlh_contact_title_render_callback',
	) );
	
	}

add_action( 'customize_register', 'metasoft_lite_header_partials' );

// abv_hdr_lbl1
function metasoft_abv_hdr_lbl1_render_callback() {
	return get_theme_mod( 'abv_hdr_lbl1' );
}
// abv_hdr_lbl2
function metasoft_abv_hdr_lbl2_render_callback() {
	return get_theme_mod( 'abv_hdr_lbl2' );
}
// abv_hdr_lbl3
function metasoft_abv_hdr_lbl3_render_callback() {
	return get_theme_mod( 'abv_hdr_lbl3' );
}

// tlh_email_title
function metasoft_tlh_email_title_render_callback() {
	return get_theme_mod( 'tlh_email_title' );
}


// tlh_contact_title
function metasoft_tlh_contact_title_render_callback() {
	return get_theme_mod( 'tlh_contact_title' );
}
