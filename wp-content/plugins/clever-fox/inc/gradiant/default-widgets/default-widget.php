<?php
$activate = array(
        'gradiant-sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'gradiant-footer-1' => array(
			 'text-1',
        ),
		'gradiant-footer-2' => array(
			 'categories-1',
        ),
		'gradiant-footer-3' => array(
			 'search-1',
        )
    );
    /* the default titles will appear */
   update_option('widget_text', array(  
		1 => array('title' => 'About Gradiant"',
        'text'=>'<div class="textwidget">
				<p>It is a long established fact that reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
				<div class="footer-badge">
					<img src="'.CLEVERFOX_PLUGIN_URL.'inc/gradiant/images/footer/about-01.png" alt="">
					<img src="'.CLEVERFOX_PLUGIN_URL.'inc/gradiant/images/footer/about-02.png" alt="">
					<img src="'.CLEVERFOX_PLUGIN_URL.'inc/gradiant/images/footer/about-03.png" alt="">
				</div>
			</div>'),		
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
	$MediaId = get_option('gradiant_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );
?>