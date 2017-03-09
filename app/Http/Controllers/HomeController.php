<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Position;
use \App\Campus;
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
            return view('index', ['positions' => Position::all()]);
        }
    }

    public function anon() {
        if(Auth::user()->admin) {
            return view('anonresults');
        } else {
            return redirect('/');
        }
    }

    public function turnout() {
        if(Auth::user()->admin) {
            $campuses = Campus::where('id', '>', 0)->get();
            foreach($campuses as $campus) {
                foreach($campus->users() as $user) {
                    if($user->votes->count() > 0) {

                    }
                }
            }

            return view('turnout', ['campuses' => $campuses]);
        } else {
            return redirect('/');
        }
    }
}
