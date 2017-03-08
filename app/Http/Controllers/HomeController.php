<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Position;
use \App\Vote;

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


    public function hasVoted() {
        $user = Auth::user();
        $votes_count = Vote::where('user_id', $user->id)->get()->count();

        return $votes_count > 0;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin) {
            return view('results');
        }

        if($this->hasVoted()) {
            return view('complete');
        } else {
            $positions = \App\Position::all();
            return view('index', ['positions' => $positions]);
        }
    }

    public function anon() {
        if(Auth::user()->admin) {
            return view('anonresults');
        } else {
            return redirect('/');
        }
    }
}
