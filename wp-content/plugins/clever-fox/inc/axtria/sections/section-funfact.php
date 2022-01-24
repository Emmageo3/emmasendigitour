<?php 
if ( ! function_exists( 'cleverfox_axtria_lite_funfact' ) ) :
	function cleverfox_axtria_lite_funfact() {
	$hs_funfact					= get_theme_mod('hs_funfact','1');	
	$funfact_contents			= get_theme_mod('funfact_contents',avril_get_funfact_default());
	$funfact_sec_column			= get_theme_mod('funfact_sec_column','3');
	$funfact_bg_setting			= get_theme_mod('funfact_bg_setting',CLEVERFOX_PLUGIN_URL .'inc/axtria/images/fun-fact-bg.jpg');
	$funfact_bg_position		= get_theme_mod('funfact_bg_position','fixed');
	if($hs_funfact=='1'){
?>
    <section id="funfact-section" class="funfact-section layout-overlay" style="background-image:url('<?php echo esc_url($funfact_bg_setting); ?>');background-attachment:<?php echo esc_attr($funfact_bg_position); ?>">
        <div class="av-container">
            <div class="av-columns-area">
				<?php
					if ( ! empty( $funfact_contents ) ) {
					$funfact_contents = json_decode( $funfact_contents );
					foreach ( $funfact_contents as $funfact_item ) {
						$avril_fun_title = ! empty( $funfact_item->title ) ? apply_filters( 'avril_translate_single_string', $funfact_item->title, 'Funfact section' ) : '';
						$text = ! empty( $funfact_item->text ) ? apply_filters( 'avril_translate_single_string', $funfact_item->text, 'Funfact section' ) : '';
						$icon = ! empty( $funfact_item->icon_value) ? apply_filters( 'avril_translate_single_string', $funfact_item->icon_value,'Funfact section' ) : '';
						$image = ! empty( $funfact_item->image_url ) ? apply_filters( 'avril_translate_single_string', $funfact_item->image_url, 'Funfact section' ) : '';
				?>
					<div class="av-column-<?php echo esc_attr( $funfact_sec_column ); ?> av-md-column-6 mb-4 mb-av-0">
						<div class="funfact-item">
							<?php if ( ! empty( $image )  &&  ! empty( $icon )){ ?>
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $avril_fun_title ) ) : ?> alt="<?php echo esc_attr( $avril_fun_title ); ?>" title="<?php echo esc_attr( $avril_fun_title ); ?>" <?php endif; ?> />
							<?php }elseif ( ! empty( $image ) ) { ?>
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
							<?php }elseif ( ! empty( $icon ) ) {?>
								<i class="fa <?php echo esc_html( $icon ); ?> txt-pink"></i>
							<?php } ?>
							<?php if ( ! empty( $avril_fun_title ) ) : ?>
								<h1 class="counter"><?php echo esc_html( $avril_fun_title ); ?></h1>
							<?php endif; ?>                            
							<?php if ( ! empty( $text ) ) : ?>
								<p><?php echo esc_html( $text ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				<?php } } ?>
            </div>
        </div>
    </section>
<?php
}} endif; 
	if ( function_exists( 'cleverfox_axtria_lite_funfact' ) ) {
		$section_priority = apply_filters( 'avril_section_priority', 14, 'avril_lite_funfact' );
		add_action( 'avril_sections', 'cleverfox_axtria_lite_funfact', absint( $section_priority ) );
	}		