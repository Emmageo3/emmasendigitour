<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package avril
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function avril_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	return $classes;
}
add_filter( 'body_class', 'avril_body_classes' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('avril_str_replace_assoc')) {

    /**
     * avril_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function avril_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}


/*******************************************************************************
 *  Get Started Notice
 *******************************************************************************/

add_action( 'wp_ajax_avril_dismissed_notice_handler', 'avril_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function avril_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function avril_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="avril-getting-started-notice clearfix">
                    <div class="avril-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.jpg" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'avril' ); ?>" />
                    </div><!-- /.avril-theme-screenshot -->
                    <div class="avril-theme-notice-content">
                        <h2 class="avril-notice-h2">
                            <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'avril' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
                        </h2>

                        <p class="plugin-install-notice"><?php echo sprintf(__('Install and activate <strong>Clever Fox</strong> plugin for taking full advantage of all the features this theme has to offer.', 'avril')) ?></p>

                        <a class="avril-btn-get-started button button-primary button-hero avril-button-padding" href="#" data-name="" data-slug=""><?php esc_html_e( 'Get started with Avril', 'avril' ) ?></a><span class="avril-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'or %1$sCustomize theme%2$s</a></span>',
                                '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.avril-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'avril_deprecated_hook_admin_notice' );

/*******************************************************************************
 *  Plugin Installer
 *******************************************************************************/

add_action( 'wp_ajax_install_act_plugin', 'avril_admin_install_plugin' );

function avril_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/clever-fox' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'clever-fox' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'clever-fox/clever-fox.php' );
    }
}		