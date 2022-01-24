<?php
function startkit_own_theme_typography() {
	$hide_show_typography= get_theme_mod('hide_show_typography','off');
	if( $hide_show_typography == '1' ):
	
		$body_typography_font_weight = get_theme_mod('body_typography_font_weight','Bold');
		$body_font_size = get_theme_mod('body_font_size','16');
		
		$para_font_weight = get_theme_mod('para_font_weight','normal');
		$paragraph_font_size = get_theme_mod('paragraph_font_size','16');
		$paragraph_line_height = get_theme_mod('paragraph_line_height','26');
		
		$h1_font_weight = get_theme_mod('h1_font_weight','normal');
		$h1_font_size = get_theme_mod('h1_font_size','36');
		$h1_line_height = get_theme_mod('h1_line_height','46');
		$h1_text_transform = get_theme_mod('h1_text_transform','capitalize');
		
		$h2_font_weight = get_theme_mod('h2_font_weight','normal');
		$h2_font_size = get_theme_mod('h2_font_size','32');
		$h2_line_height = get_theme_mod('h2_line_height','46');
		$h2_text_transform = get_theme_mod('h2_text_transform','capitalize');
		
		$h3_font_weight = get_theme_mod('h3_font_weight','normal');
		$h3_font_size = get_theme_mod('h3_font_size','28');
		$h3_line_height = get_theme_mod('h3_line_height','34');
		$h3_text_transform = get_theme_mod('h3_text_transform','capitalize');
		
		$h4_font_weight = get_theme_mod('h4_font_weight','normal');
		$h4_font_size = get_theme_mod('h4_font_size','24');
		$h4_line_height = get_theme_mod('h4_line_height','28');
		$h4_text_transform = get_theme_mod('h4_text_transform','capitalize');
		
		$h5_font_weight = get_theme_mod('h5_font_weight','normal');
		$h5_font_size = get_theme_mod('h5_font_size','20');
		$h5_line_height = get_theme_mod('h5_line_height','15');
		$h5_text_transform = get_theme_mod('h5_text_transform','capitalize');
		
		$h6_font_weight = get_theme_mod('h6_font_weight','normal');
		$h6_font_size = get_theme_mod('h6_font_size','16');
		$h6_line_height = get_theme_mod('h6_line_height','24');
		$h6_text_transform = get_theme_mod('h6_text_transform','capitalize');
		
		$menu_font_weight = get_theme_mod('menu_font_weight','normal');
		$menu_font_size = get_theme_mod('menu_font_size','15');
		$menu_text_transform = get_theme_mod('menu_text_transform','normal');
		
		$section_tit_font_weight = get_theme_mod('section_tit_font_weight','normal');
		$section_tit_font_size = get_theme_mod('section_tit_font_size','36');
		
		$section_des_font_weight = get_theme_mod('section_des_font_weight','normal');
		$section_desc_font_size = get_theme_mod('section_desc_font_size','16');
	?>
<style type="text/css">
/*=========================================
    Primary Color
=========================================*/

body {
    font-style:  <?php echo $body_typography_font_weight; ?>!important;
    font-weight: 400;
	line-height: 46px;
    font-size: <?php echo $body_font_size; ?>px!important;
}

.main-menu ul li a {
    padding: 10px 10px;
    color: #6a7d92;
    -webkit-transition: .3s;
    transition: .3s;
    display: block;
    font-size: <?php echo $menu_font_size; ?>px!important;
    font-weight: 500;
    font-family: 'Roboto', sans-serif;
	font-style: <?php echo $menu_font_weight; ?>!important;
	text-transform: <?php echo $menu_text_transform; ?>!important;
}

h1 {
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
	line-height: <?php echo $h1_line_height; ?>px;
	font-size: <?php echo $h1_font_size; ?>px;
	text-transform: <?php echo $h1_text_transform; ?>;
	font-style: <?php echo $h1_font_weight; ?>;
}

h1,
h2,
h3,
h4,
h5,
h6,
p {
    margin: 0;
}

h2 {
    font-family: 'Poppins', sans-serif;
    font-size: <?php echo $h2_font_size; ?>px;
    line-height: <?php echo $h2_line_height; ?>px;
    font-weight: 500;
	text-transform:   <?php echo $h2_text_transform; ?>;
	font-style: <?php echo $h2_font_weight; ?>;
}

h3,
h4,
h5,
h6 {
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
}

h3 {
    font-size: <?php echo $h3_font_size; ?>px!important;
     line-height: <?php echo $h3_line_height; ?>px!important;
	 text-transform: <?php echo $h3_text_transform; ?>!important;
	 font-style: <?php echo $h3_font_weight; ?>!important;
}

h4 {
    font-size: <?php echo $h4_font_size; ?>px!important;
     line-height: <?php echo $h4_line_height; ?>px!important;
	 text-transform:<?php echo $h4_text_transform; ?>!important;
	 font-style: <?php echo $h4_font_weight; ?>!important;
}

h5 {
    font-size: <?php echo $h5_font_size; ?>px!important;
     line-height: <?php echo $h5_line_height; ?>px!important;
	 text-transform: <?php echo $h5_text_transform; ?>!important;
	 font-style: <?php echo $h5_font_weight; ?>!important;
}

h6 {
    font-size: <?php echo $h6_font_size; ?>px!important;
     line-height: <?php echo $h6_line_height; ?>px!important;
	 text-transform: <?php echo $h6_text_transform; ?>!important;
	 font-style: <?php echo $h6_font_weight; ?>!important;
}
p, p.small {
    font-family: 'Roboto', sans-serif;
     font-size: <?php echo $paragraph_font_size; ?>px!important;
    line-height: <?php echo $paragraph_line_height; ?>px!important;
	font-style: <?php echo $para_font_weight; ?>!important;
    font-weight: 400;
}


.section-header h2 {
    font-family: 'Roboto', sans-serif;
	font-style: <?php echo $section_tit_font_weight; ?>!important;
	font-size:<?php echo $section_tit_font_size; ?>px!important;
	line-height: normal !important;
	word-break: break-word;
}
.section-header p {
    font-family: 'Roboto', sans-serif;
	font-style: <?php echo $section_des_font_weight; ?>!important;
	font-size:<?php echo $section_desc_font_size; ?>px!important;
	line-height: normal !important;
}

</style>

<?php endif;
} 
add_action('wp_head','startkit_own_theme_typography');
?>
