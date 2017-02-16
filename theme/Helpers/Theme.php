<?php

namespace GeminiLabs\Castor\Helpers;

class Theme
{
	/**
	 * @param string $asset
	 *
	 * @return string
	 */
	public function assetPath( $asset )
	{
		return $this->paths( 'dir.stylesheet' ) . 'assets/' . $asset;
	}

	/**
	 * @param string $asset
	 *
	 * @return string
	 */
	public function assetUri( $asset )
	{
		return $this->paths( 'uri.stylesheet' ) . 'assets/' . $asset;
	}

	/**
	 * @param null|string $path
	 *
	 * @return array|string
	 */
	public function paths( $path = null )
	{
		$paths = [
			'dir.stylesheet' => get_stylesheet_directory(),
			'dir.template'   => get_template_directory(),
			'dir.upload'     => wp_upload_dir()['basedir'],
			'uri.stylesheet' => get_stylesheet_directory_uri(),
			'uri.template'   => get_template_directory_uri(),
		];

		if( is_null( $path )) {
			return $paths;
		}

		return array_key_exists( $path, $paths )
			? trailingslashit( $paths[$path] )
			: '';
	}
}
