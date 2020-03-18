<?php

namespace SlimFacades;

/**
 * The facades for Slim\App instance.
 * @package SlimFacades
 */
class App extends Facade
{
    /**
     * Overriding Facades::self() to set Slim\App instance is in order to tell
     * Facades to proxy it.
     * @return \Slim\App
     */
    public static function self()
    {
        return self::$app;
    }
}
