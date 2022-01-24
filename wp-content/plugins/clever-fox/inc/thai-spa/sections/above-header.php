<?php
	if ( ! function_exists( 'hantus_above_header' ) ) :
	function hantus_above_header() {
	?>
	<?php 
	$hide_show_social_icon		= get_theme_mod('hide_show_social_icon','1');
	$social_icons				= get_theme_mod('social_icons',hantus_get_social_icon_default());
	$hantus_time_icon			= get_theme_mod('hantus_time_icon','fa-clock-o');
	$hantus_timing				= get_theme_mod('hantus_timing','Opening Hours - 10 Am to 6 PM');
	$hide_show_contact_infot	= get_theme_mod('hide_show_contact_infot','1');
	$header_email_icon			= get_theme_mod('header_email_icon','fa-envelope-o');
	$header_email				= get_theme_mod('header_email','email@companyname.com');
	$header_phone_icon			= get_theme_mod('header_phone_icon','fa-phone'); 
	$header_phone_number		= get_theme_mod('header_phone_number','+12 345 678 910');
?>
     <div id="header-top">
		<div class="container">
			
			<div class="row">
				
				<div class="col-lg-6 col-md-6 text-center text-md-left left-top-header">
				<?php if($hide_show_social_icon == '1') { ?>
					<p class="time-details"><i class="fa <?php echo $hantus_time_icon; ?>"></i><?php echo $hantus_timing; ?></p>
					<ul class="header-social d-inline-block">
						<?php
							$social_icons = json_decode($social_icons);
							if( $social_icons!='' )
							{
							foreach($social_icons as $social_item){	
							$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'hantus_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
							$social_link = ! empty( $social_item->link ) ? apply_filters( 'hantus_translate_single_string', $social_item->link, 'Header section' ) : '';
						?>
							<li><a href="<?php echo esc_url( $social_link ); ?>" ><i class="fa <?php echo esc_attr( $social_icon ); ?> "></i></a></li>
						<?php								
							}
						 }
						?>
					</ul>
					<?php
						}
					?>
				</div>
				<?php  ?>
			<?php if($hide_show_contact_infot == '1' ) { ?>
				<div class="col-lg-6 col-md-6 text-center text-md-right header-top-right">
					<ul class="text-details">
						<li class="h-t-e"><a href="#"><i class="fa <?php  echo esc_attr( $header_email_icon ); ?>"></i><?php echo $header_email; ?></a></li>
						<li class="h-t-p"><a href="#"><i class="fa <?php  echo esc_attr( $header_phone_icon ); ?>"></i><?php echo $header_phone_number; ?></a></li>
					</ul>       
				</div>
			<?php } ?>	
			</div>
		</div>
	</div>    
	<?php 
} endif;
add_action('hantus_above_header', 'hantus_above_header');
