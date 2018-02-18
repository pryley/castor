<?php

// define( 'DEV', true );

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/geminilabs/castor-framework/castor.php';

/**
 * @return void
 * @action edit_category
 * @action save_post
 */
function castorFlushTransients() {
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )return;
	delete_transient( 'castor_categories' );
}
add_action( 'edit_category', 'castorFlushTransients' );
add_action( 'save_post',     'castorFlushTransients' );

/**
 * @return bool
 */
function castorHasCategories() {
	$categoryCount = get_transient( 'castor_categories' );
	if( false === $categoryCount ) {
		$categories = get_categories([
			'fields' => 'ids',
			'hide_empty' => true,
			'number' => 2,
		]);
		$categoryCount = count( $categories );
		set_transient( 'castor_categories', $categoryCount );
	}
	if( is_preview() ) {
		return true;
	}
	return $categoryCount > 1;
}
