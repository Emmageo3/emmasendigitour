<?php
if ( ! function_exists( 'conceptly_lite_slider' ) ) :
	function conceptly_lite_slider() {
	$default_content 				= conceptly_get_slides_default();
	$slider 						= get_theme_mod('slider',$default_content);
	$hide_show_slider				= get_theme_mod('hide_show_slider','1'); 

if($hide_show_slider == '1') { ?>
    <section id="slider" class="azwa-header-slider">
        <div class="header-slider owl-carousel owl-theme">
			<?php

				if ( ! empty( $slider ) ) {
				$allowed_html = array(
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'b'      => array(),
				'i'      => array(),
				);
				$slider = json_decode( $slider );
				foreach ( $slider as $slide_item ) {
					//$icon = ! empty( $service_item->icon_value ) ? apply_filters( 'conceptly_translate_single_string', $service_item->icon_value, 'service section' ) : '';
					$title = ! empty( $slide_item->title ) ? apply_filters( 'conceptly_translate_single_string', $slide_item->title, 'slider section' ) : '';
					$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'conceptly_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
					$text = ! empty( $slide_item->text ) ? apply_filters( 'conceptly_translate_single_string', $slide_item->text, 'slider section' ) : '';
					$button = ! empty( $slide_item->text2) ? apply_filters( 'conceptly_translate_single_string', $slide_item->text2,'slider section' ) : '';
					$link = ! empty( $slide_item->link ) ? apply_filters( 'conceptly_translate_single_string', $slide_item->link, 'slider section' ) : '';
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'conceptly_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
					$image2 = ! empty( $slide_item->image_url2 ) ? apply_filters( 'conceptly_translate_single_string', $slide_item->image_url2, 'slider section' ) : '';
					$open_new_tab = ! empty( $slide_item->open_new_tab ) ? apply_filters( 'conceptly_translate_single_string', $slide_item->open_new_tab, 'slider section' ) : '';
					$align = $slide_item->slide_align;
			?>
			<?php if ( ! empty( $image ) ) : ?>
				<?php if ( ! empty( $image2 ) ) : ?>
        		<div class="header-single-slider theme-slider azwa-slider slider-mobi-image" style="background-image:url('<?php echo esc_url( $image ); ?>')">
        		<?php else : ?>
        		<div class="header-single-slider theme-slider azwa-slider" style="background-image:url('<?php echo esc_url( $image ); ?>')">
        		<?php endif; ?>
			<?php else : ?>
			<div class="header-single-slider theme-slider azwa-slider">
			<?php endif; ?>
                <div class="container">
                	<?php if ( ! empty( $image2 ) ) : ?>
                	<div class="row theme-content text-<?php echo $align; ?>">
                    	<div class="col-md-7 col-8 my-auto">
                    <?php else : ?>
                    <div class="theme-content text-<?php echo $align; ?>">
                    	<?php endif; ?>
							<?php if ( ! empty( $title ) ) : ?>
	                            <h1><?php echo esc_html( $title ); ?><br><span class="typewrite" data-period="2000" data-type='[ "<?php echo esc_html( $subtitle ); ?>"]'></span><span class="wrap"></span></h1>
							<?php endif; ?>
							<?php if ( ! empty( $text ) ) : ?>
	                            <p><?php echo esc_attr( $text ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $button ) ) : ?>
	                            <a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="boxed-btn"><?php echo esc_attr( $button ); ?><i class="fa fa-arrow-right"></i></a>
							<?php endif; ?>

						<?php if ( ! empty( $image2 ) ) : ?>
						</div>
						<div class="col-md-5 col-4 m-auto">
							<div class="azwa-img">
								<img src="<?php echo esc_url( $image2 ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>"  <?php endif; ?> />
							</div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
	        </div>
          <?php } ?>
        </div>
		<?php } ?>
    </section>
	<?php } 
		}
endif;
if ( function_exists( 'conceptly_lite_slider' ) ) {
$section_priority = apply_filters( 'conceptly_section_priority', 11, 'conceptly_lite_slider' );
add_action( 'conceptly_sections', 'conceptly_lite_slider', absint( $section_priority ) );
}