<?php  
	if ( ! function_exists( 'cleverfox_aravalli_lite_slider' ) ) :
	function cleverfox_aravalli_lite_slider() {
	$slider 						= get_theme_mod('slider',aravalli_get_slider_default());
?>		
<section id="slider-section" class="slider-wrapper">
	<div class="main-slider owl-carousel owl-theme">
		<?php
			if ( ! empty( $slider ) ) {
			$slider = json_decode( $slider );
			foreach ( $slider as $slide_item ) {
				$aravalli_slide_title = ! empty( $slide_item->title ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->title, 'slider section' ) : '';
				$text = ! empty( $slide_item->text ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->text, 'slider section' ) : '';
				$button = ! empty( $slide_item->text2) ? apply_filters( 'aravalli_translate_single_string', $slide_item->text2,'slider section' ) : '';
				$link = ! empty( $slide_item->link ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->link, 'slider section' ) : '';
				$image = ! empty( $slide_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
				$image2 = ! empty( $slide_item->image_url2 ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->image_url2, 'slider section' ) : '';
				$align = ! empty( $slide_item->slide_align ) ? apply_filters( 'aravalli_translate_single_string', $slide_item->slide_align, 'slider section' ) : '';
		?>
		<div class="item">
			<?php if ( ! empty( $image ) ) : ?>
					<img src="<?php echo esc_url( $image ); ?>" data-img-url="<?php echo esc_url( $image ); ?>"  alt="">
			   <?php endif; ?>
			<div class="theme-slider">
				<div class="theme-table">
					<div class="theme-table-cell">
						<div class="container">                                
							<div class="theme-content text-<?php echo esc_attr($align); ?>">
								               
								<?php if ( ! empty( $aravalli_slide_title )) : ?>
									<h1 data-animation="fadeInLeft" data-delay="200ms"><?php echo esc_html( $aravalli_slide_title ); ?></h1>
								<?php endif; ?>	
								
								<?php if ( ! empty( $text ) ) : ?>
									<p data-animation="fadeInLeft" data-delay="500ms"><?php echo esc_html( $text ); ?></p>
								<?php endif; ?>
												
								<?php if ( ! empty( $button ) ) : ?>				
									<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url( $link ); ?>" class="btn-shape btn-line-primary"><?php echo esc_html( $button ); ?></a>
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
if ( function_exists( 'cleverfox_aravalli_lite_slider' ) ) {
$section_priority = apply_filters( 'aravalli_section_priority', 11, 'cleverfox_aravalli_lite_slider' );
add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_slider', absint( $section_priority ) );
}