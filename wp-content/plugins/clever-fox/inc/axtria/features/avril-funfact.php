<?php
function cleverfox_avril_funfact_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Funfact Section
	=========================================*/
	$wp_customize->add_section(
		'funfact_setting', array(
			'title' => esc_html__( 'Funfact Section', 'clever-fox' ),
			'priority' => 10,
			'panel' => 'avril_frontpage_sections',
		)
	);

	// Funfact Setting
	$wp_customize->add_setting(
		'funfact_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 2,
		)
	);

	$wp_customize->add_control(
	'funfact_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'funfact_setting',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_funfact' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_funfact', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'funfact_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Funfact content Section // 
	
	$wp_customize->add_setting(
		'funfact_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'funfact_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'funfact_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Funfact
	 */
	
		$wp_customize->add_setting( 'funfact_contents', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			'default' => avril_get_funfact_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'funfact_contents', 
					array(
						'label'   => esc_html__('Funfact','clever-fox'),
						'section' => 'funfact_setting',
						'add_field_label'                   => esc_html__( 'Add New Funfact', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Funfact', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
	

	//Pro feature
		class Avril_funfact__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_funfact_upgrade_section up-to-pro" href="https://www.nayrathemes.com/axtia-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}
		}
		
		$wp_customize->add_setting( 'avril_funfact_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 9,
		));
		$wp_customize->add_control(
			new Avril_funfact__section_upgrade(
			$wp_customize,
			'avril_funfact_upgrade_to_pro',
				array(
					'section'				=> 'funfact_setting',
				)
			)
		);
		
	// Funfact Background // 	
	$wp_customize->add_setting(
		'funfact_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 10,
		)
	);

	$wp_customize->add_control(
	'funfact_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','clever-fox'),
			'section' => 'funfact_setting',
		)
	);
	
    $wp_customize->add_setting( 
    	'funfact_bg_setting' , 
    	array(
			'default' 			=> CLEVERFOX_PLUGIN_URL .'inc/axtria/images/fun-fact-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 11,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'funfact_bg_setting' ,
		array(
			'label'          => __( 'Background Image', 'clever-fox' ),
			'section'        => 'funfact_setting',
		) 
	));

	$wp_customize->add_setting( 
		'funfact_bg_position' , 
			array(
			'default' => 'fixed',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
		'funfact_bg_position' , 
			array(
				'label'          => __( 'Image Position', 'clever-fox' ),
				'section'        => 'funfact_setting',
				'type'           => 'radio',
				'choices'        => 
				array(
					'fixed'=> __( 'Fixed', 'clever-fox' ),
					'scroll' => __( 'Scroll', 'clever-fox' )
			)  
		) 
	);
}

add_action( 'customize_register', 'cleverfox_avril_funfact_setting' );

// service selective refresh
function cleverfox_avril_funfact_section_partials( $wp_customize ){
	
	// Funfact content
	$wp_customize->selective_refresh->add_partial( 'funfact_contents', array(
		'selector'            => '#funfact-section'
	) );
	}

add_action( 'customize_register', 'cleverfox_avril_funfact_section_partials' );