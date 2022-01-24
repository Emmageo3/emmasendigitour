<?php 
if ( ! function_exists( 'metasoft_lite_info' ) ) :
	function metasoft_lite_info() {
	$info_hs		= get_theme_mod('info_hs','1');	
	$info_contents	= get_theme_mod('info_contents',metasoft_get_info_default());
if(!empty($info_hs)){
?> 
<!-- Info Section -->
<section id="info-section" class="info-section">
	<div class="container">
		<div class="row g-lg-4 g-5 wow fadeInUp">
			<?php
			if ( ! empty( $info_contents ) ) {
			$info_contents = json_decode( $info_contents );
			foreach ( $info_contents as $info_item ) {
				$title = ! empty( $info_item->title ) ? apply_filters( 'metasoft_translate_single_string', $info_item->title, 'slider section' ) : '';
				$text = ! empty( $info_item->text ) ? apply_filters( 'metasoft_translate_single_string', $info_item->text, 'slider section' ) : '';
				$button = ! empty( $info_item->text2) ? apply_filters( 'metasoft_translate_single_string', $info_item->text2,'slider section' ) : '';
				$link = ! empty( $info_item->link ) ? apply_filters( 'metasoft_translate_single_string', $info_item->link, 'slider section' ) : '';
				$icon = ! empty( $info_item->icon_value ) ? apply_filters( 'metasoft_translate_single_string', $info_item->icon_value, 'slider section' ) : '';
		?>
			<div class="col-lg-3 col-sm-6">
				<div class="info-box">
					<div class="info-box-icon">
						<?php if ( ! empty( $icon ) ) {?>
							<i class="fa <?php echo esc_attr( $icon ); ?>"></i>
						<?php } ?>
					</div>
					
					<?php if ( ! empty( $title ) ) {?>
						<h5><?php echo esc_html( $title ); ?></h5>
					<?php } ?>	
					
					<?php if ( ! empty( $text ) ) {?>
						<p><?php echo esc_html( $text ); ?></p>
					<?php } ?>
					
					<?php if ( ! empty( $button ) ) {?>
						<div class="theme-link"><a href="<?php echo esc_url( $link ); ?>" class="read-link"><?php echo esc_html( $button ); ?></a></div>
					<?php } ?>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php	
}}
endif;
if ( function_exists( 'metasoft_lite_info' ) ) {
$section_priority = apply_filters( 'metasoft_section_priority', 12, 'metasoft_lite_info' );
add_action( 'metasoft_sections', 'metasoft_lite_info', absint( $section_priority ) );
}
?>
<!-- Info Section -->