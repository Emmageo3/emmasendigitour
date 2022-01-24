<?php  
if ( ! function_exists( 'cleverfox_boostify_lite_features' ) ) :
	function cleverfox_boostify_lite_features() {
	$hs_features 			= get_theme_mod('hs_features','1');
	$feature_title			= get_theme_mod('feature_title','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Features</b>                                   <b>Features</b><b>Features</b></span></span>');
	$feature_description	= get_theme_mod('feature_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$features_contents 		= get_theme_mod('features_contents',boostify_get_features_default());
	if($hs_features=='1'){
?>
 <section id="our-feature" class="our-feature home-feature section-padding-top">
	<div class="container">
		<?php if ( ! empty( $feature_title )  || ! empty( $porfolio_description )) : ?>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">                    
					<div class="section-header text-center">
						<?php if ( ! empty( $feature_title ) ) : ?>
							<h2><?php echo wp_kses_post($feature_title); ?></h2>
						<?php endif; ?>	
						
						<?php if ( ! empty( $feature_description ) ) : ?>		
							<p><?php echo wp_kses_post($feature_description); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row feature-contents">
			<?php
				if ( ! empty( $features_contents ) ) {
				$features_contents = json_decode( $features_contents );
				foreach ( $features_contents as $features_item ) {
					$title = ! empty( $features_item->title ) ? apply_filters( 'boostify_translate_single_string', $features_item->title, 'Features section' ) : '';
					$text = ! empty( $features_item->text ) ? apply_filters( 'boostify_translate_single_string', $features_item->text, 'Features section' ) : '';
					$link = ! empty( $features_item->link ) ? apply_filters( 'boostify_translate_single_string', $features_item->link, 'Features section' ) : '';
					$icon = ! empty( $features_item->icon_value) ? apply_filters( 'boostify_translate_single_string', $features_item->icon_value,'Features section' ) : '';
					$image = ! empty( $features_item->image_url ) ? apply_filters( 'boostify_translate_single_string', $features_item->image_url, 'Features section' ) : '';
			?>
				<div class="col-xl col-lg-3 col-md-4 col-sm-6 col-12 mb-xl-4 mb-4">
					<div class="features-box">
						<figure>
							<?php if(!empty($image)):?>
								<img src="<?php echo esc_url($image); ?>" alt="">							
							<?php endif; ?>	
							
							<figcaption>
								<div class="inner-text">
									<?php if(!empty($icon)):?>
										<i class="fa <?php echo esc_attr($icon); ?>"></i>
									<?php endif; ?>	
									
									<?php if(!empty($title)):?>
										<h4><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h4>
									<?php endif; ?>
									
									<?php if(!empty($text)):?>
										<p><?php echo esc_html($text); ?></p>
									<?php endif; ?>
								</div>
							</figcaption>
						</figure>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php	
	}}
endif;
if ( function_exists( 'cleverfox_boostify_lite_features' ) ) {
$section_priority = apply_filters( 'boostify_section_priority', 13, 'cleverfox_boostify_lite_features' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_features', absint( $section_priority ) );
}