<?php
if ( ! function_exists( 'conceptly_lite_sponsors' ) ) :
function conceptly_lite_sponsors() {
	$default_content 			= conceptly_get_sponsers_default();
	$hide_show_sponser			= get_theme_mod('hide_show_sponser','1');
	$sponser_contents			= get_theme_mod('sponser_contents',$default_content);
	$sponsers_background_setting= get_theme_mod('sponsers_background_setting',CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/bg/partner-bg.jpg');
	$sponsers_background_position= get_theme_mod('sponsers_background_position','scroll');	
 if($hide_show_sponser == '1') { 
?>
<!-- Start: Our Client
    ============================= -->
<section id="our-partners" style="background-image:url('<?php echo esc_url($sponsers_background_setting); ?>');background-attachment:<?php echo esc_attr($sponsers_background_position); ?>;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="partner-carousel">
					<?php
						if ( ! empty( $sponser_contents ) ) {
						$allowed_html = array(
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
						'b'      => array(),
						'i'      => array(),
						);
						$sponser_contents = json_decode( $sponser_contents );
						foreach ( $sponser_contents as $sponser_item ) {
							$link = ! empty( $sponser_item->link ) ? apply_filters( 'conceptly_translate_single_string', $sponser_item->link, 'sponser section' ) : '';
							$image = ! empty( $sponser_item->image_url ) ? apply_filters( 'conceptly_translate_single_string', $sponser_item->image_url, 'sponser section' ) : '';
					?>	
                    <div class="single-partner">
                        <div class="inner-partner">
							<?php if ( ! empty( $image ) ) : ?>
									<a href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> /></a>
							<?php endif; ?>
                            
                        </div>
                    </div>
					<?php } } ?>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End: Our Client
============================= -->
<?php } 
 }
endif;
if ( function_exists( 'conceptly_lite_sponsors' ) ) {
	$section_priority = apply_filters( 'conceptly_section_priority', 32, 'conceptly_lite_sponsors' );
	add_action( 'conceptly_sections', 'conceptly_lite_sponsors', absint( $section_priority ) );
}