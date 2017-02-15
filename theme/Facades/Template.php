<?php

namespace GeminiLabs\Castor\Facades;

class Template extends Facade
{
    /**
     * Get the fully qualified class name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \GeminiLabs\Castor\Template::class;
    }
}
