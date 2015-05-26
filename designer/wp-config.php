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
define('DB_NAME', 'zemsappa_zemsapparel');

/** MySQL database username */
define('DB_USER', 'zemsappa_wp');

/** MySQL database password */
define('DB_PASSWORD', 'R*5ta[yDJo02@)8');

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
define('AUTH_KEY',         'g#y|prBx= U3lgd=vSQC(?}[k9 420Ko-uo1;R~+|M`5^Ykl`<)elANgv<!dmle1');
define('SECURE_AUTH_KEY',  'K+9^/_|g(C6[xwrRULvS37tEB`X!oZebd|G+ %hF-q_5+3xLwDwv-%4Bxm}8=JB$');
define('LOGGED_IN_KEY',    '%i>%I;)05!|6Nr@*?6ONQ^MGI(pVC{I#:Kni}5@<|K|zH^oD`mwNLTk}zY!J|BE{');
define('NONCE_KEY',        '4sKR{#lE~:0+>-rr|/qgTv39w`xPl:!&sd3%j`TtJvwnXG,g<(au^]1uU_F)181K');
define('AUTH_SALT',        '+(uSB(.Y|X`%}Ql:|`3Zx/+*2iE?]%@)-BA!(zC6N6cOO,{Y{B]G!T?N1~*26BvL');
define('SECURE_AUTH_SALT', 'XBeUf@;=)1bpql]R/tLc$~;0=918qnV3+C-zBA`*Fxahvm+etzS$Jz,l<D$N)3f ');
define('LOGGED_IN_SALT',   'HQNO:Xtw6b7u.YYF{oZYc^XfDO>L&y|0(|o>|-$YJnhgyQ8sk9<8pgv-+3#+xAd|');
define('NONCE_SALT',       'J.L6%DwdIP-4n3<~u8{}S#[oH}K#6,kYe+Kg7sLuc;?Bh{RW<FKp0Mma-bxxfTEA');

/**#@-*/

/* Hosting modifications */
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'max_execution_time', 400 );
define( 'max_input_time', 300 );


/* WordPress Cache */


/* Compression */
define( 'COMPRESS_CSS',        true );
define( 'COMPRESS_SCRIPTS',    true );
define( 'CONCATENATE_SCRIPTS', true );
define( 'ENFORCE_GZIP',        true );

/* Updates */
define( 'WP_AUTO_UPDATE_CORE', false );


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
