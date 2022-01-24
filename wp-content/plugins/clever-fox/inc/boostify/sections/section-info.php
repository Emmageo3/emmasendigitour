<?php  
if ( ! function_exists( 'cleverfox_boostify_lite_info' ) ) :
	function cleverfox_boostify_lite_info() {
	$hs_info 			= get_theme_mod('hs_info','1');
	$info_contents 		= get_theme_mod('info_contents',boostify_get_info_default());
	if($hs_info == '1'){
?>	
 <section id="contact-info-section" class="contact-info-section">
	<div class="container">
		<div class="row">
			<?php
				if ( ! empty( $info_contents ) ) {
				$info_contents = json_decode( $info_contents );
				foreach ( $info_contents as $slide_item ) {
					$title = ! empty( $slide_item->title ) ? apply_filters( 'boostify_translate_single_string', $slide_item->title, 'Info section' ) : '';
					$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'boostify_translate_single_string', $slide_item->subtitle, 'Info section' ) : '';
					$link = ! empty( $slide_item->link ) ? apply_filters( 'boostify_translate_single_string', $slide_item->link, 'Info section' ) : '';
					$icon = ! empty( $slide_item->icon_value) ? apply_filters( 'boostify_translate_single_string', $slide_item->icon_value,'Info section' ) : '';
			?>
				<div class="col-lg-3 col-sm-6 col-12">
					<div class="inner-content">
						<div class="widget-contact">
							<div class="contact-area">
								<?php if(!empty($icon) || !empty($image)):?>
									<div class="contact-icon">
										<div class="contact-corn">
											<?php if(!empty($icon)):?>
												<i class="fa <?php echo esc_attr($icon); ?>"></i>
											<?php endif; ?>	
										</div>
									</div>
								<?php endif; ?>
								<?php if(!empty($title) || !empty($subtitle)):?>
									<div class="contact-info">
										<?php if(!empty($title)):?>
											<h6><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h6>
										<?php endif; ?>
										
										<?php if(!empty($subtitle)):?>
											<p><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($subtitle); ?></a></p>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
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
if ( function_exists( 'cleverfox_boostify_lite_info' ) ) {
$section_priority = apply_filters( 'boostify_section_priority', 12, 'cleverfox_boostify_lite_info' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_info', absint( $section_priority ) );
}