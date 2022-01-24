<?php
$activate = array(
        'boostify-sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'boostify-footer-widget-area' => array(
			 'text-1',
            'categories-1',
            'archives-1',
			'search-1',
        )
    );
    /* the default titles will appear */
   update_option('widget_text', array(
        1 => array('title' => '',
        'text'=>'<div class="widget_about"><div class="footer-logo"><img src="'.CLEVERFOX_PLUGIN_URL.'inc/boostify/images/logo.png" alt=""></div>
                        <p>There are many variations of dummy passages of Lorem Ipsum a available, but the majority have suffered that is alteration in some that form  injected humour or randomised.</p><ul class="widget-info">
                            <li><i class="fa fa-phone"></i>012-345-789</li>
                            <li><i class="fa fa-globe"></i>www.yourdomain.com</li>
                            <li><i class="fa fa-envelope"></i>yourmail@gmail.com</li>
                        </ul></div>
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
	$MediaId = get_option('boostify_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );
?>