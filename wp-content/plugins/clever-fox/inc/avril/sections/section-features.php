<?php 
if ( ! function_exists( 'avril_lite_features' ) ) :
	function avril_lite_features() {
	$feature_title				= get_theme_mod('feature_title','Technology from tomorrow');
	$feature_subtitle			= get_theme_mod('feature_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Features</b>                                   <b>Features</b><b>Features</b></span></span>');
	$feature_description		= get_theme_mod('feature_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$features_contents			= get_theme_mod('features_contents',avril_get_features_default());
	$hs_feature					= get_theme_mod('hs_feature','1');
if($hs_feature == '1') {	
?>
 <section id="features-section" class="features-section bg-primary av-py-default">
        <div class="av-container">
			<?php if(! empty( $feature_title ) || ! empty( $feature_subtitle ) || ! empty( $feature_description )) { ?> 
				<div class="av-columns-area">
					<div class="av-column-12">
						<div class="heading-default heading-white wow fadeInUp">
						   <?php if ( ! empty( $feature_title ) ) : ?>
								<span class='ttl'><?php echo wp_kses_post($feature_title); ?></span>
							<?php endif; ?>
						   <?php if ( ! empty( $feature_subtitle ) ) : ?>		
								<h3><?php echo wp_kses_post($feature_subtitle); ?></h3>    
							<?php endif; ?>	                   
							<?php if ( ! empty( $feature_description ) ) : ?>		
								<p><?php echo wp_kses_post($feature_description); ?></p>    
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } ?>	
            <div class="av-columns-area features-area wow fadeInUp">
				<?php
					if ( ! empty( $features_contents ) ) {
					$features_contents = json_decode( $features_contents );
					foreach ( $features_contents as $feature_item ) {
						$avril_features_title = ! empty( $feature_item->title ) ? apply_filters( 'avril_translate_single_string', $feature_item->title, 'feature section' ) : '';
						$text = ! empty( $feature_item->text ) ? apply_filters( 'avril_translate_single_string', $feature_item->text, 'feature section' ) : '';
						$icon = ! empty( $feature_item->icon_value) ? apply_filters( 'avril_translate_single_string', $feature_item->icon_value,'feature section' ) : '';
				?>
					<div class="av-column-4 av-md-column-6 mb-6">
						<div class="features-item">
							<div class="features-icon">
								<?php if ( ! empty( $icon ) ) {?>
									<i class="fa <?php echo esc_html( $icon ); ?> txt-pink"></i>
								<?php } ?>
							</div>
							<div class="features-content">
								<?php if ( ! empty( $avril_features_title ) ) : ?>
									<h5 class="features-title"><a href="javascript:void(0)"><?php echo esc_html( $avril_features_title ); ?></a></h5>
								<?php endif; ?>
								<?php if ( ! empty( $text ) ) : ?>
									<p><?php echo esc_html( $text ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php }}?>
            </div>
        </div>
    </section>
	
<?php	
	}} endif; 
	if ( function_exists( 'avril_lite_features' ) ) {
		$section_priority = apply_filters( 'avril_section_priority', 14, 'avril_lite_service' );
		add_action( 'avril_sections', 'avril_lite_features', absint( $section_priority ) );
	}