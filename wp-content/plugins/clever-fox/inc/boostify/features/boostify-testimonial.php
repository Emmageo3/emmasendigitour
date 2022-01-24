<?php
function boostify_testimonial_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial  Section
	=========================================*/
	$wp_customize->add_section(
		'testimonial_setting', array(
			'title' => esc_html__( 'Testimonial Section', 'clever-fox' ),
			'priority' => 9,
			'panel' => 'boostify_frontpage_sections',
		)
	);
	
	
	/*=========================================
	Settings
	=========================================*/
	
	// Settings
	$wp_customize->add_setting(
		'testimonial_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'testimonial_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'testimonial_setting',
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting(
		'hs_testimonial'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 2,
		)
	);

	$wp_customize->add_control(
	'hs_testimonial',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show Section','clever-fox'),
			'section' => 'testimonial_setting',
		)
	);
	
	// Testimnial Header Section // 
	$wp_customize->add_setting(
		'testimonial_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'testimonial_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'testimonial_setting',
		)
	);
	
	// Testimonial Title // 
	$wp_customize->add_setting(
    	'testimonial_title',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Testimonial</b>                                   <b>Testimonial</b><b>Testimonial</b></span></span>','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'testimonial_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	// Testimonial Description // 
	$wp_customize->add_setting(
    	'testimonial_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'testimonial_setting',
			'type'           => 'textarea',
		)  
	);

	// Testimonial content Section // 
	
	$wp_customize->add_setting(
		'test_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'test_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'testimonial_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Testimonial
	 */
	
		$wp_customize->add_setting( 'testimonials_content', 
			array(
			 'sanitize_callback' => 'boostify_repeater_sanitize',
			 'priority' => 8,
			 'default' => boostify_get_testimonial_default()
			)
		);
		
		$wp_customize->add_control( 
			new Boostify_Repeater( $wp_customize, 
				'testimonials_content', 
					array(
						'label'   => esc_html__('Testimonial','clever-fox'),
						'section' => 'testimonial_setting',
						'add_field_label'                   => esc_html__( 'Add New Testimonial', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Testimonial', 'clever-fox' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
	
	//Pro feature
		class Boostify_testimonial__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_testimonial_upgrade_section up-to-pro" href="https://www.nayrathemes.com/boostify-pro/"  target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}
		}
		
		$wp_customize->add_setting( 'boostify_testimonial_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Boostify_testimonial__section_upgrade(
			$wp_customize,
			'boostify_testimonial_upgrade_to_pro',
				array(
					'section'				=> 'testimonial_setting',
				)
			)
		);	
		
	
	// Testimonial Background // 	
	$wp_customize->add_setting(
		'testimonial_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 10,
		)
	);

	$wp_customize->add_control(
	'testimonial_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','clever-fox'),
			'section' => 'testimonial_setting',
		)
	);
	
    $wp_customize->add_setting( 
    	'testimonial_bg_setting' , 
    	array(
			'default' 			=> esc_url(CLEVERFOX_PLUGIN_URL .'inc/boostify/images/patternshape-bg.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_url',	
			'priority' => 11,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'testimonial_bg_setting' ,
		array(
			'label'          => __( 'Background Image', 'clever-fox' ),
			'section'        => 'testimonial_setting',
		) 
	));

	$wp_customize->add_setting( 
		'testimonial_bg_position' , 
			array(
			'default' => 'scroll',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_select',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
		'testimonial_bg_position' , 
			array(
				'label'          => __( 'Image Position', 'clever-fox' ),
				'section'        => 'testimonial_setting',
				'type'           => 'radio',
				'choices'        => 
				array(
					'fixed'=> __( 'Fixed', 'clever-fox' ),
					'scroll' => __( 'Scroll', 'clever-fox' )
			)  
		) 
	);
}

add_action( 'customize_register', 'boostify_testimonial_setting' );

// Testimonial selective refresh
function boostify_testimonial_section_partials( $wp_customize ){
	
	// testimonial_title
	$wp_customize->selective_refresh->add_partial( 'testimonial_title', array(
		'selector'            => '#testimonial .section-header h2',
		'settings'            => 'testimonial_title',
		'render_callback'  => 'boostify_testimonial_title_render_callback',
	
	) );
	
	// testimonial_description
	$wp_customize->selective_refresh->add_partial( 'testimonial_description', array(
		'selector'            => '#testimonial .section-header p',
		'settings'            => 'testimonial_description',
		'render_callback'  => 'boostify_testimonial_description_render_callback',
	
	) );
	
	}

add_action( 'customize_register', 'boostify_testimonial_section_partials' );

// testimonial_title
function boostify_testimonial_title_render_callback() {
	return get_theme_mod( 'testimonial_title' );
}

// testimonial_description
function boostify_testimonial_description_render_callback() {
	return get_theme_mod( 'testimonial_description' );
}