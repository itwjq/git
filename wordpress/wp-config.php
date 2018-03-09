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
 * @link https://codex.wordpress.org/Editing_wp-config.phphttp://127.0.0.1/wordpress/account/
 *
 * @package WordPress
 */

/********************************/
//添加代码修改配置文件解决wp后台不能登录的问题
// define('WP_HOME','http://127.0.0.1/wordpress/');
// define('WP_SITEURL','http://127.0.0.1/wordpress/');
/********************************/

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress321');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */

define('DB_HOST', '192.168.2.19');

// define('DB_HOST', '127.0.0.1');


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
define('AUTH_KEY',         'G=U+Y5q)Rp#A&y,b8BajF2Y^N|Q |<z%;NKm`~ek{w;L&=*;uGM-@@Q3@$U~]_B$');
define('SECURE_AUTH_KEY',  's(kK|75EV,I>H~{5eet8nbMi/MFb>0j.ox^4KPnjAY]A9=0bF}YN!o,t0^eHG%n)');
define('LOGGED_IN_KEY',    ':@%DYNj9nQe$hA[YqboNFF#3Q,~k.d0O|T sR/}56kOU?>@ly87HMp~0`&N}o qe');
define('NONCE_KEY',        'bP&Nz3XG7ER!HR%&St9H1`JRPYv8 }n89Cd91div-y)$=MNQ^3F(87!oT8I9oFyN');
define('AUTH_SALT',        '(`2Jk<_!T*SpBo;C1l2wcj:/<q6BWnKD<RIJ;F4,~N|<cgR1fr}oeoZ>aybJj,aZ');
define('SECURE_AUTH_SALT', 'uP8bp77Rz8-9<vID4-kIU$,DT37J*^GO=bTV;nO{X*Uz.Ju3h4QD]L` kq1^1X57');
define('LOGGED_IN_SALT',   'yK*rE9V.dkwd=rhoV$=KC5 tX|[~3f`C4XU>AU!>=SE ]6fX=0|36TX:%F{UjT;B');
define('NONCE_SALT',       'kYDE8%E4]itN:YFp(t0sPo-U%XCK^krSlv&CISWx:LXI)M&iuUHO{upnL0_Q3uVE');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
