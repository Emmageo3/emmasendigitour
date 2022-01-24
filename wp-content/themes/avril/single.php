<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avril
 */

get_header();
?>
 <section id="blog-section" class="blog-section av-py-default">
	<div class="av-container">
		<div class="av-columns-area">	
			<div id="av-primary-content" class="<?php esc_attr(avril_post_layout()); ?>  wow fadeInUp">
				<?php if( have_posts() ): ?>
					<?php while( have_posts() ): the_post(); ?>
						<?php get_template_part('template-parts/content/content','page'); ?> 
					<?php endwhile; ?>
				<?php endif; ?>
				
				<?php comments_template( '', true ); // show comments  ?>
			</div>
			<?php  get_sidebar();  ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
