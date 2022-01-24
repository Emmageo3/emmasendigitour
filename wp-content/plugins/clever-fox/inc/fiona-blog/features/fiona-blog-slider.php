<?php
function fiona_blog_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'clever-fox' ),
			'panel' => 'fiona_blog_frontpage_sections',
			'priority' => 1,
		)
	);
	
	//  Head
	$wp_customize->add_setting(
		'slider_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_text',
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
	
	//  Hide / Show
	$wp_customize->add_setting(
		'slider_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_checkbox',
			'priority' => 2,
		)
	);

	$wp_customize->add_control(
	'slider_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	// slider Contents
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	// Skider Category
	$wp_customize->add_setting(
    'slider_category_id',
		array(
		'capability' => 'edit_theme_options',
		'priority' => 5,
		'sanitize_callback' => 'fiona_blog_sanitize_text',
		)
	);	
	$wp_customize->add_control( new Fiona_Blog_Category_Dropdown_Control( $wp_customize, 
	'slider_category_id', 
		array(
		'label'   => __('Select Blog category for Slider Section','clever-fox'),
		'section' => 'slider_setting',
		) 
	) );
	
	// slider opacity
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'slider_opacity',
			array(
				'default'	      => '0.5',
				'capability'     	=> 'edit_theme_options',
				//'sanitize_callback' => 'fiona_blog_sanitize_range_value',
				'priority' => 7,
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'slider_opacity', 
			array(
				'label'      => __( 'opacity', 'clever-fox' ),
				'section'  => 'slider_setting',
					'input_attrs' => array(
						'min'    => 0,
						'max'    => 0.9,
						'step'   => 0.1,
						//'suffix' => 'px', //optional suffix
					),
			) ) 
		);
	}
	
	//Pro feature
		class Fiona_slider__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			?>
				<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/fiona-pro/" target="_blank"><?php _e('Get More Features ?','clever-fox'); ?></a>
			<?php
			}
		}
		
		$wp_customize->add_setting( 'fiona_blog_slider_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Fiona_slider__section_upgrade(
			$wp_customize,
			'fiona_blog_slider_upgrade_to_pro',
				array(
					'section'				=> 'slider_setting',
					'settings'				=> 'fiona_blog_slider_upgrade_to_pro',
				)
			)
		);	
}

add_action( 'customize_register', 'fiona_blog_slider_setting' );