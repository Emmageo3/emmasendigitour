<?php
$theme = wp_get_theme(); // gets the current theme
if ( 'Belltech' == $theme->name){	
	$img_path = CLEVERFOX_PLUGIN_URL .'inc/belltech/images/footer-logo.png"';
}else{
	$img_path = CLEVERFOX_PLUGIN_URL .'inc/metasoft/images/footer-logo.png"';
}
$activate = array(
        'metasoft-sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'metasoft-footer-widget-area' => array(
			 'text-1',
            'categories-1',
            'archives-1',
			'search-1',
        )
    );
    /* the default titles will appear */
   update_option('widget_text', array(
        1 => array('title' => '',
        'text'=>'<div class="logo"><a href="javascript:void(0);"><img src="'.$img_path.'" alt="Metrico "></a></div><p>Etiam magna arcu, ullamcorper ut pulvinar et, ornare sit amet ligula. Aliquam vitae bibendum lorem. Cras id dui lectus. Pellentesque nec felis tristique urna lacinia sollicitudin ac ac ex. Maecenas mattis faucibus condimentum. Curabitur imperdiet felis at est.</p><div class="theme-link"><a href="javascript:void(0);" class="read-link">Read More</a></div>'),        
		2 => array('title' => 'Recent Posts'),
		3 => array('title' => 'Categories'), 
        ));
		 update_option('widget_categories', array(
			1 => array('title' => 'Categories'), 
			2 => array('title' => 'Categories')));

		update_option('widget_archives', array(
			1 => array('title' => 'Archives'), 
			2 => array('title' => 'Archives')));
			
		update_option('widget_search', array(
			1 => array('title' => 'Search'), 
			2 => array('title' => 'Search')));	
		
    update_option('sidebars_widgets',  $activate);
	$MediaId = get_option('metasoft_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );