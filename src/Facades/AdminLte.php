<?php

namespace Elnooronline\LaravelAdminLte\Facades;

use Illuminate\Support\Facades\Facade;

class AdminLte extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adminlte.manager';
    }
}