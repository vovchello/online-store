<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.10.18
 * Time: 16:07
 */

namespace App\Servises\HealthServices;


class HealthChecker
{

    private $client;

    /**
     * HealthChecker constructor.
     * @param $client
     */
    public function __construct($client)
    {
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