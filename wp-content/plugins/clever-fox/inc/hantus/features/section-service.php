<?php
function hantus_service_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Service Settings Section
	=========================================*/
		$wp_customize->add_section(
			'service_setting', array(
				'title' => esc_html__( 'Service Section', 'clever-fox' ),
				'priority' => apply_filters( 'hantus_section_priority', 25, 'hantus_service' ),
				'panel' => 'hantus_frontpage_sections',
			)
		);
		
	//  Setting Head
	$wp_customize->add_setting(
		'service_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'service_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'service_setting',
			'priority' => 1,
		)
	);
	
	// service Hide/ Show Setting // 
	if ( class_exists( 'Hantus_Customizer_Toggle_Control' ) ) {	
	$wp_customize->add_setting( 
		'hide_show_service' , 
			array(
			'default' => esc_html__( '1', 'clever-fox' ),
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_service', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'service_setting',
			'settings'    => 'hide_show_service',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
	}
	// Service Header Section // 
	
	
	//  Head
	$wp_customize->add_setting(
		'service_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'service_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'service_setting',
			'priority' => 5,
		)
	);
	
	// Service Title // 
	$wp_customize->add_setting(
    	'service_title',
    	array(
	        'default'			=> __('Our Services','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'service_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'service_setting',
			'settings'   	 => 'service_title',
			'type'           => 'text',
			'priority' => 6,
		)  
	);
	
	// Service Description // 
	$wp_customize->add_setting(
    	'service_description',
    	array(
	        'default'			=> __('These are the services we provide, these makes us stand apart.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'service_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'service_setting',
			'settings'   	 => 'service_description',
			'type'           => 'textarea',
			'priority' => 7,
		)  
	);

	// Service content Section // 
	
	// Content  Head
	$wp_customize->add_setting(
		'service_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'service_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'service_setting',
			'priority' => 11,
		)
	);
	
	/**
	 * Customizer Repeater for add service
	 */
	
		$wp_customize->add_setting( 'service_contents', 
			array(
			 'sanitize_callback' => 'hantus_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'default' => json_encode( 
			 array(
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/service/service01.png',
					'title'           => esc_html__( 'Oil Massage', 'clever-fox' ),
					'subtitle'            => esc_html__( '$57.99', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of  the printing and typesetting.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Book now', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_001',
					
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/service/service02.png',
					'title'           => esc_html__( 'Skin Care', 'clever-fox' ),
					'subtitle'            => esc_html__( '$57.99', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of  the printing and typesetting.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Book now', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_002',
				
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/service/service03.png',
					'title'           => esc_html__( 'Natural Care', 'clever-fox' ),
					'subtitle'            => esc_html__( '$57.99', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of  the printing and typesetting.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Book now', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_003',
			
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/service/service04.png',
					'title'           => esc_html__( 'Nails Design', 'clever-fox' ),
					'subtitle'            => esc_html__( '$57.99', 'clever-fox' ),
					'text'            => esc_html__( 'Lorem Ipsum is simply dummy text of  the printing and typesetting.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Book now', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_service_004',
					
				),
			)
			 )
			)
		);
		
		$wp_customize->add_control( 
			new hantus_Repeater( $wp_customize, 
				'service_contents', 
					array(
						'label'   => esc_html__('Service','clever-fox'),
						'section' => 'service_setting',
						'add_field_label'                   => esc_html__( 'Add New Service', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Service', 'clever-fox' ),
						'priority' => 12,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
			//Pro feature
		class Hantus_service__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme
				if ( 'Thai Spa' == $theme->name){
			?>
				<a class="customizer_service_upgrade_section up-to-pro" href="https://www.nayrathemes.com/thaispa-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			   }else{
			?>	
				<a class="customizer_service_upgrade_section up-to-pro" href="https://www.nayrathemes.com/hantus-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			   }
			}
		}
		
		$wp_customize->add_setting( 'hantus_service_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Hantus_service__section_upgrade(
			$wp_customize,
			'hantus_service_upgrade_to_pro',
				array(
					'section'				=> 'service_setting',
					'settings'				=> 'hantus_service_upgrade_to_pro',
					'priority' => 13,
				)
			)
		);
}

add_action( 'customize_register', 'hantus_service_setting' );

// service selective refresh
function hantus_home_service_section_partials( $wp_customize ){
		// hide_show_service
	$wp_customize->selective_refresh->add_partial(
		'hide_show_service', array(
			'selector' => '#services',
			'container_inclusive' => true,
			'render_callback' => 'service_setting',
			'fallback_refresh' => true,
		)
	);
	
	// service title
	$wp_customize->selective_refresh->add_partial( 'service_title', array(
		'selector'            => '#services .service-section h2',
		'settings'            => 'service_title',
		'render_callback'  => 'home_section_service_title_render_callback',
	
	) );
	// service description
	$wp_customize->selective_refresh->add_partial( 'service_description', array(
		'selector'            => '#services .service-section p',
		'settings'            => 'service_description',
		'render_callback'  => 'home_section_service_desc_render_callback',
	
	) );
	// service content
	$wp_customize->selective_refresh->add_partial( 'service_contents', array(
		'selector'            => '.servicesss',
	
	) );
	
	}

add_action( 'customize_register', 'hantus_home_service_section_partials' );

// service title
function home_section_service_title_render_callback() {
	return get_theme_mod( 'service_title' );
}


// service description
function home_section_service_desc_render_callback() {
	return get_theme_mod( 'service_description' );
}