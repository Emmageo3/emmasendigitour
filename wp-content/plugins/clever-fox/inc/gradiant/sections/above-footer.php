<?php
	if ( ! function_exists( 'gradiant_above_footer' ) ) :
	function gradiant_above_footer() {
		$hs_above_footer		= get_theme_mod('hs_above_footer','1'); 
			$footer_above_content	= get_theme_mod('footer_above_content',gradiant_get_footer_above_default());
			if ($hs_above_footer == '1') {
		?>
			<div class="footer-above">
				<div class="av-container">
					<div class="av-columns-area">
						<?php
							if ( ! empty( $footer_above_content ) ) {
							$footer_above_content = json_decode( $footer_above_content );
							foreach ( $footer_above_content as $footer_item ) {
								$title = ! empty( $footer_item->title ) ? apply_filters( 'gradiant_translate_single_string', $footer_item->title, 'footer section' ) : '';
								$text = ! empty( $footer_item->text ) ? apply_filters( 'gradiant_translate_single_string', $footer_item->text, 'footer section' ) : '';
								$choice = ! empty( $footer_item->choice ) ? apply_filters( 'gradiant_translate_single_string', $footer_item->choice, 'footer section' ) : '';
								$icon = ! empty( $footer_item->icon_value ) ? apply_filters( 'gradiant_translate_single_string', $footer_item->icon_value, 'footer section' ) : '';
								$link = ! empty( $footer_item->link ) ? apply_filters( 'gradiant_translate_single_string', $footer_item->link, 'footer section' ) : '';
						?>
							<div class="av-column-4 av-sm-column-6">
								<aside class="widget widget-contact">
									<div class="contact-area">
										<?php if(!empty($icon)): ?>
											<div class="contact-icon"><i class="fa <?php echo esc_attr($icon); ?>"></i></div>
										<?php endif; ?>
										
										<?php if(!empty($title)  || !empty($text)): ?>
											<a href="<?php echo esc_url($link); ?>" class="contact-info">
												<span class="text"><?php echo esc_html($title); ?></span>
												<span class="title"><?php echo esc_html($text); ?></span>
											</a>
										<?php endif; ?>	
									</div>
								</aside>
							</div>
						<?php }}?>
					</div>
				</div>
			</div>
		<?php } 
} endif;
add_action('gradiant_above_footer', 'gradiant_above_footer');
?>
