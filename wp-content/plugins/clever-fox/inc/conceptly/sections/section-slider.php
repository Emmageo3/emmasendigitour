<?php
if ( ! function_exists( 'conceptly_lite_slider' ) ) :
	function conceptly_lite_slider() {
	$default_content 				= conceptly_get_slides_default();
	$slider 						= get_theme_mod('slider',$default_content);
	$hide_show_slider				= get_theme_mod('hide_show_slider','1'); 

if($hide_show_slider == '1') { ?>
    <section id="slider">
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
					$open_new_tab = ! empty( $slide_item->open_new_tab ) ? apply_filters( 'conceptly_translate_single_string', $slide_item->open_new_tab, 'slider section' ) : '';
					$align = $slide_item->slide_align;
			?>
            <div class="item">
				<?php if ( ! empty( $image ) ) : ?>
					<img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>"  <?php endif; ?> />
				<?php endif; ?>
                <div class="header-single-slider theme-slider">
                	<div class="theme-table">
						<div class="theme-table-cell">
                            <div class="container">
			                    <div class="theme-content text-<?php echo esc_attr($align); ?>">
									<?php if ( ! empty( $title ) ) : ?>
			                            <h1><?php echo esc_attr( $title ); ?><br><span><?php echo esc_attr( $subtitle ); ?></span></h1>
									<?php endif; ?>
									<?php if ( ! empty( $text ) ) : ?>
			                            <p><?php echo esc_attr( $text ); ?></p>
									<?php endif; ?>
									<?php if ( ! empty( $button ) ) : ?>
			                            <a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="boxed-btn"><?php echo esc_attr( $button ); ?><i class="fa fa-arrow-right"></i></a>
									<?php endif; ?>
			                    </div>
			                </div>
			            </div>
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