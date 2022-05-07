<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Flugg\Responder\Http\Responses\SuccessResponseBuilder;
use Illuminate\Http\Request;

class EpisodeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return SuccessResponseBuilder
     */
    public function index()
    {
        $data = Episode::paginate($this->limit);

        return responder()->success($data);
    }

    /**
     * Show resource by id.
     *
     * @param  int  $id
     * @return SuccessResponseBuilder
     */
    public function show(int $id)
    {
        $items = Episode::findOrFail($id);

        return responder()->success($items)->with('characters');
    }
}
