<?php

namespace App\Console\Commands;

use App\Jobs\CalculateTotalApiRequests;
use Illuminate\Console\Command;

class ApiStatsCalculations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:calculation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculates API Requests Stats Each Minute';

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
     * @return int
     */
    public function handle()
    {
        dispatch(new CalculateTotalApiRequests());
        return 0;
    }
}
