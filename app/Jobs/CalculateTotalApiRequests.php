<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class CalculateTotalApiRequests implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $total = 0;

        $pattern = Str::replace('{id}', '*', config('cache_keys.user_stats'));
        foreach (Redis::keys($pattern) as $key) { // getting all redis key by *pattern*
            $key = Str::replace(config('database.redis.options.prefix'), '', $key);
            $total += Redis::get($key);
        }

        Redis::set(config('cache_keys.total_stats'), $total);
    }
}
