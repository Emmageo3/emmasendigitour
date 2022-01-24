<?php 
if ( ! function_exists( 'conceptly_lite_service' ) ) :
	function conceptly_lite_service() {
	 $default_content 		= conceptly_get_service_default();
	 $hide_show_service		= get_theme_mod('hide_show_service','1'); 
	 $service_title			= get_theme_mod('service_title','Our Services');
	 $service_description	= get_theme_mod('service_description','There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour.');
	 $service_contents		= get_theme_mod('service_contents',$default_content);
if($hide_show_service == '1') {?>
<section id="our-service" class="section-padding home-service service-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-12">                    
                    <div class="section-title">
                    <?php if ( ! empty( $service_title ) || is_customize_preview() ) : ?>
						<h2><?php echo esc_attr( $service_title ); ?><span></span></h2>
					<?php endif; ?>
					<?php if($service_description) {?>
                        <p><?php echo esc_attr( $service_description ); ?></p>
					<?php 
						}
					?>
                    </div>
                </div>
            </div>

            <div class="row" id="service-contents">
			<?php
					if ( ! empty( $service_contents ) ) {
					$allowed_html = array(
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
					'b'      => array(),
					'i'      => array(),
					);
					$service_contents = json_decode( $service_contents );
					foreach ( $service_contents as $service_item ) {
						$icon = ! empty( $service_item->icon_value ) ? apply_filters( 'conceptly_translate_single_string', $service_item->icon_value, 'service section' ) : '';
						$title = ! empty( $service_item->title ) ? apply_filters( 'conceptly_translate_single_string', $service_item->title, 'service section' ) : '';
						$subtitle = ! empty( $service_item->subtitle ) ? apply_filters( 'conceptly_translate_single_string', $service_item->subtitle, 'service section' ) : '';
						$text = ! empty( $service_item->text ) ? apply_filters( 'conceptly_translate_single_string', $service_item->text, 'service section' ) : '';
						$text2 = ! empty( $service_item->text2) ? apply_filters( 'conceptly_translate_single_string', $service_item->text2,'service section' ) : '';
						$link = ! empty( $service_item->link ) ? apply_filters( 'conceptly_translate_single_string', $service_item->link, 'service section' ) : '';
						$image = ! empty( $service_item->image_url ) ? apply_filters( 'conceptly_translate_single_string', $service_item->image_url, 'service section' ) : '';
				?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 mb-lg-0 single_serv">		 <div class="service-box">                        
                        <figure>
                             <?php if ( ! empty( $image ) ) : ?>
								<img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
							<?php endif; ?>
                            <figcaption>
                                <div class="inner-text">
                                    <div class="service-icon">
                                        <i class="fa <?php echo esc_html( $icon ); ?>"></i>
                                    </div>
                                    <?php if ( ! empty( $title ) ) : ?>
										<h3><?php echo esc_html( $title ); ?> <br> <?php echo esc_html( $subtitle ); ?> </h3>
									<?php endif; ?>
                                    <div class="devider"></div>
                                    <p><?php echo esc_html( $text ); ?></p>
									<?php if ( ! empty( $text2 ) ) : ?>
										<a href="<?php echo esc_url( $link ); ?>" class="boxed-btn"><?php echo $text2 ?><i class="fa fa-arrow-right"></i></a>
									<?php endif; ?>
                                </div>
                            </figcaption>
                        </figure>
                    </div>					
                </div>    
				<?php
					}
				}
				?>				
            </div>
        </div>
        <div class="shape2"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>images/shape/shape2.png" alt="image"></div>
		<div class="shape3"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>images/shape/shape3.png" alt="image"></div>
		<div class="shape5"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>images/shape/shape5.png" alt="image"></div>
		<div class="shape6"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>images/shape/shape6.png" alt="image"></div>
		<div class="shape7"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>images/shape/shape7.png" alt="image"></div>
		<div class="shape13"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>images/shape/shape13.png" alt="image"></div>
    </section>
<?php
}
}
	endif;
	if ( function_exists( 'conceptly_lite_service' ) ) {
		$section_priority = apply_filters( 'conceptly_section_priority', 25, 'conceptly_lite_service' );
		add_action( 'conceptly_sections', 'conceptly_lite_service', absint( $section_priority ) );
	}
           