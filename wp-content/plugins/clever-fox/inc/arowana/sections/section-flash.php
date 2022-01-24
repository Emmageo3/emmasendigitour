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
    $info_contact_icon		= get_theme_mod('info_contact_icon','fa-phone');
	$info_contact_title		= get_theme_mod('info_contact_title','Contact Us Today!');
	$info_contact_desc		= get_theme_mod('info_contact_desc','+85-852-654');
?>
<!-- Start: Features List
    ============================= -->
<?php if($hide_show_info == '1') { ?>
    <section id="features-list">
        <div class="container">
            <div class="row text-lg-left text-md-center">
                <div class="col-lg-3 col-md-6 col-12 p-md-0 mt-md-0 mt-4">
                    <div class="featured-box wow fadeInUp first" data-wow-delay="0.1s">
                        <h5 class="title"><i class="fa <?php echo esc_attr( $info_icons ); ?>"></i> <?php echo esc_html( $info_title ); ?></h5>
                        <p><?php echo wp_kses_post( $info_description ); ?></p>
                       <!--a class="view-more" href="#">Read More</a-->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 p-md-0 mt-md-0 mt-4">
                    <div class="featured-box wow fadeInUp second" data-wow-delay="0.1s">
                        <h5 class="title"><i class="fa <?php echo esc_attr( $info_icons2 ); ?>"></i> <?php echo esc_html( $info_title2 ); ?></h5>
                        <p><?php echo wp_kses_post( $info_description2 ); ?></p>
                        <!--a class="view-more" href="#">Read More</a-->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 p-md-0 mt-md-0 mt-4">
                    <div class="featured-box wow fadeInUp third" data-wow-delay="0.1s">
                        <h5 class="title"><i class="fa <?php echo esc_attr( $info_icons3 ); ?>"></i> <?php echo esc_html( $info_title3 ); ?></h5>
                        <p><?php echo wp_kses_post( $info_description3 ); ?></p>
                        <!--a class="view-more" href="#">Read More</a-->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 p-md-0 mt-md-0 mt-4">
                    <div class="featured-box wow fadeInUp fourth" data-wow-delay="0.1s">
                        <h5 class="title"><i class="fa <?php echo esc_attr( $info_contact_icon ); ?>"></i> <?php echo esc_html( $info_contact_title ); ?></h5>
                        <p><?php echo wp_kses_post( $info_contact_desc ); ?></p>
                        <!--a class="view-more" href="#">Read More</a-->
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