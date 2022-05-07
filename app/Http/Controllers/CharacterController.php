<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Flugg\Responder\Http\Responses\SuccessResponseBuilder;
use Illuminate\Http\Request;

class CharacterController extends BaseController
{
    /**
     * Character instances listing[+search] functionality.
     *
     * @param  Request  $request
     * @return SuccessResponseBuilder
     */
    public function index(Request $request)
    {
        $query = Character::query();

        if ($request->has('name')) {
            $name = $request->get('name');
            $query->where('name', 'like', "%{$name}%");
        }

        $data = $query->paginate($this->limit);

        return responder()->success($data);
    }

    /**
     * To get random Character instance.
     *
     * @return SuccessResponseBuilder
     */
    public function getRandomInstance()
    {
        $data = Character::inRandomOrder()->firstOrFail();

        return responder()->success($data);
    }
}
