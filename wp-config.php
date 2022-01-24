<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'emmasendigitour' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'x3734n$M|}_1{`YHH3{;)wu`a-ln&(V>*`+i:!r9b[H07i4]NJ`}O]P<.S_6;y~|' );
define( 'SECURE_AUTH_KEY',  'B4aXg?yIC.!A/IJ?xb?F_GGjWpJd:[l)lou#8n]`~G `M;rq1:zw^5w&(gb7-eI2' );
define( 'LOGGED_IN_KEY',    'EVFA`gw,i1)lWz!7mmj>p|lGia^{jm&+TcK@xSPG):0,@wA~G Bc-PmrVAhANOqV' );
define( 'NONCE_KEY',        'ljwJ)&4Zlt7u4M&kwHT ,2$edf C%:t=pLqA{rqhh+SMqK^C4Vwzc7jY(WMrsY~F' );
define( 'AUTH_SALT',        'i*Dr@m!y?2 s&At>PlU3a^v03`>;9OX @`}j<0>RoE{PnD`KR<7lMJmKUXo:PY9z' );
define( 'SECURE_AUTH_SALT', '-O%-wOd,9YLr&;nHMr)3iFALPYH4QA/D~Ln1m;J)/OLikN6>sTv|aS)E3>(|;XS?' );
define( 'LOGGED_IN_SALT',   'Ty[5I(+D vGv8!]3r(`yfUEVlDw ro :0F2&{1Z_&`1?vt7SSm|(_gZu+&,81@Sh' );
define( 'NONCE_SALT',       'cN4% dN|2H]F*%GaH^t{zh}_W[yak<V##[xAK;7Eqnys=D<cSVDhiBmoC4eFJUMW' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
