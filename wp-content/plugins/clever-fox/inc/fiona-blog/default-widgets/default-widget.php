<?php
$theme = wp_get_theme(); // gets the current theme
if( 'Fiona Food' == $theme->name){
	$img_path = CLEVERFOX_PLUGIN_URL .'inc/fiona-food/images/logo.png"';
}elseif( 'Fiona News' == $theme->name){
	$img_path = CLEVERFOX_PLUGIN_URL .'inc/fiona-news/images/logo.png"';
}else{
	$img_path = CLEVERFOX_PLUGIN_URL .'inc/fiona-blog/images/logo.png"';
}
$activate = array(
        'fiona-blog-sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'fiona-blog-footer-widget-area' => array(
			 'text-1',
            'categories-1',
            'archives-1',
			'search-1',
        )
    );
    /* the default titles will appear */
   update_option('widget_text', array(
        1 => array('title' => '',
        'text'=>'<div class="footer-logo"><img src="'.$img_path.'" alt=""></div>
                        <p>There are many variations of dummy passages of Lorem Ipsum a available, but the majority have suffered that is alteration in some that form  injected humour or randomised.</p>
		'),        
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
	$MediaId = get_option('fiona_blog_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );