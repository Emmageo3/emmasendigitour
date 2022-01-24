<?php
if ( ! function_exists( 'conceptly_lite_features' ) ) :
	function conceptly_lite_features() {
	$default_content 			= conceptly_get_feature_default();
	$hide_show_feature			= get_theme_mod('hide_show_feature','1'); 
	$features_title				= get_theme_mod('features_title','Our Features');
	$features_description		= get_theme_mod('features_description','There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour.');
	$feature_content			= get_theme_mod('feature_content',$default_content);
	
	 if($hide_show_feature == '1') { 
	?>
<!-- Start: Our Features
    ============================= -->
    <section id="ourfeatures" class="section-padding home-feature position-relative">
        <div class="container">   
		<?php  
			if( ($features_title) || ($features_description)!='' ) { ?>
            <!-- Start Feature Title -->
			<div class="row">
                <div class="col-lg-8 col-md-10 col-12">                    
					<div class="section-title">
					<?php if ( ! empty( $features_title ) || is_customize_preview() ) : ?>
                        <h2><?php echo $features_title; ?> <span></span></h2>
					<?php endif; ?>

					<?php if($features_description) {?>
                        <p><?php echo $features_description; ?></p>
					<?php } ?>
                    </div>
                </div>
            </div>
			<!-- /Feature Title -->
			<?php 
				} 
			?>
            <div id="feature-content"class="row">
			<?php
				if ( ! empty( $feature_content ) ) {
				$allowed_html = array(
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'b'      => array(),
				'i'      => array(),
				);
				$feature_content = json_decode( $feature_content );
				foreach ( $feature_content as $service_item ) {
					$icon = ! empty( $service_item->icon_value ) ? apply_filters( 'conceptly_translate_single_string', $service_item->icon_value, 'feature section' ) : '';
					$title = ! empty( $service_item->title ) ? apply_filters( 'conceptly_translate_single_string', $service_item->title, 'feature section' ) : '';
					$text = ! empty( $service_item->text ) ? apply_filters( 'conceptly_translate_single_string', $service_item->text, 'feature section' ) : '';
					?>
                <div class="col-lg-4 col-md-6 col-sm-12 features-box pt-3 pb-3">
                    <div class="row" >
                        <div class="col-3">
                            <div class="features-box-icon">
								<?php if ( ! empty( $icon ) ) { ?>	
										<i class="fa <?php echo esc_html($icon);?>"></i>
								<?php } ?>	
                            </div>
                        </div>
                        <div class="col-9">                                
                            <h3><?php echo esc_html( $title ); ?></h3>
                            <p><?php echo esc_html( $text ); ?> </p>
                        </div>
                    </div>
                </div>
				
				<?php
					}
					}	
				?>
            </div>
        </div>
        <div class="shape15"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>images/shape/shape15.png" alt="image"></div>
    </section>
	</section>
<?php } 
}
	endif;
	if ( function_exists( 'conceptly_lite_features' ) ) {
		$section_priority = apply_filters( 'conceptly_section_priority', 27, 'conceptly_lite_features' );
		add_action( 'conceptly_sections', 'conceptly_lite_features', absint( $section_priority ) );
	}