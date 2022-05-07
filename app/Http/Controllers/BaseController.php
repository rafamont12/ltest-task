<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationBaseRequest;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $limit;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->limit = request('limit', config('pagination.limit'));
    }
}
