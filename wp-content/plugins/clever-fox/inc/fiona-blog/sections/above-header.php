<?php
	if ( ! function_exists( 'fiona_blog_above_header' ) ) :
	function fiona_blog_above_header() {
	$hs_abv_hdr_time 				= get_theme_mod('hs_abv_hdr_time','1');
	$hs_abv_hdr_trending 			= get_theme_mod('hs_abv_hdr_trending','1');	
	$abv_hdr_first_trending_title 	= get_theme_mod( 'abv_hdr_first_trending_title','Trending'); 
	$abv_hdr_first_trending_desc 	= get_theme_mod( 'abv_hdr_first_trending_desc','Lorem ipsum dolor sit amet consectetur');	
	$hs_abv_hdr_social 				= get_theme_mod('hs_abv_hdr_social','1');
	$abv_hdr_social_ttl 			= get_theme_mod('abv_hdr_social_ttl','IN SOCIAL');
	$social_icons 					= get_theme_mod('social_icons',fiona_blog_get_social_icon_default());
	if($hs_abv_hdr_time == '1' || $hs_abv_hdr_trending == '1' || $hs_abv_hdr_social == '1') { ?>	
		<div id="above-header" class="header-above-info d-av-block d-none wow fadeInDown">
			<div class="header-widget">
				<div class="av-container">
					<div class="av-columns-area">
						<div class="av-column-7">
							<div class="widget-left text-av-left text-center">
								<aside class="widget widget_text">
									<div class="trending-box">
										<?php if($hs_abv_hdr_time == '1'){ ?>
											<div class="trending-date">
												<?php  echo '<span class="t-day">'. date_i18n('j', strtotime(current_time("d"))).'</span>';
													   echo '<span class="t-all">'. date_i18n('M Y', strtotime(current_time("Y-m"))).'</span>';
													   ?>
											</div>
										<?php } 
										 if($hs_abv_hdr_trending == '1'){ ?>
											<hr class="trending-border">
											<div class="trending">
												<h3><i class="fa fa-flash"></i><?php echo esc_html($abv_hdr_first_trending_title); ?></h3>
												<div class="text-sliding breaking-news">            
													<span class="typewrite" data-period="2000" data-type='[ "<?php echo wp_kses_post($abv_hdr_first_trending_desc); ?>" ]'></span><span class="wrap"></span>
												</div>
											</div>
										<?php } ?>	
									</div>
								</aside>
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
