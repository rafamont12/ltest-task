<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Flugg\Responder\Http\Responses\SuccessResponseBuilder;
use Illuminate\Http\Request;

class QuoteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return SuccessResponseBuilder
     */
    public function index()
    {
        $data = Quote::paginate($this->limit);

        return responder()->success($data);
    }

    /**
     *
     *
     * @param  Request $request
     * @return SuccessResponseBuilder
     */
    public function getRandomInstance(Request $request)
    {
        $query = Quote::query();

        // Searching random quote by an author name [if requested]
        if ($request->has('author')) {
            $query->whereHas('character', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->author}%");
            });
        }

        $data = $query->inRandomOrder()->firstOrFail();

        return responder()->success($data);
    }
}
