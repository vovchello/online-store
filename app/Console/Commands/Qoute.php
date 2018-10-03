<?php

namespace App\Console\Commands;

use Log;
use Illuminate\Console\Command;

class Qoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qoute:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate random qoute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $qoutes = $this->getQoutes();

        $randomQoutes = $qoutes[array_rand($qoutes)];

        Log::info($randomQoutes);
        

    }
    /**
     * test config
     */

    private function getQoutes(){
        return config('app.qoutes');
    }
}
