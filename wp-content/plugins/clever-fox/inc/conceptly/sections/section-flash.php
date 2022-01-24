<?php
		if ( ! function_exists( 'conceptly_lite_info' ) ) :
		function conceptly_lite_info() {
		$hide_show_info			= get_theme_mod('hide_show_info','1');
		$info_title				= get_theme_mod('info_title','Email Address');
		$info_description		= get_theme_mod('info_description','email@example.com');
		$info_title2			= get_theme_mod('info_title2','Customer Support');
		$info_description2		= get_theme_mod('info_description2','70 975 975 70');	
		$info_title3			= get_theme_mod('info_title3','Office Address');
		$info_description3		= get_theme_mod('info_description3','California Floor, USA 1208'); 
		$infos_first_icon_setting= get_theme_mod('infos_first_icon_setting','fa-envelope'); 
		$infos_second_icon_setting= get_theme_mod('infos_second_icon_setting','fa-life-ring'); 
		$infos_third_icon_setting= get_theme_mod('infos_third_icon_setting','fa-map-marker'); 
?>			
<!-- Start: Contact
    ============================= -->
<?php if($hide_show_info == '1') { ?>
    <section id="contact-info">
        <div class="container">
            <div class="contact-wrapper d-flex flex-wrap">
                <div class="single-contact info-first">
                	<div class="d-flex flex-md-row flex-column align-items-center">
                        <div class="single-icon">
							<i class="fa <?php echo esc_attr($infos_first_icon_setting);?>"></i>
							<div class="spin-circle"></div>
						</div>
						<div class="text-center text-md-left">
	                    	<h5><?php echo esc_attr( $info_title ); ?></h5>
                    		<p class="info-first-desc"><?php echo esc_attr( $info_description );?></p> 
	                    </div>
	                </div>
                </div>
                <div class="single-contact info-second">
                	<div class="d-flex flex-md-row flex-column align-items-center">
                        <div class="single-icon">
							<i class="fa <?php echo esc_attr($infos_second_icon_setting);?>"></i>
							<div class="spin-circle"></div>
						</div>
						<div class="text-center text-md-left">
	                    	<h5><?php echo esc_attr( $info_title2 ); ?></h5>
                    		<p class="info-second-desc"><?php echo esc_attr( $info_description2 );?></p> 
	                    </div>
	                </div>
                </div>
                <div class="single-contact info-third">
                	<div class="d-flex flex-md-row flex-column align-items-center">
                        <div class="single-icon">
							<i class="fa <?php echo esc_attr($infos_third_icon_setting);?>"></i>
							<div class="spin-circle"></div>
						</div>
						<div class="text-center text-md-left">
	                    	<h5><?php echo esc_attr( $info_title3 ); ?></h5>
                    		<p class="info-third-desc"><?php echo esc_attr( $info_description3 );?></p> 
	                    </div>
	                </div>
                </div>
            </div>
        </div>
    </section>
<?php 
	}
} endif; ?>
	<?php
	if ( function_exists( 'conceptly_lite_info' ) ) {
		$section_priority = apply_filters( 'conceptly_section_priority', 12, 'conceptly_lite_info' );
		add_action( 'conceptly_sections', 'conceptly_lite_info', absint( $section_priority ) );
	}