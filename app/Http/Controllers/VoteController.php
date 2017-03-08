<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Position;
use \App\Candidate;
use \App\Vote;

class VoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $positions = Position::all();
        $data = array();
        foreach($positions as $position) {
            $candidates = array();
            $results = array();
            $colors = array();
            foreach($position->candidates as $candidate) {
                array_push($candidates, $candidate->name . ' (' . $candidate->party->name . ')');
                array_push($results, $candidate->votes->count());
                array_push($colors, $candidate->party->color);
            }
            array_push($data, [
                'position' => $position->name,
                'candidates' => $candidates,
                'results' => $results,
                'colors' => $colors
            ]);
        }
        return $data;
    }

    public function anonchart(Request $request) {
        $positions = Position::all();
        $data = array();
        foreach($positions as $position) {
            $candidates = array();
            $results = array();
            $colors = array();
            $i = 'A';
            foreach($position->candidates as $candidate) {
                if($position->candidates->count() > 1) {
                    array_push($candidates, 'Candidate '. $i++);
                    array_push($results, $candidate->votes->count());
                    array_push($colors, $candidate->party->color_anon);
                } else {
                    array_push($candidates, $candidate->name . ' (' . $candidate->party->name . ')');
                    array_push($results, $candidate->votes->count());
                    array_push($colors, $candidate->party->color);
                }
            }
            array_push($data, [
                'position' => $position->name,
                'candidates' => $candidates,
                'results' => $results,
                'colors' => $colors
            ]);
        }

        return $this->make_chart($data);
    }

    private function make_chart($resultData) {
        $data = array();
        foreach($resultData as $result) {
            array_push($data, [
                'chartData' => array(
                    'labels' => $result['candidates'],
                    'datasets' => [
                        array(
                            'backgroundColor' => $result['colors'],
                            'data' => $result['results']
                        )
                    ]
                ),
                'options' => array(
                    'title' => array(
                        'display' => true,
                        'text' => $result['position']
                    )
                )
            ]);
        }
        return $data;
    }

    public function chart(Request $request) {
        if($request->input('secret') == 'c2hzZWxlY3Rpb25zMjAxNw==') {
            return $this->make_chart($this->index());
        }
        return array('status' => '403', 'message' => 'Forbidden to access resource');
    }
    
    public function vote(Request $request) {
        $user = Auth::user();

        $positions = Position::all();

        foreach($positions as $position) {
			
			if(!$request->has(snake_case($position->name))) {
				continue;
			}

            $candidate_id = $request->input(snake_case($position->name));

            $candidate = Candidate::find($candidate_id);

            if($candidate->position->id == $position->id) {
                // cast vote

                Vote::create([
                    'user_id' => $user->id,
                    'position_id' => $position->id,
                    'candidate_id' => $candidate_id,
                    'ip_address' => $request->ip()
                ]);
            }

        }

        return view('complete');
    }

}
