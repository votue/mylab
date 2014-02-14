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
define('DB_NAME', 'lab_wp');

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
define('AUTH_KEY',         'IX z2x|<x-bb.nePFsgt|kvfcfht2E=W^N6~7XfvFX!jdz<,*|?:{[%gC#n,3>%?');
define('SECURE_AUTH_KEY',  'cpgnYZg-w7snpi|Auqw4#(31_.$y~;=aL-@K|Wnrfm<_<L??^#yQ,H#UnzBx/#`:');
define('LOGGED_IN_KEY',    ']5u:#EA#4We?,eyTLeyQdvwnN0;6l$$/G<-YbntFY5QA=6{NOqc.}f)`7b^[=;&H');
define('NONCE_KEY',        '<MpISYe<]2Z3}D!IX^Sy-|}O= TgH6X3 ??v+}B*OB c#>p;>FSsF)/.Pj+Uh ]2');
define('AUTH_SALT',        'rmr.lj;qUZ?)$DMs4#rc{L35}FXuVTBA3_nq{4l<7v4p% }!L,Z+B-B%U#|a[w`R');
define('SECURE_AUTH_SALT', 'iF0E4}(1_y]86y^!8Q=8kVjAm97Hqr=Bi[!`B4rYW]Wv-&ITKwO2<s+#]l;#gE|u');
define('LOGGED_IN_SALT',   'XE75iQg@j?y18`EO9GQ=ObMVI;(c,FL1%:Rz>H`@A%t2b^2YqdCkNEpU@F+y2*dL');
define('NONCE_SALT',       'pah.fg8yT!!59e=-F|+N2L%]E9lGl-Z72!dR461$%*r3CM*SE0L-g-i+3Z:Ax _)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
