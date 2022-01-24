<?php
function gradiant_lite_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Footer Above
	=========================================*/	
	$wp_customize->add_section(
        'footer_above',
        array(
            'title' 		=> __('Footer Above','clever-fox'),
			'panel'  		=> 'footer_section',
			'priority'      => 2,
		)
    );
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_footer' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_checkbox',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_footer', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	//content
	$wp_customize->add_setting( 'footer_above_content', 
		array(
			 'sanitize_callback' => 'gradiant_repeater_sanitize',
			 'default' => gradiant_get_footer_above_default(),
			 'transport'         => $selective_refresh,
			 'priority' => 2,
			)
		);
		
		$wp_customize->add_control( 
			new GRADIANT_Repeater( $wp_customize, 
				'footer_above_content', 
					array(
						'label'   => esc_html__('Content','clever-fox'),
						'section' => 'footer_above',
						'add_field_label'                   => esc_html__( 'Add New Content', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Content', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);	
			
	//Pro feature
		class Gradiant_footer_above__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme	
			?>
				<a class="customizer_footer_above_upgrade_section up-to-pro" href="https://www.nayrathemes.com/gradiant-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'gradiant_footer_above_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Gradiant_footer_above__section_upgrade(
			$wp_customize,
			'gradiant_footer_above_upgrade_to_pro',
				array(
					'section'				=> 'footer_above',
				)
			)
		);		
}
add_action( 'customize_register', 'gradiant_lite_footer' );
// Footer selective refresh
function gradiant_lite_footer_partials( $wp_customize ){	
	//footer_above_content 
	$wp_customize->selective_refresh->add_partial( 'footer_above_content', array(
		'selector'            => '.footer-above .av-columns-area',
	) );
	
	}

add_action( 'customize_register', 'gradiant_lite_footer_partials' );