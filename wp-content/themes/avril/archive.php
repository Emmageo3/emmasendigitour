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
<section id="post-section" class="post-section av-py-default blog-page">
	<div class="av-container">
		<div class="av-columns-area wow fadeInUp">
				<div id="av-primary-content" class="<?php esc_attr(avril_post_layout()); ?>  wow fadeInUp">
			
				<?php if( have_posts() ): ?>
				
					<?php while( have_posts() ) : the_post();
					
							get_template_part('template-parts/content/content','page'); 
							
					endwhile; ?>
					
				<?php else: ?>
				
					<?php get_template_part('template-parts/content/content','none'); ?>
					
				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section> 
<?php get_footer(); ?>
