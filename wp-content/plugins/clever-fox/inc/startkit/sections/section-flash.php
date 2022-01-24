<?php
if ( ! function_exists( 'startkit_info_plu' ) ) :

	function startkit_info_plu() {
	$hide_show_info			= get_theme_mod('hide_show_info','1');
	$info_icons				= get_theme_mod('info_icons','fa-envelope');
	$info_title				= get_theme_mod('info_title','Design For Business');
	$info_description		= get_theme_mod('info_description','The chunk standard of Lorem Ipsum used since the 900s is reproduced below');
	$info_icons2			= get_theme_mod('info_icons2','fa-cart-plus');
	$info_title2			= get_theme_mod('info_title2','Develop For Work');
	$info_description2		= get_theme_mod('info_description2','The chunk standard of Lorem Ipsum used since the 900s is reproduced below');  
	$info_icons3			= get_theme_mod('info_icons3','fa-life-saver'); 
	$info_title3			= get_theme_mod('info_title3','Maketing For Blast');
	$info_description3		= get_theme_mod('info_description3','The chunk standard of Lorem Ipsum used since the 900s is reproduced below'); 
?>
<!-- Start: Features List
    ============================= -->
<?php if($hide_show_info == '1') { ?>
    <section id="features-list">
        <div class="container">
            <div class="row">
				<div class="col-md-4 mb-lg-0 mb-5">
					<div class="features-list-item first wow fadeInUp" data-wow-delay="0.1s">
						<div class="features-icon">
							<span class="icon"><i class="fa <?php echo esc_attr( $info_icons ); ?>"></i></span>
						</div>
						<div class="features-content">
							<h4><?php echo esc_html( $info_title ); ?></h4>
							<p class="small"><?php echo wp_kses_post( $info_description ); ?></p>
							<!--a href="#" class="view-more">Read More</a-->
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-lg-0 mb-5">
					<div class="features-list-item second wow fadeInUp" data-wow-delay="0.1s">
						<div class="features-icon">
							<span class="icon"><i class="fa <?php echo esc_attr( $info_icons2 ); ?>"></i></span>
						</div>
						<div class="features-content">
							<h4><?php echo esc_html( $info_title2 ); ?></h4>
							<p class="small"><?php echo wp_kses_post( $info_description2 ); ?></p>
							<!--a href="#" class="view-more">Read More</a-->
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-lg-0 mb-5">
					<div class="features-list-item third wow fadeInUp" data-wow-delay="0.1s">
						<div class="features-icon">
							<span class="icon"><i class="fa <?php echo esc_attr( $info_icons3 ); ?>"></i></span>
						</div>
						<div class="features-content">
							<h4><?php echo esc_html( $info_title3 ); ?></h4>
							<p class="small"><?php echo wp_kses_post( $info_description3 ); ?></p>
							<!--a href="#" class="view-more">Read More</a-->
						</div>
					</div>
				</div>
            </div>
        </div>
    </section>
<?php } 
 }
endif;
if ( function_exists( 'startkit_info_plu' ) ) {
$section_priority = apply_filters( 'startkit_section_priority', 12, 'startkit_info_plu' );
add_action( 'startkit_sections', 'startkit_info_plu', absint( $section_priority ) );
}
