<?php

namespace App\MyLibrary;

use Illuminate\Support\Facades\Facade;

class MoniFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new Moni();
    }
}
