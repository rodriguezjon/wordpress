<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', '172.16.238.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'g>=a{XXi.Wl$`wzk<B|,`|>%n8 lf*sxC5lQC}@!pz#{QR={@2b|9D PY.Gs,=+@' );
define( 'SECURE_AUTH_KEY',  'aq,^Kh.Cz?xH%Sm>OG8GIA**Q_qKB8>k2&QJvZ-NW;{&I6^ l-Rg%1*f*+E*|%,8' );
define( 'LOGGED_IN_KEY',    'Pb=mh9=M8cI@0`8xF15d}TJf>):DyjE`u7)Kqw6jT0.~|JzO|&Q@sc3V}yU ~;Tc' );
define( 'NONCE_KEY',        'sUooi [ychs8M}XzO*KtiY=ILg5~&6fG+ EI7uI3Sh@TN(YEB2id).CU{6l#FGbp' );
define( 'AUTH_SALT',        'd{TcKhZ~}5SbT=8[K7#)1(adA~f0nm_.;unr 58<h<2J[G@=?d{V:s`$F<6qXMq{' );
define( 'SECURE_AUTH_SALT', ' 3aIM<GYJp@>cWoa!`r35kMV+Fh6S%{3<Nm/<%^z+`yO`,adMCwu&f$#G|t@sIj9' );
define( 'LOGGED_IN_SALT',   'H!XmfFvou[z} 9lr^(@(ud2-/zaM=[nXv$5$7/sto/0u F2b$(N$#{=9`h:#_GAo' );
define( 'NONCE_SALT',       '6+jmq6:r @0j!YXsXm(/%`3=ckX)1g`}r&?(z&xAKe?FRRzLS!0E<Be<|@[r[cN4' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
