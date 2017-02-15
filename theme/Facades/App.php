<?php

namespace GeminiLabs\Castor\Facades;

class App extends Facade
{
    /**
     * Get the fully qualified class name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \GeminiLabs\Castor\Application::class;
    }
}
