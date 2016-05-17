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
define('DB_NAME', 'u383994254_esete');

/** MySQL database username */
define('DB_USER', 'u383994254_uguwy');

/** MySQL database password */
define('DB_PASSWORD', 'yVaVuJemyv');

/** MySQL hostname */
define('DB_HOST', 'mysql');

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
define('AUTH_KEY',         'q7tck3kRvSE5MN5aNq3QR1e9vDWOanzXwrHTZAIt13UeOmY0vv77l3EEsADEfq9h');
define('SECURE_AUTH_KEY',  'J7GclDlNqyWQufVVMwqm7bv6Gcs9APzu6YNjd1lVMQrXTiMpYMccFYHbcxtzs9Mi');
define('LOGGED_IN_KEY',    'sF50VgMxqmORv9usB9lVoBXs5EvpJOa8wqaBozlbT9HzOEOUN9WQcmJbfN6gLlPy');
define('NONCE_KEY',        'DafqcQDkt5qXEUer6RDZKcJe4eHN5sZILaknW8N879dvLVhcQWRTywJ3Vb75W2lF');
define('AUTH_SALT',        '41AVNiuCCVyLxh3cVHldGDcAAHOOFGHF9okJ5vfG3jbXf71jV7h2SGdnCLQJ932c');
define('SECURE_AUTH_SALT', 'DrtuYzso2Y1G1jt5ocFj3HbodHcxbcLbj0FijoQwM9K25Kq09NdqJbP73qfcGdHs');
define('LOGGED_IN_SALT',   'P9KHAnAx52iyUb4eghPdv8NwGj3LTFapy5wCixvTCFn1vyrFGjbdufoPQRJmdI0N');
define('NONCE_SALT',       '8Wctl78f7Mk3LPJCePPQs4uGP8r4GD1L6p8WgpJGem18m5dfaSCKl7JFXEVHMUhH');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fmev_';

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
