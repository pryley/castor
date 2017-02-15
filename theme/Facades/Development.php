<?php

namespace GeminiLabs\Castor\Facades;

class Development extends Facade
{
    /**
     * Get the fully qualified class name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \GeminiLabs\Castor\Helpers\Development::class;
    }
}
