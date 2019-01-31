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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'svtInternational' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '2dodigital' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'nfrU-BaCbtSLLGS29U{5n)S/OdGJD`0W R5t1R~7$M6A0DD;$P0Sc>Jozv8G=}8I' );
define( 'SECURE_AUTH_KEY',   '7(H8Bx]yGo!Z/oxu]+R7aep.z-G|l+{FI(/R:rw~PL0bqu+7q5zk)eXhI1NE|Jy$' );
define( 'LOGGED_IN_KEY',     'A7ffrcP%/hl*-vTk{9;g+1%lqx9;YS[H1h*GV~RieP/jk;TB*r_}Xyt=fGb6[c!x' );
define( 'NONCE_KEY',         '{$?2]^niW?@n[zI3@i4Oi^t[}59{a&KR:8.q]Xc!{UXxt;xCO@BnsX]h,0mD}E] ' );
define( 'AUTH_SALT',         'lpE]3e#]}%by^;>oKq^D-A<zwr`WDGch/DY~I*^ML8BYM31Lan+mPDHmln~dc0qK' );
define( 'SECURE_AUTH_SALT',  'Y7iP:g&+|,n~sd>QsELb$~y(?.oi_<Rb.5H`N^>MwQ`u~slGOS[KK_|?+Aj=n4bl' );
define( 'LOGGED_IN_SALT',    '%*cYxtY9@9|u,Lk?d!jo,`.H9S^.|rvMnIfHjJi[e}/D@Ml@X`V7neLW3ZjvWEUv' );
define( 'NONCE_SALT',        '`T.JMlPYlke8d[i1Mcx[mmHu;~Noa>^pPf]UjvJOH.b@63FY[aw|drkL%GbsLr[g' );
define( 'WP_CACHE_KEY_SALT', '$pCZ%:&84?~rJ50WLY|%ne**^Jbmx 33eyZ:2DZv?a]|Ud!uQ;v9%,t|hKne<@*3' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '2do_';

define('WP_DEBUG', true); // default is FALSE
define('WP_MEMORY_LIMIT', '64M');

define( 'WP_CONTENT_DIR', dirname( ABSPATH ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
define('WP_CONTENT_DIR', dirname(ABSPATH) . '/content');
define('WP_CONTENT_URL', '/content');

define('WP_HOME', 'http://svtinternational.digital');
define('WP_SITEURL', 'http://svtinternational.digital/wp');


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
