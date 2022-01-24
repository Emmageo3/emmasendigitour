<?php
function aravalli_amenties_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Amenities  Section
	=========================================*/
	$wp_customize->add_section(
		'amenities_setting', array(
			'title' => esc_html__( 'Amenities Section', 'clever-fox' ),
			'priority' => 3,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	
	// Setting Head // 
	$wp_customize->add_setting(
		'amenities_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'amenities_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'amenities_setting',
		)
	);
	
	
	//  Hide/ Show // 
	$wp_customize->add_setting( 
		'hs_pg_about_amenities' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_amenities', 
		array(
			'label'	      => esc_html__( 'Hide / Show', 'clever-fox' ),
			'section'     => 'amenities_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Settings
	$wp_customize->add_setting(
		'about_pg_why_amenities'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 31,
		)
	);

	$wp_customize->add_control(
	'about_pg_why_amenities',
		array(
			'type' => 'hidden',
			'label' => __('header','clever-fox'),
			'section' => 'amenities_setting',
		)
	);
	
	//  Title // 
	$wp_customize->add_setting(
    	'pg_about_amenities_ttl',
    	array(
	        'default'			=> __('Hotel','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 33,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_amenities_ttl',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'amenities_setting',
			'type'           => 'text',
		)  
	);
	
	
	//  Subtitle // 
	$wp_customize->add_setting(
    	'pg_about_amenities_sub',
    	array(
	        'default'			=> __('Amenities','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 34,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_amenities_sub',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'amenities_setting',
			'type'           => 'text',
		)  
	);
	
	//  Description // 
	$wp_customize->add_setting(
    	'pg_about_amenities_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 35,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_amenities_desc',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'amenities_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	// Content Head // 
	$wp_customize->add_setting(
		'amenities_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 36,
		)
	);

	$wp_customize->add_control(
	'amenities_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'amenities_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add amenities
	 */
	
		$wp_customize->add_setting( 'pg_about_amenities_content', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 36,
			 'transport'         => $selective_refresh,
			 'default' => aravalli_get_amenities_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'pg_about_amenities_content', 
					array(
						'label'   => esc_html__('Amenities','clever-fox'),
						'section' => 'amenities_setting',
						'add_field_label'                   => esc_html__( 'Add New Amenities', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Amenities', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
					) 
				) 
			);
	
		//Pro feature
		class Aravalli_amenities__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
				if ( 'Arbuda' == $theme->name){
			?>
				<a class="customizer_amenities_upgrade_section up-to-pro" href="https://www.nayrathemes.com/arbuda-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php }else{ ?>	
				
				<a class="customizer_amenities_upgrade_section up-to-pro" href="https://www.nayrathemes.com/aravalli-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			}}
		}
		
		$wp_customize->add_setting( 'aravalli_amenities_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Aravalli_amenities__section_upgrade(
			$wp_customize,
			'aravalli_amenities_upgrade_to_pro',
				array(
					'section'				=> 'amenities_setting',
				)
			)
		);
		
	
	// BG Head // 
	$wp_customize->add_setting(
		'amenities_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 37,
		)
	);

	$wp_customize->add_control(
	'amenities_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','clever-fox'),
			'section' => 'amenities_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'pg_about_amenities_bg_img' , 
    	array(
			'default' 			=> esc_url(CLEVERFOX_PLUGIN_URL .'inc/aravalli/images/amenities-bg.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_url',	
			'priority' => 37,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'pg_about_amenities_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'clever-fox'),
			'section'        => 'amenities_setting',
		) 
	));
	
	// Background Attachment // 
	$wp_customize->add_setting( 
		'pg_about_amenities_back_attach' , 
			array(
			'default' => 'scroll',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_select',
			'priority'  => 38,
		) 
	);
	
	$wp_customize->add_control(
	'pg_about_amenities_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'clever-fox' ),
			'section'        => 'amenities_setting',
			'type'           => 'select',
			'choices'        => 
			array(
				'inherit' => __( 'Inherit', 'clever-fox' ),
				'scroll' => __( 'Scroll', 'clever-fox' ),
				'fixed'   => __( 'Fixed', 'clever-fox' )
			) 
		) 
	);		
	
}

add_action( 'customize_register', 'aravalli_amenties_setting' );

// Amenties selective refresh
function aravalli_amenties_section_partials( $wp_customize ){	
	// pg_about_amenities_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_about_amenities_ttl', array(
		'selector'            => '.amenities .heading-default h6',
		'settings'            => 'pg_about_amenities_ttl',
		'render_callback'  => 'aravalli_pg_about_amenities_ttl_render_callback',
	) );
	
	// pg_about_amenities_sub
	$wp_customize->selective_refresh->add_partial( 'pg_about_amenities_sub', array(
		'selector'            => '.amenities .heading-default h3',
		'settings'            => 'pg_about_amenities_sub',
		'render_callback'  => 'aravalli_pg_about_amenities_sub_render_callback',
	) );
	
	// pg_about_amenities_desc
	$wp_customize->selective_refresh->add_partial( 'pg_about_amenities_desc', array(
		'selector'            => '.amenities .heading-default p',
		'settings'            => 'pg_about_amenities_desc',
		'render_callback'  => 'aravalli_pg_about_amenities_desc_render_callback',
	) );
	
	// pg_about_amenities_content
	$wp_customize->selective_refresh->add_partial( 'pg_about_amenities_content', array(
		'selector'            => '.amenities .amenities-content',
	) );
	
	}

add_action( 'customize_register', 'aravalli_amenties_section_partials' );

// pg_about_amenities_ttl
function aravalli_pg_about_amenities_ttl_render_callback() {
	return get_theme_mod( 'pg_about_amenities_ttl' );
}

// pg_about_amenities_sub
function aravalli_pg_about_amenities_sub_render_callback() {
	return get_theme_mod( 'pg_about_amenities_sub' );
}


// pg_about_amenities_desc
function aravalli_pg_about_amenities_desc_render_callback() {
	return get_theme_mod( 'pg_about_amenities_desc' );
}