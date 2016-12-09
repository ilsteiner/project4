<?php

namespace CharDB\Http\Controllers;

use Illuminate\Http\Request;
use CharDB\Character;
use CharDB\Relationship;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/characters');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
