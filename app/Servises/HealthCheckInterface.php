<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.10.18
 * Time: 13:57
 */

namespace App\Servises;


interface HealthCheckInterface
{
    public function checkHealth($url);
}