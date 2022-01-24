<?php
function fiona_blog_lite_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'clever-fox'),
		) 
	);
	
	/*=========================================
	Fiona Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );

	// Logo Width // 
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'logo_width',
			array(
				'default'			=> '140',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'logo_width', 
			array(
				'label'      => __( 'Logo Width', 'clever-fox' ),
				'section'  => 'title_tagline',
				'input_attrs' => array(
				'min'    => 0,
				'max'    => 500,
				'step'   => 1,
				//'suffix' => 'px', //optional suffix
			),
			) ) 
		);
	}

	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );
	
	$theme = wp_get_theme(); // gets the current theme
	if( 'Fiona News' == $theme->name){
		
		// Head
		$wp_customize->add_setting(
			'abv_hdr_menu_head'
				,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_text',
				'priority' => 1,
			)
		);

		$wp_customize->add_control(
		'abv_hdr_menu_head',
			array(
				'type' => 'hidden',
				'label' => __('Menu','clever-fox'),
				'section' => 'above_header',
			)
		);
		
		$wp_customize->add_setting( 
			'hs_abv_hdr_menu' , 
				array(
				'default' => '1',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_checkbox',
				'priority' => 2,
			) 
		);
		
		$wp_customize->add_control(
		'hs_abv_hdr_menu', 
			array(
				'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
				'section'     => 'above_header',
				'type'        => 'checkbox'
			) 
		);	

	}else{
		
		// Head
		$wp_customize->add_setting(
			'abv_hdr_time_head'
				,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_text',
				'priority' => 1,
			)
		);

		$wp_customize->add_control(
		'abv_hdr_time_head',
			array(
				'type' => 'hidden',
				'label' => __('Time','clever-fox'),
				'section' => 'above_header',
			)
		);
		
		$wp_customize->add_setting( 
			'hs_abv_hdr_time' , 
				array(
				'default' => '1',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_checkbox',
				'priority' => 2,
			) 
		);
		
		$wp_customize->add_control(
		'hs_abv_hdr_time', 
			array(
				'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
				'section'     => 'above_header',
				'type'        => 'checkbox'
			) 
		);	
		
		
		
		// Head
		$wp_customize->add_setting(
			'abv_hdr_trending_head'
				,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_text',
				'priority' => 5,
			)
		);

		$wp_customize->add_control(
		'abv_hdr_trending_head',
			array(
				'type' => 'hidden',
				'label' => __('Trending','clever-fox'),
				'section' => 'above_header',
			)
		);
		
		$wp_customize->add_setting( 
			'hs_abv_hdr_trending' , 
				array(
				'default' => '1',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_checkbox',
				'priority' => 5,
			) 
		);
		
		$wp_customize->add_control(
		'hs_abv_hdr_trending', 
			array(
				'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
				'section'     => 'above_header',
				'type'        => 'checkbox'
			) 
		);	
		
		// Header first Trending // 
		$wp_customize->add_setting(
			'abv_hdr_first_trending_title',
			array(
				'default'   		=> __('Trending','clever-fox'),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_html',
				'priority' => 6,
			)
		);	

		$wp_customize->add_control( 
			'abv_hdr_first_trending_title',
			array(
				'label'   		=> __('Trending Title','clever-fox'),
				'section'		=> 'above_header',
				'type' 			=> 'text',
			)  
		);	
		
		$wp_customize->add_setting(
			'abv_hdr_first_trending_desc',
			array(
				'default'   		=> __('Lorem ipsum dolor sit amet consectetur','clever-fox'),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'fiona_blog_sanitize_html',
				'priority' => 7,
			)
		);	

		$wp_customize->add_control( 
			'abv_hdr_first_trending_desc',
			array(
				'label'   		=> __('Trending Description','clever-fox'),
				'section'		=> 'above_header',
				'type' 			=> 'textarea',
			)  
		);	
	}
	// Head
	$wp_customize->add_setting(
		'abv_hdr_social_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'abv_hdr_social_head',
		array(
			'type' => 'hidden',
			'label' => __('Social Icons','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_abv_hdr_social' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_checkbox',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
	'hs_abv_hdr_social', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// Header Social Title // 
	$wp_customize->add_setting(
    	'abv_hdr_social_ttl',
    	array(
			'default'   		=> __('IN SOCIAL','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'fiona_blog_sanitize_html',
			'priority' => 13,
		)
	);	

	$wp_customize->add_control( 
		'abv_hdr_social_ttl',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section'		=> 'above_header',
			'type' 			=> 'text',
		)  
	);	
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_icons', 
			array(
			 'sanitize_callback' => 'fiona_blog_repeater_sanitize',
			 'priority' => 14,
			 'default' => fiona_blog_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new FIONA_BLOG_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social Icons','clever-fox'),
						'section' => 'above_header',
						'add_field_label'                   => esc_html__( 'Add New Social', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Social', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
		//Pro feature
		class Fiona_social__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			?>
				<a class="customizer_social_upgrade_section up-to-pro" href="https://www.nayrathemes.com/fiona-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}
		}
		
		$wp_customize->add_setting( 'fiona_blog_hdr_social_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Fiona_social__section_upgrade(
			$wp_customize,
			'fiona_blog_hdr_social_upgrade_to_pro',
				array(
					'section'				=> 'above_header',
					'settings'				=> 'fiona_blog_hdr_social_upgrade_to_pro',
				)
			)
		);	
		
	
}
add_action( 'customize_register', 'fiona_blog_lite_header_settings' );