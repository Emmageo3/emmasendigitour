<?php
if ( ! function_exists( 'startkit_testimonial_setting' ) ) :
function startkit_testimonial_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial Section Panel
	=========================================*/
		$wp_customize->add_section(
			'testimonial_setting', array(
				'title' => esc_html__( 'Testimonial Section', 'clever-fox' ),
				'panel' => 'startkit_frontpage_sections',
				'priority' => apply_filters( 'startkit_section_priority', 32, 'startkit_Testimonial' ),
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
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'testimonial_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'testimonial_setting',
		)
	);
	
	if ( class_exists( 'Startkit_Customizer_Toggle_Control' ) ) {
	$wp_customize->add_setting( 
		'hide_show_testimonial' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_testimonial', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'testimonial_setting',
			'settings'    => 'hide_show_testimonial',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	}
	/*=========================================
	Testimonial Header Section
	=========================================*/
	// Testimonial Header Section // 
	
	//  Head
	$wp_customize->add_setting(
		'testimonial_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'testimonial_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'testimonial_setting',
		)
	);
	
	// Testimonial Title // 
	$wp_customize->add_setting(
    	'testimonial_title',
    	array(
	        'default'			=> __('Testimonial','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	$wp_customize->add_control( 
		'testimonial_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'testimonial_setting',
			'settings'   	 => 'testimonial_title',
			'type'           => 'text',
		)  
	);
	
	// Testimonial Subtitle // 
	$wp_customize->add_setting(
    	'testimonial_subttl',
    	array(
	        'default'			=> '<span>Testimonial</span> <h6>Lorem is dummy text.</h6>',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_subttl',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'testimonial_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Testimonial Description // 
	$wp_customize->add_setting(
    	'testimonial_description',
    	array(
	        'default'			=> __('Publishing packages and web page editors now use Lorem Ipsum as their default model text','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	
	$wp_customize->add_control( 
		'testimonial_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'testimonial_setting',
			'settings'   	 => 'testimonial_description',
			'type'           => 'textarea',
		)  
	);
	// Testimonial Content Section // 
	
	//  Content Head
	$wp_customize->add_setting(
		'testimonial_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'testimonial_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'testimonial_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Testimonial
	 */
		if ( class_exists( 'Startkit_Repeater' ) ) {
		$wp_customize->add_setting( 'testimonial_contents', 
			array(
			 'sanitize_callback' => 'startkit_repeater_sanitize',
			 'priority' => 12,
			    'default' => startkit_get_testimonial_default(),
			)
		);
		$wp_customize->add_control( 
			new Startkit_Repeater( $wp_customize, 
				'testimonial_contents', 
					array(
						'label'   => esc_html__('Testimonial','clever-fox'),
						'section' => 'testimonial_setting',
						'add_field_label'                   => esc_html__( 'Add New Testimonial', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Testimonial', 'clever-fox' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						
						
				
					) 
				) 
			);
		}
		//Pro feature
		class Startkit_testimonial__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme
				if ( 'StartKit' == $theme->name){	
			?>
					<a class="customizer_testimonial_upgrade_section up-to-pro" href="https://www.nayrathemes.com/startkit-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php }elseif( 'StartBiz' == $theme->name){ ?>
					<a class="customizer_testimonial_upgrade_section up-to-pro" href="https://www.nayrathemes.com/startbiz-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php }elseif( 'Arowana' == $theme->name){ ?>	
					<a class="customizer_testimonial_upgrade_section up-to-pro" href="https://www.nayrathemes.com/arowana-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php }else{ ?>		
					<a class="customizer_testimonial_upgrade_section up-to-pro" href="https://www.nayrathemes.com/startkit-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php } ?>	
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'startkit_testimonial_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 13,
		));
		$wp_customize->add_control(
			new Startkit_testimonial__section_upgrade(
			$wp_customize,
			'startkit_testimonial_upgrade_to_pro',
				array(
					'section'				=> 'testimonial_setting',
					'settings'				=> 'startkit_testimonial_upgrade_to_pro',
				)
			)
		);
}
add_action( 'customize_register', 'startkit_testimonial_setting' );
endif;

// Testimonial selective refresh
function startkit_home_testimonial_section_partials( $wp_customize ){

	
	// title
	$wp_customize->selective_refresh->add_partial( 'testimonial_title', array(
		'selector'            => '#testimonial .section-header h2',
		'settings'            => 'testimonial_title',
		'render_callback'  => 'home_section_testimonial_title_render_callback',
	) );
	
	// testimonial_subttl
	$wp_customize->selective_refresh->add_partial( 'testimonial_subttl', array(
		'selector'            => '#testimonial .section-header .subtitle',
		'settings'            => 'testimonial_subttl',
		'render_callback'  => 'home_testimonial_subttl_render_callback',
	) );
	
	// description
	$wp_customize->selective_refresh->add_partial( 'testimonial_description', array(
		'selector'            => '#testimonial .section-header p',
		'settings'            => 'testimonial_description',
		'render_callback'  => 'home_section_testimonial_desc_render_callback',
	) );
	// contents
	$wp_customize->selective_refresh->add_partial( 'testimonial_contents', array(
		'selector'            => '#testimonial .tst_contents',
	) );
	}
add_action( 'customize_register', 'startkit_home_testimonial_section_partials' );

// title
function home_section_testimonial_title_render_callback() {
	return get_theme_mod( 'testimonial_title' );
}

// testimonial_subttl
function home_testimonial_subttl_render_callback() {
	return get_theme_mod( 'testimonial_subttl' );
}

// description
function home_section_testimonial_desc_render_callback() {
	return get_theme_mod( 'testimonial_description' );
}