<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Avril
 */

get_header();
?>
<section id="404-section" class="404-section av-py-default">
	<div class="av-container">
		<div class="av-columns-area wow fadeInUp">
			<div class="av-column-12">
				<div class="av-text-404">
					<h1>
						<?php esc_html_e('4','avril'); ?>
						<img src=<?php echo esc_url(get_template_directory_uri()."/assets/images/bg/smile.svg"); ?> alt="" width="335">	
						<?php esc_html_e('4','avril'); ?>
					</h1>
					<h2><?php esc_html_e('Oups! We can’t find the page you’re looking for…','avril'); ?></h2>	
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="av-btn av-btn-primary"><i class="fa fa-angle-left"></i>    <?php esc_html_e('Go To Home','avril'); ?></a>   
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
