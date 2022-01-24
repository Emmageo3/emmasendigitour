<?php 
if ( ! function_exists( 'cleverfox_axtria_lite_team' ) ) :
	function cleverfox_axtria_lite_team() {
	$hs_team					= get_theme_mod('hs_team','1');		
	$team_title					= get_theme_mod('team_title','Technology from tomorrow');
	$team_subtitle				= get_theme_mod('team_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Team</b>                                   <b>Team</b><b>Team</b></span></span>');
	$team_description			= get_theme_mod('team_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$team_contents				= get_theme_mod('team_contents',avril_get_team_default());
	if($hs_team=='1'){
?>
  <section id="team-section" class="team-section bg-primary-light av-py-default">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                        <?php if ( ! empty( $team_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($team_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $team_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($team_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $team_description ) ) : ?>		
							<p><?php echo wp_kses_post($team_description); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp">
                <div class="av-column-12">
                    <!-- Filter list starts -->
                    <div class="av-filter-wrapper-2">
                        <div class="av-columns-area">
							<?php
								$team_contents = json_decode($team_contents);
								if( $team_contents!='' )
								{
								foreach($team_contents as $team_item){
								$image    = ! empty( $team_item->image_url ) ? apply_filters( 'avril_translate_single_string', $team_item->image_url, 'Team section' ) : '';
								$avril_team_title    = ! empty( $team_item->title ) ? apply_filters( 'avril_translate_single_string', $team_item->title, 'Team section' ) : '';
								$subtitle = ! empty( $team_item->subtitle ) ? apply_filters( 'avril_translate_single_string', $team_item->subtitle, 'Team section' ) : '';
								$text = ! empty( $team_item->text ) ? apply_filters( 'avril_translate_single_string', $team_item->text, 'Team section' ) : '';
								
							?>
								<div class="av-column-3 av-sm-column-6 mb-4 mb-av-0 av-filter-item support">
									<div class="team-member">
										<?php if ( ! empty( $image ) ): ?>
											<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $avril_team_title ) ) : ?> alt="<?php echo esc_attr( $avril_team_title ); ?>" title="<?php echo esc_attr( $avril_team_title ); ?>" <?php endif; ?> />
										<?php endif; ?>	
										<div class="team-footer">
											<div class="team-info">
												<?php if ( ! empty( $avril_team_title ) ) : ?>
													<h6><a href="javascript:void(0)"><?php echo esc_html( $avril_team_title ); ?></a></h6>
												<?php endif; ?>
												<?php if ( ! empty( $subtitle ) ) : ?>
													<span><?php echo esc_html( $subtitle ); ?></span>
												<?php endif; ?>
												<?php if ( ! empty( $text ) ) : ?>
													<p><?php echo esc_html( $text ); ?></p>
												<?php endif; ?>
											</div>
											<aside class="widget widget_social_widget">
												<ul>
													<?php if ( ! empty( $team_item->social_repeater ) ) :
															$icons         = html_entity_decode( $team_item->social_repeater );
															$icons_decoded = json_decode( $icons, true );
															if ( ! empty( $icons_decoded ) ) : ?>
															<?php
																foreach ( $icons_decoded as $value ) {
																	$social_icon = ! empty( $value['icon'] ) ? apply_filters( 'avril_translate_single_string', $value['icon'], 'Team section' ) : '';
																	$social_link = ! empty( $value['link'] ) ? apply_filters( 'avril_translate_single_string', $value['link'], 'Team section' ) : '';
																	if ( ! empty( $social_icon ) ) {
															?>	
																<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
														<?php
																}
															}
														endif;
													endif;
													?>	
												</ul>
											</aside>
										</div>
									</div>
								</div>
							<?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}} endif; 
	if ( function_exists( 'cleverfox_axtria_lite_team' ) ) {
		$section_priority = apply_filters( 'avril_section_priority', 14, 'avril_lite_team' );
		add_action( 'avril_sections', 'cleverfox_axtria_lite_team', absint( $section_priority ) );
	}	