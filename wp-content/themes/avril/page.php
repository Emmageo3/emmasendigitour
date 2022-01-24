<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package avril
 */

get_header();
?>
<section id="post-section" class="post-section av-py-default blog-page">
	<div class="av-container">
		<div class="av-columns-area wow fadeInUp">
				<div id="av-primary-content" class="<?php esc_attr(avril_post_layout()); ?> wow fadeInUp">
				<?php 		
					if( have_posts()) :  the_post();
					
					the_content(); 
					endif;
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section> 	
<?php get_footer(); ?>