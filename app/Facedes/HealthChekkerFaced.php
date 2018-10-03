<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.10.18
 * Time: 16:24
 */

namespace App\Facedes;


use Illuminate\Support\Facades\Facade;

class HealthChekkerFaced extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'health';
    }
}