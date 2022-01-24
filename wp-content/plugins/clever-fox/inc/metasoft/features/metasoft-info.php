<?php 
function metasoft_info_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Info
	=========================================*/
		$wp_customize->add_section(
			'info_setting', array(
				'title' => esc_html__( 'Info Section', 'clever-fox' ),
				'panel' => 'metasoft_frontpage_sections',
				'priority' => 2,
			)
		);
	
	/*=========================================
	Info Setting 
	=========================================*/
	$wp_customize->add_setting(
		'info_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_control(
	'info_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	// Hide / Show
	$wp_customize->add_setting(
		'info_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_checkbox',
			'priority' => 1,
		)
	);
	
	$wp_customize->add_control(
	'info_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'info_setting',
		)
	);
	/*=========================================
	Info contents
	=========================================*/
	$wp_customize->add_setting(
		'info_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'metasoft_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'info_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Info
	 */
	
		$wp_customize->add_setting( 'info_contents', 
			array(
			 'sanitize_callback' => 'metasoft_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 4,
			 'default' => metasoft_get_info_default()
			)
		);
		
		$wp_customize->add_control( 
			new MetaSoft_Repeater( $wp_customize, 
				'info_contents', 
					array(
						'label'   => esc_html__('Info','clever-fox'),
						'section' => 'info_setting',
						'add_field_label'                   => esc_html__( 'Add New Info', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Info', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);	
			
			
	//Pro feature
		class Metasoft_info__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_info_upgrade_section up-to-pro" href="https://www.nayrathemes.com/metasoft-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}
		}
		
		$wp_customize->add_setting( 'metasoft_info_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Metasoft_info__section_upgrade(
			$wp_customize,
			'metasoft_info_upgrade_to_pro',
				array(
					'section'				=> 'info_setting',
				)
			)
		);		
	
}
add_action( 'customize_register', 'metasoft_info_setting' );

/**
 * Add selective refresh for Front page section section controls.
 */
function metasoft_home_info_section_partials( $wp_customize ){
	$wp_customize->selective_refresh->add_partial( 'info_contents', array(
		'selector'            => '.info-section .row',
	) );
}
add_action( 'customize_register', 'metasoft_home_info_section_partials' );
