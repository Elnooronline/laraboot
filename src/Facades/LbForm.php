<?php

namespace Laraboot\Facades;

use Illuminate\Support\Facades\Facade;

class LbForm extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraboot.form';
    }
}
