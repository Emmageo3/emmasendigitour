<?php  
if ( ! function_exists( 'cleverfox_boostify_lite_service' ) ) :
	function cleverfox_boostify_lite_service() {
	$hs_service 			= get_theme_mod('hs_service','1');	
	$service_title			= get_theme_mod('service_title','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Services</b>                                   <b>Services</b><b>Services</b></span></span>');
	$service_description	= get_theme_mod('service_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$service_contents 		= get_theme_mod('service_contents',boostify_get_service_default());
	if($hs_service == '1'){
?>
<section id="our-service" class="themes-bottom section-padding service-home">
	<div class="container">
		<?php if ( ! empty( $service_title )  || ! empty( $service_description )) : ?>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">                    
					<div class="section-header text-center">
						<?php if ( ! empty( $service_title ) ) : ?>
							<h2><?php echo wp_kses_post($service_title); ?></h2>
						<?php endif; ?>	
						
						<?php if ( ! empty( $service_description ) ) : ?>		
							<p><?php echo wp_kses_post($service_description); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row" id="services">
			<?php
				if ( ! empty( $service_contents ) ) {
				$service_contents = json_decode( $service_contents );
				foreach ( $service_contents as $service_item ) {
					$title = ! empty( $service_item->title ) ? apply_filters( 'boostify_translate_single_string', $service_item->title, 'Service section' ) : '';
					$text = ! empty( $service_item->text ) ? apply_filters( 'boostify_translate_single_string', $service_item->text, 'Service section' ) : '';
					$button = ! empty( $service_item->text2 ) ? apply_filters( 'boostify_translate_single_string', $service_item->text2, 'Service section' ) : '';
					$link = ! empty( $service_item->link ) ? apply_filters( 'boostify_translate_single_string', $service_item->link, 'Service section' ) : '';
					$icon = ! empty( $service_item->icon_value) ? apply_filters( 'boostify_translate_single_string', $service_item->icon_value,'Service section' ) : '';
					$image = ! empty( $service_item->image_url ) ? apply_filters( 'boostify_translate_single_string', $service_item->image_url, 'Service section' ) : '';
			?>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<?php if(!empty($image)):?>
							<img src="<?php echo esc_url($image); ?>" />
						<?php else: ?>
							<i class="fa <?php echo esc_attr($icon); ?>"></i>
						<?php endif; ?>	
						
						<?php if(!empty($title)):?>
							<h4><?php echo esc_html($title); ?></h4>
						<?php endif; ?>
						
						<?php if(!empty($text)):?>
							<p><?php echo esc_html($text); ?></p>
						<?php endif; ?>
						
						<?php if(!empty($button)):?>
							<a href="<?php echo esc_url($link); ?>"><?php echo esc_html($button); ?></a>
						<?php endif; ?>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php	
	}}
endif;
if ( function_exists( 'cleverfox_boostify_lite_service' ) ) {
$section_priority = apply_filters( 'boostify_section_priority', 14, 'cleverfox_boostify_lite_service' );
add_action( 'boostify_sections', 'cleverfox_boostify_lite_service', absint( $section_priority ) );
}