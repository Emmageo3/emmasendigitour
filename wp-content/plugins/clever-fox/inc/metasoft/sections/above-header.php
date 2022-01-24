<?php
if ( ! function_exists( 'metasoft_above_header' ) ) :
function metasoft_above_header() {
$hdr_top_hs 	=	get_theme_mod('hdr_top_hs','1');
if($hdr_top_hs == '1') { ?>
	<div id="above-header" class="above-header d-lg-block d-none wow fadeInDown">
		<div class="header-widget d-flex align-items-center">
			<div class="container">
				<div class="row">
					<?php 
					$abv_hdr_link_hs = get_theme_mod('abv_hdr_link_hs','1');
					$abv_hdr_lbl1 	= get_theme_mod( 'abv_hdr_lbl1','careers'); 
					$abv_hdr_url1 	= get_theme_mod( 'abv_hdr_url1'); 
					$abv_hdr_lbl2 	= get_theme_mod( 'abv_hdr_lbl2','help desk'); 
					$abv_hdr_url2 	= get_theme_mod( 'abv_hdr_url2'); 
					$abv_hdr_lbl3 	= get_theme_mod( 'abv_hdr_lbl3','login'); 
					$abv_hdr_url3 	= get_theme_mod( 'abv_hdr_url3'); 
					$hide_show_social_icon 	= get_theme_mod( 'hide_show_social_icon','1'); 
					$social_icons 	= get_theme_mod( 'social_icons',metasoft_get_social_icon_default());	
					?>
					<div class="col-lg-6 col-12 mb-lg-0 mb-4">
						 <div id="header-above-left" class="widget-left text-lg-left text-center">
							<?php if($abv_hdr_link_hs == '1') { ?>
							<div class="widget widget_help_desk">
								<ul>
									<?php if(!empty($abv_hdr_lbl1)): ?>
										<li class="link1"><a href="<?php echo esc_html($abv_hdr_url1); ?>"><?php echo esc_html($abv_hdr_lbl1); ?></a></li>
									<?php endif; ?>	
									
									<?php if(!empty($abv_hdr_lbl2)): ?>
										<li class="link2"><a href="<?php echo esc_html($abv_hdr_url2); ?>"><?php echo esc_html($abv_hdr_lbl2); ?></a></li>
									<?php endif; ?>	
									
									<?php if(!empty($abv_hdr_lbl3)): ?>
										<li class="link3"><a href="<?php echo esc_html($abv_hdr_url3); ?>"><?php echo esc_html($abv_hdr_lbl3); ?></a></li>
									<?php endif; ?>	
								</ul>
							</div>
							<?php } ?>
							<?php if($hide_show_social_icon == '1') { ?>
								<div class="widget widget_social_widget">
									<ul>
										<?php
											$social_icons = json_decode($social_icons);
											if( $social_icons!='' )
											{
											foreach($social_icons as $social_item){	
											$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'metasoft_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
											$social_link = ! empty( $social_item->link ) ? apply_filters( 'metasoft_translate_single_string', $social_item->link, 'Header section' ) : '';
										?>
											<li><a href="<?php echo esc_url( $social_link ); ?>" class="linkedin"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
										<?php }} ?>
									</ul>
								</div>		
							<?php } ?>
						</div>
					</div>
					<div class="col-lg-6 col-12 mb-lg-0 mb-4">
						<div id="header-above-right" class="widget-right justify-content-lg-end justify-content-center text-lg-right text-center">
							<?php 
								$hide_show_cntct_details = get_theme_mod( 'hide_show_cntct_details','1'); 
								$tlh_contct_icon 	 = get_theme_mod( 'tlh_contct_icon','fa-clock-o'); 	
								$tlh_contact_title 		 = get_theme_mod( 'tlh_contact_title','Mon to Fri 9:00am to 6:00pm'); 
							?>
							<?php if($hide_show_cntct_details == '1') { ?>
								<aside class="widget widget-contact wgt-1">
									<div class="contact-area">
										<div class="contact-icon">
											<div class="contact-corn"><i class="fa <?php echo  esc_attr($tlh_contct_icon); ?>"></i></div>
										</div>
										<div class="contact-info">
											<p class="text"><?php echo esc_html($tlh_contact_title); ?></p>
										</div>
									</div>
								</aside>
							<?php } ?>
							
							<?php 
								$hide_show_email_details = get_theme_mod( 'hide_show_email_details','1');
								$tlh_email_icon 		 = get_theme_mod( 'tlh_email_icon','fa-envelope-o'); 	
								$tlh_email_title 		 = get_theme_mod( 'tlh_email_title','email@companyname.com');
							?>	
							<?php if($hide_show_email_details == '1') { ?>
								<aside class="widget widget-contact wgt-2">
									<div class="contact-area">
										<div class="contact-icon">
											<div class="contact-corn"><i class="fa <?php echo  esc_attr($tlh_email_icon); ?>"></i></div>
										</div>
										<div class="contact-info">
											<p class="text"><?php echo esc_html($tlh_email_title); ?></p>
										</div>
									</div>
								</aside>
							<?php } ?>
						</div>	
					</div>                  
				</div>
			</div>
		</div>
	</div>
	<?php } 
} endif;
add_action('metasoft_above_header', 'metasoft_above_header');
