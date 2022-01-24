<?php 
if ( ! function_exists( 'avril_lite_cta' ) ) :
	function avril_lite_cta() {
	$hs_cta						= get_theme_mod('hs_cta','1');	
	$cta_title					= get_theme_mod('cta_title','We work in partnership with all the major <span class="primary-color"><em>technology</em></span> solutions');
	$cta_description			= get_theme_mod('cta_description','There are many variations of passages of lorem Ipsum available, but the majority');
	$cta_btn_lbl1				= get_theme_mod('cta_btn_lbl1','Purchase Now');
	$cta_btn_link1				= get_theme_mod('cta_btn_link1');
if($hs_cta == '1') {	
?>	
 <section id="cta-section" class="cta-section cta-shadow-one av-mb-default home-cta">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="cta-wrapper">
                        <div class="cta-content">
							<?php if ( ! empty( $cta_title ) ) : ?>
								<h4><?php echo wp_kses_post($cta_title); ?></H4>
							<?php endif; ?>
                            <?php if ( ! empty($cta_description) ) : ?>		
								<p><?php echo wp_kses_post($cta_description); ?></p>    
							<?php endif; ?>	
                        </div>
                        <div class="cta-btn-wrap text-av-right text-center">
							<?php if ( ! empty( $cta_btn_lbl1 ) ) : ?>
								<a href="<?php echo esc_url($cta_btn_link1); ?>" class="av-btn av-btn-primary" data-text="Contact With Us"><?php echo esc_html($cta_btn_lbl1); ?></a>
							<?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php	
	}} endif; 
	if ( function_exists( 'avril_lite_cta' ) ) {
		$section_priority = apply_filters( 'avril_section_priority', 18, 'avril_lite_cta' );
		add_action( 'avril_sections', 'avril_lite_cta', absint( $section_priority ) );
	}	