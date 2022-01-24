 <!--===// Start: Slider
    =================================--> 
<?php  
if ( ! function_exists( 'avril_lite_slider' ) ) :
	function avril_lite_slider() {
	$slider 						= get_theme_mod('slider',avril_get_slider_default());
?>	
    <section id="slider-section" class="slider-wrapper">
        <div class="main-slider owl-carousel owl-theme">
			<?php
				if ( ! empty( $slider ) ) {
				$slider = json_decode( $slider );
				foreach ( $slider as $slide_item ) {
					$avril_slide_title = ! empty( $slide_item->title ) ? apply_filters( 'avril_translate_single_string', $slide_item->title, 'slider section' ) : '';
					$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'avril_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
					$text = ! empty( $slide_item->text ) ? apply_filters( 'avril_translate_single_string', $slide_item->text, 'slider section' ) : '';
					$button = ! empty( $slide_item->text2) ? apply_filters( 'avril_translate_single_string', $slide_item->text2,'slider section' ) : '';
					$link = ! empty( $slide_item->link ) ? apply_filters( 'avril_translate_single_string', $slide_item->link, 'slider section' ) : '';
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'avril_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
					$open_new_tab = ! empty( $slide_item->open_new_tab ) ? apply_filters( 'avril_translate_single_string', $slide_item->open_new_tab, 'slider section' ) : '';
					//$align = $slide_item->slide_align;
					$align = ! empty( $slide_item->slide_align ) ? apply_filters( 'avril_translate_single_string', $slide_item->slide_align, 'slider section' ) : '';
			?>
        	<?php if ( ! empty( $image ) ) : ?>
        	<div class="item" style="background-image:url('<?php echo esc_url( $image ); ?>')">
			<?php else : ?>
			<div class="item">
			<?php endif; ?>
                <div class="theme-slider">
                    <div class="theme-table">
                        <div class="theme-table-cell">
                            <div class="av-container">                                
                                <div class="theme-content text-<?php echo esc_attr($align); ?>">
									<?php if ( ! empty( $avril_slide_title ) ) : ?>
										<h3 data-animation="fadeInUp" data-delay="150ms"><?php echo esc_html( $avril_slide_title ); ?></h3>
									<?php endif; ?>
									
									<?php if ( ! empty( $subtitle ) ) : ?>
										<h1 data-animation="fadeInLeft" data-delay="200ms"><span class="primary-color"><?php echo esc_html( $subtitle ); ?></span></h1>
                                    <?php endif; ?>
									
									<?php if ( ! empty( $text ) ) : ?>
										<p data-animation="fadeInLeft" data-delay="500ms"><?php echo esc_html( $text ); ?></p>
									<?php endif; ?>	
									<?php if ( ! empty( $button ) ) : ?>
										<a data-animation="fadeInUp" data-delay="800ms" href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="av-btn av-btn-primary"><?php echo esc_html( $button ); ?></a>
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
if ( function_exists( 'avril_lite_slider' ) ) {
$section_priority = apply_filters( 'avril_section_priority', 11, 'avril_lite_slider' );
add_action( 'avril_sections', 'avril_lite_slider', absint( $section_priority ) );
}
?>
    <!-- End: Slider
    =================================-->