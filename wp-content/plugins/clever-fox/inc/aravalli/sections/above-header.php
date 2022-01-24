<?php
	if ( ! function_exists( 'aravalli_above_header' ) ) :
	function aravalli_above_header() {
	?>
	<?php 
	$hide_show_phone_details 	= get_theme_mod( 'hide_show_phone_details','1'); 
	$tlh_phone_icon 			= get_theme_mod( 'tlh_phone_icon','fa-mobile-phone'); 
	$tlh_phone_title 			= get_theme_mod( 'tlh_phone_title','+1514-2861-23'); 
	$hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1'); 
	$tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-envelope-o'); 
	$tlh_email_title 			= get_theme_mod( 'tlh_email_title','email@companyname.com');
	$hide_show_social_icon 			= get_theme_mod( 'hide_show_social_icon','1'); 
	$social_icons 					= get_theme_mod( 'social_icons',aravalli_get_social_icon_default());
?>
       <?php if($hide_show_phone_details == '1' || $hide_show_email_details == '1' || $social_icons == '1') { ?>
	<div id="header-top" class="header-top-info d-lg-block d-sm-none d-none wow fadeInDown">
		<div class="header-widget">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						 <div id="header-top-left" class="text-lg-left text-center">
							<?php if($hide_show_phone_details == '1') { ?>
								 <div class="widget widget-info phone">
									<i class="fa <?php echo esc_attr($tlh_phone_icon); ?>"></i>
									<span><?php echo esc_html($tlh_phone_title); ?></span>
								</div>
							<?php } 
							  if($hide_show_email_details == '1') {
							 ?>	
								<div class="widget widget-info email">
									<i class="fa <?php echo esc_attr($tlh_email_icon); ?>"></i>
									<span><?php echo esc_html($tlh_email_title); ?></span>
								</div>
							 <?php } ?>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						 <div id="header-top-right" class="text-lg-right text-center">
							<?php if($hide_show_social_icon == '1') { ?>
								<div class="widget widget-social">
									<ul>
										<?php
											$social_icons = json_decode($social_icons);
											if( $social_icons!='' )
											{
											foreach($social_icons as $social_item){	
											$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'aravalli_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
											$social_link = ! empty( $social_item->link ) ? apply_filters( 'aravalli_translate_single_string', $social_item->link, 'Header section' ) : '';
										?>
											<li><a href="<?php echo esc_url( $social_link ); ?>" class="linkedin"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
										<?php }} ?>
									</ul>
								</div>		
							<?php } ?>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php }  
} endif;
add_action('aravalli_above_header', 'aravalli_above_header');