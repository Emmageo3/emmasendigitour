<?php
function aravalli_features_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Features  Section
	=========================================*/
	$wp_customize->add_section(
		'features_setting', array(
			'title' => esc_html__( 'Features Section', 'clever-fox' ),
			'priority' => 4,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Setting Head // 
	$wp_customize->add_setting(
		'features_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'features_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'features_setting',
		)
	);
	
	// Hide Show // 
	$wp_customize->add_setting(
		'features_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'features_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'features_setting',
		)
	);
	
	// Features Header Section // 
	$wp_customize->add_setting(
		'features_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'features_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'features_setting',
		)
	);
	
	// Features Title // 
	$wp_customize->add_setting(
    	'features_title',
    	array(
	        'default'			=> __('Explore','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'features_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'features_setting',
			'type'           => 'text',
		)  
	);
	
	
	// Features Subtitle // 
	$wp_customize->add_setting(
    	'features_subtitle',
    	array(
	        'default'			=> __('theme Features','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'features_subtitle',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'features_setting',
			'type'           => 'text',
		)  
	);
	
	// Features Description // 
	$wp_customize->add_setting(
    	'features_description',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'features_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'features_setting',
			'type'           => 'textarea',
		)  
	);

	// Features content Section // 
	
	$wp_customize->add_setting(
		'features_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'features_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'features_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add features
	 */
	
		$wp_customize->add_setting( 'features_contents', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => aravalli_get_features_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'features_contents', 
					array(
						'label'   => esc_html__('Feature','clever-fox'),
						'section' => 'features_setting',
						'add_field_label'                   => esc_html__( 'Add New Feature', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Feature', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
	//Pro feature
		class Aravalli_feature__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
				if ( 'Arbuda' == $theme->name){
			?>
				<a class="customizer_feature_upgrade_section up-to-pro" href="https://www.nayrathemes.com/arbuda-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php }else{ ?>	
				
				<a class="customizer_feature_upgrade_section up-to-pro" href="https://www.nayrathemes.com/aravalli-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			}}
		}
		
		$wp_customize->add_setting( 'aravalli_feature_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 9,
		));
		$wp_customize->add_control(
			new Aravalli_feature__section_upgrade(
			$wp_customize,
			'aravalli_feature_upgrade_to_pro',
				array(
					'section'				=> 'features_setting',
				)
			)
		);		
}

add_action( 'customize_register', 'aravalli_features_setting' );

// features selective refresh
function aravalli_home_features_section_partials( $wp_customize ){	
	// features title
	$wp_customize->selective_refresh->add_partial( 'features_title', array(
		'selector'            => '.features-home .heading-default h6',
		'settings'            => 'features_title',
		'render_callback'  => 'aravalli_features_title_render_callback',
	) );
	
	// features_subtitle
	$wp_customize->selective_refresh->add_partial( 'features_subtitle', array(
		'selector'            => '.features-home .heading-default h3',
		'settings'            => 'features_subtitle',
		'render_callback'  => 'aravalli_features_subtitle_render_callback',
	) );
	
	// features description
	$wp_customize->selective_refresh->add_partial( 'features_description', array(
		'selector'            => '.features-home .heading-default p',
		'settings'            => 'features_description',
		'render_callback'  => 'aravalli_features_desc_render_callback',
	) ); 
	// features content
	$wp_customize->selective_refresh->add_partial( 'features_contents', array(
		'selector'            => '.features-home .featuress-contents'
	) );
	
	}

add_action( 'customize_register', 'aravalli_home_features_section_partials' );

// features title
function aravalli_features_title_render_callback() {
	return get_theme_mod( 'features_title' );
}

// features_subtitle
function aravalli_features_subtitle_render_callback() {
	return get_theme_mod( 'features_subtitle' );
}

// features description
function aravalli_features_desc_render_callback() {
	return get_theme_mod( 'features_description' );
}