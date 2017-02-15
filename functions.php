<?php

require_once __DIR__ . '/autoload.php';

defined( 'DEV' ) || define( 'DEV', true );

if( is_customize_preview() && filter_input( INPUT_GET, 'theme' )) {
	wp_die( __( 'Theme must be activated prior to using the customizer.', 'castor' ));
}

if( basename( $stylesheet = get_option( 'template' )) !== 'templates' ) {
	update_option( 'template', "{$stylesheet}/templates" );
	wp_redirect( $_SERVER['REQUEST_URI'] );
	exit;
}

\GeminiLabs\Castor\Application::getInstance()->init();
