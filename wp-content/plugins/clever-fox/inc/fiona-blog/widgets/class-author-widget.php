<?php
/**
 * Register Post Categories widget
 *
 */
class fiona_blog_author_widget extends WP_Widget{
	
	function __construct() {
		parent::__construct(
			'fiona_blog_author_widget', // Base ID
			__('Fiona : Author Widget','clever-fox'), // Name
			array( 'description' => __('Author widget', 'clever-fox' ), ) // Args
		);
	}
	
	public function widget( $args , $instance ) {
		
			echo $args['before_widget'];
			
			$selected_author_id 	= isset($instance['selected_author_id']) ? $instance['selected_author_id'] : 0;
			$author_image_hs 		= isset($instance['author_image_hs']) ? $instance['author_image_hs'] : 1;
			$author_nickname_hs 	= isset($instance['author_nickname_hs']) ? $instance['author_nickname_hs'] : 1;
			$author_first_name_hs 	= isset($instance['author_first_name_hs']) ? $instance['author_first_name_hs'] : 1;
			$author_last_name_hs 	= isset($instance['author_last_name_hs']) ? $instance['author_last_name_hs'] : 1;
			$author_designation_hs 	= isset($instance['author_designation_hs']) ? $instance['author_designation_hs'] : 1;
			$author_description_hs 	= isset($instance['author_description_hs']) ? $instance['author_description_hs'] : 1;
			
			
			if(($instance['selected_author_id']) !=null) {
			?>
			<?php 
				$user = (isset($_GET['author_name'])) ? get_user_by('id', $selected_author_id) : get_userdata(intval($selected_author_id));
			?>
					<h5 class="widget-title">
						<a href="<?php echo esc_url(get_author_posts_url( $user->ID ));?>">
							<?php 				
								if($author_first_name_hs == '1'): echo $user->first_name; endif;
								if($author_last_name_hs == '1'): echo ' '.$user->last_name; endif;
							?>
						</a>
					</h5>
					<div class="author-content">
						<?php 		
							
							if($author_image_hs == '1'): echo get_avatar( $user->ID, 200); endif;
							if($author_nickname_hs == '1'): echo '<h4 class="author-title">'.$user->nickname.'</h4>'; endif;
							if($author_designation_hs == '1'): echo '<p>'.$user->designation.'</p>'; endif;
							if($author_description_hs == '1'): echo '<p>'.$user->description.'</p>'; endif;	
						?>
					</div>
			<?php 
			}			
		echo $args['after_widget'];
	}
	
		public function form( $instance ) {
		$instance['selected_author_id'] = isset($instance['selected_author_id']) ? $instance['selected_author_id'] : '';
		$instance['author_nickname_hs'] = isset($instance['author_nickname_hs']) ? $instance['author_nickname_hs'] : '1';
		$instance['author_image_hs'] = isset($instance['author_image_hs']) ? $instance['author_image_hs'] : '1';
		$instance['author_first_name_hs'] = isset($instance['author_first_name_hs']) ? $instance['author_first_name_hs'] : '1';
		$instance['author_last_name_hs'] = isset($instance['author_last_name_hs']) ? $instance['author_last_name_hs'] : '1';
		$instance['author_designation_hs'] = isset($instance['author_designation_hs']) ? $instance['author_designation_hs'] : '1';
		$instance['author_description_hs'] = isset($instance['author_description_hs']) ? $instance['author_description_hs'] : '1';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'selected_author_id' ); ?>"><?php _e('Select Author','clever-fox'); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'selected_author_id' ); ?>" name="<?php echo $this->get_field_name( 'selected_author_id' ); ?>">
				<option value>--<?php echo __('Select','clever-fox'); ?>--</option>
				<?php
					$selected_author_id = $instance['selected_author_id'];
					$users = get_users();
					foreach ($users as $user) { 
						$option = '<option value="' . $user->ID . '" ';
						$option .= ( $user->ID == $selected_author_id  ) ? 'selected="selected"' : '';
						$option .= '>';
						$option .= $user->nickname;
						$option .= '</option>';
						echo $option;
					}
				?>	
			</select>
			<br/>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_image_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_image_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_image_hs' ); ?>" value="<?php if($instance[ 'author_image_hs' ]) echo esc_html( $instance[ 'author_image_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_image_hs' ); ?>"><?php _e( 'Hide/show Image ?','clever-fox' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_nickname_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_nickname_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_nickname_hs' ); ?>" value="<?php if($instance[ 'author_nickname_hs' ]) echo esc_html( $instance[ 'author_nickname_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_nickname_hs' ); ?>"><?php _e( 'Hide/show Nickname ?','clever-fox' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_first_name_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_first_name_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_first_name_hs' ); ?>" value="<?php if($instance[ 'author_first_name_hs' ]) echo esc_html( $instance[ 'author_first_name_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_first_name_hs' ); ?>"><?php _e( 'Hide/show First Name ?','clever-fox' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_last_name_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_last_name_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_last_name_hs' ); ?>" value="<?php if($instance[ 'author_last_name_hs' ]) echo esc_html( $instance[ 'author_last_name_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_last_name_hs' ); ?>"><?php _e( 'Hide/show Last Name ?','clever-fox' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_designation_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_designation_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_designation_hs' ); ?>" value="<?php if($instance[ 'author_designation_hs' ]) echo esc_html( $instance[ 'author_designation_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_designation_hs' ); ?>"><?php _e( 'Hide/show Designation ?','clever-fox' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_description_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_description_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_description_hs' ); ?>" value="<?php if($instance[ 'author_description_hs' ]) echo esc_html( $instance[ 'author_description_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_description_hs' ); ?>"><?php _e( 'Hide/show Description ?','clever-fox' ); ?></label>
		</p>

		<?php  ?>
        </select>
	<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['selected_author_id'] 	= ( ! empty( $new_instance['selected_author_id'] ) ) ? $new_instance['selected_author_id'] : '';
		$instance['author_image_hs'] 		= isset( $new_instance['author_image_hs'] ) ? 1 : false;
		$instance['author_nickname_hs'] 	= isset( $new_instance['author_nickname_hs'] ) ? 1 : false;
		$instance['author_first_name_hs'] 	= isset( $new_instance['author_first_name_hs'] ) ? 1 : false;
		$instance['author_last_name_hs'] 	= isset( $new_instance['author_last_name_hs'] ) ? 1 : false;
		$instance['author_designation_hs'] 	= isset( $new_instance['author_designation_hs'] ) ? 1 : false;
		$instance['author_description_hs'] 	= isset( $new_instance['author_description_hs'] ) ? 1 : false;
		
		return $instance;
	}
}