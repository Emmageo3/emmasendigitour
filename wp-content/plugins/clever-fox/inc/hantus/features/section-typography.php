<?php function hantus_typography_customizer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
$wp_customize->add_panel( 'hantus_typography_setting', array(
		'priority'       => 38,
		'capability'     => 'edit_theme_options',
		'title'      => __('Typography','clever-fox'),
	) );
	
// Typography Hide/ Show Setting // 

$wp_customize->add_section(
	'typography_setting' ,
		array(
		'title'      => __('Settings','clever-fox'),
		'panel' => 'hantus_typography_setting',
		'priority'       => 1,
   	) );
	
	if ( class_exists( 'Hantus_Customizer_Toggle_Control' ) ) {	
		$wp_customize->add_setting( 
			'hide_show_typography' , 
				array(
				'default' => 0,
				'sanitize_callback' => 'sanitize_text_field',
				'capability' => 'edit_theme_options',
			) 
		);
		
		$wp_customize->add_control( new Hantus_Customizer_Toggle_Control( $wp_customize, 
		'hide_show_typography', 
			array(
				'label'	      => esc_html__( 'Enable Typography', 'clever-fox' ),
				'section'     => 'typography_setting',
				'settings'    => 'hide_show_typography',
				'type'        => 'ios', // light, ios, flat
			) 
		));
	}
$font_size = array();
for($i=9; $i<=100; $i++)
{			
	$font_size[$i] = $i;
}

$font_transform = array('inherit'=>'Inherit','lowercase'=>'Lowercase','uppercase'=>'Uppercase','capitalize'=>'capitalize');
$font_weight = array('normal'=>'normal', 'italic'=>'Italic','oblique'=>'oblique');	
// General typography section
$wp_customize->add_section(
	'Body_typography' ,
		array(
		'title'      => __('Body','clever-fox'),
		'panel' => 'hantus_typography_setting',
		'priority'       => 2,
   	) );

		//Secondary font weight
		
		$wp_customize->add_setting(
			'body_typography_font_weight',
			array(
				'default'           =>  __('normal','clever-fox'),
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'body_typography_font_weight', array(
				'label' => __('Font Style','clever-fox'),
				'section' => 'Body_typography',
				'setting' => 'body_typography_font_weight',
				'choices'=>$font_weight,
				'type'			=> 'select',
			)
		);
		// Body font size// 
		$wp_customize->add_setting( 
			'body_font_size' , 
				array(
				'default' => __( '14','clever-fox' ),
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'body_font_size', 
			array(
				'section'  => 'Body_typography',
				'settings' => 'body_font_size',
				'label'    => __( 'Font Size','clever-fox' ),
				'input_attrs' => array(
					'min'    => 10,
					'max'    => 40,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// Body line height// 
		$wp_customize->add_setting( 
			'body_line_height' , 
				array(
				'default' => 1.6,
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'body_line_height', 
			array(
				'section'  => 'Body_typography',
				'settings' => 'body_line_height',
				'label'    => __( 'Line Height','clever-fox' ),
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 3,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);

		
		//H1 typography
		for ( $i = 1; $i <= 6; $i++ ) {
		if($i  == '1'){$j=36;}elseif($i  == '2'){$j=32;}elseif($i  == '3'){$j=28;}elseif($i  == '4'){$j=24;}elseif($i  == '5'){$j=20;}else{$j=16;}
		$wp_customize->add_section(
			'H' . $i . '_typography' ,
				array(
				'title'      => __('H' . $i .'','clever-fox'),
				'panel' => 'hantus_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H1 font weight
		
		$wp_customize->add_setting(
			'h' . $i . '_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'h' . $i . '_font_weight', array(
				'label' => __('Font Style','clever-fox'),
				'section' => 'H' . $i . '_typography',
				'setting' => 'h' . $i . '_font_weight',
				'choices'=>$font_weight,
				'type'			=> 'select',
			)
		);
		
		// H1 font size// 
		$wp_customize->add_setting( 
			'h' . $i . '_font_size' , 
				array(
				'default' => $j,
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h' . $i . '_font_size', 
			array(
				'section'  => 'H' . $i . '_typography',
				'settings' => 'h' . $i . '_font_size',
				'label'    => __( 'Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// paragraph line height// 
		$wp_customize->add_setting( 
			'h' . $i . '_line_height' , 
				array(
				'default' => 1.2,
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h' . $i . '_line_height', 
			array(
				'section'  => 'H' . $i . '_typography',
				'settings' => 'h' . $i . '_line_height',
				'label'    => __( 'Line Height','clever-fox' ),
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 3,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H1 text transform
		
		$wp_customize->add_setting( 
			'h' . $i . '_text_transform' , 
				array(
				'default' => 'inherit',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

	$wp_customize->add_control(
	'h' . $i . '_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'clever-fox' ),
			'section'        => 'H' . $i . '_typography',
			'settings'   	 => 'h' . $i . '_text_transform',
			'choices'        => $font_transform,
			'type'			=> 'select',
		) 
	);
	}
	

	// menu typography section
	$wp_customize->add_section(
		'menu_typography' ,
			array(
			'title'      => __('Menus','clever-fox'),
			'panel' => 'hantus_typography_setting',
			'priority'       => 2,
		) );

			
		//menu font weight
		
		$wp_customize->add_setting(
			'menu_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
				'menu_font_weight',
				array(
					'label' => __('Font Style','clever-fox'),
					'section' => 'menu_typography',
					'setting' => 'menu_font_weight',
					'choices'=>$font_weight,
					'type'			=> 'select',
				)
			);
		
		// menu font size// 
		$wp_customize->add_setting( 
			'menu_font_size' , 
				array(
				'default' => '15',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'menu_font_size', 
			array(
				'section'  => 'menu_typography',
				'settings' => 'menu_font_size',
				'label'    => __( 'Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 20,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// Menu line height// 
		$wp_customize->add_setting( 
			'menu_line_height' , 
				array(
				'default' => 1.6,
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'menu_line_height', 
			array(
				'section'  => 'menu_typography',
				'settings' => 'menu_line_height',
				'label'    => __( 'Line Height','clever-fox' ),
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 3,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//menu text transform
		
		$wp_customize->add_setting( 
			'menu_text_transform' , 
				array(
				'default' => 'inherit',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

	$wp_customize->add_control(
	'menu_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'clever-fox' ),
			'section'        => 'menu_typography',
			'settings'   	 => 'menu_text_transform',
			'choices'        => $font_transform,
			'type'			=> 'select',
		) 
	);
	
// Sections typography section
$wp_customize->add_section(
	'section_typography' ,
		array(
		'title'      => __('Sections','clever-fox'),
		'panel' => 'hantus_typography_setting',
		'priority'       => 2,
   	) );
			
		//section font weight
		$wp_customize->add_setting(
			'section_tit_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
				'section_tit_font_weight',
				array(
					'label' => __(' Title Font Style','clever-fox'),
					'section' => 'section_typography',
					'setting' => 'section_tit_font_weight',
					'choices'=>$font_weight,
					'type'			=> 'select',
				)
			);
		
		// section title font size// 
		$wp_customize->add_setting( 
			'section_tit_font_size' , 
				array(
				'default' => '36',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'section_tit_font_size', 
			array(
				'section'  => 'section_typography',
				'settings' => 'section_tit_font_size',
				'label'    => __( 'Title Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 100,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// Section Title Height// 
		$wp_customize->add_setting( 
			'section_ttl_line_height' , 
				array(
				'default' => 1.6,
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'section_ttl_line_height', 
			array(
				'section'  => 'section_typography',
				'settings' => 'section_ttl_line_height',
				'label'    => __( 'Title Line Height','clever-fox' ),
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 3,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//Section Title transform
		$wp_customize->add_setting( 
			'sec_ttl_text_transform' , 
				array(
				'default' => 'inherit',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control(
		'sec_ttl_text_transform' , 
			array(
				'label'          => __( 'Text Transform', 'clever-fox' ),
				'section'        => 'section_typography',
				'settings'   	 => 'sec_ttl_text_transform',
				'choices'        => $font_transform,
				'type'			=> 'select',
			) 
		);
		
		//section font weight
		$wp_customize->add_setting(
			'section_des_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
				'section_des_font_weight',
				array(
					'label' => __('Description Font Style','clever-fox'),
					'section' => 'section_typography',
					'setting' => 'section_des_font_weight',
					'choices'=>$font_weight,
					'type'			=> 'select',
				)
			);
		
		// section title font size// 
		$wp_customize->add_setting( 
			'section_desc_font_size' , 
				array(
				'default' => '16',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'section_desc_font_size', 
			array(
				'section'  => 'section_typography',
				'settings' => 'section_desc_font_size',
				'label'    => __( 'Description Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// Section Description Height// 
		$wp_customize->add_setting( 
			'section_desc_line_height' , 
				array(
				'default' => 1.6,
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'section_desc_line_height', 
			array(
				'section'  => 'section_typography',
				'settings' => 'section_desc_line_height',
				'label'    => __( 'Description Line Height','clever-fox' ),
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 3,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//Section Description transform
		$wp_customize->add_setting( 
			'sec_desc_text_transform' , 
				array(
				'default' => 'inherit',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);

		$wp_customize->add_control(
		'sec_desc_text_transform' , 
			array(
				'label'          => __( 'Text Transform', 'clever-fox' ),
				'section'        => 'section_typography',
				'settings'   	 => 'sec_desc_text_transform',
				'choices'        => $font_transform,
				'type'			=> 'select',
			) 
		);
}
add_action( 'customize_register', 'hantus_typography_customizer' );