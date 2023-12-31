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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_theretail_dev' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

define( 'WP_ENVIRONMENT_TYPE', 'staging' );

define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );   // 5.2 and later define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true ); 

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
define( 'AUTH_KEY',         'm+KEK!!i1Y%>}M,@n$N<I}aF%7.?!fN~&1IKYx@DHh<*|O%z!/7s+jIoj{[-^7a{' );
define( 'SECURE_AUTH_KEY',  'ffzCz(?74P$9X2(Cr]z@@8gK*F}KN/ysAdZ`oQJtSgXxO!)@1q05JC5;*IK:o: *' );
define( 'LOGGED_IN_KEY',    'OX$/ ,X- Tvj^* Cv>!4cW[Hpg#MZz;,EdAFIOS9hBW5r|$STWZ$H?{H(Od{1=z$' );
define( 'NONCE_KEY',        'r2fyYo_wu@)@w^17k90}u4S{= -B7+qfWnbKiEd78=7l)2wS!xN4bTF<b~DH`S.^' );
define( 'AUTH_SALT',        '+,Jk(~{M6<_G:oufZ3Lxo&tm{[#PaA0$T8.e3j_Dq^e6F;I2dk~*}ZDL5_43T;r}' );
define( 'SECURE_AUTH_SALT', 'Kt$!^1ze]oOO29,UTq4m%9j(Oc^?3$NNleDqpW_WC8Yu elDvj+pjRdUEcf]C&)5' );
define( 'LOGGED_IN_SALT',   'rihia^@&v;j/<Po3d|ni#]t0^ tHL`Lfry):q!;EpJaRJ]ONvZ$!F|C5]Y9tv|)U' );
define( 'NONCE_SALT',       'pw6_2V^*|H:M@?nSKp4LKa=n.y> hNz}c[jhw*(SD_hY5[eO=!Y,(O,xIGVO9wvq' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wcc_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('FORCE_SSL_ADMIN', true);
define('FORCE_SSL_LOGIN', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
