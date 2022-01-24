<?php 
function boostify_info_setting( $wp_customize ) {

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Info
	=========================================*/
		$wp_customize->add_section(
			'info_setting', array(
				'title' => esc_html__( 'Info Section', 'clever-fox' ),
				'panel' => 'boostify_frontpage_sections',
				'priority' => 2,
			)
		);
	
	/*=========================================
	Settings
	=========================================*/
	
	// Settings
	$wp_customize->add_setting(
		'info_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
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
		'hs_info'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 2,
		)
	);

	$wp_customize->add_control(
	'hs_info',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show Section','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	/*=========================================
	Info contents
	=========================================*/
	
	// Settings
	$wp_customize->add_setting(
		'info_contents_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'boostify_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'info_contents_head',
		array(
			'type' => 'hidden',
			'label' => __('Info Contents','clever-fox'),
			'section' => 'info_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Info
	 */
	
		$wp_customize->add_setting( 'info_contents', 
			array(
			 'sanitize_callback' => 'boostify_repeater_sanitize',
			 'priority' => 5,
			  'default' => boostify_get_info_default()
			)
		);
		
		$wp_customize->add_control( 
			new Boostify_Repeater( $wp_customize, 
				'info_contents', 
					array(
						'label'   => esc_html__('Info','clever-fox'),
						'section' => 'info_setting',
						'add_field_label'                   => esc_html__( 'Add New Info', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Info', 'clever-fox' ),
						
						
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
			
	//Pro feature
		class Boostify_info__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_info_upgrade_section up-to-pro" href="https://www.nayrathemes.com/boostify-pro/"  target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}
		}
		
		$wp_customize->add_setting( 'boostify_info_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Boostify_info__section_upgrade(
			$wp_customize,
			'boostify_info_upgrade_to_pro',
				array(
					'section'				=> 'info_setting',
				)
			)
		);			
	
}
add_action( 'customize_register', 'boostify_info_setting' );

/**
 * Add selective refresh for Front page section section controls.
 */
function boostify_home_info_section_partials( $wp_customize ){
	
	//info_contents
	$wp_customize->selective_refresh->add_partial( 'info_contents', array(
		'selector'            => '.contact-info-section .row',
	) );
}
add_action( 'customize_register', 'boostify_home_info_section_partials' );
