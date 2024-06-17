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
ini_set("memory_limit",-1);
define('WP_MEMORY_LIMIT', '128M');
define('WP_MAX_MEMORY_LIMIT', '128M');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'clubs_v2' );
/** MySQL database username */
define( 'DB_USER', 'clubs_user_v2' );
/** MySQL database password */
define( 'DB_PASSWORD', 'm3B~1m5tx9-2pcvS[6' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define( 'WP_HOME', 'https://v25.investment-mastery.co' );
define( 'WP_SITEURL', 'https://v25.investment-mastery.co' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3F.TQAT#t;q$ >1{MB.eP^>QO3:4D@(s/joc=8+ZrSa%hkssY@1iD|H2`{^axPul' );
define( 'SECURE_AUTH_KEY',  'BhfF`TOX@AO4XP_wYH5rTQgceo:?e ??kSV=MzDGM/+v@K?5BN*6cL@2[?CZ,e?[' );
define( 'LOGGED_IN_KEY',    'Lfa,P(8Hz`Z16X<>Z!lZcr4`lB#LMO2 G(_)w7f{9E(5IDcb)r@-]Cl5`L+j1{96' );
define( 'NONCE_KEY',        'vX&HN6p;A31em}RAisXL@vH;e/Q+x $`.DbFAH_|X?/zGe&zpt2W^2Z6nk53a{dI' );
define( 'AUTH_SALT',        '$0dNp{q*vcYmc1wpc|1Vp(A9&j61eu=zM:%*Uj%WVW*KFA+ @#&kc0N4JzXJ=jnd' );
define( 'SECURE_AUTH_SALT', '75!9h,0%N|jdZ>t$ZT1j4tDuRo.kVJhZ1$u{bw&}*Zb2Rm05^&dXExaMO>YEFUfe' );
define( 'LOGGED_IN_SALT',   ':,g=81YDuD/>ukGUgOL49.&EyC2n1?gC3dHnXLnCJEx?+SCR=aoC eCf./V|H5<|' );
define( 'NONCE_SALT',       '$I6IGb>5}CU)Vc@h)r0LDzU8AoG1.2a0;vsA1U/o<=S4^ A6T`OgGOS9bgQQH>*+' );
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
define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );