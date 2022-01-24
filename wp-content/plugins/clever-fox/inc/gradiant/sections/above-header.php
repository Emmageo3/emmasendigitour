<?php
	if ( ! function_exists( 'gradiant_above_header' ) ) :
	function gradiant_above_header() {
		$hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
		$hide_show_cntct_details 	= get_theme_mod( 'hide_show_cntct_details','1'); 
		$hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
		$hide_show_mbl_details 		= get_theme_mod( 'hide_show_mbl_details','1');
		if($hide_show_social_icon =='1' || $hide_show_cntct_details =='1' || $hide_show_email_details =='1' || $hide_show_mbl_details =='1'):
		?>
			<div id="above-header" class="header-above-info d-av-block d-none">
				<div class="header-widget">
					<div class="av-container">
						<div class="av-columns-area">
							<div class="av-column-5">
								<div class="widget-left text-av-left text-center">
									<?php do_action('gradiant_abv_hdr_social'); ?>
								</div>
							</div>
							<div class="av-column-7">
								<div class="widget-right text-av-right text-center">                                
									<?php do_action('gradiant_abv_hdr_contact_info'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; 
} endif;
add_action('gradiant_above_header', 'gradiant_above_header');
?>
