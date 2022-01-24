<?php
/**
 * @package   Arbuda
 */
 
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/above-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/arbuda/sections/footer-above.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-room.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-amenities.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-features.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/arbuda/features/aravalli-footer.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/features/aravalli-typography.php';

if ( ! function_exists( 'cleverfox_aravalli_frontpage_sections' ) ) :
	function cleverfox_aravalli_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/section-room.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/section-amenities.php';
	    require CLEVERFOX_PLUGIN_DIR . 'inc/aravalli/sections/section-features.php';
    }
	add_action( 'aravalli_sections', 'cleverfox_aravalli_frontpage_sections' );
endif;