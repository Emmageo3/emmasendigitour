<?php 
if ( ! function_exists( 'hantus_slider_setting' ) ) :
function hantus_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
		$wp_customize->add_section(
			'slider_setting', array(
				'title' => esc_html__( 'Slider Section', 'clever-fox' ),
				'panel' => 'hantus_frontpage_sections',
				'priority' => apply_filters( 'hantus_section_priority', 1, 'slider_setting' ),
			)
		);
		
	//  Setting Head
	$wp_customize->add_setting(
		'hantus_slider_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hantus_slider_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'slider_setting',
			'priority' => 1,
		)
	);
	
	// Slider Hide/ Show Setting //
	if ( class_exists( 'Hantus_Customizer_Toggle_Control' ) ) {	
	$wp_customize->add_setting( 
		'hide_show_slider' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_slider', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'slider_setting',
			'settings'    => 'hide_show_slider',
			'type'        => 'ios', // light, ios, flat
			'priority' => 2,
		) 
	));
	}
	
	
	//  Content Head
	$wp_customize->add_setting(
		'hantus_slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'hantus_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hantus_slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'slider_setting',
			'priority' => 5,
		)
	);
	
	$wp_customize->add_setting( 'slider', 
			array(
			 'sanitize_callback' => 'hantus_repeater_sanitize',
			  'default' => json_encode( array(
			 
            /*Repeater's first item*/
            array("image_url" => CLEVERFOX_PLUGIN_URL.'inc/hantus/images/slider/slider01.jpg' ,"link" => "#", "title" => "Welcome To Hantus Spa","subtitle" => "Beauty & Spa Wellness", "text" => "The Spa at Sun Valley is a serene oasis amid all the exciting  activities our iconic valley has delivered for decades.", "text2" => "Make an Appoinment","slide_align" => "left","id" => "customizer_repeater_000101" ), 
			array("image_url" => CLEVERFOX_PLUGIN_URL.'inc/hantus/images/slider/slider02.jpg' ,"link" => "#", "title" => "Welcome To Hantus Spa","subtitle" => "Beauty & Spa Wellness", "text" => "The Spa at Sun Valley is a serene oasis amid all the exciting  activities our iconic valley has delivered for decades.", "text2" => "Make an Appoinment","slide_align" => "center","id" => "customizer_repeater_000102" ), 
			array("image_url" => CLEVERFOX_PLUGIN_URL.'inc/hantus/images/slider/slider03.jpg' ,"link" => "#", "title" => "Welcome To Hantus Spa","subtitle" => "Beauty & Spa Wellness", "text" => "The Spa at Sun Valley is a serene oasis amid all the exciting  activities our iconic valley has delivered for decades.", "text2" => "Make an Appoinment","slide_align" => "right","id" => "customizer_repeater_000103" ), 
             ) )
			)
		);
		
		$wp_customize->add_control( 
			new Hantus_Repeater( $wp_customize, 
				'slider', 
					array(
						'label'   => esc_html__('Slide','clever-fox'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New Slider', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Slider', 'clever-fox' ),
						'priority' => 6,
						
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_slide_align' => true,						
					) 
				) 
			);
		
	
		//Pro feature
		class Hantus_slider__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme
				if ( 'Thai Spa' == $theme->name){
			?>
				<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/thaispa-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			   }else{
			?>	
				<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/hantus-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
				}
			}
		}
		
		$wp_customize->add_setting( 'hantus_slider_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Hantus_slider__section_upgrade(
			$wp_customize,
			'hantus_slider_upgrade_to_pro',
				array(
					'section'				=> 'slider_setting',
					'settings'				=> 'hantus_slider_upgrade_to_pro',
					'priority' => 7,
				)
			)
		);
		
	//slider opacity
	$wp_customize->add_setting( 
		'slider_opacity' , 
			array(
			'default' => '0.4',
			'capability'     => 'edit_theme_options',
		) 
	);
	$wp_customize->add_control( 
	new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'slider_opacity', 
		array(
			'section'  => 'slider_setting',
			'settings' => 'slider_opacity',
			'label'    => __( 'Background Opacity','clever-fox' ),
			'priority' => 8,
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 0.9,
				'step'   => 0.1,
				//'suffix' => 'px', //optional suffix
			),
		) ) 
	);	
	
	//Overlay Enable //
	if ( class_exists( 'Hantus_Customizer_Toggle_Control' ) ) {	
	$wp_customize->add_setting( 
		'slider_overlay_enable' , 
			array(
			'default' => 1,
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
	'slider_overlay_enable', 
		array(
			'label'	      => esc_html__( 'Overlay Enable', 'clever-fox' ),
			'section'     => 'slider_setting',
			'type'        => 'ios', // light, ios, flat
			'priority' => 9,
		) 
	));
	}
	
	// Overlay Color
	$wp_customize->add_setting(
	'slide_overlay_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#000000'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'slide_overlay_color', 
			array(
				'label'      => __( 'Overlay Color', 'clever-fox' ),
				'section'    => 'slider_setting',
				'priority' => 10,
			) 
		) 
	);
	
	// Title Color
	$wp_customize->add_setting(
	'slide_title_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#fff'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'slide_title_color', 
			array(
				'label'      => __( 'Title Color', 'clever-fox' ),
				'section'    => 'slider_setting',
				'priority' => 11,
			) 
		) 
	);
	
	// Subtitle Color
	$wp_customize->add_setting(
	'slide_sbtitle_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'slide_sbtitle_color', 
			array(
				'label'      => __( 'Subtitle Color', 'clever-fox' ),
				'section'    => 'slider_setting',
				'priority' => 12,
			) 
		) 
	);
	
	// Description Color
	$wp_customize->add_setting(
	'slide_desc_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#fff'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'slide_desc_color', 
			array(
				'label'      => __( 'Description Color', 'clever-fox' ),
				'section'    => 'slider_setting',
				'priority' => 13,
			) 
		) 
	);
}
add_action( 'customize_register', 'hantus_slider_setting' );	
endif;
// slider selective refresh
function hantus_home_slider_section_partials( $wp_customize ){

	
	// slider title
	$wp_customize->selective_refresh->add_partial( 'slide_title', array(
		'selector'            => '#slider .header-single-slider h3',
		'settings'            => 'slide_title',
		'render_callback'  => 'home_section_slider_tit_render_callback',
	
	) );
	// slider subtitle
	$wp_customize->selective_refresh->add_partial( 'slide_subtitle', array(
		'selector'            => '#slider .header-single-slider h1',
		'settings'            => 'slide_subtitle',
		'render_callback'  => 'home_section_slide_subtitle_render_callback',
	
	) );
	// slider title
	$wp_customize->selective_refresh->add_partial( 'slide_description', array(
		'selector'            => '#slider .header-single-slider p',
		'settings'            => 'slide_description',
		'render_callback'  => 'home_section_slider_desc_render_callback',
	
	) );
	// slider button
	$wp_customize->selective_refresh->add_partial( 'slide_btn_text', array(
		'selector'            => '#slider .header-single-slider a',
		'settings'            => 'slide_btn_text',
		'render_callback'  => 'home_section_slider_button_render_callback',
	
	) );
	
	}
add_action( 'customize_register', 'hantus_home_slider_section_partials' );

// slider title
function home_section_slider_tit_render_callback() {
	return get_theme_mod( 'slide_title' );
}
// slider subtitle
function home_section_slide_subtitle_render_callback() {
	return get_theme_mod( 'slide_subtitle' );
}
//slide desc
function home_section_slider_desc_render_callback() {
	return get_theme_mod( 'slide_description' );
}
//slide desc
function home_section_slider_button_render_callback() {
	return get_theme_mod( 'slide_btn_text' );
}