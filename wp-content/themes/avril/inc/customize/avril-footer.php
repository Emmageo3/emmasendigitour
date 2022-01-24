<?php
function avril_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'avril'),
		) 
	);
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Copyright Content','avril'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
    );

	// footer first text // 
	$avril_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'avril' );
	$wp_customize->add_setting(
    	'copyright_content',
    	array(
			'default' => $avril_footer_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
		)
	);	

	$wp_customize->add_control( 
		'copyright_content',
		array(
		    'label'   		=> __('Copyright','avril'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 4,
		)  
	);		
}
add_action( 'customize_register', 'avril_footer' );
// Footer selective refresh
function avril_footer_partials( $wp_customize ){
	// copyright_content
	$wp_customize->selective_refresh->add_partial( 'copyright_content', array(
		'selector'            => '#footer-section .footer-copyright .copyright-text',
		'settings'            => 'copyright_content',
		'render_callback'  => 'avril_copyright_render_callback',
	
	) );
	}

add_action( 'customize_register', 'avril_footer_partials' );

// copyright_content
function avril_copyright_render_callback() {
	return get_theme_mod( 'copyright_content' );
}