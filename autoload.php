<?php

defined( 'WPINC' ) || die;

/**
 * PSR-4 autoloader
 */
spl_autoload_register( function( $class )
{
	$namespaces = [
		'GeminiLabs\\Castor\\' => __DIR__ . '/theme/',
	];

	if( is_child_theme() ) {
		$namespaces['GeminiLabs\\CastorChild\\'] = realpath( get_stylesheet_directory() ) . '/theme/';
	}

	foreach( $namespaces as $prefix => $base_dir ) {
		$len = strlen( $prefix );
		if( strncmp( $prefix, $class, $len ) !== 0 )continue;
		$file = $base_dir . str_replace( '\\', '/', substr( $class, $len )) . '.php';
		if( !file_exists( $file ))continue;
		require $file;
		break;
	}
});
