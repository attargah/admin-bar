<?php

namespace Attargah\AdminBar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Attargah\AdminBar\AdminBar
 */
class AdminBar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Attargah\AdminBar\AdminBar::class;
    }
}
