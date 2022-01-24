<?php 
if ( ! function_exists( 'aravalli_above_footer' ) ) :
	function aravalli_above_footer() {
	$hs_above_footer		= get_theme_mod('hs_above_footer','1'); 
	$footer_above_content	= get_theme_mod('footer_above_content',aravalli_get_footer_above_default());
	if ($hs_above_footer == '1') {
?>
	<div class="row">
		<div class="col-12">
			<div class="social-box wow fadeInUp">
				<?php
					if ( ! empty( $footer_above_content ) ) {
					$footer_above_content = json_decode( $footer_above_content );
					foreach ( $footer_above_content as $footer_item ) {
						$title = ! empty( $footer_item->title ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->title, 'footer section' ) : '';
						$subtitle = ! empty( $footer_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->subtitle, 'footer section' ) : '';
						$icon = ! empty( $footer_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->icon_value, 'footer section' ) : '';
						$link = ! empty( $footer_item->link ) ? apply_filters( 'aravalli_translate_single_string', $footer_item->link, 'footer section' ) : '';
				?>
					<div class="info-item">
						<div class="info-icon">
							<a href="<?php echo esc_url( $link ); ?>">
								<?php if ( ! empty( $icon )){ ?>
									<i class="fa <?php echo esc_attr( $icon ); ?>"></i>
								<?php } ?>	
							</a>	
						</div>
						<div class="info-content">
							<?php if ( ! empty( $title )){ ?>
								<h6 class="info-title"><?php echo esc_html( $title ); ?></h6>
							<?php } ?>	
							<?php if ( ! empty( $subtitle )){ ?>
							<div class="info-sub-title"><?php echo esc_html( $subtitle ); ?></div>
							<?php } ?>	
						</div>
					</div>
				<?php }}?>
			</div>
		</div>
	</div>
<?php } 
} endif;
add_action('aravalli_above_footer', 'aravalli_above_footer');