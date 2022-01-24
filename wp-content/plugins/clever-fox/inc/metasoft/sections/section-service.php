<?php 
if ( ! function_exists( 'metasoft_lite_service' ) ) :
	function metasoft_lite_service() {
	$service_hs		= get_theme_mod('service_hs','1');	
	$service_title  = get_theme_mod('service_title','Quality <span class="text-primary">Services</span>');
	$service_description   = get_theme_mod('service_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.');
	$service_contents	= get_theme_mod('service_contents',metasoft_get_service_default());
if(!empty($service_hs)){	
?> 
<!-- Quality Services -->
<section id="services-wrapper" class="services-wrapper bs-py-default service-home">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-12 mx-lg-auto mb-5 text-center">
				<div class="heading-seprator wow fadeInUp">
					<?php if ( ! empty( $service_title ) ) : ?>
						<h1><?php echo wp_kses_post($service_title); ?></h1>
					<?php endif; ?>
					
					<?php if ( ! empty( $service_description ) ) : ?>
						<p><?php echo esc_html($service_description); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="row wow fadeInUp">
			<div class="col-12">
				<div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4 wow fadeInUp content-service">
					<?php
						if ( ! empty( $service_contents ) ) {
						$service_contents = json_decode( $service_contents );
						foreach ( $service_contents as $service_item ) {
							$title = ! empty( $service_item->title ) ? apply_filters( 'metasoft_translate_single_string', $service_item->title, 'Service section' ) : '';
							$text = ! empty( $service_item->text ) ? apply_filters( 'metasoft_translate_single_string', $service_item->text, 'Service section' ) : '';
							$link = ! empty( $service_item->link ) ? apply_filters( 'metasoft_translate_single_string', $service_item->link, 'Service section' ) : '';
							$icon = ! empty( $service_item->icon_value ) ? apply_filters( 'metasoft_translate_single_string', $service_item->icon_value, 'Service section' ) : '';
					?>
						<div class="col">
							<div class="single-seriveces">
								<div class="services-icons yellow">
									<?php if ( ! empty( $icon ) ) {?>
										<i class="fa <?php echo esc_attr( $icon ); ?>"></i>
									<?php } ?>
								</div>
								<?php if ( ! empty( $title ) ) {?>
									<h5><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a></h5>
								<?php } ?>	
								
								<?php if ( ! empty( $text ) ) {?>
									<p><?php echo esc_html( $text ); ?></p>
								<?php } ?>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	
}}
endif;
if ( function_exists( 'metasoft_lite_service' ) ) {
$section_priority = apply_filters( 'metasoft_section_priority', 13, 'metasoft_lite_service' );
add_action( 'metasoft_sections', 'metasoft_lite_service', absint( $section_priority ) );
}
?>
<!-- Quality Services End -->
	