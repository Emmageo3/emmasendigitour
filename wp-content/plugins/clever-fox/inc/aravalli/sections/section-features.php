<?php  
if ( ! function_exists( 'cleverfox_aravalli_lite_features' ) ) :
	function cleverfox_aravalli_lite_features() {
	$features_hs 			= get_theme_mod('features_hs','1');		
	$features_title 		= get_theme_mod('features_title','Explore');
	$features_subtitle		= get_theme_mod('features_subtitle','theme Features'); 
	$features_description	= get_theme_mod('features_description',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.");
	$features_contents			= get_theme_mod('features_contents',aravalli_get_features_default());
	if($features_hs =='1'){
?>
<section id="features" class="features sec-default features-home">
	<div class="container">
		<?php if(!empty($features_title) || !empty($features_subtitle) || !empty($features_description)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($features_title)): ?>
							<h6><?php echo wp_kses_post($features_title); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($features_subtitle)): ?>
							<h3><?php echo wp_kses_post($features_subtitle); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($features_description)): ?>				
							<p> <?php echo esc_html($features_description); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row featuress-contents wow fadeInUp">
			<?php
				if ( ! empty( $features_contents ) ) {
				$features_contents = json_decode( $features_contents );
				foreach ( $features_contents as $features_item ) {
					$title = ! empty( $features_item->title ) ? apply_filters( 'aravalli_translate_single_string', $features_item->title, 'Features section' ) : '';
					$text = ! empty( $features_item->text ) ? apply_filters( 'aravalli_translate_single_string', $features_item->text, 'Features section' ) : '';
					$button = ! empty( $features_item->text2) ? apply_filters( 'aravalli_translate_single_string', $features_item->text2,'Features section' ) : '';
					$link = ! empty( $features_item->link ) ? apply_filters( 'aravalli_translate_single_string', $features_item->link, 'Features section' ) : '';
					$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
					$image = ! empty( $features_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $features_item->image_url, 'Features section' ) : '';
			?>
				<div class="col-lg-3 col-sm-6 col-12">
					<div class="feat-grid">
						<div class="inner-grid">
							<?php if ( ! empty( $image ) ) : ?>
								<img src="<?php echo esc_url( $image ); ?>" alt="">
						   <?php endif; ?>
							<div class="grid-text">
								<?php if ( ! empty( $icon ) ) : ?>
									<i class="fa <?php echo esc_attr( $icon ); ?>"></i>
								  <?php endif; ?>
								   
								<?php if ( ! empty( $title )) : ?>
									<h2><?php echo esc_html( $title ); ?></h2>
								<?php endif; ?>	
								
								<?php if ( ! empty( $text ) ) : ?>
									<p><?php echo esc_html( $text ); ?></p>
								<?php endif; ?>
								<?php if ( ! empty( $button ) ) : ?>				
									<a href="<?php echo esc_url( $link ); ?>" class="btn-line"><?php echo esc_html( $button ); ?></a>
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
if ( function_exists( 'cleverfox_aravalli_lite_features' ) ) {
$section_priority = apply_filters( 'aravalli_section_priority', 15, 'cleverfox_aravalli_lite_features' );
add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_features', absint( $section_priority ) );
}