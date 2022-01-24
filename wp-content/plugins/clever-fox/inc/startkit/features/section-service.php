<?php
if ( ! function_exists( 'startkit_service_setting' ) ) :
function startkit_service_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Service Settings Section
	=========================================*/
		$wp_customize->add_section(
			'service_setting', array(
				'title' => esc_html__( 'Service Section', 'clever-fox' ),
				'priority' => apply_filters( 'startkit_section_priority', 26, 'startkit_pricing' ),
				'panel' => 'startkit_frontpage_sections',
			)
		);
		
	//  Setting Head
	$wp_customize->add_setting(
		'service_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'service_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'service_setting',
		)
	);
	
		// service Hide/ Show Setting // 
	if ( class_exists( 'Startkit_Customizer_Toggle_Control' ) ) {		
	$wp_customize->add_setting( 
		'hide_show_service' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_service', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'service_setting',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	}
	// Service Header Section // 
	//  Head
	$wp_customize->add_setting(
		'service_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'service_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'service_setting',
		)
	);
	
	// Service Title // 
	$wp_customize->add_setting(
    	'service_title',
    	array(
	        'default'			=> __('Services','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	$wp_customize->add_control( 
		'service_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'service_setting',
			'type'           => 'text',
		)  
	);
	
	// Service Subtitle // 
	$wp_customize->add_setting(
    	'service_subttl',
    	array(
	        'default'			=> '<span>Service</span> <h6>Lorem is dummy text.</h6>',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'service_subttl',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'service_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Service Description // 
	$wp_customize->add_setting(
    	'service_description',
    	array(
	        'default'			=> __('Publishing packages and web page editors now use Lorem Ipsum as their default model text','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	
	$wp_customize->add_control( 
		'service_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'service_setting',
			'type'           => 'textarea',
		)  
	);

	// Service content Section // 
	
	//  Content Head
	$wp_customize->add_setting(
		'service_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'service_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'service_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add service
	 */
		if ( class_exists( 'Startkit_Repeater' ) ) {	
		$wp_customize->add_setting( 'service_contents', 
			array(
			 'sanitize_callback' => 'startkit_repeater_sanitize',
			 'priority' => 12,
			  'default' => startkit_get_service_default(),
			)
		);
		
		
		$theme = wp_get_theme(); // gets the current theme
		if ( 'StartKit' == $theme->name || 'StartBiz' == $theme->name){
			$wp_customize->add_control( 
				new Startkit_Repeater( $wp_customize, 
					'service_contents', 
						array(
							'label'   => esc_html__('Service','clever-fox'),
							'section' => 'service_setting',
							'add_field_label'                   => esc_html__( 'Add New Service', 'clever-fox' ),
							'item_name'                         => esc_html__( 'Service', 'clever-fox' ),
							'customizer_repeater_icon_control' => true,
							'customizer_repeater_title_control' => true,
							'customizer_repeater_text_control' => true,
							'customizer_repeater_text2_control' => true,
							'customizer_repeater_link_control' => true,
							'customizer_repeater_image_control' => true,
						) 
					) 
				);
			}else{
				$wp_customize->add_control( 
				new Startkit_Repeater( $wp_customize, 
					'service_contents', 
						array(
							'label'   => esc_html__('Service','clever-fox'),
							'section' => 'service_setting',
							'add_field_label'                   => esc_html__( 'Add New Service', 'clever-fox' ),
							'item_name'                         => esc_html__( 'Service', 'clever-fox' ),
							'customizer_repeater_icon_control' => true,
							'customizer_repeater_title_control' => true,
							'customizer_repeater_text_control' => true,
							'customizer_repeater_text2_control' => true,
							'customizer_repeater_link_control' => true,
						) 
					) 
				);
			}
		}
		//Pro feature
		class Startkit_services__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme
				if ( 'Envira' == $theme->name){	
			?>
				<a class="customizer_service_upgrade_section up-to-pro" href="https://www.nayrathemes.com/envira-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php }elseif( 'StartBiz' == $theme->name){ ?>
					<a class="customizer_service_upgrade_section up-to-pro" href="https://www.nayrathemes.com/startbiz-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php }elseif( 'Arowana' == $theme->name){ ?>	
					<a class="customizer_service_upgrade_section up-to-pro" href="https://www.nayrathemes.com/arowana-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php }else{ ?>		
					<a class="customizer_service_upgrade_section up-to-pro" href="https://www.nayrathemes.com/startkit-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				<?php } ?>	
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'startkit_service_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 13,
		));
		$wp_customize->add_control(
			new Startkit_services__section_upgrade(
			$wp_customize,
			'startkit_service_upgrade_to_pro',
				array(
					'section'				=> 'service_setting',
					'settings'				=> 'startkit_service_upgrade_to_pro',
				)
			)
		);
}

add_action( 'customize_register', 'startkit_service_setting' );
endif;

// service selective refresh
function startkit_home_service_section_partials( $wp_customize ){	
	// service title
	$wp_customize->selective_refresh->add_partial( 'service_title', array(
		'selector'            => '#services .section-header h2',
		'settings'            => 'service_title',
		'render_callback'  => 'home_section_service_title_render_callback',
	) );
	
	// service_subttl
	$wp_customize->selective_refresh->add_partial( 'service_subttl', array(
		'selector'            => '#services .section-header .subtitle',
		'settings'            => 'service_subttl',
		'render_callback'  => 'home_service_subttl_render_callback',
	) );
	
	// service description
	$wp_customize->selective_refresh->add_partial( 'service_description', array(
		'selector'            => '#services .section-header p',
		'settings'            => 'service_description',
		'render_callback'  => 'home_section_service_desc_render_callback',
	
	) );
	// service content
	$wp_customize->selective_refresh->add_partial( 'service_contents', array(
		'selector'            => '#services .servicesss',
	) );
	
	}

add_action( 'customize_register', 'startkit_home_service_section_partials' );

// service title
function home_section_service_title_render_callback() {
	return get_theme_mod( 'service_title' );
}

// service_subttl
function home_service_subttl_render_callback() {
	return get_theme_mod( 'service_subttl' );
}

// service description
function home_section_service_desc_render_callback() {
	return get_theme_mod( 'service_description' );
}