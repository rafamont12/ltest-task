<?php

namespace App\Http\Controllers;

use Flugg\Responder\Http\Responses\SuccessResponseBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class StatisticController extends Controller
{
    /**
     * Returns total stats.
     * @return SuccessResponseBuilder
     */
    public function total()
    {
        return responder()->success(['stats' => Redis::get(config('cache_keys.total_stats'))]);
    }

    /**
     * Returns User's stats.
     *
     * @param  Request  $request
     * @return SuccessResponseBuilder
     */
    public function my(Request $request)
    {
        $key = Str::replace('{id}', $request->user()->id, config('cache_keys.user_stats'));
        return responder()->success(['stats' => Redis::get($key)]);
    }
}
