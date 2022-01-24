<?php
function conceptly_features_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Features Section Panel
	=========================================*/
		$wp_customize->add_section(
			'features_setting', array(
				'title' => esc_html__( 'Feature Section', 'clever-fox' ),
				'panel' => 'conceptly_frontpage_sections',
				'priority' => apply_filters( 'conceptly_section_priority',30 , 'conceptly_feature' ),
			)
		);
		
	// Feature Setting Head
	$wp_customize->add_setting(
		'feature_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'feature_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'features_setting',
		)
	);
	
	// Feature Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_feature' , 
			array(
			'default' => esc_html__( '1', 'clever-fox' ),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Conceptly_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_feature', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'features_setting',
			'settings'    => 'hide_show_feature',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	// Features Header Section // 
	
	// Feature Head
	$wp_customize->add_setting(
		'feature_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'feature_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'features_setting',
		)
	);
	
	// feature Title // 
	$wp_customize->add_setting(
    	'features_title',
    	array(
	        'default'			=> __('Our Features','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'features_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'features_setting',
			'settings'   	 => 'features_title',
			'type'           => 'text',
		)  
	);
	
	// feature Description // 
	$wp_customize->add_setting(
    	'features_description',
    	array(
	        'default'			=> __('There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'features_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'features_setting',
			'settings'   	 => 'features_description',
			'type'           => 'textarea',
		)  
	);
	
	// Features content Section // 
	
	// Feature Content Head
	$wp_customize->add_setting(
		'feature_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 8,
		)
	);

	$wp_customize->add_control(
	'feature_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'features_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add features
	 */
		$wp_customize->add_setting( 'feature_content', 
			array(
			 'sanitize_callback' => 'conceptly_repeater_sanitize',
			  'default' => conceptly_get_feature_default(),
			  'priority' => 9,
			)
		);
		
		$wp_customize->add_control( 
			new Conceptly_Repeater( $wp_customize, 
				'feature_content', 
					array(
						'label'   => esc_html__('Feature','clever-fox'),
						'section' => 'features_setting',
						'add_field_label'                   => esc_html__( 'Add New Feature', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Feature', 'clever-fox' ),
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_icon_control' => true,
					) 
				) 
			);
			
		//Pro feature
		class Conceptly_feature__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'Ameya' == $theme->name){	
			?>
				<a class="customizer_feature_upgrade_section up-to-pro" href="https://www.nayrathemes.com/ameya-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			   }elseif ( 'Azwa' == $theme->name){
			?>
				<a class="customizer_feature_upgrade_section up-to-pro" href="https://www.nayrathemes.com/azwa-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php
			}else{
			?>
				<a class="customizer_feature_upgrade_section up-to-pro" href="https://www.nayrathemes.com/conceptly-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
				}
			}
		}
		
		$wp_customize->add_setting( 'conceptly_feature_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 10,
		));
		$wp_customize->add_control(
			new Conceptly_feature__section_upgrade(
			$wp_customize,
			'conceptly_feature_upgrade_to_pro',
				array(
					'section'				=> 'features_setting',
					'settings'				=> 'conceptly_feature_upgrade_to_pro',
				)
			)
		);
}

add_action( 'customize_register', 'conceptly_features_setting' );

// feature selective refresh
function conceptly_home_feature_section_partials( $wp_customize ){
	// hide_show_feature
	$wp_customize->selective_refresh->add_partial(
		'hide_show_feature', array(
			'selector' => '.home-feature',
			'container_inclusive' => true,
			'render_callback' => 'features_setting',
			'fallback_refresh' => true,
		)
	);
	
	//title
	$wp_customize->selective_refresh->add_partial( 'features_title', array(
		'selector'            => '.home-feature .section-title h2',
		'settings'            => 'features_title',
		'render_callback'  => 'feature_section_title_render_callback',
	
	) );
	// description
	$wp_customize->selective_refresh->add_partial( 'features_description', array(
		'selector'            => '.home-feature .section-title p',
		'settings'            => 'features_description',
		'render_callback'  => 'feature_section_desc_render_callback',
	
	) );
	
	// feature content
		
	$wp_customize->selective_refresh->add_partial( 'feature_content', array(
		'selector'            => '#feature-content',
		'settings'            => 'feature_content',
		'render_callback'  => 'feature_section_content_render_callback',
	
	) );
	}

add_action( 'customize_register', 'conceptly_home_feature_section_partials' );

// feature title
function feature_section_title_render_callback() {
	return get_theme_mod( 'features_title' );
}
// feature description
function feature_section_desc_render_callback() {
	return get_theme_mod( 'features_description' );
}
// feature content
function feature_section_content_render_callback() {
	return get_theme_mod( 'feature_content' );
}