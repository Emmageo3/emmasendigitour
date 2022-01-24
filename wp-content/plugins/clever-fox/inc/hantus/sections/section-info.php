<?php
	if ( ! function_exists( 'hantus_lite_info' ) ) :
	function hantus_lite_info() {
		$hide_show_info			= get_theme_mod('hide_show_info','1');
		$info_first_img_setting	= get_theme_mod('info_first_img_setting',CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon01.jpg');
		$info_title				= get_theme_mod('info_title','Opening Time');
		$info_description		= get_theme_mod('info_description','Mon - Sat: 10h00 - 18h00');
		$info_btn				= get_theme_mod('info_btn','Read More');
		$info_link				= get_theme_mod('info_link','#');
		
		$info_second_img_setting= get_theme_mod('info_second_img_setting',CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon02.jpg');
		$info_title2			= get_theme_mod('info_title2','Address');
		$info_description2		= get_theme_mod('info_description2','40 Baria Sreet, NY USAm');
		$info_btn2				= get_theme_mod('info_btn2','Read More');
		$info_link2				= get_theme_mod('info_link2','#');
		
		$info_third_img_setting	= get_theme_mod('info_third_img_setting',CLEVERFOX_PLUGIN_URL . 'inc/hantus/images/icons/icon03.jpg');		
		$info_title3			= get_theme_mod('info_title3','Telephone');
		$info_description3		= get_theme_mod('info_description3','+12 345 678 9101'); 
		$info_btn3				= get_theme_mod('info_btn3','Read More');
		$info_link3				= get_theme_mod('info_link3','#');		
?>
	<?php if($hide_show_info == '1') { ?>
	<section id="contact2">
        <div class="container">
            <div class="row">
            	<div class="col-md-12">
	            	<ul class="info-wrapper">
	                    <li class="info-first">
	                        <aside class="single-info">
	                        	<?php if ( ! empty( $info_first_img_setting ) ) { ?>
	                            <img src="<?php echo esc_url( $info_first_img_setting ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
								<?php } ?>
	                        	<div class="info-area">
	                        		<div class="info-caption">
	                        			<p><?php echo esc_html( $info_description ); ?></p>
										<h4><?php echo esc_html( $info_title ); ?></h4>
									</div>
	                                <a href="<?php echo esc_url($info_link); ?>" class="btn-info"><?php echo esc_html($info_btn); ?></a>
	                            </div>
	                        </aside>
	                    </li>
	                    <li class="info-second">
	                        <aside class="single-info">
	                        	<?php if ( ! empty( $info_second_img_setting ) ) { ?>
									 <img src="<?php echo esc_url( $info_second_img_setting ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
								<?php } ?>
	                        	<div class="info-area">
	                        		<div class="info-caption">
	                        			<p><?php echo esc_html( $info_description2 ); ?></p>
										<h4><?php echo esc_html( $info_title2 ); ?></h4>
									</div>
	                                <a href="<?php echo esc_url($info_link2); ?>" class="btn-info"><?php echo esc_html($info_btn2); ?></a>
	                            </div>
	                        </aside>
	                    </li>
	                    <li class="info-third">
	                        <aside class="single-info">
	                        	<?php if ( ! empty( $info_third_img_setting ) ) { ?>
									 <img src="<?php echo esc_url( $info_third_img_setting ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
								<?php } ?>
	                        	<div class="info-area">
	                        		<div class="info-caption">
	                        			<p><?php echo esc_html( $info_description3 ); ?></p>
										<h4><?php echo esc_html( $info_title3 ); ?></h4>
									</div>
	                                <a href="<?php echo esc_url($info_link3); ?>" class="btn-info"><?php echo esc_html($info_btn3); ?></a>
	                            </div>
	                        </aside>
	                    </li>
	                </ul>
	            </div>
            </div>
        </div>
    </section>
	<?php }} endif; ?>
	<?php
	if ( function_exists( 'hantus_lite_info' ) ) {
		$section_priority = apply_filters( 'hantus_section_priority', 12, 'hantus_lite_info' );
		add_action( 'hantus_sections', 'hantus_lite_info', absint( $section_priority ) );
	}
?>