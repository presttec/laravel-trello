<?php

namespace PrestTEC\Trello\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Trello.
 */
class Trello extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'trello';
    }
}
