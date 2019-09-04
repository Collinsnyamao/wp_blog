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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root3' );

/** MySQL database password */
define( 'DB_PASSWORD', '123' );

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
define( 'AUTH_KEY',         'es`W.mS9q+f/fGHm;|-Yr62h%,%5(t<e%q[{rrSuI*.#B4%w,WUJQ9cb.2YikWbB' );
define( 'SECURE_AUTH_KEY',  ',BDfky,Z!^ ^)agUx;sT6,31^-KMCTvDl?,f2IQ2uxC=wNfBqL3@rlYEVvvhKH3g' );
define( 'LOGGED_IN_KEY',    '8>a,>P%T:qMa&)qR|mFBSpD&UX$+gsOzfPSn*8k<UV97XO[.AsPRb>FJFmkx|>6q' );
define( 'NONCE_KEY',        'GNc?pnfo:YTWc!`9HT]8P{l(]2v-RF6Bh9qk7O#Vbe1S >pK0 lz_ 5F;s<&9.`C' );
define( 'AUTH_SALT',        '&cLwaxfG5)n].,|zGt_y+%N0 $w_iFW}~N)nhnxlmyjOP;vapIXCSxW&*Ff7s5WW' );
define( 'SECURE_AUTH_SALT', 'y0oE[2}lvE^dT`LxTR+gBw;ox<U7A~PzgS<@ui<LHtgv*sU/hvz) w9t9 W(,B:6' );
define( 'LOGGED_IN_SALT',   '2,fFj?j<6xOJn5{Ih(.QYqZ;3p(!V{yMXIH1Ff|w6V(8wQ|%i&fG`K]m[(mMgFC,' );
define( 'NONCE_SALT',       'L0l|O;m@4`tM]&9zuXb=Y@Il- /H-n{M8a;&#1AIC;0jelA]Ch2>o.a`0mY$y`oW' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp1_';

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
