<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getToken(Request $request)
    {
        if (!Auth::check()) {
            return view('login');
        }

        // Create and return Token
        $token = Auth::user()->getBearerToken();
        return back()->with(['token' => $token]);
    }
}
