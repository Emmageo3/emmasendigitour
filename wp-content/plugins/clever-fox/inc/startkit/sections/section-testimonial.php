<?php
/**
 * Get default values for testimonial section.
 *
 * @since 1.1.31
 * @access public
 */
  if ( ! function_exists( 'startkit_testimonial_plu' ) ) :
	function startkit_testimonial_plu() {
	$hide_show_testimonial	= get_theme_mod('hide_show_testimonial','1'); 
	$testimonial_title		= get_theme_mod('testimonial_title','Testimonial');
	$testimonial_subttl		= get_theme_mod('testimonial_subttl','<span>Testimonial</span> <h6>Lorem is dummy text.</h6>');
	$testimonial_description= get_theme_mod('testimonial_description','Publishing packages and web page editors now use Lorem Ipsum as their default model text');
	$testimonial_contents	= get_theme_mod('testimonial_contents',startkit_get_testimonial_default());
?>
<?php if($hide_show_testimonial) {?>
<section id="testimonial" class="section-padding">
	<div class="container">
		<?php if( ($testimonial_title) || ($testimonial_subttl)!='' || ($testimonial_description)!='' ) { ?>
			<div class="row">
				<div class="col-md-6 offset-md-3 text-center">
					<div class="section-header">
						<?php if ( ! empty( $testimonial_subttl ) ) : ?>
							<div class="subtitle"><?php echo wp_kses_post( $testimonial_subttl ); ?></div>
						<?php endif; ?>
						<?php if ( ! empty( $testimonial_title ) ) { ?>
							<h2><?php echo esc_html( $testimonial_title ); ?></h2>
						<?php } ?>
						<hr class="liner">
						<?php if ( ! empty( $testimonial_description ) ) { ?>
							<p class="wow fadeInUp" data-wow-delay="0.1s"><?php echo esc_html( $testimonial_description ); ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>	
		<div class="row tst_contents testimonial-carousel text-center">
			<?php
		
			if ( ! empty( $testimonial_contents ) ) {
			$allowed_html = array(
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'b'      => array(),
			'i'      => array(),
			);
			$testimonial_contents = json_decode( $testimonial_contents );
			foreach ( $testimonial_contents as $testimonial_item ) {
				
				$title = ! empty( $testimonial_item->title ) ? apply_filters( 'startkit_translate_single_string', $testimonial_item->title, 'service section' ) : '';
				$subtitle = ! empty( $testimonial_item->subtitle ) ? apply_filters( 'startkit_translate_single_string', $testimonial_item->subtitle, 'service section' ) : '';
				$text = ! empty( $testimonial_item->text ) ? apply_filters( 'startkit_translate_single_string', $testimonial_item->text, 'service section' ) : '';
				$link = ! empty( $testimonial_item->link ) ? apply_filters( 'startkit_translate_single_string', $testimonial_item->link, 'service section' ) : '';
				$image = ! empty( $testimonial_item->image_url ) ? apply_filters( 'startkit_translate_single_string', $testimonial_item->image_url, 'service section' ) : '';
			?>
			<div class="col-md-4 mb-md-4 mb-5">
				<div class="single-testimonial">
					<?php if ( ! empty( $image ) ) : ?>
						<div class="image-qouts">
							<div class="img-rounded">
								<img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
							</div>
							<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $text ) ) : ?>
						<p><?php echo esc_html( $text ); ?></p>
					<?php endif; ?>
					<div class="testimonial-text">
						<?php if ( ! empty( $title ) ) : ?>
							<h6><?php echo esc_html( $title ); ?>,</h6>
						<?php endif; ?>
						<?php if ( ! empty( $subtitle ) ) : ?>
							<span class="title"><?php echo esc_html( $subtitle ); ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php 
	}}
	endif;
if ( function_exists( 'startkit_testimonial_plu' ) ) {
$section_priority = apply_filters( 'startkit_section_priority', 13, 'startkit_testimonial_plu' );
add_action( 'startkit_sections', 'startkit_testimonial_plu', absint( $section_priority ) );
}	