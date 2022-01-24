<?php
function conceptly_sponsers_setting( $wp_customize ) {

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Sponsers Section Panel
	=========================================*/
		$wp_customize->add_section(
			'sponsers_setting', array(
				'title' => esc_html__( 'Sponsor Section', 'clever-fox' ),
				'panel' => 'conceptly_frontpage_sections',
				'priority' => apply_filters( 'conceptly_section_priority', 120, 'conceptly_Sponsers' ),
			)
		);
	/*=========================================
	Sponsers Settings Section
	=========================================*/
	// Sponsor Setting Head
	$wp_customize->add_setting(
		'sponsor_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sponsor_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'sponsers_setting',
		)
	);
	
	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_sponser' , 
			array(
			'default' => esc_html__( '1', 'clever-fox' ),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Conceptly_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_sponser', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'sponsers_setting',
			'settings'    => 'hide_show_sponser',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	// Sponsers content Section // 
	
	// Sponsor Content Head
	$wp_customize->add_setting(
		'sponsor_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'sponsor_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'sponsers_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Sponsers
	 */
		$wp_customize->add_setting( 'sponser_contents', 
			array(
			 'sanitize_callback' => 'conceptly_repeater_sanitize',
			 'transport'         => $selective_refresh,
			   'default' => conceptly_get_sponsers_default(),
			   'priority' => 5,
			)
		);
		
		$wp_customize->add_control( 
			new Conceptly_Repeater( $wp_customize, 
				'sponser_contents', 
					array(
						'label'   => esc_html__('Sponsor','clever-fox'),
						'section' => 'sponsers_setting',
						'add_field_label'                   => esc_html__( 'Add New Sponsor', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Sponsor', 'clever-fox' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
		//Pro feature
		class Conceptly_sponsors__section_upgrade extends WP_Customize_Control {
			public function render_content() {
			$theme = wp_get_theme(); // gets the current theme
			if ( 'Ameya' == $theme->name){	
			?>
				<a class="customizer_sponsors_upgrade_section up-to-pro" href="https://www.nayrathemes.com/ameya-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
				}elseif ( 'Azwa' == $theme->name){
			?>
				<a class="customizer_sponsors_upgrade_section up-to-pro" href="https://www.nayrathemes.com/azwa-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
				}else{
			?>
				<a class="customizer_sponsors_upgrade_section up-to-pro" href="https://www.nayrathemes.com/conceptly-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
				}
			}
		}
		
		$wp_customize->add_setting( 'conceptly_sponsor_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new Conceptly_sponsors__section_upgrade(
			$wp_customize,
			'conceptly_sponsor_upgrade_to_pro',
				array(
					'section'				=> 'sponsers_setting',
					'settings'				=> 'conceptly_sponsor_upgrade_to_pro',
				)
			)
		);
		
	// Sponsers Background Section // 
	// Sponsor Background Head
	$wp_customize->add_setting(
		'sponsor_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'sponsor_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','clever-fox'),
			'section' => 'sponsers_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'sponsers_background_setting' , 
    	array(
			'default' 			=> CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/bg/partner-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_url',
			'priority' => 8,			
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'sponsers_background_setting' ,
		array(
			'label'          => __( 'Background Image', 'clever-fox' ),
			'section'        => 'sponsers_setting',
			'settings'   	 => 'sponsers_background_setting',
		) 
	));
	

	//background  position 
	$wp_customize->add_setting( 
		'sponsers_background_position' , 
			array(
			'default' => __( 'scroll', 'clever-fox' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_select',
			'priority' => 9,
		) 
	);
	
	$wp_customize->add_control(
		'sponsers_background_position' , 
			array(
				'label'          => __( 'Image Position', 'clever-fox' ),
				'section'        => 'sponsers_setting',
				'settings'       => 'sponsers_background_position',
				'type'           => 'radio',
				'choices'        => 
				array(
					'fixed'=> __( 'Fixed', 'clever-fox' ),
					'scroll' => __( 'Scroll', 'clever-fox' )
			)  
		) 
	);
}
add_action( 'customize_register', 'conceptly_sponsers_setting' );

// Sponsers selective refresh
function conceptly_home_sponsers_section_partials( $wp_customize ){
	// hide_show_sponser
	$wp_customize->selective_refresh->add_partial(
		'hide_show_sponser', array(
			'selector' => '#our-partners',
			'container_inclusive' => true,
			'render_callback' => 'sponsers_setting',
			'fallback_refresh' => true,
		)
	);
	// Sponsers
	$wp_customize->selective_refresh->add_partial( 'sponser_contents', array(
		'selector'            => '#our-partners .partner-carousel',
	) );
	
	}

add_action( 'customize_register', 'conceptly_home_sponsers_section_partials' );