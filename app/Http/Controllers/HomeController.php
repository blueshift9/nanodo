<?php

namespace App\Http\Controllers;

use App\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::find(Auth::user()->id);
        $max = Todolist::max('display_order') + 1;
        return view('home')->with('user', $user)->with('order', $max);
    }
}
