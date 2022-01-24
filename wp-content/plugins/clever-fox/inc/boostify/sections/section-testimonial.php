<?php 
if ( ! function_exists( 'cleverfox_boostify_lite_testimonial' ) ) :
	function cleverfox_boostify_lite_testimonial() {
	$hs_testimonial				= get_theme_mod('hs_testimonial','1');	
	$testimonial_title			= get_theme_mod('testimonial_title','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Testimonial</b><b>Testimonial</b><b>Testimonial</b></span></span>');
	$testimonial_description	= get_theme_mod('testimonial_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$testimonials_content		= get_theme_mod('testimonials_content',boostify_get_testimonial_default());
	$testimonial_bg_setting		= get_theme_mod('testimonial_bg_setting',esc_url(CLEVERFOX_PLUGIN_URL .'inc/boostify/images/patternshape-bg.jpg'));	
	$testimonial_bg_position	= get_theme_mod('testimonial_bg_position','scroll');	
	if($hs_testimonial == '1'){
?>
<section id="testimonial" class="testimonial section-padding">
	<div class="testimonial-overlay" style="background-image:url(<?php echo esc_url($testimonial_bg_setting); ?>);background-attachment: <?php echo esc_attr($testimonial_bg_position); ?>;"></div>
	<div class="particles-js" id="prtcl3"></div>
	<div class="container"> 
		<?php if ( ! empty( $testimonial_title )  || ! empty( $testimonial_description )) : ?>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">                    
					<div class="section-header text-center">
						<?php if ( ! empty( $testimonial_title ) ) : ?>
							<h2><?php echo wp_kses_post($testimonial_title); ?></h2>
						<?php endif; ?>	
						
						<?php if ( ! empty( $testimonial_description ) ) : ?>		
							<p><?php echo wp_kses_post($testimonial_description); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-12">
				<div class="testimonial-carousel">
					<?php
						$testimonials_content = json_decode($testimonials_content);
						if( $testimonials_content!='' )
						{
						foreach($testimonials_content as $testimonial_item){
						$image    = ! empty( $testimonial_item->image_url ) ? apply_filters( 'boostify_translate_single_string', $testimonial_item->image_url, 'Testimonial section' ) : '';
						$title    = ! empty( $testimonial_item->title ) ? apply_filters( 'boostify_translate_single_string', $testimonial_item->title, 'Testimonial section' ) : '';
						$subtitle = ! empty( $testimonial_item->subtitle ) ? apply_filters( 'boostify_translate_single_string', $testimonial_item->subtitle, 'Testimonial section' ) : '';
						$text = ! empty( $testimonial_item->text ) ? apply_filters( 'boostify_translate_single_string', $testimonial_item->text, 'Testimonial section' ) : '';
					?>
					<div class="single-testimonial">
					
						<?php if ( ! empty( $image ) ): ?>
							<div class="testi-img">
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
							</div>
						<?php endif; ?>
						
						<div class="testi-info">
							<?php if ( ! empty( $title ) ) : ?>
								<h4 class="title"><?php echo esc_html( $title ); ?></h4>
							<?php endif; ?>
							
							<?php if ( ! empty( $subtitle ) ) : ?>
								<span class="designation"><?php echo esc_html( $subtitle ); ?></span>
							<?php endif; ?>
							
							<?php if ( ! empty( $text ) ) : ?>
								<p><?php echo esc_html( $text ); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	
	}}
endif;
if ( function_exists( 'cleverfox_boostify_lite_testimonial' ) ) {
$section_priority = apply_filters( 'boostify_section_priority', 15, 'cleverfox_boostify_lite_testimonial' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_testimonial', absint( $section_priority ) );
}