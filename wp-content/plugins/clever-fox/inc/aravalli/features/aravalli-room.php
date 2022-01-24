<?php
function aravalli_room_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Room  Section
	=========================================*/
	$wp_customize->add_section(
		'room_setting', array(
			'title' => esc_html__( 'Room Section', 'clever-fox' ),
			'priority' => 3,
			'panel' => 'aravalli_frontpage_sections',
		)
	);
	
	// Setting Head // 
	$wp_customize->add_setting(
		'room_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'room_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'room_setting',
		)
	);
	
	// Hide Show // 
	$wp_customize->add_setting(
		'room_hs'
			,array(
			'default'     	=> '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'room_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'room_setting',
		)
	);
	
	
	// Room Header Section // 
	$wp_customize->add_setting(
		'room_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'room_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'room_setting',
		)
	);
	
	// Room Title // 
	$wp_customize->add_setting(
    	'room_title',
    	array(
	        'default'			=> __('Explore','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'room_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'room_setting',
			'type'           => 'text',
		)  
	);
	
	// Room Subtitle // 
	$wp_customize->add_setting(
    	'room_subtitle',
    	array(
	        'default'			=> __('Rooms & Suits','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'room_subtitle',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'room_setting',
			'type'           => 'text',
		)  
	);
	
	// Room Description // 
	$wp_customize->add_setting(
    	'room_desc',
    	array(
	        'default'			=> __("Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.",'clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'room_desc',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'room_setting',
			'type'           => 'textarea',
		)  
	);

	// Room content Section // 
	
	$wp_customize->add_setting(
		'room_contents_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'aravalli_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'room_contents_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'room_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Room
	 */
	
		$wp_customize->add_setting( 'room_contents', 
			array(
			 'sanitize_callback' => 'aravalli_repeater_sanitize',
			 'priority' => 5,
			  'default' => aravalli_get_room_default()
			)
		);
		
		$wp_customize->add_control( 
			new Aravalli_Repeater( $wp_customize, 
				'room_contents', 
					array(
						'label'   => esc_html__('Room','clever-fox'),
						'section' => 'room_setting',
						'add_field_label'                   => esc_html__( 'Add New Room', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Rooms', 'clever-fox' ),
						
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_button_text_control'=> true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_image_control' => true,
					) 
				) 
			);	
			
	
	//Pro feature
		class Aravalli_room__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if ( 'Arbuda' == $theme->name){
			?>
				<a class="customizer_room_upgrade_section up-to-pro" href="https://www.nayrathemes.com/arbuda-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php }else{ ?>	
				
				<a class="customizer_room_upgrade_section up-to-pro" href="https://www.nayrathemes.com/aravalli-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			}}
		}
		
		$wp_customize->add_setting( 'aravalli_room_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Aravalli_room__section_upgrade(
			$wp_customize,
			'aravalli_room_upgrade_to_pro',
				array(
					'section'				=> 'room_setting',
				)
			)
		);
		
}

add_action( 'customize_register', 'aravalli_room_setting' );

// room selective refresh
function aravalli_Room_section_partials( $wp_customize ){	
	// room_title
	$wp_customize->selective_refresh->add_partial( 'room_title', array(
		'selector'            => '.room-home .heading-default h6',
		'settings'            => 'room_title',
		'render_callback'  => 'aravalli_room_title_render_callback',
	) );
	
	// room_subtitle
	$wp_customize->selective_refresh->add_partial( 'room_subtitle', array(
		'selector'            => '.room-home .heading-default h3',
		'settings'            => 'room_subtitle',
		'render_callback'  => 'aravalli_room_subtitle_render_callback',
	) );
	
	// room_desc
	$wp_customize->selective_refresh->add_partial( 'room_desc', array(
		'selector'            => '.room-home .heading-default p',
		'settings'            => 'room_desc',
		'render_callback'  => 'aravalli_room_desc_render_callback',
	) );
	
	}

add_action( 'customize_register', 'aravalli_Room_section_partials' );

// room_title
function aravalli_room_title_render_callback() {
	return get_theme_mod( 'room_title' );
}

// room_title
function aravalli_room_subtitle_render_callback() {
	return get_theme_mod( 'room_subtitle' );
}

// room_desc
function aravalli_room_desc_render_callback() {
	return get_theme_mod( 'room_desc' );
}