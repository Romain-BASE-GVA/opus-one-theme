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
define( 'DB_NAME', 'wp_opusone_db' );

/** MySQL database username */
define( 'DB_USER', 'wp_opusone_user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp_opusone_pw' );

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
define( 'AUTH_KEY',          '+G`+ZUeR}K3oT_|!)GJ4?u*~^nKlR5K Dr+<NPZ~v`AM5f16>.,xY]kp3BxpPkuz' );
define( 'SECURE_AUTH_KEY',   '.5#ERxhl<x4U?]B Ja2TAWnj:l1Veg3vHi k!}&O&nuW`6jYWsJVVN:4:XPH2?z@' );
define( 'LOGGED_IN_KEY',     'H0)ny%m(ab.|<D6CUCdx`%JkW3ZB=,Y-C.3F*~9TdTp-i|]p1J4|im&.ut_/:DWK' );
define( 'NONCE_KEY',         'iF6eL>I2E|tj)1fAp%x~B!#Ddn3jttSED8+{_GDah ->B[4+89RV8z #:9p)x/Jo' );
define( 'AUTH_SALT',         '9pS`bwf#/JiWU3;xnb~i7Zf8Tc6Cp3UU[ye%ca)*8CY)0|q8{nRhFaNLZpzYlKQY' );
define( 'SECURE_AUTH_SALT',  '@cT4WA1$K((/oHUA-$Op:R2IR08-y*i$/adJn#x,}UYsOLg#ZepIS?L)~~r[Pa@s' );
define( 'LOGGED_IN_SALT',    'A_&^v> 2^NF.k+Y~~TQOo&0j1|1C@mz@O=vu2-c]/q A:h{x|Tm5lpQ_D#;l:4?h' );
define( 'NONCE_SALT',        'wr!:#x`FqJY#J=c&u##05LFYo+~z; v&sV.yBaT8xn.*D.dQQWb/R4enpKGxx*oW' );
define( 'WP_CACHE_KEY_SALT', 'VPT97&2jkj,H6ah.c{KTs7BSxm{g>ZDvWt9s&>ueB4D%&tlF^s|2H=g%RwSX*Z#J' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
