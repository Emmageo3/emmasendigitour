<?php
	if ( ! function_exists( 'boostify_above_footer' ) ) :
	function boostify_above_footer() {
		$hs_above_footer 			= get_theme_mod('hs_above_footer','1');	
		$footer_above_ttl 			= get_theme_mod('footer_above_ttl','Do you like that you see?');
		$footer_above_btn_lbl1 		= get_theme_mod('footer_above_btn_lbl1','Request a Quote');
		$footer_above_btn_url1 		= get_theme_mod('footer_above_btn_url1','#');
		$footer_above_btn_mdl_text 	= get_theme_mod('footer_above_btn_mdl_text','or');
		$footer_above_btn_lbl2 		= get_theme_mod('footer_above_btn_lbl2','Contact Us');
		$footer_above_btn_url2 		= get_theme_mod('footer_above_btn_url2','#');
		if($hs_above_footer == '1'):
	?>
		<div id="action-bar">
			<div class="container">
				<div class="action-bar">
					<div class="row">
						<div class="col-lg-5 offset-lg-1 offset-0 text-center text-lg-left mb-3 mb-lg-0">
							<?php if(!empty($footer_above_ttl)): ?>
								<div class="bar-text">
									<p><?php echo wp_kses_post($footer_above_ttl); ?></p>
								</div>
							<?php endif; ?>
						</div>
						<div class="col-lg-5 text-lg-right text-center">
							<?php if(!empty($footer_above_btn_lbl1)): ?>
								<a href="<?php echo esc_url($footer_above_btn_url1); ?>" class="boxed-btn white-bg"><?php echo esc_html($footer_above_btn_lbl1); ?></a>
							<?php endif; ?>
							<?php echo esc_html($footer_above_btn_mdl_text); ?>
							
							<?php if(!empty($footer_above_btn_lbl2)): ?>
								<a href="<?php echo esc_url($footer_above_btn_url2); ?>" class="boxed-btn contact-btn"><?php echo esc_html($footer_above_btn_lbl2); ?></a>
							<?php endif; ?>
						</div>
					</div>                
				</div>
			</div>
		</div>  
	<?php endif;
} endif;
add_action('boostify_above_footer', 'boostify_above_footer');

