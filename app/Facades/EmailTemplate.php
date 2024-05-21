<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class EmailTemplate extends Facade
{
    public static function getFacadeAccessor()
    {
       return 'EmailTemplate';
    }
}