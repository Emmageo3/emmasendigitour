<?php  
	if ( ! function_exists( 'cleverfox_aravalli_lite_room' ) ) :
	function cleverfox_aravalli_lite_room() {
	$room_hs			= get_theme_mod('room_hs','1'); 
	$room_title			= get_theme_mod('room_title','Explore'); 
	$room_subtitle		= get_theme_mod('room_subtitle','Rooms & Suits');
	$room_desc		    = get_theme_mod('room_desc',"Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since the 1500s.of type and scrambled it to make a type specimen book.");
	$room_contents		= get_theme_mod('room_contents',aravalli_get_room_default());
	if($room_hs == '1'){	
?>		
<section id="rooms-section" class="rooms_suits room-home sec-default">
	<div class="container">
		<?php if(!empty($room_title) || !empty($room_subtitle) || !empty($room_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="heading-default wow fadeInUp">
					
						<?php if(!empty($room_title)): ?>
							<h6><?php echo wp_kses_post($room_title); ?></h6>
						<?php endif; ?>	
						
						<?php if(!empty($room_subtitle)): ?>
							<h3><?php echo wp_kses_post($room_subtitle); ?><span class="line-circle"></span></h3>      
						<?php endif; ?>		
						
						<?php if(!empty($room_desc)): ?>				
							<p> <?php echo esc_html($room_desc); ?></p>
						<?php endif; ?>		
						
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<?php
				if ( ! empty( $room_contents ) ) {
				$room_contents = json_decode( $room_contents );
				foreach ( $room_contents as $room_item ) {
					$title = ! empty( $room_item->title ) ? apply_filters( 'aravalli_translate_single_string', $room_item->title, 'Room section' ) : '';
					$subtitle = ! empty( $room_item->subtitle ) ? apply_filters( 'aravalli_translate_single_string', $room_item->subtitle, 'Room section' ) : '';
					$text = ! empty( $room_item->text ) ? apply_filters( 'aravalli_translate_single_string', $room_item->text, 'Room section' ) : '';
					$ribbon_text = ! empty( $room_item->button) ? apply_filters( 'aravalli_translate_single_string', $room_item->button,'Room section' ) : '';
					$button = ! empty( $room_item->text2) ? apply_filters( 'aravalli_translate_single_string', $room_item->text2,'Room section' ) : '';
					$link = ! empty( $room_item->link ) ? apply_filters( 'aravalli_translate_single_string', $room_item->link, 'Room section' ) : '';
					$image = ! empty( $room_item->image_url ) ? apply_filters( 'aravalli_translate_single_string', $room_item->image_url, 'Room section' ) : '';
			?>
					<div class="col-md-6 col-lg-4 mb-4">
						<article class="post-single wow fadeInUp">
							<?php if ( ! empty( $image ) ) : ?>
								<div class="post-thumbnail">
									<div class="post-img"><img src="<?php echo esc_url( $image ); ?>" alt=""></div>
									<div class="ribbon-container"><span class="ribbon ribbon-red"><?php echo esc_html($ribbon_text); ?></span></div>
									<?php if (!empty($title) ):  ?>
										<div class="price-bedge"><?php echo esc_html($title); ?></div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<div class="post-content">
								<div class="post-content-inner">
									<?php if (!empty($subtitle) ):  ?>
									<h3 class="post-title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($subtitle); ?></a></h3>
									<?php endif; ?>
									<p><?php echo esc_html($text); ?></p>
									<?php if(!empty($button)): ?>
										<a href="<?php echo esc_url($link); ?>" class="btn-shape btn-line-primary"><?php echo esc_html($button); ?></a>
									<?php endif; ?>
								</div>	
							</div>
						</article>
					</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php
	}}
endif;
if ( function_exists( 'cleverfox_aravalli_lite_room' ) ) {
$section_priority = apply_filters( 'aravalli_section_priority', 13, 'cleverfox_aravalli_lite_room' );
add_action( 'aravalli_sections', 'cleverfox_aravalli_lite_room', absint( $section_priority ) );
}