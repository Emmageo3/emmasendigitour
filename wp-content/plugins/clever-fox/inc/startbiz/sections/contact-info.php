<?php
if ( ! function_exists( 'startbiz_contact_info' ) ) :

	function startbiz_contact_info() {
	$hs_hdr_nav_ct_info			= get_theme_mod('hs_hdr_nav_ct_info','1');
	$hdr_nav_ct_info_icon		= get_theme_mod('hdr_nav_ct_info_icon','fa-phone');
	$hdr_nav_ct_info_ttl		= get_theme_mod('hdr_nav_ct_info_ttl','CALL FOR EMRGENCY');
	$hdr_nav_ct_info_subttl		= get_theme_mod('hdr_nav_ct_info_subttl','+1-900-242-23-23');
	$hdr_nav_ct_info_url		= get_theme_mod('hdr_nav_ct_info_url');
	if($hs_hdr_nav_ct_info =='1'){
?>
    <div class="emergency-call">
		<div class="contact-area">
			<a href="<?php echo esc_url($hdr_nav_ct_info_url); ?>" class="contact-info">
				<?php if ( ! empty($hdr_nav_ct_info_ttl) ) : ?>
					<span class="text"><?php echo esc_html($hdr_nav_ct_info_ttl); ?></span>
				<?php endif; ?>	
				
				<?php if ( ! empty($hdr_nav_ct_info_subttl) ) : ?>
					<span class="title"><?php echo esc_html($hdr_nav_ct_info_subttl); ?></span>
				<?php endif; ?>
			</a>
			
			<?php if ( ! empty($hdr_nav_ct_info_icon) ) : ?>
				<div class="contact-icon">
					<i class="fa <?php echo esc_attr($hdr_nav_ct_info_icon); ?>"></i>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php 
	}}
add_action('startbiz_contact_info','startbiz_contact_info');
endif;