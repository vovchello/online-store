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

/**
 * Class GuzzleServise
 * @package App\Servises\HealthServices
 */
class GuzzleServise implements HealthCheckInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * GuzzleServise constructor.
     * @param Client $client
     */
    public function __construct(Client $client){

        $this->client = $client;
    }

    /**
     * Checks url
     *
     * @param $url
     * @return int
     */
    public function checkHealth($url)
    {

        $request = $this->getRequest($url);

        return $request->getStatusCode();

    }


    /**
     * Get request
     *
     * @param $url
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function getRequest($url){

        return $request = $this->client->head($url);

    }
}