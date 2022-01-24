    <!--===// Start: Header
    =================================-->

<?php if ( get_header_image() ) : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
	<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
</a>
<?php endif;  ?>
<header id="header-section" class="header header-one">
	<?php do_action( 'avril_above_header');  ?>

		<div class="navigator-wrapper">
			<!--===// Start: Mobile Toggle
			=================================-->
			<div class="theme-mobile-nav <?php echo esc_attr(avril_sticky_menu()); ?>"> 
				<div class="av-container">
					<div class="av-columns-area">
						<div class="av-column-12">
							<div class="theme-mobile-menu">
								<div class="mobile-logo">
									<div class="logo">
										<?php
											if(has_custom_logo())
											{	
												the_custom_logo();
											}
											else { 
											?>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
												<h4 class="site-title">
													<?php 
														echo esc_html(get_bloginfo('name'));
													?>
												</h4>
											</a>	
										<?php 						
											}
										?>
										<?php
											$avril_description = get_bloginfo( 'description');
											if ($avril_description) : ?>
												<p class="site-description"><?php echo esc_html($avril_description); ?></p>
										<?php endif; ?>
									</div>
								</div>
								<div class="menu-toggle-wrap">
									<div class="mobile-menu-right"></div>
									<div class="hamburger-menu">
										<button type="button" class="menu-toggle">
											<div class="top-bun"></div>
											<div class="meat"></div>
											<div class="bottom-bun"></div>
										</button>
									</div>
								</div>
								<div id="mobile-m" class="mobile-menu">
									<button type="button" class="header-close-menu close-style"></button>
								</div>
								<?php if ( function_exists( 'cleverfox_activate' ) ) { ?>
									<div class="headtop-mobi">
										<button type="button" class="header-above-toggle"><span></span></button>
									</div>
								<?php } ?>
								<div id="mob-h-top" class="mobi-head-top"></div>
							</div>
						</div>
					</div>
				</div>        
			</div>
			<!--===// End: Mobile Toggle
			=================================-->

			<!--===// Start: Navigation
			=================================-->
			<div class="nav-area d-none d-av-block">
				<div class="navbar-area <?php echo esc_attr(avril_sticky_menu()); ?>">
					<div class="av-container">
						<div class="av-columns-area">
							<div class="av-column-2 my-auto">
								<div class="logo">
									<?php
										if(has_custom_logo())
										{	
											the_custom_logo();
										}
										else { 
										?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<h4 class="site-title">
												<?php 
													echo esc_html(get_bloginfo('name'));
												?>
											</h4>
										</a>	
									<?php 						
										}
									?>
									<?php
										$avril_description = get_bloginfo( 'description');
										if ($avril_description) : ?>
											<p class="site-description"><?php echo esc_html($avril_description); ?></p>
									<?php endif; ?>
								</div>
							</div>
							<div class="av-column-10 my-auto">
								<div class="theme-menu">
									<nav class="menubar">
										 <?php 
											wp_nav_menu( 
												array(  
													'theme_location' => 'primary_menu',
													'container'  => '',
													'menu_class' => 'menu-wrap',
													'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
													'walker' => new WP_Bootstrap_Navwalker()
													 ) 
												);
										?>                   
									</nav>
									<div class="menu-right">
										<ul class="header-wrap-right">
											<?php $avril_hide_show_search 		= get_theme_mod( 'hide_show_search','1'); ?>
											<?php if($avril_hide_show_search == '1') { ?>
											<li class="search-button">
												<button id="view-search-btn" class="header-search-toggle"><i class="fa fa-search"></i></button>
											</li>  
											<?php } ?>
											<?php 
												$avril_hide_show_nav_btn 	= get_theme_mod( 'hide_show_nav_btn','1'); 
												$avril_nav_btn_lbl 			= get_theme_mod( 'nav_btn_lbl');
												$avril_nav_btn_link 		= get_theme_mod( 'nav_btn_link');
											?>
											<?php if($avril_hide_show_nav_btn == '1') { ?>
												 <?php if ( ! empty( $avril_nav_btn_lbl ) ) : ?>
													<li class="av-button-area">
														<a href="<?php echo esc_url($avril_nav_btn_link);?>" target="_blank" class="av-btn av-btn-primary av-btn-effect-1"><?php echo esc_html($avril_nav_btn_lbl);?></a>
													</li> 
												<?php endif; ?>	
											<?php } ?>	
										</ul>                            
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--===// End:  Navigation
			=================================-->
		</div>
		<?php if($avril_hide_show_search == '1') { ?>
		<!-- Quik search -->
		<div class="view-search-btn header-search-popup">
			<div class="search-overlay-layer"></div>
			<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Site Search', 'avril' ); ?>">
				<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'avril' ); ?></span>
				<input type="search" class="search-field header-search-field" placeholder="<?php esc_attr_e( 'Type To Search', 'avril' ); ?>" name="s" id="popfocus" value="" autofocus>
				<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
			</form>
			<button type="button" class="close-style header-search-close"></button>
		</div>
		<!-- / -->
		<?php } ?>
</header>
<!-- End: Header
    =================================-->
<?php
	if ( !is_page_template( 'templates/template-homepage.php' ) ) {
	avril_breadcrumbs_style();  
	}
?>	