<?php  
	if ( ! function_exists( 'cleverfox_aravalli_lite_home_checkin' ) ) :
	function cleverfox_aravalli_lite_home_checkin() {
		$checkin_hs				= get_theme_mod('checkin_hs','1'); 
		if($checkin_hs =='1'){
			do_action('cleverfox_aravalli_lite_checkin');
		}
	}
endif;
if ( function_exists( 'cleverfox_aravalli_lite_home_checkin' ) ) {
$section_priority = apply_filters( 'aravalli_section_priority', 12, 'cleverfox_aravalli_lite_home_checkin' );
add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_home_checkin', absint( $section_priority ) );
}