<?php
$activate = array(
		'sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'footer-widget-area' => array(
            'text-1',
			'categories-1',
            'archives-1',
			'search-1',
        ),
    );
    /* the default titles will appear */
   update_option('widget_text', array(
        1 => array('title' => '',
        'text'=>'<div class="footer-logo"><img class="img-responsive" src="'.CLEVERFOX_PLUGIN_URL.'inc/arowana/images/footerlogo.png" alt="Logo" /><div>
		<p class="widget-text">Gonsectetur adipi sicing elit, sed do eiusmod tempor incididunt labore et.dolore magna aliquauis a irure dolor eiusmod.</p><a href="#">Go for details <i class="fa fa-long-arrow-right"></i></a>
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
	$MediaId = get_option('startkit_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );
?>