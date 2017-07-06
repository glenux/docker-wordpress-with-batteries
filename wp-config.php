
<?php

/* 
 * Simple parser for DATABASE_URL in PHP 
 */
if (getenv('DATABASE_URL')) {
  $url = parse_url(getenv("DATABASE_URL"));

  putenv('DB_CONNECTION=' . ($url['scheme'] == 'postgres' ? 'pgsql' : $url['scheme']));
  putenv("DB_HOST={$url['host']}");
  putenv("DB_PORT={$url['port']}");
  putenv("DB_USERNAME={$url['user']}");
  putenv("DB_PASSWORD={$url['pass']}");
  putenv('DB_DATABASE=' . substr($url['path'], 1)); // Remove leading slash from path
}


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
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_DATABASE'));
/** MySQL database username */
define('DB_USER', getenv('DB_USERNAME'));
/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));
/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST'));
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
/*
 * Keys generated by https://api.wordpress.org/secret-key/1.1/salt/ for this project 
 */
define('AUTH_KEY',         'V<dD(+NN/JJ^FvcEB*&Hbd$1TC[2,xx05773+|KE#[3oqC/3~os R,Tv+7-0KMVR');
define('SECURE_AUTH_KEY',  'QPTW$j_}fJ&SqY}x*v.FeAHrz<IzM*Lxi`2[,``hbUc,SNB1~4^syx?^Cz]E5!d1');
define('LOGGED_IN_KEY',    '!ecTcG[4RWhMIXOY=?KyD/1A+)!K(Zc)|8CAxTj|oae+`x-kfhB@f&VklX!{n7nj');
define('NONCE_KEY',        '@uYY-|GT`5d>eGA0/<yi^ddn->JvhnzUygrFi{a+.DbG-(bmt8ZwF%/i:w}~rCWx');
define('AUTH_SALT',        'R$xJp--f@sGvvq&- `3z*+4vu2mKl|*m!H`i*lP&@,Izrv;x}?DYeoh8,dp+2xM.');
define('SECURE_AUTH_SALT', 'm*BU!$/Du-4n!>)Q++>GQ&sO;|^]2I_7E93l]AH+&{PF/Mlc%e8Px;ZS+<q=@fZ/');
define('LOGGED_IN_SALT',   'VDnv3-4i?|e`Nml|VkVJ+arNVqrN;>^~lop+M&=ZFyZ|V<hy#-}3g|;sQD++<yD}');
define('NONCE_SALT',       'd,lJ(-`i<1Kb&red<Rj1E]]HAr.ozkf9|#&BL;j#x,Y#/F[uy}2e-f.G|W}rLkJt');

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
?>
