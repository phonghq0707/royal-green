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
define( 'DB_NAME', 'green_fruit' );

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
define( 'AUTH_KEY',         'H*AprG&f<*6#4zRs:Xpjfv+EF]^@q$w-{J/dIp-o9dfE<-]{B-pj7uSj8I[6<]fZ' );
define( 'SECURE_AUTH_KEY',  '9:dV;{p?-X%(.U51[c:Xn^F*]tvOyTA9+^(8H AwWpg&OtDuy,=ES]$(HA.Hi9u{' );
define( 'LOGGED_IN_KEY',    'H)SFoho|rT{D)6+iLX(enaTL4U99=%?6hLMX>!lc>@I4)gi#:T#*1Oi4If|ZGQ^;' );
define( 'NONCE_KEY',        '=WrI)(!K$M,N5T^*CAFZ`qk)f>,G~Q_e`^[7*_Ny4#D7X?Hq~j^bGVWWL.spSekq' );
define( 'AUTH_SALT',        '%D1e`-%Rcq#oO?}B*My#wXg?X@-BHB0=Rwq!b4z(Fsy/YN|pjUro+Rr9TU0[Mee}' );
define( 'SECURE_AUTH_SALT', '!-J/}jAFO7!`r~vTL6D/Km=PI >h;l?g+~K<4:9TQfR_t0#%?]y(9}EcXBoLf]M=' );
define( 'LOGGED_IN_SALT',   'BMw9c@nLMcG[/d=KF1a5?NYH4[]&<l6}QG{4z.huj}!2;I_fAY`(yBL>.UEM[s<V' );
define( 'NONCE_SALT',       'u]qY,RaP+0PDb@3mN;$^ou]o_,Q&yEo.SqNBe{#Eh$j1o.Kq7(+X@]y;za/IdMA%' );

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
