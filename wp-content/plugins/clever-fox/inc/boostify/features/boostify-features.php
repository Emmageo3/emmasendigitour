<?php
function boostify_features_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Service  Section
	=========================================*/
	$wp_customize->add_section(
		'feature_setting', array(
			'title' => esc_html__( 'Features Section', 'clever-fox' ),
			'priority' => 4,
			'panel' => 'boostify_frontpage_sections',
		)
	);
	
	
	/*=========================================
	Settings
	=========================================*/
	
	// Settings
	$wp_customize->add_setting(
		'features_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'features_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'feature_setting',
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting(
		'hs_features'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 2,
		)
	);

	$wp_customize->add_control(
	'hs_features',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show Section','clever-fox'),
			'section' => 'feature_setting',
		)
	);
	
	// Features Header Section // 
	$wp_customize->add_setting(
		'feature_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'feature_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'feature_setting',
		)
	);
	
	// Feature Title // 
	$wp_customize->add_setting(
    	'feature_title',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Features</b>                                   <b>Features</b><b>Features</b></span></span>','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'feature_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'feature_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Feature Description // 
	$wp_customize->add_setting(
    	'feature_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'feature_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'feature_setting',
			'type'           => 'textarea',
		)  
	);

	// Fetaures content Section // 
	
	$wp_customize->add_setting(
		'feature_contents_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'feature_contents_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'feature_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Features
	 */
	
		$wp_customize->add_setting( 'features_contents', 
			array(
			 'sanitize_callback' => 'boostify_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => boostify_get_features_default()
			)
		);
		
		$wp_customize->add_control( 
			new Boostify_Repeater( $wp_customize, 
				'features_contents', 
					array(
						'label'   => esc_html__('Features','clever-fox'),
						'section' => 'feature_setting',
						'add_field_label'                   => esc_html__( 'Add New Feature', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Feature', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
			
	//Pro feature
		class Boostify_feature__section_upgrade extends WP_Customize_Control {
			public function render_content() { 	
			?>
				<a class="customizer_feature_upgrade_section up-to-pro"  href="https://www.nayrathemes.com/boostify-pro/"  target="_blank"
				style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}
		}
		
		$wp_customize->add_setting( 'boostify_feature_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Boostify_feature__section_upgrade(
			$wp_customize,
			'boostify_feature_upgrade_to_pro',
				array(
					'section'				=> 'feature_setting',
				)
			)
		);			
}

add_action( 'customize_register', 'boostify_features_setting' );

// service selective refresh
function boostify_features_section_partials( $wp_customize ){	
	// feature_title
	$wp_customize->selective_refresh->add_partial( 'feature_title', array(
		'selector'            => '.home-feature .section-header h2',
		'settings'            => 'feature_title',
		'render_callback'  => 'boostify_feature_title_render_callback',
	
	) );
	
	// feature_description
	$wp_customize->selective_refresh->add_partial( 'feature_description', array(
		'selector'            => '.home-feature .section-header p',
		'settings'            => 'feature_description',
		'render_callback'  => 'boostify_feature_description_render_callback',
	
	) );
	// features_contents
	$wp_customize->selective_refresh->add_partial( 'features_contents', array(
		'selector'            => '.home-feature .feature-contents'
	
	) );
	
	}

add_action( 'customize_register', 'boostify_features_section_partials' );

// feature_title
function boostify_feature_title_render_callback() {
	return get_theme_mod( 'feature_title' );
}

// service description
function boostify_feature_description_render_callback() {
	return get_theme_mod( 'feature_description' );
}