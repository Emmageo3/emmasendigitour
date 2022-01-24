 <!--===// Start: Slider
    =================================--> 
<?php  
if ( ! function_exists( 'cleverfox_boostify_lite_slider' ) ) :
	function cleverfox_boostify_lite_slider() {
	$slider 			= get_theme_mod('slider',boostify_get_slider_default());	
	$slider_opacity		= get_theme_mod('slider_opacity','0.75');
?>	
<section id="main-sliders" class="main-sliders">
	<div class="row">
		<div class="col-md-12">
			<div class="header-slider">
				<?php
				if ( ! empty( $slider ) ) {
				$slider = json_decode( $slider );
				foreach ( $slider as $slide_item ) {
					$boostify_slide_title = ! empty( $slide_item->title ) ? apply_filters( 'boostify_translate_single_string', $slide_item->title, 'slider section' ) : '';
					$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'boostify_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
					$text = ! empty( $slide_item->text ) ? apply_filters( 'boostify_translate_single_string', $slide_item->text, 'slider section' ) : '';
					$button = ! empty( $slide_item->text2) ? apply_filters( 'boostify_translate_single_string', $slide_item->text2,'slider section' ) : '';
					$boostify_slide_link = ! empty( $slide_item->link ) ? apply_filters( 'boostify_translate_single_string', $slide_item->link, 'slider section' ) : '';
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'boostify_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
					$image2 = ! empty( $slide_item->image_url2 ) ? apply_filters( 'boostify_translate_single_string', $slide_item->image_url2, 'slider section' ) : '';
					$open_new_tab = ! empty( $slide_item->open_new_tab ) ? apply_filters( 'boostify_translate_single_string', $slide_item->open_new_tab, 'slider section' ) : '';
					$align = ! empty( $slide_item->slide_align ) ? apply_filters( 'boostify_translate_single_string', $slide_item->slide_align, 'slider section' ) : '';
			?>
				<div class="header-single-slider">
					<figure>
						<?php if ( ! empty( $image ) ) : ?>
							<img src="<?php echo esc_url( $image ); ?>" alt="">
						<?php endif; ?>
						<div class="content" style="background:rgb(<?php echo "24 25 27 / $slider_opacity "?>)">
							<div class="slide-table">
								<div class="slide-table-cell">
									<div class="container">
										<div class="row slide-<?php echo esc_attr($align); ?>">
											<div class="col-md-7 my-auto">
												<div class="slide-content" style="<?php if ( empty( $image ) ) : ?>margin-top: 40px;<?php endif; ?>">
													<?php if ( ! empty( $boostify_slide_title ) || ! empty( $subtitle )) : ?>
														<h1 data-animation="fadeInUp" data-delay="200ms"><b><?php echo esc_html( $boostify_slide_title ); ?></b> <br> <?php echo esc_html( $subtitle ); ?></h1>
													<?php endif; ?>
													
													<?php if ( ! empty( $text ) ) : ?>
														<p data-animation="fadeInUp" data-delay="500ms"><?php echo esc_html( $text ); ?></p>
													<?php endif; ?>
													
													<?php if ( ! empty( $button ) ) : ?>
														<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url( $boostify_slide_link ); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="boxed-btn"><?php echo esc_html( $button ); ?></a>
													<?php endif; ?>
													
												</div>
											</div>
											<?php if ( ! empty( $image2 ) ) : ?>
												<div class="col-md-5 my-auto mx-auto">
													<div class="boostify-img" data-animation="flipInY" data-delay="1000ms">
														<img src="<?php echo esc_url( $image2 ); ?>">
													</div>
												</div>
											<?php endif; ?>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</figure>
				</div>
			<?php } } ?>
			</div>
		</div>
	</div>
	<div class="element-circle">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle2.png" alt="image" class="img-out img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle1.png" alt="image" class="img-in2 img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle3.png" alt="image" class="img-in3 img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/animation-boll2.png" alt="image" class="img-in4 img-fluid">
	</div>
	<div class="element-circle2">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle2.png" alt="image" class="img-out img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle1.png" alt="image" class="img-in2 img-fluid">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/bg-circle3.png" alt="image" class="img-in3 img-fluid">
	</div>
	<div class="animation-roated">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/roted-animated.png">
	</div>
	<div class="animation-dotted">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/animation-dotted.png">
	</div>
	<div class="animation-boll">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/animation-boll.png">
	</div>
	<div class="animation-dot-div">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/dots-div.png" class="dots-div1">  
	</div>
	<div class="animation-dotted-div">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/dots-div2.png" class="dots-div2">
	</div>
	<div class="animation-cricle">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element/cricle-boll.png">
	</div>
</section>    

<?php	
	}
endif;
if ( function_exists( 'cleverfox_boostify_lite_slider' ) ) {
$section_priority = apply_filters( 'boostify_section_priority', 11, 'cleverfox_boostify_lite_slider' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_slider', absint( $section_priority ) );
}