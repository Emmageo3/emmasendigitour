<?php
if ( ! class_exists( 'fiona_blog_social_icon_widget' ) ) :

	class fiona_blog_social_icon_widget extends WP_Widget{
			// Construct
			public function __construct() {
			
				parent::__construct(
					"Social_Widget", 
					"Fiona Social Widget",
					array("description" => __( 'Social Icon Widgets', 'fiona-blog-widgets' ), ) 
				);	
				
				$this->defaults = array(
					'title' => __( 'Social Icon', 'fiona_blog_social_icon_widget' ),				
					'social' => array()
				);
			
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			}
			function enqueue_scripts() {
				
				wp_enqueue_style( 'fiona-blog-widgets' );
			}
			function enqueue_admin_scripts() {
				
			}

			
	// Widget Form Section  
	function form( $instance ) {
		 
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		$instance['social_style'] = isset($instance['social_style']) ? $instance['social_style'] : '';
		//$social_links = $this->get_social();
		$social_links = get_social();
	?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title', 'fiona-blog-widgets' ); ?>:</label>
				<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" type="text" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
			</p>
			<ul class="mks_social_container mks-social-sortable">
			  <?php foreach ( $instance['social'] as $link ) : ?>
				  <li>
					<?php $this->draw_social( $this, $social_links, $link ); ?>
				  </li>
				<?php endforeach; ?>
			</ul>
			<p>
				<a href="#" class="mks_add_social button"><?php _e( 'Add Icon', 'fiona-blog-widgets' ); ?></a>
			</p>

		  <div class="mks_social_clone" style="display:none">
				<?php $this->draw_social( $this, $social_links ); ?>
		  </div>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'social_style' ); ?>"><?php _e('Select Style Style','clever-fox'); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'social_style' ); ?>" name="<?php echo $this->get_field_name( 'social_style' ); ?>">
				<option value>--<?php echo __('Select','clever-fox'); ?>--</option>
				<?php
					$social_style = $instance['social_style'];
					$users =array("style1","style3","style4");
					foreach ($users as $user) { 
						$option = '<option value="' . $user . '" ';
						$option .= ( $user == $social_style  ) ? 'selected="selected"' : '';
						$option .= '>';
						$option .= $user;
						$option .= '</option>';
						echo $option;
					}
				?>	
			</select>
			<br/>
		</p>
			
	<?php
		}

		function draw_social( $widget, $social_links, $selected = array( 'icon' => '', 'url' => '' ) ) { ?>

					<label class="mks-sw-icon"><?php _e( 'Icon', 'fiona-blog-widgets' ); ?> :</label>
					<select type="text" class="iconPicker" name="<?php echo esc_attr($widget->get_field_name( 'social_icon' )); ?>[]" value="<?php echo esc_attr($selected['icon']); ?>" style="font-family: 'FontAwesome', Arial; width: 82%">
						<?php foreach ( $social_links as $key => $link ) : ?>
							<option value="<?php echo esc_attr($key); ?>" <?php selected( $key, $selected['icon'] ); ?>><?php echo $link; ?></option>
						<?php endforeach; ?>
					</select>
					</br>
					<label class="mks-sw-icon"><?php _e( 'Url', 'meks-smart-social-widget' ); ?> :</label>
					<input type="text" name="<?php echo esc_attr($widget->get_field_name( 'social_url' )); ?>[]" value="<?php echo esc_attr($selected['url']); ?>" placeholder="Example.com" style="width: 82%">


					<span class="mks-remove-social dashicons dashicons-no-alt"></span>

		<?php }
		
		// Upadte data
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );	
			$instance['social'] = array();
			if ( !empty( $new_instance['social_icon'] ) ) {
				$protocols = wp_allowed_protocols();
				$protocols[] = 'skype'; 
				for ( $i=0; $i < ( count( $new_instance['social_icon'] ) - 1 ); $i++ ) {
					$temp = array( 'icon' => $new_instance['social_icon'][$i], 'url' => esc_url( $new_instance['social_url'][$i], $protocols ) );
					$instance['social'][] = $temp;
				}
			}
			$instance['social_style'] 	= ( ! empty( $new_instance['social_style'] ) ) ? $new_instance['social_style'] : '';
			return $instance;
		}
		
		// Front page data
		function widget( $args, $instance ) {

			extract( $args );

			$instance = wp_parse_args( (array) $instance, $this->defaults );
			
			$title 			= apply_filters( 'widget_title', $instance['title'] );
			$social_style 	= isset($instance['social_style']) ? $instance['social_style'] : null;
			
			echo $before_widget;

			if ( !empty( $title ) ) {
				echo $before_title . $title . $after_title;
			}
	?>
			
			
			<ul class="<?php echo esc_attr($social_style)?>">
			  <?php foreach ( $instance['social'] as $item ) : ?>
					<li><a href="<?php echo esc_url($item['url']); ?>" class="socicon-<?php echo esc_attr( $item['icon'] ); ?>">
					<i class="fa <?php echo esc_attr($item['icon']); ?>"></i>
					
					<?php 
					$result = substr($item['icon'], 3, 15);
					$result = str_replace("-"," ",$result);
					if($social_style =='style3'){ ?>
					
							<div class="socialText">
								<span>Follow Us</span>
							</div>
							
					<?php }elseif($social_style =='style4'){ ?>
					
						<div class="socialText">
							<h6><?php echo ucwords($result); ?></h6>
						</div>
							
					<?php }else{ ?>
					
						<svg class="round-svg-circle"><circle cx="50%" cy="50%" r="49%"></circle><circle cx="50%" cy="50%" r="49%"></circle></svg>
						
					<?php } ?>
				</a></li>
				<?php endforeach; ?>
			</ul>
			


			<?php
			echo $after_widget;
		}
		
		
		
		// Define social icon List
		protected function get_social_title( $social_name ) {
			$items = $this->get_social();
			return $items[$social_name];
		}
	}
endif;
?>