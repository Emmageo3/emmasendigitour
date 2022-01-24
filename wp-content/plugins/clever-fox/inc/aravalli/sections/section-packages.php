<?php  
	$pg_packages_ttl			= get_theme_mod('pg_packages_ttl','Explore'); 
	$pg_packages_sub		= get_theme_mod('pg_packages_sub','Aravalli Packages');
	$pg_packages_desc		    = get_theme_mod('pg_packages_desc',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.");
	$pg_packages_column	= get_theme_mod('pg_packages_column','6');
	$pg_packages_display_num	= get_theme_mod('pg_packages_display_num','4');
	$pg_packages_category_id	= get_theme_mod('pg_packages_category_id');
	$post_type = 'aravalli_packages';
	$tax = 'packages_categories'; 
	$tax_terms = get_terms($tax);
?>		
<section id="packages-offers" class="packages-offers pg-packages-offers">
        <div class="container">
           <?php if(!empty($pg_packages_ttl) || !empty($pg_packages_sub) || !empty($pg_packages_desc)): ?>
				<div class="row">
					<div class="col-12">
						<div class="heading-default wow fadeInUp">
						
							<?php if(!empty($pg_packages_ttl)): ?>
								<h6><?php echo wp_kses_post($pg_packages_ttl); ?></h6>
							<?php endif; ?>	
							
							<?php if(!empty($pg_packages_sub)): ?>
								<h3><?php echo wp_kses_post($pg_packages_sub); ?><span class="line-circle"></span></h3>      
							<?php endif; ?>		
							
							<?php if(!empty($pg_packages_desc)): ?>				
								<p> <?php echo esc_html($pg_packages_desc); ?></p>
							<?php endif; ?>		
							
						</div>
					</div>
				</div>
			<?php endif; ?>	
            <div class="row">
				<?php 
					//$args = array( 'post_type' => 'aravalli_packages','posts_per_page' => $pg_packages_display_num);  
					$args = array('post_type' => 'aravalli_packages','posts_per_page' => $pg_packages_display_num,
						  'tax_query' => array(
								array(
								  'taxonomy' => 'packages_categories',
								  'field' => 'slug',
								  'terms' => $pg_packages_category_id,
								),
						  ),
						);
					$room = new WP_Query( $args ); 
					if( $room->have_posts() )
					{
						while ( $room->have_posts() ) : $room->the_post();
						
						$popular_badge = sanitize_text_field( get_post_meta( get_the_ID(),'popular_badge', true ));
						$packages_ribbon_text = sanitize_text_field( get_post_meta( get_the_ID(),'packages_ribbon_text', true ));
						$packages_price_badge 	= sanitize_text_field( get_post_meta( get_the_ID(),'packages_price_badge', true ));
						$packages_price 		= sanitize_text_field( get_post_meta( get_the_ID(),'packages_price', true ));
						$packages_button_link = sanitize_text_field( get_post_meta( get_the_ID(),'packages_button_link', true ));
						$packages_button_link_target = sanitize_text_field( get_post_meta( get_the_ID(),'packages_button_link_target', true ));
						$packages_star = sanitize_text_field( get_post_meta( get_the_ID(),'packages_star', true ));

					if($packages_button_link) { 
						$packages_button_link; 
					}	
					else { 
						$packages_button_link = get_post_permalink(); 
					} 
					
					$terms = get_the_terms( $post->ID, 'packages_categories' );
										
					if ( $terms && ! is_wp_error( $terms ) ) : 
						$links = array();

						foreach ( $terms as $term ) 
						{
							$links[] = $term->slug;
						}
						
						$tax = join( ' ', $links );		
					else :	
						$tax = '';	
					endif;
				?>
                <div class="col-lg-<?php echo esc_attr($pg_packages_column); ?> col-md-6 mb-5">
                    <div class="packages-box">
                        <div class="thumbnail">
							<?php if ( has_post_thumbnail() ) {  ?>	
								<div class="packages-img"><?php the_post_thumbnail(); ?></div>
								<?php if (!empty($popular_badge) ){  ?>
									<div class="corner-ribbon"><span class="banget banget-red"><?php echo esc_html($popular_badge); ?></span></div>
								<?php } ?>
							<?php } ?>
							
							<?php if (!empty($packages_ribbon_text) ){  ?>
								<div class="balloon-container"><span class="balloon balloon-theme"><?php echo esc_html($packages_ribbon_text); ?></span></div>
							<?php } ?>
							
							<?php if (!empty($packages_price_badge) ){  ?>
								<div class="price-bedge"> <?php echo esc_html($packages_price_badge); ?></div>
							<?php } ?>
                        </div>
                        <div class="packages-panel">
                            <div class="packages-details">
                                <a href="<?php echo esc_url($packages_button_link); ?>" <?php  if($packages_button_link_target) { echo "target='_blank'"; } ?>><?php echo the_title(); ?></a>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="post-content-bottom">
								<?php if (!empty($packages_star) ){  ?>
									<ul class="star-rating star-black">
										<?php for ($i=1; $i<=$packages_star; $i++) { ?>
											<li><i class="fa fa-star"></i></li>
										<?php } ?>
										<li><span class="review">/ <?php echo esc_html($packages_star); ?> <?php echo esc_html_e('Review','clever-fox'); ?></span></li>
									</ul>
								<?php } ?>
								
								<?php if (!empty($packages_price) ){  ?>
                                <div class="comment-box">
                                    <span><?php echo esc_html_e('From','clever-fox'); ?></span>
                                    <strong><?php echo esc_html($packages_price); ?></strong>
                                </div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>     
				<?php 	
					endwhile; 
					}
				?>
            </div>
        </div>
    </section>