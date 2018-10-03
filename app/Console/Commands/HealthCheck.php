<?php

namespace App\Console\Commands;

use App\Servises\HealthCheckInterface;
use Illuminate\Console\Command;
use CheckHealth;

class HealthCheck extends Command
{

    protected $client;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'health:check {url}';

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
    public function __construct(HealthCheckInterface $client)
    {
        parent::__construct();

        $this->client = $client;
    }

    private function getArgument($argument){
        $this->validateUrl($this->argument($argument));
        return $this->argument($argument);
    }

    private function validateUrl($url):void {
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            dd('Not a valid URL');
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = $this->getArgument('url');
        printf('bind interface: %s %s ',
            $this->client->checkHealth($url),
            PHP_EOL
        );
    }


}
