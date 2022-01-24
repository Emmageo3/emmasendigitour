<?php
function conceptly_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
		$wp_customize->add_section(
			'slider_setting', array(
				'title' => esc_html__( 'Slider Section', 'clever-fox' ),
				'panel' => 'conceptly_frontpage_sections',
				'priority' => apply_filters( 'conceptly_section_priority', 1, 'slider_setting' ),
			)
		);
	
	// Slider Setting Head
	$wp_customize->add_setting(
		'slider_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'slider_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('setting','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	
	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_slider' , 
			array(
			'default' => esc_html__( '1', 'clever-fox' ),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Conceptly_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_slider', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'slider_setting',
			'settings'    => 'hide_show_slider',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	// Slider Content Head
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'conceptly_sanitize_text',
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
	
		$wp_customize->add_setting( 'slider', 
			array(
			 'sanitize_callback' => 'conceptly_repeater_sanitize',
			  'default' => conceptly_get_slides_default(),
			  'priority' => 6,
			)
		);
		
		 $wp_customize->add_control( 
			 new Conceptly_Repeater( $wp_customize, 
				 'slider', 
					 array(
						 'label'   => esc_html__('Slide','clever-fox'),
						 'section' => 'slider_setting',
						 'add_field_label'                   => esc_html__( 'Add New Slider', 'clever-fox' ),
						 'item_name'                         => esc_html__( 'Slider', 'clever-fox' ),
						
						 'customizer_repeater_icon_control' => false,
						 'customizer_repeater_title_control' => true,
						 'customizer_repeater_subtitle_control' => true,
						 'customizer_repeater_text_control' => true,
						 'customizer_repeater_text2_control'=> true,
						 'customizer_repeater_link_control' => true,
						 'customizer_repeater_slide_align' => true,
						 'customizer_repeater_checkbox_control' => true,
						 'customizer_repeater_image_control' => true,
						 'customizer_repeater_image2_control' => true,						 
					 ) 
				 ) 
			 );
	
		//Pro feature
		class Conceptly_slider__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'Ameya' == $theme->name){	
			?>
				<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/ameya-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}elseif ( 'Azwa' == $theme->name){
				?>
				<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/azwa-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
				}else{
			?>
				<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/conceptly-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}
			}
		}
		
		$wp_customize->add_setting( 'conceptly_slider_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 7,
		));
		$wp_customize->add_control(
			new Conceptly_slider__section_upgrade(
			$wp_customize,
			'conceptly_slider_upgrade_to_pro',
				array(
					'section'				=> 'slider_setting',
					'settings'				=> 'conceptly_slider_upgrade_to_pro',
				)
			)
		);
		
	
	
	
	
	//slider opacity
	
	// Slider Text Caption // 
	$wp_customize->add_setting( 
		'slider_opacity' , 
			array(
			'default' => '',
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
add_action( 'customize_register', 'conceptly_slider_setting' );

// slider selective refresh
function conceptly_home_slider_section_partials( $wp_customize ){

	// hide_show_slider
	$wp_customize->selective_refresh->add_partial(
		'hide_show_slider', array(
			'selector' => '.header-slider',
			'container_inclusive' => true,
			'render_callback' => 'slider_setting',
			'fallback_refresh' => true,
		)
	);
	// slider
	$wp_customize->selective_refresh->add_partial( 'slider', array(
		'selector'            => '#slider .header-slider figure',
		'settings'            => 'slider',
		'render_callback'  => 'home_section_slider_render_callback',
	
	) );
	
	}

add_action( 'customize_register', 'conceptly_home_slider_section_partials' );

// Slider
function home_section_slider_render_callback() {
	return get_theme_mod( 'slider' );
}
?>