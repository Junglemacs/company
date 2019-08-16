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
define( 'DB_NAME', 'company' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '0sc,IGk?)NwZ)T2:8uK}Jt>!+t!/1+Im.zb>_iavBht@`j?< <zb1^+<fOQX54yh' );
define( 'SECURE_AUTH_KEY',  'uwqFs{IuhD% f8^dRS#{RU` ]!GImp(>>3MDkN9qf(hmdqj9(~fhTSI^S2}eb9_W' );
define( 'LOGGED_IN_KEY',    'qJIBhoZvB(+wUAlY8agTC`5[m{OZBRGBTM<_`+K_#-laY7vaQjmhN*P*6wVlKMAK' );
define( 'NONCE_KEY',        'OwiKXC8GTR{}7L{]`nne@pM`1M?si8 i>NMKfdgleWAoo0nc-?0[5si$sz]h@1O{' );
define( 'AUTH_SALT',        '~)QnUBitD%SV:9cMv>9H:_dG:t6<WjMXiqWpM.8Dw?Wb^77nh(x/Q{~e,SAl!FG6' );
define( 'SECURE_AUTH_SALT', ',BEq$W~TBii5I6Be@%>*foDVmc.f@OZR9`lhD1(;pK@K6Y;xD1ZYISnX.NENpmZT' );
define( 'LOGGED_IN_SALT',   'xN <Js*pk&8+:4V:0J`1w=yBkovY%DWCIfi#N3p#.(6R;^<g4.WBqfwqE~EZgl:s' );
define( 'NONCE_SALT',       'Q^3,U`Tv!B;W#UVQf,6K% rD`a%[%=Z638F_ H5AD;lDi~T_bDc_7NVo0`b c/8*' );

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
