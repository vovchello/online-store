<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Healthcheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'health:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command checks the server state';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    private $client;

    /**
     * Healthcheck constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $request = $this->getRequest();

        Log::info('status code '.$request->getStatusCode());


    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function getRequest(){
        return $request = $this->client->head('http://online-store.loc');
    }
}
