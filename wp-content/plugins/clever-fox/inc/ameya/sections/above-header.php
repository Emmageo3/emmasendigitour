<?php
	if ( ! function_exists( 'conceptly_above_header' ) ) :
	function conceptly_above_header() {
	$hide_show_preloader		= get_theme_mod('hide_show_preloader','0');
	$hide_show_social_icon		= get_theme_mod('hide_show_social_icon','1');
	$social_icons				= get_theme_mod('social_icons',conceptly_get_social_icon_default());
	$hide_show_contact_infot	= get_theme_mod('hide_show_contact_infot','1');
	$header_email_icon			= get_theme_mod('header_email_icon','fa-envelope-o');
	$header_email				= get_theme_mod('header_email','email@companyname.com');
	$header_phone_icon			= get_theme_mod('header_phone_icon','fa-phone'); 
	$header_phone_number		= get_theme_mod('header_phone_number','+1 514-286-4242');
	$header_faq_icon 			= get_theme_mod('header_faq_icon','fa-question');
	$header_faq 				= get_theme_mod('header_faq','Ask Your Question');
	$sticky_header_setting		= get_theme_mod('sticky_header_setting','1'); 
	$hide_show_email_infot		= get_theme_mod('hide_show_email_infot','1');
	$hide_show_faq				= get_theme_mod('hide_show_faq','1');
	
?>

 <!-- Start: Header Top
    ============================= -->
    <div id="header-top" class="header-above">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 text-lg-left text-center my-auto">
                    <ul class="header-info d-inline-block">
						<?php if($hide_show_contact_infot =='1'){ ?>
							<?php if($header_phone_number) {?>
								<li class="tlh-phone"><a href="#"><i class="fa <?php echo esc_attr($header_phone_icon); ?>"></i><?php echo esc_html($header_phone_number); ?></a></li>
							<?php 
									} 
								}
							?>
						<?php if($hide_show_email_infot =='1'){ ?>
							<?php if($header_email) {?>
								<li class="tlh-email"><a href="#"><i class="fa <?php  echo esc_attr( $header_email_icon ); ?>"></i><?php echo $header_email; ?></a></li>
							<?php } ?>	
						<?php } ?>
						<?php if($hide_show_faq =='1'){ ?>
							<?php if($header_faq) {?>
								<li class="tlh-faq"><a href="#"><i class="fa <?php echo esc_attr($header_faq_icon); ?>"></i><?php echo $header_faq; ?></a></li>
							<?php } ?>
						<?php } ?>						
                    </ul>
                </div>
				
                <div class="col-lg-3 col-md-12 text-lg-right text-center my-auto">
					<?php if($hide_show_social_icon =='1') { ?>
                    <ul class="trh-social d-inline-block">
						<?php
							$social_icons = json_decode($social_icons);
							if( $social_icons!='' )
							{
							foreach($social_icons as $social_item){	
							$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'conceptly_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
							$social_link = ! empty( $social_item->link ) ? apply_filters( 'conceptly_translate_single_string', $social_item->link, 'Header section' ) : '';
						?>
							<li><a href="<?php echo esc_url( $social_link ); ?>" ><i class="fa <?php echo esc_attr( $social_icon ); ?> "></i></a></li>
						<?php								
							}
						 }
						?>
                    </ul>  
					<?php }	?>
                </div>
		     </div>
        </div>
    </div>
	<?php 
} endif;
add_action('conceptly_above_header', 'conceptly_above_header');
?>
