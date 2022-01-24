<?php
/**
Template Name: Fullwidth Page
**/

get_header();
?>
<section class="post-section av-py-default">
	<div class="av-container">
		<div class="av-columns-area wow fadeInUp">
			<div class="av-column-12  wow fadeInUp">
				<?php 		
					the_post(); the_content(); 
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
		</div>
	</div>
</section> 
<?php get_footer(); ?>

