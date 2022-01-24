<?php
	if ( ! function_exists( 'avril_above_header' ) ) :
	function avril_above_header() {
	?>
	<?php 
	$hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
	$social_icons 				= get_theme_mod( 'social_icons',avril_get_social_icon_default());
?>
        <!--===// Start: Header Above
        =================================-->
			<div id="above-header" class="header-above-info d-av-block d-none wow fadeInDown">
				<div class="header-widget">
					<div class="av-container">
						<div class="av-columns-area">
								<div class="av-column-5">
									<div class="widget-left text-av-left text-center">
										<?php if($hide_show_social_icon == '1') { ?>
											<aside class="widget widget_social_widget">
												<ul>
													<?php
														$social_icons = json_decode($social_icons);
														if( $social_icons!='' )
														{
														foreach($social_icons as $social_item){	
														$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'avril_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
														$social_link = ! empty( $social_item->link ) ? apply_filters( 'avril_translate_single_string', $social_item->link, 'Header section' ) : '';
													?>
														<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
													<?php }} ?>
												</ul>
											</aside>
										<?php } ?>
									</div>
								</div>
								<div class="av-column-7">
									<div class="widget-right text-av-right text-center"> 
										<?php 
											$hide_show_cntct_details 	= get_theme_mod( 'hide_show_cntct_details','1'); $tlh_contct_icon 			= get_theme_mod( 'tlh_contct_icon','fa-clock-o'); 	
											$tlh_contact_title 			= get_theme_mod( 'tlh_contact_title','8:00AM - 6:00PM'); 
											$tlh_contact_sbtitle 		= get_theme_mod( 'tlh_contact_sbtitle','Monday to Saturday'); 
										?>
										<?php if($hide_show_cntct_details == '1') { ?>
											<aside class="widget widget-contact wgt-1">
												<div class="contact-area">
													<div class="contact-icon">
													   <i class="fa <?php echo  esc_attr($tlh_contct_icon); ?>"></i>
													</div>
													<a href="javascript:void(0)" class="contact-info">
														<span class="text"><?php echo esc_html($tlh_contact_title); ?></span>
														<span class="title"><?php echo esc_html($tlh_contact_sbtitle); ?></span>
													</a>
												</div>
											</aside>
										<?php } ?>
									<?php 
										$hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
										$tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-phone'); 	
										$tlh_email_title 			= get_theme_mod( 'tlh_email_title','Email Us'); 
										$tlh_email_sbtitle 			= get_theme_mod( 'tlh_email_sbtitle','email@email.com'); 
									?>	
									<?php if($hide_show_email_details == '1') { ?>
										<aside class="widget widget-contact wgt-2">
											<div class="contact-area">
												<div class="contact-icon">
													<i class="fa <?php echo  esc_attr($tlh_email_icon); ?>"></i>
												</div>
												<a href="mailto:<?php echo esc_html($tlh_email_sbtitle); ?>" class="contact-info">
													<span class="text"><?php echo esc_html($tlh_email_title); ?></span>
													<span class="title"><?php echo esc_html($tlh_email_sbtitle); ?></span>
												</a>
											</div>
										</aside>
									<?php } ?>	
									<?php 
										$hide_show_mbl_details 		= get_theme_mod( 'hide_show_mbl_details','1'); 	
										$tlh_mobile_icon 			= get_theme_mod( 'tlh_mobile_icon','fa-map-marker');
										$tlh_mobile_title 			= get_theme_mod( 'tlh_mobile_title','Online 24x7'); 
										$tlh_mobile_sbtitle 		= get_theme_mod( 'tlh_mobile_sbtitle','+1-0120-400-00-00'); 
									?>
									<?php if($hide_show_mbl_details == '1') { ?>
										<aside class="widget widget-contact wgt-3">
											<div class="contact-area">
												<div class="contact-icon">
													<i class="fa <?php echo  esc_attr($tlh_mobile_icon); ?>"></i>
												</div>
												<a href="tel:<?php echo esc_html($tlh_mobile_sbtitle); ?>" class="contact-info">
													<span class="text"><?php echo esc_html($tlh_mobile_title); ?></span>
													<span class="title"><?php echo esc_html($tlh_mobile_sbtitle); ?></span>
												</a>
											</div>
										</aside>
									<?php } ?>	
									</div>	
								</div>
						</div>
					</div>
				</div>
			</div>	
        <!--===// End: Header Top
        =================================-->   
	<?php 
} endif;
add_action('avril_above_header', 'avril_above_header');
?>
