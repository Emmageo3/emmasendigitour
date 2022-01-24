<?php 
if ( ! function_exists( 'startkit_slider_setting' ) ) :
function startkit_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
		$wp_customize->add_section(
			'slider_setting', array(
				'title' => esc_html__( 'Slider Section', 'clever-fox' ),
				'panel' => 'startkit_frontpage_sections',
				'priority' => apply_filters( 'startkit_section_priority', 1, 'slider_setting' ),
			)
		);
		
	//  Setting Head
	$wp_customize->add_setting(
		'slider_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'slider_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	// Slider Hide/ Show Setting //
	if ( class_exists( 'Startkit_Customizer_Toggle_Control' ) ) {	
	$wp_customize->add_setting( 
		'hide_show_slider' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_slider', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'slider_setting',
			'settings'    => 'hide_show_slider',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	}
	
	//  Content Head
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add slides
	 */
		if ( class_exists( 'Startkit_Repeater' ) ) {	
		$wp_customize->add_setting( 'slider', 
			array(
			 'sanitize_callback' => 'startkit_repeater_sanitize',
			 'priority' => 6,
			 'default' => startkit_get_slider_default(),
			)
		);
		
		$wp_customize->add_control( 
			new Startkit_Repeater( $wp_customize, 
				'slider', 
					array(
						'label'   => esc_html__('Slide','clever-fox'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New Slider', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Slider', 'clever-fox' ),
						
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_slide_align' => true,
						'customizer_repeater_image_control' => true,	
						'customizer_repeater_image2_control' => true,
					) 
				) 
			);
		}	
		
		//Pro feature
		class Startkit_slider__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme
				if ( 'Envira' == $theme->name){	
			?>
					<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/envira-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php }elseif( 'StartBiz' == $theme->name){ ?>
					<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/startbiz-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php }elseif( 'Arowana' == $theme->name){ ?>	
					<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/arowana-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php }else{ ?>		
					<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/startkit-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php } ?>	
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'startkit_slider_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 7,
		));
		$wp_customize->add_control(
			new Startkit_slider__section_upgrade(
			$wp_customize,
			'startkit_slider_upgrade_to_pro',
				array(
					'section'				=> 'slider_setting',
					'settings'				=> 'startkit_slider_upgrade_to_pro',
				)
			)
		);
	//slider opacity
	$wp_customize->add_setting( 
		'slider_opacity' , 
			array(
			'default' => '0.3',
			'capability'     => 'edit_theme_options',
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control( 
	new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'slider_opacity', 
		array(
			'section'  => 'slider_setting',
			'settings' => 'slider_opacity',
			'label'    => __( 'Background Opacity','clever-fox' ),
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 0.9,
				'step'   => 0.1,
				//'suffix' => 'px', //optional suffix
			),
		) ) 
	);	
}
add_action( 'customize_register', 'startkit_slider_setting' );	
endif;