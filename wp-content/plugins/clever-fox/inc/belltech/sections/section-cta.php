<?php 
if ( ! function_exists( 'belltech_lite_cta' ) ) :
	function belltech_lite_cta() {
	$cta_hs					= get_theme_mod('cta_hs','1');
	$cta_title				= get_theme_mod('cta_title','Need Emergency <span>Plumbing Service?</span> Call us at');
	$cta_description		= get_theme_mod('cta_description','24 hours, 7 days a week, 365 days a year');
	$cta_btn_lbl1			= get_theme_mod('cta_btn_lbl1','Contact With Us');
	$cta_btn_link1			= get_theme_mod('cta_btn_link1');
	$cta_btn_second_ttl		= get_theme_mod('cta_btn_second_ttl','or');
	$cta_btn_lbl2			= get_theme_mod('cta_btn_lbl2','+1 (088) 456 888 (24/7)');
	$cta_btn_link2			= get_theme_mod('cta_btn_link2');
	$cta_btn2_icon			= get_theme_mod('cta_btn2_icon','fa-bell');
	if($cta_hs =='1'){
?>	
<!-- Call to Action Start -->
<section id="cta-wrapper" class="cta-wrapper home-cta home-cta-3">
	<div id="particles-js2"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-12 text-lg-left text-center head">
				<?php if ( ! empty( $cta_title ) ) : ?>
					<h2><?php echo wp_kses_post($cta_title); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $cta_description ) ) : ?>
				<p><?php echo wp_kses_post($cta_description); ?></p>
				<?php endif; ?>
			</div>
			<div class="col-lg-6 col-sm-12 text-lg-right text-center my-lg-auto mt-4">
			
				<div class="learn-more">
					<?php if ( ! empty( $cta_btn2_icon ) ) : ?>
						<div class="cta-icon-box">
							<i class="fa <?php echo esc_attr($cta_btn2_icon); ?>"></i>
						</div>
					<?php endif; ?>
					<a href="<?php echo esc_url($cta_btn_link2); ?>"><?php echo esc_html($cta_btn_lbl2); ?></a>
					<div class="or"><?php echo esc_html($cta_btn_second_ttl); ?></div>
				</div>
				
				<?php if ( ! empty( $cta_btn_lbl1 ) ) : ?>
					<a href="<?php echo esc_url($cta_btn_link1); ?>" class="btn btn-border-white btn-like-icon first"><?php echo esc_html($cta_btn_lbl1); ?> <span class="bticn"><i class="fa fa-angle-right"></i></span></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php	
}}
endif;
if ( function_exists( 'belltech_lite_cta' ) ) {
$section_priority = apply_filters( 'metasoft_section_priority', 12, 'belltech_lite_cta' );
add_action( 'metasoft_sections', 'belltech_lite_cta', absint( $section_priority ) );
}
?>
<!-- Call to Action End -->