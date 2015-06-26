<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dynamicwakili');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ' .b^>^wa|8/W_`ee5*U>82|$QXm1p~@8bY2^;ir&T$#8hhMp , Nc]Pu|s*+_sx/');
define('SECURE_AUTH_KEY',  'jW-A~4I!Q<(v=;[r<rCVsVFa:=XM o)po+|y N-/TnMUcl}<*a};j+zUYz{i%45W');
define('LOGGED_IN_KEY',    '4X{v!;plRCU7y<$s.59fX=#`i/`tJ4cwb|rmA[SRlni8;;*$0tlL l/5^s~,0/s@');
define('NONCE_KEY',        'p|b|Y~d,AC!uo5{vXjJ@F0+m*k>6X)27<Xva}S+=`D0n!359ecb5J|SDOs+_@OIu');
define('AUTH_SALT',        'X+I#v|p>oM>A<-bz@PO~#@91$cu#kb+guaT6UQgZY&}Rjwj)wz{>*YwVUr-Ra-p0');
define('SECURE_AUTH_SALT', 'BU*S-JT>hnmF|BEC2 t`{Wk`&f(S.k8?r?RZcLn8CX;aVO*xRe)/%gl^;/!!O-P/');
define('LOGGED_IN_SALT',   'z>Z+PHPox1{)nZ4&sX$wi09udzQe(gj9k`jWlk6|I4@V_j=(AgHq5z!JVkRZy-pA');
define('NONCE_SALT',       '0wG*(@hA^ZYGj.=ol:A+=8^7*Gv6}.ctjk:ML+aHlAYc({E>mPWm-?2:<!3EXV#j');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_dynamic';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
