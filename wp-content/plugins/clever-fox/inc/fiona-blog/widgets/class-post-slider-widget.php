<?php
/**
 * Register Post Categories widget
 *
 */
class fiona_blog_post_categories_widget extends WP_Widget{
	
	function __construct() {
		parent::__construct(
			'fiona_blog_post_categories_widget', // Base ID
			__('Fiona : Post Categories','fiona'), // Name
			array( 'description' => __('Post Categories widget', 'fiona' ), ) // Args
		);
	}
	
	public function widget( $args , $instance ) {
		
			echo $args['before_widget'];
			$post_cat_title = isset($instance['post_cat_title']) ? $instance['post_cat_title'] : null;
			$selected_cat_id = isset($instance['selected_cat_id']) ? $instance['selected_cat_id'] : 0;
			$post_display_num = isset($instance['post_display_num']) ? $instance['post_display_num'] : 0;
			if(($instance['selected_cat_id']) !=null) {
			?>
			
				<?php 	
				$all_posts = fiona_blog_get_cat_posts($post_display_num, $selected_cat_id);
				if ( ! empty( $post_cat_title ) ) :
				?>
				<h5 class="widget-title"><?php echo esc_html($post_cat_title); ?></h5>
				<?php endif; ?>
				<div class="post-widgeted">
					<?php
						if ($all_posts->have_posts()) :
						while ($all_posts->have_posts()) : $all_posts->the_post();
							global $post;
					?>
					
					<article class="post-item-list">
						<figure class="post-image-figure">
							<div class="post-image">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
							</div>
						</figure>
						<div class="post-content">
							<!--div class="post-meta">
								<span class="post-list">
									<ul class="post-categories"><li><a href="<?php esc_url(the_permalink()); ?>"><?php the_category(' '); ?></a></li></ul>
								</span>
								<span class="author-name">
									<i class="fa fa-user-secret"></i> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?></a>
								</span>
							</div-->
							<?php     
								if ( is_single() ) :
								
								the_title('<h5 class="post-title">', '</h5>' );
								
								else:
								
								the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
								
								endif; 
								
								/*the_content( 
										sprintf( 
											__( 'Read More', 'clever-fox' ), 
											'<span class="screen-reader-text">  '.get_the_title().'</span>' 
										) 
									);*/
							?> 
							<div class="post-meta">
								<span class="posted-on post-date">
									<a href="<?php echo esc_url(the_date('Y/m/d')); ?>"><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_date('M j Y')); ?></a>
								</span>
							</div>
						</div>
					</article>
					<?php
						endwhile;
						endif;
						wp_reset_postdata();
					?>
				</div>
			<?php }			
		echo $args['after_widget'];
	}
	
		public function form( $instance ) {
		$instance['post_cat_title'] = isset($instance['post_cat_title']) ? $instance['post_cat_title'] : '';
		$instance['selected_cat_id'] = isset($instance['selected_cat_id']) ? $instance['selected_cat_id'] : '';
		$instance['post_display_num'] = isset($instance['post_display_num']) ? $instance['post_display_num'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'post_cat_title' ); ?>"><?php _e( 'Post Category Title','fiona' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'post_cat_title' ); ?>" name="<?php echo $this->get_field_name( 'post_cat_title' ); ?>" type="text" value="<?php if($instance[ 'post_cat_title' ]) echo esc_html( $instance[ 'post_cat_title' ] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'selected_cat_id' ); ?>"><?php _e('Select Post Categories','fiona'); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'selected_cat_id' ); ?>" name="<?php echo $this->get_field_name( 'selected_cat_id' ); ?>">
				<option value>--<?php echo __('Select','fiona'); ?>--</option>
				<?php
					$selected_cat_id = $instance['selected_cat_id'];
					$categories = get_categories();
					foreach ($categories as $category) { 
						$option = '<option value="' . $category->term_id . '" ';
						$option .= ( $category->term_id == $selected_cat_id  ) ? 'selected="selected"' : '';
						$option .= '>';
						$option .= $category->name;
						$option .= '</option>';
						echo $option;
					}
				?>	
			</select>
			<br/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'post_display_num' ); ?>"><?php _e( 'No. of Post Display','fiona' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'post_display_num' ); ?>" name="<?php echo $this->get_field_name( 'post_display_num' ); ?>" type="number" value="<?php if($instance[ 'post_display_num' ]) echo esc_html( $instance[ 'post_display_num' ] ); ?>" />
		</p>
		<?php  ?>
        </select>
	<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['post_cat_title'] = ( ! empty( $new_instance['post_cat_title'] ) ) ? $new_instance['post_cat_title'] : '';
		$instance['selected_cat_id'] = ( ! empty( $new_instance['selected_cat_id'] ) ) ? $new_instance['selected_cat_id'] : '';
		$instance['post_display_num'] = ( ! empty( $new_instance['post_display_num'] ) ) ? $new_instance['post_display_num'] : '';
		
		return $instance;
	}
}