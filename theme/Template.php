<?php

namespace GeminiLabs\Castor;

class Template
{
	/**
	 * @var string
	 */
	public $template;

	/**
	 * @param string $template
	 * @param bool   $loadTemplate
	 *
	 * @return string|void
	 */
	public function get( $template, $loadTemplate = true )
	{
		$base = basename( $this->template, '.php' );
		$slug = basename( $template, '.php' );
		$templates = [$template];

		if( $base != 'index' ) {
			$str = substr( $template, 0, -4 );
			array_unshift( $templates, sprintf( '%s-%s.php', $str, $base ));
		}

		$templates = apply_filters( "castor/templates/{$slug}", $templates );

		return locate_template( $templates, $loadTemplate );
	}

	/**
	 * @return void
	 */
	public function main()
	{
		$this->get( $this->template );
	}

	/**
	 * @param string $template
	 *
	 * @return string|void
	 */
	public function setLayout( $template )
	{
		$this->template = strstr( $template, 'templates/' );
		$template = apply_filters( 'castor/templates/layout', 'templates/layouts/base.php' );
		return $this->get( $template, false );
	}

	/**
	 * @return void
	 */
	public function sidebar()
	{
		$this->get( 'templates/sidebar.php' );
	}
}
