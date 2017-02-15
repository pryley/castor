<?php

namespace GeminiLabs\Castor\Facades;

class AliasLoader
{
	/**
	 * The singleton instance of the loader.
	 *
	 * @var \GeminiLabs\Castor\Facades\AliasLoader
	 */
	protected static $instance;

	/**
	 * The array of class aliases.
	 *
	 * @var array
	 */
	protected $aliases;

	/**
	 * Indicates if a loader has been registered.
	 *
	 * @var bool
	 */
	protected $registered = false;

	/**
	 * Create a new AliasLoader instance.
	 *
	 * @param array $aliases
	 */
	private function __construct( $aliases )
	{
		$this->aliases = $aliases;
	}

	/**
	 * Get or create the singleton alias loader instance.
	 *
	 * @return \GeminiLabs\Castor\Facades\AliasLoader
	 */
	public static function getInstance( array $aliases = [] )
	{
		if( is_null( static::$instance )) {
			return static::$instance = new static( $aliases );
		}

		$aliases = array_merge( static::$instance->getAliases(), $aliases );

		static::$instance->setAliases( $aliases );

		return static::$instance;
	}

	/**
	 * Add an alias to the loader.
	 *
	 * @param string $class
	 * @param string $alias
	 *
	 * @return void
	 */
	public function alias( $class, $alias )
	{
		$this->aliases[$class] = $alias;
	}

	/**
	 * Load a class alias if it is registered.
	 *
	 * @param string $alias
	 *
	 * @return bool|null
	 */
	public function load( $alias )
	{
		if( isset( $this->aliases[$alias] )) {
			return class_alias( $this->aliases[$alias], $alias );
		}
	}

	/**
	 * Register the loader on the auto-loader stack.
	 *
	 * @return void
	 */
	public function register()
	{
		if( !$this->registered ) {
			$this->prependToLoaderStack();
			$this->registered = true;
		}
	}

	/**
	 * Get the registered aliases.
	 *
	 * @return array
	 */
	public function getAliases()
	{
		return $this->aliases;
	}

	/**
	 * Set the registered aliases.
	 *
	 * @return void
	 */
	public function setAliases( array $aliases )
	{
		$this->aliases = $aliases;
	}

	/**
	 * Indicates if the loader has been registered.
	 *
	 * @return bool
	 */
	public function isRegistered()
	{
		return $this->registered;
	}

	/**
	 * Set the "registered" state of the loader.
	 *
	 * @param bool $value
	 *
	 * @return void
	 */
	public function setRegistered( $value )
	{
		$this->registered = $value;
	}

	/**
	 * Set the value of the singleton alias loader.
	 *
	 * @param \GeminiLabs\Casper\Facades\AliasLoader $loader
	 *
	 * @return void
	 */
	public static function setInstance( $loader )
	{
		static::$instance = $loader;
	}

	/**
	 * Prepend the load method to the auto-loader stack.
	 *
	 * @return void
	 */
	protected function prependToLoaderStack()
	{
		spl_autoload_register( [$this, 'load'], true, true );
	}

	/**
	 * Clone method.
	 *
	 * @return void
	 */
	private function __clone()
	{}
}
