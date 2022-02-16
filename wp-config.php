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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define('AUTH_KEY',         'mASQO5tFwJRfjkzsIpUBPhjCN48UFKnrXVz8s2t2oQNUwD2Iqy2Nda+3VA0DXIHMJNyW9ecyFPTCMldVGlTzPw==');
define('SECURE_AUTH_KEY',  '3WR0ufz1lnrIWvD+cGq1ouv56MQcRfAsEGK0Ylsfy578T0tsvpHQcLwJoykaJ3HIDaIETrm9Jof/oQ6N/gY47g==');
define('LOGGED_IN_KEY',    'kykcqSNaeyh7yw1ZXVeN03egIALpuNTuvDEK0Y5f2Uc1NtVsi1moal4WrvdissnpWCraKuLIVn/Mqt3b8nCcHw==');
define('NONCE_KEY',        'oDTCtpWuFRc1xrl8+KKF36ON++1JY4bJOE5zgjQJ6xgKRzirrd1WWdOFvL/Wq7zSGwBy5D53mgbeGz1sb/28Fg==');
define('AUTH_SALT',        'oUeyt82QFiDoFE23JfrZzqXS1wRoVM+MEd/kyH4kO1SyC1gOU4sfJXNI/0ZaOWrhNBvENOthhXJsi+RjuNFuyg==');
define('SECURE_AUTH_SALT', 'eqZJUOxAAo/e1x6INVrGIB2CAlQIO9OyLXyp0vsJvir6XBNsJ2mdJ7mprdJpLP/TXtiw40Kr0ks3OJjygmprMw==');
define('LOGGED_IN_SALT',   'UCyRLRAEyMzfAypjOxD5EcrnC0NdzAVNSiaF5infssPzWjeVM+mNhjtqWNAiCCXlvSZKJAlDE16zMpOtz0eEew==');
define('NONCE_SALT',       'Oj5wLz9cu7g0XA4k3KnksMSrMzllY5gOjsErN2xu8WGpwcXkj/irooMCwh+XxRhcQomwqj30eoJ3nFWLSdxi8A==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/**
 * Set the following constants in wp-config.php
 * These should be added somewhere BEFORE the
 * constant ABSPATH is defined.
 *
 * Make sure you know from your email host what your specific connection
 * parameters are. Common defaults are given below, but if they are not
 * what your host requires, you won't be able to connect. Each constant
 * is noted with a comment identifying what connection parameter it is,
 * but make sure you're using the correct value - check with your
 * email host to confirm specific requirements. (Also confirm that your
 * host allows remote connections in the first place.)
 *
 * For instructions on the use of this script, see:
 * https://butlerblog.com/easy-smtp-email-wordpress-wp_mail/
 */
define( 'SMTP_USER',   'noreply@blackpattern.de' );    // Username to use for SMTP authentication
define( 'SMTP_PASS',   'R@MjPeo2MY@V' );       // Password to use for SMTP authentication
define( 'SMTP_HOST',   'smtps.udag.de' );    // The hostname of the mail server
define( 'SMTP_FROM',   'noreply@blackpattern.de' ); // SMTP From email address
define( 'SMTP_NAME',   'Blackpattern Wordpress' );    // SMTP From name
define( 'SMTP_PORT',   '465' );                  // SMTP port number - likely to be 25, 465 or 587
define( 'SMTP_SECURE', 'tls' );                 // Encryption system to use - ssl or tls
define( 'SMTP_AUTH',    true );                 // Use SMTP authentication (true|false)
define( 'SMTP_DEBUG',   0 );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
