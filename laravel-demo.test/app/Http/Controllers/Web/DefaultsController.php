<?php

namespace App\Http\Controllers\Web;

use  Illuminate \Http\Request;
use App\Http\Controllers\Controller;

class DefaultsController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.defaults.home');
    }
}
