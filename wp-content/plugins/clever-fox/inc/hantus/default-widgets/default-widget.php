<?php
$activate = array(
        'hantus-sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'hantus-footer-widget-area' => array(
			 'text-1',
            'categories-1',
            'archives-1',
			'search-1',
        )
    );
    /* the default titles will appear */
   update_option('widget_text', array(
        1 => array('title' => '',
        'text'=>'<div class="footer-logo"><img src="'.CLEVERFOX_PLUGIN_URL.'inc/hantus/images/logo.png" alt=""></div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                        <ul class="widget-info">
                            <li><i class="fa fa-map-marker"></i>198 Collins St, Melbourne, NY</li>
                            <li><i class="fa fa-phone"></i>12) 345 678 910</li>
                            <li><i class="fa fa-envelope"></i>email@companyname.com</li>
                        </ul>
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
	$MediaId = get_option('hantus_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );
?>