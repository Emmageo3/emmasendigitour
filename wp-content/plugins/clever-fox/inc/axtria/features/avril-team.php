<?php
function cleverfox_avril_team_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Team Section
	=========================================*/
	$wp_customize->add_section(
		'team_setting', array(
			'title' => esc_html__( 'Team Section', 'clever-fox' ),
			'priority' => 9,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// Team Setting
	$wp_customize->add_setting(
		'team_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 2,
		)
	);

	$wp_customize->add_control(
	'team_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'team_setting',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_team' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_team', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'team_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Team Header Section // 
	$wp_customize->add_setting(
		'team_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'team_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'team_setting',
		)
	);
	
	// Team Title // 
	$wp_customize->add_setting(
    	'team_title',
    	array(
	        'default'			=> __('Technology from tomorrow','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'team_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'team_setting',
			'type'           => 'text',
		)  
	);
	
	// Team Subtitle // 
	$wp_customize->add_setting(
    	'team_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Team</b>                                   <b>Team</b><b>Team</b></span></span>','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'team_subtitle',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'team_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Team Description // 
	$wp_customize->add_setting(
    	'team_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'team_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'team_setting',
			'type'           => 'textarea',
		)  
	);

	// Team content Section // 
	
	$wp_customize->add_setting(
		'team_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'team_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'team_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Team
	 */
	
		$wp_customize->add_setting( 'team_contents', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => avril_get_team_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'team_contents', 
					array(
						'label'   => esc_html__('Teams','clever-fox'),
						'section' => 'team_setting',
						'add_field_label'                   => esc_html__( 'Add New Team', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Teams', 'clever-fox' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_repeater_control' => true,
					) 
				) 
			);
			
	//Pro feature
		class Avril_team__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme
				if ( 'Avtari' == $theme->name){
			?>
				<a class="customizer_team_upgrade_section up-to-pro" href="https://www.nayrathemes.com/avtari-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php }else{ ?>	
			
				<a class="customizer_team_upgrade_section up-to-pro" href="https://www.nayrathemes.com/axtia-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
				}
			}
		}
		
		$wp_customize->add_setting( 'avril_team_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 9,
		));
		$wp_customize->add_control(
			new Avril_team__section_upgrade(
			$wp_customize,
			'avril_team_upgrade_to_pro',
				array(
					'section'				=> 'team_setting',
				)
			)
		);
		
}
add_action( 'customize_register', 'cleverfox_avril_team_setting' );

// team selective refresh
function cleverfox_avril_team_section_partials( $wp_customize ){
	
	// team title
	$wp_customize->selective_refresh->add_partial( 'team_title', array(
		'selector'            => '#team-section .heading-default .ttl',
		'settings'            => 'team_title',
		'render_callback'  => 'avril_team_title_render_callback',
	
	) );
	
	// team subtitle
	$wp_customize->selective_refresh->add_partial( 'team_subtitle', array(
		'selector'            => '#team-section .heading-default h3',
		'settings'            => 'team_subtitle',
		'render_callback'  => 'avril_team_subtitle_render_callback',
	
	) );
	
	// team description
	$wp_customize->selective_refresh->add_partial( 'team_description', array(
		'selector'            => '#team-section .heading-default p',
		'settings'            => 'team_description',
		'render_callback'  => 'avril_team_desc_render_callback',
	
	) );
	// team content
	$wp_customize->selective_refresh->add_partial( 'team_contents', array(
		'selector'            => '#team-section .av-filter-wrapper-2'
	
	) );
	
	}

add_action( 'customize_register', 'cleverfox_avril_team_section_partials' );

// team title
function avril_team_title_render_callback() {
	return get_theme_mod( 'team_title' );
}

// team subtitle
function avril_team_subtitle_render_callback() {
	return get_theme_mod( 'team_subtitle' );
}

// team description
function avril_team_desc_render_callback() {
	return get_theme_mod( 'team_description' );
}