<?php
/**
 * @package   Hantus
 */
 
require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/features/navigation.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/features/section-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/features/section-info.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/features/section-service.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/features/section-testimonial.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/features/section-typography.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/dynamic-style.php';


if ( ! function_exists( 'cleverfox_hantus_frontpage_sections' ) ) :
	function cleverfox_hantus_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/sections/section-info.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/sections/section-service.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/hantus/sections/section-testimonial.php';
    }
	add_action( 'hantus_sections', 'cleverfox_hantus_frontpage_sections' );
endif;
