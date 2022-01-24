<?php
$MediaId = get_option('fiona_blog_media_id');
$title = "Spending a day in Paris, The best place to go";
$content='<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever.</p>';
$title2 = "A New Age For Trade & Supply Chain Finance";
$title3 = "Ranking for keywords around the products";

$postData = array(
				array(
					'post_title' => $title,
					'post_status' => 'publish',
					'post_content' => $content,
					'post_author' => 1,
					'post_type'         =>   'post',
					'post_category' => array(),
					'tax_input'    => array(
						'post_tag' => array('Covid-19','News')
					),
				),
				array(
					'post_title' => $title2,
					'post_status' => 'publish',
					'post_content' => $content,
					'post_author' => 1,
					'post_type'         =>   'post',
					'post_category' => array(),
					'tax_input'    => array(
						'post_tag' => array('Trending', 'Latest')
					),
				),
				array(
					'post_title' => $title3,
					'post_status' => 'publish',
					'post_content' => $content,
					'post_author' => 1,
					'post_type'         =>   'post',
					'post_category' => array(),
					'tax_input'    => array(
						'post_tag' => array('News','Trending')
					),
				),
			);

kses_remove_filters();
//foreach ( $MediaId as $media) :
foreach ( $postData as $i => $postData1) : 
	$id = wp_insert_post($postData1);
	set_post_thumbnail( $id, $MediaId[$i + 1] );
endforeach;
//endforeach;
kses_init_filters();