<?php

namespace GeminiLabs\Castor;

use Closure;
use ReflectionClass;
use ReflectionParameter;
use RuntimeException;
use GeminiLabs\Castor\Contracts\ServiceProvider;
use GeminiLabs\Castor\Exceptions\BindingResolutionException;

abstract class Container
{
	/**
	 * The current globally available container (if any).
	 *
	 * @var static
	 */
	protected static $instance;

    /**
     * The container's bound services.
     *
     * @var array
     */
	protected $services = [];

	/**
	 * Set the globally available instance of the container.
	 *
	 * @return static
	 */
	public static function getInstance()
	{
		if( is_null( static::$instance )) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	/**
	 * Bind a service to the container.
	 *
	 * @param $alias
	 * @param $concrete
	 * @return mixed
	 */
	public function bind( $alias, $concrete )
	{
		$this->services[$alias] = $concrete;
	}

	/**
	 * Resolve the given type from the container.
	 *
	 * @param  string      $abstract
	 * @param  bool|string $prefixed
	 * @return mixed
	 */
	public function make( $abstract, $prefixed = false  )
	{
		if( isset( $this->services[$abstract] ) && is_callable( $this->services[$abstract] )) {
			return call_user_func_array( $this->services[$abstract], [$this] );
		}

		if( isset( $this->services[$abstract] ) && is_object( $this->services[$abstract] )) {
			return $this->services[$abstract];
		}

		if( isset( $this->services[$abstract] ) && class_exists( $this->services[$abstract] )) {
			return $this->resolve( $this->services[$abstract] );
		}

		// Allow unbound aliases that omit the root namespace
		// i.e. 'Html\Field' translates to 'GeminiLabs\Castor\Html\Field'
		if( $prefixed === false && strpos( $abstract, __NAMESPACE__ ) === false && !class_exists( $abstract )) {
			return $this->make( __NAMESPACE__ . "\\$abstract" , 'prefix abstract with namespace' );
		}

		return $this->resolve( $abstract );
	}

	/**
	 * Register a shared binding in the container.
	 *
	 * @param string|array         $abstract
	 * @param \Closure|string|null $concrete
	 * @return void
	 */
	public function singleton( $abstract, $concrete )
	{
		$this->bind( $abstract, $this->make( $concrete ));
	}

	/**
	 * Dynamically access container services.
	 *
	 * @param string $service
	 * @return mixed
	 */
	public function __get( $service )
	{
		return $this->make( $service );
	}

	/**
	 * Dynamically set container services.
	 *
	 * @param string $service
	 * @param mixed  $callback
	 * @return void
	 */
	public function __set( $service, $callback )
	{
		$this->bind( $service, $callback );
	}

	/**
	 * Throw an exception that the concrete is not instantiable.
	 *
	 * @param string $concrete
	 *
	 * @return void
	 * @throws \GeminiLabs\Castor\Exceptions\BindingResolutionException
	 */
	protected function notInstantiable( $concrete )
	{
		$message = "Target [$concrete] is not instantiable.";

		throw new BindingResolutionException( $message );
	}

	/**
	 * Resolve a class based dependency from the container.
	 *
	 * @param \ReflectionParameter $parameter
	 *
	 * @return mixed
	 * @throws \GeminiLabs\Castor\Exceptions\BindingResolutionException
	 */
	protected function resolve( $concrete )
	{
		// If the concrete type is a Closure, we will just execute it and hand back the results.
		if( $concrete instanceof Closure ) {
			return $concrete( $this );
		}

		$reflector = new ReflectionClass( $concrete );

		// If the type is not instantiable then we need to bail out.
		if( !$reflector->isInstantiable() ) {
			return $this->notInstantiable( $concrete );
		}

		$constructor = $reflector->getConstructor();

		// If there are no constructors, that means there are no dependencies.
		if( is_null( $constructor )) {
			return new $concrete;
		}

		$dependencies = $constructor->getParameters();

		$instances = $this->resolveDependencies( $dependencies );

		return $reflector->newInstanceArgs( $instances );
	}

	/**
	 * Resolve a class based dependency from the container.
	 *
	 * @return mixed
	 * @throws \GeminiLabs\Castor\Exceptions\BindingResolutionException
	 */
	protected function resolveClass( ReflectionParameter $parameter )
	{
		try {
			return $this->make( $parameter->getClass()->name );
		}
		catch( BindingResolutionException $e ) {
			if( $parameter->isOptional() ) {
				return $parameter->getDefaultValue();
			}
			throw $e;
		}
	}

	/**
	 * Resolve all of the dependencies from the ReflectionParameters.
	 *
	 * @return array
	 */
	protected function resolveDependencies( array $dependencies )
	{
		$results = [];

		foreach( $dependencies as $dependency ) {
			// If the class is null, the dependency is a string or some other primitive type
			$results[] = !is_null( $class = $dependency->getClass() )
				? $this->resolveClass( $dependency )
				: null;
		}

		return $results;
	}
}
