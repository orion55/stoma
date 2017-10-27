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
define('DB_NAME', 'stoma');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '@pF>*X~O}twW1YsLI^QXs4Po-$#aFPwr0{cy*=/I{sk#%0[B&oEt:|TvO.]v%d8)');
define('SECURE_AUTH_KEY',  '`1dMkMBKaHSRkOzBC2kdR7|[*dg=?_w!/TULxzoQ1g[D4sm,!!Zw`w<P^4^B:!&)');
define('LOGGED_IN_KEY',    ' TQxkSCLf^{IeaBjT!bQ#Yny.K$W2EQT@6!u5b<-f@p6YtXuRE_MZ;B,mp5ldICl');
define('NONCE_KEY',        '4b~[1C@Kh0 $tJ-R/I`RR6F,j#aedUdN_.emlL.vXULC8IM5_;gYVf0hu_upFj+s');
define('AUTH_SALT',        'XPgfp62h^>TSR<EBs_17NYlO.h=Fr]HlzTE/TG7FNxnWcv~C.HMhbI~|KVg!5TU&');
define('SECURE_AUTH_SALT', 'TM3 5P1qM kjDZxtK=3BPrF4kZsC9v7;IBWCD%R@(=1w{ H?=flYi#12YEZfRV#O');
define('LOGGED_IN_SALT',   '[SqRJ46xEA^n@lgd?+(_|Yl8%sRWUNn)7E+sn9e+oLaG}hL|0Rrfq%J8O`sC0#4i');
define('NONCE_SALT',       'HYq.y8zjB1_wsuR%r:>Y$a}R`%1UWA (UbP;3>zTc2=1Hz mZ)+T(%Kul`!M*$Wz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'stoma_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
