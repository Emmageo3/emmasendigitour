<?php 
if ( ! function_exists( 'avril_lite_cta' ) ) :
	function avril_lite_cta() {
	$hs_cta						= get_theme_mod('hs_cta','1');	
	$cta_title					= get_theme_mod('cta_title','We work in partnership with all the major <i>technology</i> solutions');
	$cta_description			= get_theme_mod('cta_description','There are many variations of passages of lorem Ipsum available, but the majority');
	$cta_btn_lbl1				= get_theme_mod('cta_btn_lbl1','Purchase Now');
	$cta_btn_link1				= get_theme_mod('cta_btn_link1');
	$cta_btn_second_ttl			= get_theme_mod('cta_btn_second_ttl','Get Quick Support');
	$cta_btn_lbl2				= get_theme_mod('cta_btn_lbl2','+22 24588-55069');
	$cta_btn_link2				= get_theme_mod('cta_btn_link2');
	$cta_image					= get_theme_mod('cta_image',CLEVERFOX_PLUGIN_URL . '/inc/avail/images/cta-image.png');
if($hs_cta == '1') {	
?>	
	<section id="cta-section" class="cta-section cta-3 cta-bg-image home-cta">
		<div class="av-container">
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="cta-wrapper">
						<div class="cta-content">
	                    	<?php if ( ! empty( $cta_image ) ) : ?>
								<div class="cta-img"><img src="<?php echo esc_url($cta_image); ?>"></div>
							<?php endif; ?>
	                    	<div class="cta-text">
							<?php if ( ! empty( $cta_title ) ) : ?>
								<h4><?php echo wp_kses_post($cta_title); ?></h4>
							<?php endif; ?>
							<?php if ( ! empty($cta_description) ) : ?>		
								<p><?php echo wp_kses_post($cta_description); ?></p>    
							<?php endif; ?>	
							</div>
						</div>
						<div class="cta-btn-wrap text-av-right text-center">
							<?php if ( ! empty( $cta_btn_lbl2 ) ) : ?>
							<a class="cta-more" href="<?php echo esc_url($cta_btn_link2); ?>"><div class="cta-icon"><i class="fa fa-phone"></i></div><div class="cta-label"><span class="cta-label-title"><?php if ( ! empty( $cta_btn_second_ttl ) ) : echo esc_html($cta_btn_second_ttl); endif; ?></span><span class="cta-label-dis"><?php echo esc_html($cta_btn_lbl2); ?></span></div></a>
							<?php endif;?>
							<?php if ( ! empty( $cta_btn_lbl1 ) ) : ?>
								<a href="<?php echo esc_url($cta_btn_link1); ?>" class="av-btn av-btn-white" data-text="Contact With Us"><?php echo esc_html($cta_btn_lbl1); ?></a>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php	
	}} endif; 
	if ( function_exists( 'avril_lite_cta' ) ) {
		$section_priority = apply_filters( 'avril_section_priority', 12, 'avril_lite_cta' );
		add_action( 'avril_sections', 'avril_lite_cta', absint( $section_priority ) );
	}	