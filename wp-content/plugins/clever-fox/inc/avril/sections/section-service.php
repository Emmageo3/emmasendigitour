<?php 
if ( ! function_exists( 'avril_lite_service' ) ) :
	function avril_lite_service() {
	$hs_service					= get_theme_mod('hs_service','1');			
	$service_title				= get_theme_mod('service_title','Technology from tomorrow');
	$service_subtitle			= get_theme_mod('service_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Services</b>                                   <b>Services</b><b>Services</b></span></span>');
	$service_description		= get_theme_mod('service_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$service_contents			= get_theme_mod('service_contents',avril_get_service_default());
if($hs_service == '1') {		
?>
    <section id="service-section" class="service-section service-section-hover av-py-default service-home">
    	<div class="av-container">
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="heading-default wow fadeInUp">
						<?php if ( ! empty( $service_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($service_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $service_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($service_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $service_description ) ) : ?>		
							<p><?php echo wp_kses_post($service_description); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
            <div class="av-columns-area wow fadeInUp service-row">
				<?php
					if ( ! empty( $service_contents ) ) {
					$service_contents = json_decode( $service_contents );
					foreach ( $service_contents as $service_item ) {
						$avril_service_title = ! empty( $service_item->title ) ? apply_filters( 'avril_translate_single_string', $service_item->title, 'service section' ) : '';
						$text = ! empty( $service_item->text ) ? apply_filters( 'avril_translate_single_string', $service_item->text, 'service section' ) : '';
						$icon = ! empty( $service_item->icon_value) ? apply_filters( 'avril_translate_single_string', $service_item->icon_value,'service section' ) : '';
						$avril_serv_link = ! empty( $service_item->link ) ? apply_filters( 'avril_translate_single_string', $service_item->link, 'service section' ) : '';
				?>
				<div class="av-column-4 av-md-column-6 mb-1 p-0">
					<div class="service-item">
						<div class="service-icon">
							<?php if ( ! empty( $icon ) ) {?>
								<i class="fa <?php echo esc_html( $icon ); ?> txt-pink"></i>
							<?php } ?>
						</div>
						<div class="service-content">
							<?php if ( ! empty( $avril_service_title ) ) : ?>
								<h5 class="service-title"><a href="<?php echo esc_url( $avril_serv_link ); ?>"><?php echo esc_html( $avril_service_title ); ?></a></h5>
							<?php endif; ?>
							<?php if ( ! empty( $text ) ) : ?>
								<p><?php echo esc_html( $text ); ?></p>
							<?php endif; ?>
							<a href="<?php echo esc_url( $avril_serv_link ); ?>"><i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<?php }}?>
            </div>
    	</div>
    </section>
<?php	
	}} endif; 
	if ( function_exists( 'avril_lite_service' ) ) {
		$section_priority = apply_filters( 'avril_section_priority', 13, 'avril_lite_service' );
		add_action( 'avril_sections', 'avril_lite_service', absint( $section_priority ) );
	}