<!--===// Start: Footer
    =================================-->
    <footer id="footer-section" class="footer-section footer footer-dark">
		<?php if ( is_active_sidebar( 'avril-footer-widget-area' ) ) { ?>
			<div class="footer-main">
				<div class="av-container">
					<div class="av-columns-area wow fadeInDown">
						<?php  dynamic_sidebar( 'avril-footer-widget-area' ); ?>
					</div>
				</div>
			</div>
		<?php } ?>	
		 <div class="footer-copyright">
            <div class="av-container">
                <div class="av-columns-area">
						<div class="av-column-12 av-md-column-12">
							<div class="footer-copy widget-center">
								<div class="copyright-text">
									<?php 
										$copyright_content 		= get_theme_mod('copyright_content','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
										$avril_copyright_allowed_tags = array(
											'[current_year]' => date_i18n('Y'),
											'[site_title]'   => get_bloginfo('name'),
											'[theme_author]' => sprintf(__('<a href="https://www.nayrathemes.com/avril-free/" target="_blank">Avril WordPress Theme</a>', 'avril')),
										);	
										echo apply_filters('avril_footer_copyright', wp_kses_post(avril_str_replace_assoc($avril_copyright_allowed_tags, $copyright_content)));
									?>
								</div>	
							</div>
						</div>					
                </div>
            </div>
        </div>
    </footer>
    <!-- End: Footer
    =================================-->
	 <!-- ScrollUp -->
	 <?php 
		$hs_scroller 	= get_theme_mod('hs_scroller','1');	
		if($hs_scroller == '1') :
	?>
		<button type=button class="scrollup"><i class="fa fa-arrow-up"></i></button>
	<?php endif; ?>	
  <!-- / -->  
</div>
</div>
<?php 
wp_footer(); ?>
</body>
</html>
