<?php 
if ( ! function_exists( 'conceptly_lite_cta' ) ) :
	function conceptly_lite_cta() {
		$hide_show_cta			= get_theme_mod('hide_show_cta','1'); 
		$call_to_action_title	= get_theme_mod('call_to_action_title','Become a Part of Community !'); 
		$call_to_action_description	= get_theme_mod('call_to_action_description','Get in touch with us and send some basic info for a quick quote');
		$cta_icon		= get_theme_mod('cta_icon','fa-shopping-cart');
		$call_action_button_label			= get_theme_mod('call_action_button_label','Purchase Now');
		$call_action_button_link			= get_theme_mod('call_action_button_link','');
		$call_action_button_target= get_theme_mod('call_action_button_target');
		$call_action_background_setting= get_theme_mod('call_action_background_setting',CLEVERFOX_PLUGIN_URL .'inc/conceptly/images/bg/cta-bg.jpg');
		$cta_background_position= get_theme_mod('cta_background_position','scroll');
		 if($hide_show_cta == '1') { 
?>

<!-- Start: Call to action
    ============================= -->
<section id="cta"  class="section-padding" style="background-image:url('<?php echo esc_url($call_action_background_setting); ?>');background-attachment:<?php echo esc_attr($cta_background_position); ?>;">
    <div class="container">
        <div class="row cta">
            <div id="cta-header" class="col-lg-9 col-md-12 col-12 text-lg-left text-center mb-lg-0 mb-4">
				<?php if ( ! empty( $call_to_action_title ) ) : ?>
					<h3><?php echo esc_html( $call_to_action_title ); ?></h3>	
				<?php endif; ?>	
				<?php if ( ! empty( $call_to_action_description ) ) : ?>
					<p><?php echo esc_html( $call_to_action_description ); ?></p>
				<?php endif; ?>	
            </div>
            <div id="cta-btn" class="col-lg-3 col-md-12 col-12 text-lg-right text-center">
                <a href="<?php echo esc_url( $call_action_button_link ); ?>" <?php if($call_action_button_target== 'yes' || $call_action_button_target== '1') { echo "target='_blank'"; } ?> class="boxed-btn purchase-btn"><i class="fa <?php echo esc_attr( $cta_icon ); ?>"></i><?php echo esc_html( $call_action_button_label ); ?></a>
            </div>
        </div>
    </div>
</section>  

<!-- End: Call to action
============================= -->
<?php
	}
}
	endif;
	if ( function_exists( 'conceptly_lite_cta' ) ) {
		$section_priority = apply_filters( 'conceptly_section_priority', 29, 'conceptly_lite_cta' );
		add_action( 'conceptly_sections', 'conceptly_lite_cta', absint( $section_priority ) );
	}