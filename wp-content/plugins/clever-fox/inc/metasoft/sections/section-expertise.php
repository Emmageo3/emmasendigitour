<?php 
if ( ! function_exists( 'metasoft_lite_expertise' ) ) :
	function metasoft_lite_expertise() {
	$expertise_home_hs		= get_theme_mod('expertise_home_hs','1');
	$expertise_title  = get_theme_mod('expertise_title','Our <span class="text-primary">Core Expertise</span>');
	$expertise_description   = get_theme_mod('expertise_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.');
	$expertise_hs	= get_theme_mod('expertise_hs','1');
	$expt_success_hs	= get_theme_mod('expt_success_hs','1');
if(!empty($expertise_home_hs)){	
?> 
<!-- Our Core Expertise Start -->
<section id="expertise-wrapper" class="expertise-wrapper bs-py-default expertise-home">
	<div class="container">
		<?php if ( ! empty( $expertise_title ) || ! empty( $expertise_description )) : ?>
			<div class="row">
				<div class="col-lg-7 col-12 mx-lg-auto mb-5 text-center">
					<div class="heading-seprator wow fadeInUp">
						<?php if ( ! empty( $expertise_title ) ) : ?>
							<h1><?php echo wp_kses_post($expertise_title); ?></h1>
						<?php endif; ?>
						
						<?php if ( ! empty( $expertise_description ) ) : ?>
							<p><?php echo esc_html($expertise_description); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row g-4">
			<?php if($expt_success_hs !=='1'): ?>
				<div class="col-md-12 col-lg-12">
			<?php else: ?>	
				<div class="col-md-12 col-lg-8">
			<?php endif; ?>	
				<?php 
					$expertise_contents	= get_theme_mod('expertise_contents',metasoft_get_expertise_default());
				if($expertise_hs =='1'): ?>
					<div class="row g-4 expertise-content">
						<?php
						if ( ! empty( $expertise_contents ) ) {
						$expertise_contents = json_decode( $expertise_contents );
						foreach ( $expertise_contents as $expertise_item ) {
							$title = ! empty( $expertise_item->title ) ? apply_filters( 'metasoft_translate_single_string', $expertise_item->title, 'Expertise section' ) : '';
							$text = ! empty( $expertise_item->text ) ? apply_filters( 'metasoft_translate_single_string', $expertise_item->text, 'Expertise section' ) : '';
							$icon = ! empty( $expertise_item->icon_value ) ? apply_filters( 'metasoft_translate_single_string', $expertise_item->icon_value, 'Expertise section' ) : '';
					?>
						<div class="col-sm-6 ?>">
							<div class="expertise-item">
								<div class="expertise-icon">
									<?php if ( ! empty( $icon ) ) {?>
										<span class="icon"><i class="fa <?php echo esc_attr( $icon ); ?>"></i></span>
									<?php } ?>
								</div>
								<div class="expertise-card">
									<?php if(!empty($title)): ?>
										<h5><a href="javascript:void(0);"><?php echo esc_html($title); ?></a></h5>
									<?php endif; ?>	
									<?php if(!empty($text)): ?>
										<p><?php echo esc_html($text); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php } } ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if($expertise_hs !=='1'): ?>
				<div class="col-md-6 col-lg-12">
			<?php else: ?>	
				<div class="col-md-6 col-lg-4">
			<?php endif; ?>	
			<?php 
				$expt_success_img	= get_theme_mod('expt_success_img',CLEVERFOX_PLUGIN_URL .'inc/metasoft/images/thumbsup.png');
				$expt_success_ttl	= get_theme_mod('expt_success_ttl','We deliver success to our traders');
				$expt_success_desc	= get_theme_mod('expt_success_desc','Need guidance in creating and managing successful investment portfolio?');
				$expt_success_btn_icon	= get_theme_mod('expt_success_btn_icon','fa-angle-right');
				$expt_success_btn_lbl	= get_theme_mod('expt_success_btn_lbl','Contact Us');
				$expt_success_btn_url	= get_theme_mod('expt_success_btn_url');
				if($expt_success_hs =='1'): ?>
					<div class="success-info">
						<div class="success-inner">
							<?php if(!empty($expt_success_img)): ?>
								<img src="<?php echo esc_url($expt_success_img); ?>" alt="">
							<?php endif; ?>	
							
							<?php if(!empty($expt_success_ttl)): ?>
								<h5><?php echo esc_html($expt_success_ttl); ?></h5>
							<?php endif; ?>	
							
							<?php if(!empty($expt_success_desc)): ?>
								<p><?php echo esc_html($expt_success_desc); ?></p>
							<?php endif; ?>
							
							<?php if(!empty($expt_success_btn_lbl) || !empty($expt_success_btn_icon)): ?>
								<a href="<?php echo esc_url($expt_success_btn_url); ?>" class="btn btn-border-primary btn-like-icon"><?php echo esc_html($expt_success_btn_lbl); ?> <span class="bticn"><i class="fa <?php echo esc_attr($expt_success_btn_icon); ?>"></i></span></a>
							<?php endif; ?>
							
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php	
}}
endif;
if ( function_exists( 'metasoft_lite_expertise' ) ) {
$section_priority = apply_filters( 'metasoft_section_priority', 14, 'metasoft_lite_expertise' );
add_action( 'metasoft_sections', 'metasoft_lite_expertise', absint( $section_priority ) );
}
?>
<!-- Our Core Expertise End -->
	