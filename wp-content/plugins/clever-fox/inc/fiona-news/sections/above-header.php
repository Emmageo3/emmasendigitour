<?php
	if ( ! function_exists( 'fiona_blog_above_header' ) ) :
	function fiona_blog_above_header() {
	$hs_abv_hdr_menu 				= get_theme_mod('hs_abv_hdr_menu','1');	
	$hs_abv_hdr_social 				= get_theme_mod('hs_abv_hdr_social','1');
	$abv_hdr_social_ttl 			= get_theme_mod('abv_hdr_social_ttl','IN SOCIAL');
	$social_icons 					= get_theme_mod('social_icons',fiona_blog_get_social_icon_default());
	if($hs_abv_hdr_menu == '1' || $hs_abv_hdr_social == '1') { ?>	
		<div id="above-header" class="header-above-info d-av-block d-none wow fadeInDown">
			<div class="header-widget">
				<div class="av-container">
					<div class="av-columns-area">
						<div class="av-column-7">
							<div class="widget-left text-av-left text-center">
								<?php if($hs_abv_hdr_menu == '1'){ ?>
									 <aside class="widget widget_nav_menu">
										<div class="menu-pages-container">
										<?php 
											wp_nav_menu( 
												array(  
													'theme_location' => 'header_above_menu',
													'container'  => '',
													'menu_class' => 'menu-wrap',
													'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
													'walker' => new WP_Bootstrap_Navwalker()
													 ) 
												);
											?>
											</div>
										</aside>
									<?php } ?>	
							</div>
						</div>
						<div class="av-column-5">
							<div class="widget-right text-av-right text-center"> 
								<?php if($hs_abv_hdr_social == '1'){ ?>
									<aside class="widget widget_social_widget">
										<h2><?php echo esc_html($abv_hdr_social_ttl); ?></h2>
										<ul>
											<?php
												$social_icons = json_decode($social_icons);
												if( $social_icons!='' )
												{
												foreach($social_icons as $social_item){	
												$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'avril_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
												$social_link = ! empty( $social_item->link ) ? apply_filters( 'avril_translate_single_string', $social_item->link, 'Header section' ) : '';
											?>
												<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i><svg class="round-svg-circle"><circle cx="50%" cy="50%" r="49%"></circle><circle cx="50%" cy="50%" r="49%"></circle></svg></a></li>
											<?php }} ?>
										</ul>
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
add_action('fiona_blog_above_header', 'fiona_blog_above_header');
