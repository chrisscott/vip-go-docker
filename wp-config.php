<?php

if ( file_exists( '/var/www/html/wp-config-local' ) ) {
	foreach( glob( '/var/www/html/wp-config/*.php' ) as $config ) {
		require( $config );
	}
}

foreach( glob( '/var/www/html/wp-config/*.php' ) as $config ) {
	require( $config );
}

define( 'DB_NAME', $_ENV['WORDPRESS_DB_NAME'] );
define( 'DB_USER', $_ENV['WORDPRESS_DB_USER'] );
define( 'DB_PASSWORD', $_ENV['WORDPRESS_DB_PASSWORD'] );
define( 'DB_HOST', $_ENV['WORDPRESS_DB_HOST'] );

$table_prefix = 'wp_';

# content directory
define( 'WP_CONTENT_DIR', '/var/www/html/wp-content' );

if ( file_exists( __DIR__ . '/wp-content/vip-config/vip-config.php' ) ) {
	require_once( __DIR__ . '/wp-content/vip-config/vip-config.php' );
}

/* That's all, stop editing! Happy blogging. */

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

require_once( ABSPATH . 'wp-settings.php' );
