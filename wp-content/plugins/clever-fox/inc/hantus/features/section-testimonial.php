<?php
function hantus_testimonial_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial Section Panel
	=========================================*/
		$wp_customize->add_section(
			'testimonial_setting', array(
				'title' => esc_html__( 'Testimonial Section', 'clever-fox' ),
				'panel' => 'hantus_frontpage_sections',
				'priority' => apply_filters( 'hantus_section_priority', 37, 'hantus_Testimonial' ),
			)
		);
	/*=========================================
	Testimonial Settings Section
	=========================================*/
	
	//  Setting Head
	$wp_customize->add_setting(
		'testimonial_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'testimonial_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'testimonial_setting',
			'priority' => 1,
		)
	);
	
	if ( class_exists( 'Hantus_Customizer_Toggle_Control' ) ) {	
	$wp_customize->add_setting( 
		'hide_show_testimonial' , 
			array(
			'default' =>  esc_html__( '1', 'clever-fox' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_testimonial', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'testimonial_setting',
			'settings'    => 'hide_show_testimonial',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
	}
	/*=========================================
	Testimonial Header Section
	=========================================*/	
	// Testimonial Content Section // 
	
	//  Content  Head
	$wp_customize->add_setting(
		'testimonial_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'testimonial_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'testimonial_setting',
			'priority' => 5,
		)
	);
	
	/**
	 * Customizer Repeater for add Testimonial
	 */
		$wp_customize->add_setting( 'testimonial_contents', 
			array(
			 'sanitize_callback' => 'hantus_repeater_sanitize',
			    'default' => json_encode( 
			 array(
				array(
					'title'           => esc_html__( 'Eric Matision', 'clever-fox' ),
					'designation'        => esc_html__( 'Forest Hills. NY', 'clever-fox' ),
					'text'            => esc_html__( 'I am very impressed by the efficiency of your service and your excellent returns policy. It is so pleasant to deal with such a customer focussed website.', 'clever-fox' ),
					'image_url'		  =>  CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/testimonial/testimonial01.png',
					'id'              => 'customizer_repeater_testimonial_001',
				),
				array(
					'title'           => esc_html__( 'Jennifer Lopez', 'clever-fox' ),
					'designation'        => esc_html__( 'Forest Hills. NY', 'clever-fox' ),
					'text'            => esc_html__( 'I am very impressed by the efficiency of your service and your excellent returns policy. It is so pleasant to deal with such a customer focussed website.', 'clever-fox' ),
					'image_url'		  =>  CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/testimonial/testimonial01.png',
					'id'              => 'customizer_repeater_testimonial_002',
				),
				array(
					'title'           => esc_html__( 'Betty Ross', 'clever-fox' ),
					'designation'        => esc_html__( 'Developer', 'clever-fox' ),
					'text'            => esc_html__( 'I am very impressed by the efficiency of your service and your excellent returns policy. It is so pleasant to deal with such a customer focussed website.', 'clever-fox' ),
					'image_url'		  =>  CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/testimonial/testimonial01.png',
					'id'              => 'customizer_repeater_testimonial_003',
				),
			  )
			 )
			)
		);
		
		$wp_customize->add_control( 
			new hantus_Repeater( $wp_customize, 
				'testimonial_contents', 
					array(
						'label'   => esc_html__('Testimonial','clever-fox'),
						'section' => 'testimonial_setting',
						'add_field_label'                   => esc_html__( 'Add New Testimonial', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Testimonial', 'clever-fox' ),
						'priority' => 6,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_designation_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
			
		//Pro feature
		class hantus_testimonial__upgrade_to_pro extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme
				if ( 'Thai Spa' == $theme->name){
			?>
				<a class="customizer_testimonial_upgrade_section up-to-pro" href="https://www.nayrathemes.com/thaispa-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			   }else{
			?>	
				<a class="customizer_testimonial_upgrade_section up-to-pro" href="https://www.nayrathemes.com/hantus-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			   }
			}
		}
		
		$wp_customize->add_setting( 'hantus_testimonial_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new hantus_testimonial__upgrade_to_pro(
			$wp_customize,
			'hantus_testimonial_upgrade_to_pro',
				array(
					'section'				=> 'testimonial_setting',
					'settings'				=> 'hantus_testimonial_upgrade_to_pro',
					'priority' => 7,
				)
			)
		);
		
	// testimonial Background Section // 
	
	//  BG  Head
	$wp_customize->add_setting(
		'testimonial_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'testimonial_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','clever-fox'),
			'section' => 'testimonial_setting',
			'priority' => 8,
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'testimonial_background_setting' , 
    	array(
			'default' 			=> CLEVERFOX_PLUGIN_URL .'inc/hantus/images/testimonial/testimonial-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'testimonial_background_setting' ,
		array(
			'label'          => __( 'Background Image', 'clever-fox' ),
			'section'        => 'testimonial_setting',
			'settings'   	 => 'testimonial_background_setting',
			'priority' => 9,
		) 
	));
}
add_action( 'customize_register', 'hantus_testimonial_setting' );

// Testimonial selective refresh
function hantus_home_testimonial_section_partials( $wp_customize ){
		// hide_show_testimonial
	$wp_customize->selective_refresh->add_partial(
		'hide_show_testimonial', array(
			'selector' => '#testimonial',
			'container_inclusive' => true,
			'render_callback' => 'testimonial_setting',
			'fallback_refresh' => true,
		)
	);
	$wp_customize->selective_refresh->add_partial( 'testimonial_contents', array(
		'selector'            => '#testimonial .tst_contents',
		'settings'            => 'testimonial_contents',
		'render_callback'  => 'home_section_testimonial_contents_render_callback',
	
	) );
	
	}

add_action( 'customize_register', 'hantus_home_testimonial_section_partials' );

// contents
function home_section_testimonial_contents_render_callback() {
	return get_theme_mod( 'testimonial_contents' );
}