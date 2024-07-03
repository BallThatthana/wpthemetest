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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */


define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false); // Set to false to hide errors on the frontend

define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'Knb4zb`X{AD06.^4JVJllL<TA0(W[Xmc+P7:q=cB7n..jaO;{eoF9q`UmDY,:W7U' );
define( 'SECURE_AUTH_KEY',   '.y-Lzcf4&Tex4Wj.nH~+v?db9^t] zaPyhSqC7+}P;+D/pj;l~,ofl.!?@Hm8IFZ' );
define( 'LOGGED_IN_KEY',     '-?!SF1u5gtlEOuhi5f ~X5{GMc*X3J9ces[0TFPnl+Ct(J3+6 B#sK#7tzcw@2Zw' );
define( 'NONCE_KEY',         'oELBi9PYD$KI|UUVO==Kq=%i]L)tR$ajN2rttkvC5@7`U0V$6%n|LD]&g.Ro.Cpu' );
define( 'AUTH_SALT',         'Db*rjz sG<S)`GKDBo%WW0Nu;E5y$e1lt&d5n-6kY,t{~6~b@<J#zw(SdcLIWnk ' );
define( 'SECURE_AUTH_SALT',  'F3Z[)+b]3m?TD8<%xWI#mEC?@alN|M(lh~Zq?.`Xf3,0$_B1C@qww<0`P=:P7xb3' );
define( 'LOGGED_IN_SALT',    'FC`f4~;ZC_.{{@$%|$]s0JJ$~!01^gC%ofh,tZ#~0smf1jR)Y/]yMvfVij0/y7|8' );
define( 'NONCE_SALT',        '<rc||u2&-C_ihb)dJLUrY1([=ZXmU| (]dc8b;G~7#-9}w(DJv+1QO(5YH+$R8N.' );
define( 'WP_CACHE_KEY_SALT', 't/M.w43W5Q!H0T]gS;|OAlbm73cn&l,dk13 v;[,zDE#f{$YDutP;jh<9tym)?7@' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
