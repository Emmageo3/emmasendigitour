<?php
/**
 * Slider section for the homepage.
 */
if ( ! function_exists( 'hantus_lite_slider' ) ) :

	function hantus_lite_slider() {
		function hantus_get_slider_default() {
			return apply_filters(
				'hantus_get_slider_default', json_encode(
				array(
					array("image_url" => CLEVERFOX_PLUGIN_URL.'inc/hantus/images/slider/slider01.jpg' ,"link" => "#", "title" => "Welcome To Hantus Spa","subtitle" => "Beauty & Spa Wellness", "text" => "The Spa at Sun Valley is a serene oasis amid all the exciting  activities our iconic valley has delivered for decades.", "text2" => "Make an Appoinment","slide_align" => "left","id" => "customizer_repeater_000101" ), 
					
					array("image_url" => CLEVERFOX_PLUGIN_URL.'inc/hantus/images/slider/slider02.jpg' ,"link" => "#", "title" => "Welcome To Hantus Spa","subtitle" => "Beauty & Spa Wellness", "text" => "The Spa at Sun Valley is a serene oasis amid all the exciting  activities our iconic valley has delivered for decades.", "text2" => "Make an Appoinment","slide_align" => "center","id" => "customizer_repeater_000102" ), 
					
					array("image_url" => CLEVERFOX_PLUGIN_URL.'inc/hantus/images/slider/slider03.jpg' ,"link" => "#", "title" => "Welcome To Hantus Spa","subtitle" => "Beauty & Spa Wellness", "text" => "The Spa at Sun Valley is a serene oasis amid all the exciting  activities our iconic valley has delivered for decades.", "text2" => "Make an Appoinment","slide_align" => "right","id" => "customizer_repeater_000103" ), 
				))
			);
		}
		$default_content 	= hantus_get_slider_default();
		$slider 			= get_theme_mod('slider',$default_content);
		$hide_show_slider	= get_theme_mod('hide_show_slider','1'); 
		
		if($hide_show_slider == '1') {
		?>
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
					$title = ! empty( $slide_item->title ) ? apply_filters( 'hantus_translate_single_string', $slide_item->title, 'slider section' ) : '';
					$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'hantus_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
					$text = ! empty( $slide_item->text ) ? apply_filters( 'hantus_translate_single_string', $slide_item->text, 'slider section' ) : '';
					$button = ! empty( $slide_item->text2) ? apply_filters( 'hantus_translate_single_string', $slide_item->text2,'Learn More' ) : '';
					$link = ! empty( $slide_item->link ) ? apply_filters( 'hantus_translate_single_string', $slide_item->link, 'slider section' ) : '';
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'hantus_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
					$align = ! empty( $slide_item->slide_align ) ? apply_filters( 'hantus_translate_single_string', $slide_item->slide_align, 'slider section' ) : '';
				?>
				<div class="item">
					<?php if ( ! empty( $image ) ) : ?>
						<img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
					<?php endif; ?>
					<div class="header-single-slider theme-slider">
						<div class="theme-table">
							<div class="theme-table-cell">
	                            <div class="container">
									<div class="theme-content text-<?php echo esc_attr($align); ?>">
										<?php if ( ! empty( $title ) ) : ?>
											<h3><?php echo esc_attr( $title ); ?></h3>
										<?php endif; ?>
										
										<?php if ( ! empty( $subtitle ) ) : ?>
											<h1><?php echo esc_attr( $subtitle ); ?></h1>
										<?php endif; ?>
										
										<?php if ( ! empty( $text ) ) : ?>
											<p><?php echo esc_attr( $text ); ?></p>
										<?php endif; ?>
										
										<?php if ( ! empty( $button ) ) : ?>
											<a href="<?php echo esc_url( $link ); ?>" class="boxed-btn"><?php echo esc_attr( $button ); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php }} ?>
			</div>
		</section>
		<?php
		}
	}

endif;

if ( function_exists( 'hantus_lite_slider' ) ) {
$section_priority = apply_filters( 'hantus_section_priority', 11, 'hantus_lite_slider' );
add_action( 'hantus_sections', 'hantus_lite_slider', absint( $section_priority ) );

}