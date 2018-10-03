<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.10.18
 * Time: 14:34
 */

namespace App\Servises\HealthServices;


use App\Servises\HealthCheckInterface;
use GuzzleHttp\Client;

class GuzzleServise implements HealthCheckInterface
{
    private $client;

    public function __construct(Client $client){

        $this->client = $client;
    }

    public function checkHealth($url)
    {

        $request = $this->getRequest($url);

        return $request->getStatusCode();

    }


    private function getRequest($url){

        return $request = $this->client->head($url);

    }
}