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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/Applications/MAMP/htdocs/FREE/cogainongdan/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'cgnd' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'R;i}m.$tm!CNh Ik?+kgn^#u}b}F1d049GQwwY]Tc9Q6V;)QJ+xJ`f #4W*ZK,dL' );
define( 'SECURE_AUTH_KEY',  '>h`j(8#Cq<$M<:#|dvbBz`fjjyyPITAkMK*%g{1Dl##sSIs;za|x]P^FM$m1Rh@F' );
define( 'LOGGED_IN_KEY',    'Mkud3+wbyFD0?kvq8<UAf{uT7o1-yHf^(MufB$o1S{xSnj.KTUjbx6OMfn2}eB ^' );
define( 'NONCE_KEY',        ';7F)!*e%vSAAroP#:#aFc|P]-/;M}=m5RS8vA#<fS,`N4)[rC_$kksZ}q$r-j2/O' );
define( 'AUTH_SALT',        'L$x7?<F;p%u~^KucXtM.TadSRtL9dViAmN+!:Ab-V TeW*:jGhzTku>W%s~`m20s' );
define( 'SECURE_AUTH_SALT', 'b9iX Z9@vCNaul]*+2#YRW/[/1=`H-3_sEy&9J7,I,TXRW<XJm|K:!.c|R#>NWX ' );
define( 'LOGGED_IN_SALT',   '}/G2:pEuBmDGkm%&_yI_Z]V.vMK@4Mh$_>9-dXevD~kDg-DW^(]51?|`#IhKF(S~' );
define( 'NONCE_SALT',       'V+JhE8:VyI+ T*s<LWQm+Kd`T>1x5yFFb9{K>tkf[zU6REyd0g:NkGYscBuBHrtC' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
