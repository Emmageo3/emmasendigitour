<?php
/* Notifications in customizer */


require get_template_directory() . '/inc/customizer-notify/avril-customizer-notify.php';
$avril_config_customizer = array(
	'recommended_plugins'       => array(
		'clever-fox' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Cleverfox</strong> plugin for taking full advantage of all the features this theme has to offer.', 'avril')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'avril' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'avril' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'avril' ),
	'activate_button_label'     => esc_html__( 'Activate', 'avril' ),
	'avril_deactivate_button_label'   => esc_html__( 'Deactivate', 'avril' ),
);
Avril_Customizer_Notify::init( apply_filters( 'avril_customizer_notify_array', $avril_config_customizer ) );
?>