<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
				<div id="av-primary-content" class="<?php esc_attr(avril_post_layout()); ?>  wow fadeInUp">
				<?php 
					$avril_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'post','paged'=>$avril_paged );	
				?>
				<?php if( have_posts() ): ?>
					<?php while( have_posts() ) : the_post(); 
							get_template_part('template-parts/content/content','page'); 
					endwhile; ?>			
			
					<!-- Pagination -->
						<?php								
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>',
						) ); ?>
				<!-- Pagination -->	
				
				<?php else: ?>
					<?php get_template_part('template-parts/content/content','none'); ?>
				<?php endif; ?>
			</div>
			<?php get_sidebar();  ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
