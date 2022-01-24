 <!--===// Start: Slider
    =================================--> 
<?php  
if ( ! function_exists( 'metasoft_lite_slider' ) ) :
	function metasoft_lite_slider() {
	$slider  = get_theme_mod('slider',metasoft_get_slider_default());	
?>		
 <!-- Slider Start -->
<section id="slider-wrapper" class="slider-wrapper">
	<div class="main-slider owl-carousel owl-theme">
		<?php
			if ( ! empty( $slider ) ) {
			$slider = json_decode( $slider );
			foreach ( $slider as $slide_item ) {
				$metasoft_slide_title = ! empty( $slide_item->title ) ? apply_filters( 'metasoft_translate_single_string', $slide_item->title, 'slider section' ) : '';
				$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'metasoft_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
				$text = ! empty( $slide_item->text ) ? apply_filters( 'metasoft_translate_single_string', $slide_item->text, 'slider section' ) : '';
				$button = ! empty( $slide_item->text2) ? apply_filters( 'metasoft_translate_single_string', $slide_item->text2,'slider section' ) : '';
				$metasoft_slide_link = ! empty( $slide_item->link ) ? apply_filters( 'metasoft_translate_single_string', $slide_item->link, 'slider section' ) : '';
				$image = ! empty( $slide_item->image_url ) ? apply_filters( 'metasoft_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
				$align = ! empty( $slide_item->slide_align ) ? apply_filters( 'metasoft_translate_single_string', $slide_item->slide_align, 'slider section' ) : '';
		?>
			<div class="item">
				<?php if ( ! empty( $image ) ) : ?>
					<img src="<?php echo esc_url( $image ); ?>" alt="">
			   <?php endif; ?>
				<div class="theme-slider">
					<div class="theme-table">
						<div class="theme-table-cell">
							<div class="container">
								<div class="theme-content text-<?php echo esc_attr($align); ?>">
									<div class="theme-slider-card">
									
										<?php if ( ! empty( $metasoft_slide_title ) || ! empty( $subtitle )) : ?>
											<h1><?php echo esc_html( $metasoft_slide_title ); ?> <span class="text-primary"><?php echo esc_html( $subtitle ); ?></span></h1>
										<?php endif; ?>	
										
										<?php if ( ! empty( $text ) ) : ?>
											<p><?php echo esc_html( $text ); ?></p>
										<?php endif; ?>
									
									</div>
									
									<?php if ( ! empty( $button ) ) : ?>
										<a href="<?php echo esc_url( $metasoft_slide_link ); ?>" class="btn btn-secondary btn-like-icon"><?php echo esc_html( $button ); ?> <span class="bticn"><i class="fa fa-angle-right"></i></span></a>
									<?php endif; ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } } ?>
	</div>
</section>
<?php	
	}
endif;
if ( function_exists( 'metasoft_lite_slider' ) ) {
$section_priority = apply_filters( 'metasoft_section_priority', 11, 'metasoft_lite_slider' );
add_action( 'metasoft_sections', 'metasoft_lite_slider', absint( $section_priority ) );
}
?>
<!-- Slider End -->
	