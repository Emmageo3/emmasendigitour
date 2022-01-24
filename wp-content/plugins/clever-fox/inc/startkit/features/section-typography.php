<?php
if ( ! function_exists( 'startkit_typography_customizer' ) ) :
 function startkit_typography_customizer( $wp_customize ) {
$wp_customize->add_panel( 'startkit_typography_setting', array(
		'priority'       => 25,
		'capability'     => 'edit_theme_options',
		'title'      => __('Typography','clever-fox'),
	) );
	


// Typography Hide/ Show Setting // 

$wp_customize->add_section(
	'typography_setting' ,
		array(
		'title'      => __('Settings','clever-fox'),
		'panel' => 'startkit_typography_setting',
		'priority'       => 1,
   	) );
	if ( class_exists( 'Startkit_Customizer_Toggle_Control' ) ) {
	$wp_customize->add_setting( 
		'hide_show_typography' , 
			array(
			'default' => 0,
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control( new Startkit_Customizer_Toggle_Control( $wp_customize, 
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
$font_transform = array('lowercase'=>'Lowercase','uppercase'=>'Uppercase','capitalize'=>'capitalize');
$font_weight = array('normal'=>'normal', 'italic'=>'Italic','oblique'=>'oblique');	
// General typography section
$wp_customize->add_section(
	'Body_typography' ,
		array(
		'title'      => __('Body','clever-fox'),
		'panel' => 'startkit_typography_setting',
		'priority'       => 2,
   	) );
		//Secondary font weight
		
		$wp_customize->add_setting(
			'body_typography_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'body_typography_font_weight', array(
				'label' => __('Font Style','spicepress'),
				'section' => 'Body_typography',
				'setting' => 'body_typography_font_weight',
				'choices'=>$font_weight,
				'type'           => 'select',
			)
		);
		// Body font size// 
		$wp_customize->add_setting( 
			'body_font_size' , 
				array(
				'default' => __( '16','clever-fox' ),
				'capability'     => 'edit_theme_options',
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

// paragraph typography

		$wp_customize->add_section(
			'paragraph_typography' ,
				array(
				'title'      => __('Paragraph','clever-fox'),
				'panel' => 'startkit_typography_setting',
				'priority'       => 2,
			) );
		//paragraph font weight
		
		$wp_customize->add_setting(
			'para_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'para_font_weight', array(
				'label' => __('Font Style','clever-fox'),
				'section' => 'paragraph_typography',
				'setting' => 'para_font_weight',
				'choices'=>$font_weight,
				'type'           => 'select',
			)
		);
		
		// paragraph font size// 
		$wp_customize->add_setting( 
			'paragraph_font_size' , 
				array(
				'default' => __( '16','clever-fox' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'paragraph_font_size', 
			array(
				'section'  => 'paragraph_typography',
				'settings' => 'paragraph_font_size',
				'label'    => __( 'Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 20,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// paragraph line height// 
		$wp_customize->add_setting( 
			'paragraph_line_height' , 
				array(
				'default' => __( '16','clever-fox' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'paragraph_line_height', 
			array(
				'section'  => 'paragraph_typography',
				'settings' => 'paragraph_line_height',
				'label'    => __( 'Line Height(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 60,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);

		
		//H1 typography
		$wp_customize->add_section(
			'H1_typography' ,
				array(
				'title'      => __('H1','clever-fox'),
				'panel' => 'startkit_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H1 font weight
		
		$wp_customize->add_setting(
			'h1_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'h1_font_weight', array(
				'label' => __('Font Style','clever-fox'),
				'section' => 'H1_typography',
				'setting' => 'h1_font_weight',
				'choices'=>$font_weight,
				'type'           => 'select',
			)
		);
		
		// H1 font size// 
		$wp_customize->add_setting( 
			'h1_font_size' , 
				array(
				'default' => '36',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h1_font_size', 
			array(
				'section'  => 'H1_typography',
				'settings' => 'h1_font_size',
				'label'    => __( 'Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 45,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// paragraph line height// 
		$wp_customize->add_setting( 
			'h1_line_height' , 
				array(
				'default' => __( '46','clever-fox' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h1_line_height', 
			array(
				'section'  => 'H1_typography',
				'settings' => 'h1_line_height',
				'label'    => __( 'Line Height(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H1 text transform
		
		$wp_customize->add_setting( 
			'h1_text_transform' , 
				array(
				'default' => 'capitalize',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(
	'h1_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'clever-fox' ),
			'section'        => 'H1_typography',
			'settings'   	 => 'h1_text_transform',
			'choices'        => $font_transform,
			'type'           => 'select',
		) 
	);
	
	//H2 typography
		$wp_customize->add_section(
			'H2_typography' ,
				array(
				'title'      => __('H2','clever-fox'),
				'panel' => 'startkit_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H2 font weight
		
		$wp_customize->add_setting(
			'h2_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'h2_font_weight', array(
				'label' => __('Font Style','clever-fox'),
				'section' => 'H2_typography',
				'setting' => 'h2_font_weight',
				'choices'=>$font_weight,
				'type'           => 'select',
			)
		);
		
		// H2 font size// 
		$wp_customize->add_setting( 
			'h2_font_size' , 
				array(
				'default' => __( '32','clever-fox' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h2_font_size', 
			array(
				'section'  => 'H2_typography',
				'settings' => 'h2_font_size',
				'label'    => __( 'Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 45,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// paragraph line height// 
		$wp_customize->add_setting( 
			'h2_line_height' , 
				array(
				'default' => '46',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h2_line_height', 
			array(
				'section'  => 'H2_typography',
				'settings' => 'h2_line_height',
				'label'    => __( 'Line Height(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H1 text transform
		
		$wp_customize->add_setting( 
			'h2_text_transform' , 
				array(
				'default' => 'capitalize',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(
	'h2_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'clever-fox' ),
			'section'        => 'H2_typography',
			'settings'   	 => 'h2_text_transform',
			'choices'        => $font_transform,
			'type'           => 'select',
		) 
	);
	
	
	//H3 typography
		$wp_customize->add_section(
			'H3_typography' ,
				array(
				'title'      => __('H3','clever-fox'),
				'panel' => 'startkit_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H3 font weight
		
		$wp_customize->add_setting(
			'h3_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'h3_font_weight', array(
				'label' => __('Font Style','clever-fox'),
				'section' => 'H3_typography',
				'setting' => 'h3_font_weight',
				'choices'=>$font_weight,
				'type'           => 'select',
			)
		);
		
		// H3 font size// 
		$wp_customize->add_setting( 
			'h3_font_size' , 
				array(
				'default' => '28',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h3_font_size', 
			array(
				'section'  => 'H3_typography',
				'settings' => 'h3_font_size',
				'label'    => __( 'Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 35,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//h3 line height// 
		$wp_customize->add_setting( 
			'h3_line_height' , 
				array(
				'default' => '34',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h3_line_height', 
			array(
				'section'  => 'H3_typography',
				'settings' => 'h3_line_height',
				'label'    => __( 'Line Height(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H3 text transform
		
		$wp_customize->add_setting( 
			'h3_text_transform' , 
				array(
				'default' => 'capitalize',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(
	'h3_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'clever-fox' ),
			'section'        => 'H3_typography',
			'settings'   	 => 'h3_text_transform',
			'choices'        => $font_transform,
			'type'           => 'select',
		) 
	);
		
//H4 typography
		$wp_customize->add_section(
			'H4_typography' ,
				array(
				'title'      => __('H4','clever-fox'),
				'panel' => 'startkit_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H4 font weight
		
		$wp_customize->add_setting(
			'h4_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'h4_font_weight', array(
				'label' => __('Font Style','clever-fox'),
				'section' => 'H4_typography',
				'setting' => 'h4_font_weight',
				'choices'=>$font_weight,
				'type'           => 'select',
			)
		);
		
		// H4 font size// 
		$wp_customize->add_setting( 
			'h4_font_size' , 
				array(
				'default' => __( '24','clever-fox' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h4_font_size', 
			array(
				'section'  => 'H4_typography',
				'settings' => 'h4_font_size',
				'label'    => __( 'Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 28,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//h3 line height// 
		$wp_customize->add_setting( 
			'h4_line_height' , 
				array(
				'default' => '28',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h4_line_height', 
			array(
				'section'  => 'H4_typography',
				'settings' => 'h4_line_height',
				'label'    => __( 'Line Height(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H4 text transform
		
		$wp_customize->add_setting( 
			'h4_text_transform' , 
				array(
				'default' => 'capitalize',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(
	'h4_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'clever-fox' ),
			'section'        => 'H4_typography',
			'settings'   	 => 'h4_text_transform',
			'choices'        => $font_transform,
			'type'           => 'select',
		) 
	);
	
	
	//H5 typography
		$wp_customize->add_section(
			'H5_typography' ,
				array(
				'title'      => __('H5','clever-fox'),
				'panel' => 'startkit_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H5 font weight
		
		$wp_customize->add_setting(
			'h5_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'h5_font_weight', array(
				'label' => __('Font Style','clever-fox'),
				'section' => 'H5_typography',
				'setting' => 'h5_font_weight',
				'choices'=>$font_weight,
				'type'           => 'select',
			)
		);
		
		// H5 font size// 
		$wp_customize->add_setting( 
			'h5_font_size' , 
				array(
				'default' =>  __( '20','clever-fox' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h5_font_size', 
			array(
				'section'  => 'H5_typography',
				'settings' => 'h5_font_size',
				'label'    => __( 'Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 25,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//h5 line height// 
		$wp_customize->add_setting( 
			'h5_line_height' , 
				array(
				'default' => '15',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h5_line_height', 
			array(
				'section'  => 'H5_typography',
				'settings' => 'h5_line_height',
				'label'    => __( 'Line Height(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H5 text transform
		
		$wp_customize->add_setting( 
			'h5_text_transform' , 
				array(
				'default' => 'capitalize',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(
	'h5_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'clever-fox' ),
			'section'        => 'H5_typography',
			'settings'   	 => 'h5_text_transform',
			'choices'        => $font_transform,
			'type'           => 'select',
		) 
	);
	
	
	//H6 typography
		$wp_customize->add_section(
			'H6_typography' ,
				array(
				'title'      => __('H6','clever-fox'),
				'panel' => 'startkit_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H5 font weight
		
		$wp_customize->add_setting(
			'h6_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(
		'h6_font_weight', array(
				'label' => __('Font Style','clever-fox'),
				'section' => 'H6_typography',
				'setting' => 'h6_font_weight',
				'choices'=>$font_weight,
				'type'           => 'select',
			)
		);
		
		// H6 font size// 
		$wp_customize->add_setting( 
			'h6_font_size' , 
				array(
				'default' => __( '16','clever-fox' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h6_font_size', 
			array(
				'section'  => 'H6_typography',
				'settings' => 'h6_font_size',
				'label'    => __( 'Font Size(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 25,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//h6 line height// 
		$wp_customize->add_setting( 
			'h6_line_height' , 
				array(
				'default' => '24',
				'capability'     => 'edit_theme_options',				
			) 
		);

		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'h6_line_height', 
			array(
				'section'  => 'H6_typography',
				'settings' => 'h6_line_height',
				'label'    => __( 'Line Height(px)','clever-fox' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H5 text transform
		
		$wp_customize->add_setting( 
			'h6_text_transform' , 
				array(
				'default' => 'capitalize',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(
	'h6_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'clever-fox' ),
			'section'        => 'H6_typography',
			'settings'   	 => 'h6_text_transform',
			'choices'        => $font_transform,
			'type'           => 'select',
		) 
	);
	

// menu typography section
$wp_customize->add_section(
	'menu_typography' ,
		array(
		'title'      => __('Menus','clever-fox'),
		'panel' => 'startkit_typography_setting',
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
					'type'           => 'select',
				)
			);
		
		// menu font size// 
		$wp_customize->add_setting( 
			'menu_font_size' , 
				array(
				'default' =>  __('15','clever-fox'),
				'capability'     => 'edit_theme_options',
				
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
		
		//menu text transform
		
		$wp_customize->add_setting( 
			'menu_text_transform' , 
				array(
				'default' => 'normal',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(
	'menu_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'clever-fox' ),
			'section'        => 'menu_typography',
			'settings'   	 => 'menu_text_transform',
			'choices'        => $font_transform,
			'type'           => 'select',
		) 
	);
	
// Sections typography section
$wp_customize->add_section(
	'section_typography' ,
		array(
		'title'      => __('Sections','clever-fox'),
		'panel' => 'startkit_typography_setting',
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
					'type'           => 'select',
				)
			);
		
		// section title font size// 
		$wp_customize->add_setting( 
			'section_tit_font_size' , 
				array(
				'default' => '36',
				'capability'     => 'edit_theme_options',
				
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
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
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
					'type'           => 'select',
				)
			);
		
		// section title font size// 
		$wp_customize->add_setting( 
			'section_desc_font_size' , 
				array(
				'default' => __( '16','clever-fox' ),
				'capability'     => 'edit_theme_options',
				
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
		
}
add_action( 'customize_register', 'startkit_typography_customizer' );
endif;