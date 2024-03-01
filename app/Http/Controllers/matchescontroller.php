<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use DateTime;
class matchescontroller extends Controller
{

    public function creatematch(Request $request){
        $teamA = $request->input('TeamA');
        $teamB = $request->input('TeamB');
        $match_start_time = $request->input('Match_start_time');
        $match_end_time = $request->input('Match_end_time');

        $current_time = now();

        if ($match_start_time < $current_time || $match_end_time < $current_time) {
            return response()->json(['message' => 'Match start time or end time cannot be in the past.'], 201);
        }
        $start_time = new DateTime($match_start_time);
        $end_time = new DateTime($match_end_time);


        $interval = $start_time->diff($end_time);
        $hours_difference = $interval->h;


        if ($hours_difference < 3) {
            return response()->json(['message' => 'The match duration must be at least 3 hours.'], 201);
        }



if($teamA == $teamB){
            return response()->json(['message' => 'Team A and Team B cannot be the same.'], 201);
}
        $teamAConflicts = Matches::where(function ($query) use ($teamA, $match_start_time, $match_end_time) {
            $query->where('teamA', $teamA)
                  ->orWhere('teamB', $teamA);
        })->where(function ($query) use ($match_start_time, $match_end_time) {
            $query->where('match_end_time', '>', $match_start_time)
                  ->where('match_start_time', '<', $match_end_time);
        })->exists();


        $teamBConflicts = Matches::where(function ($query) use ($teamB, $match_start_time, $match_end_time) {
            $query->where('teamA', $teamB)
                  ->orWhere('teamB', $teamB);
        })->where(function ($query) use ($match_start_time, $match_end_time) {
            $query->where('match_end_time', '>', $match_start_time)
                  ->where('match_start_time', '<', $match_end_time);
        })->exists();


        if ($teamAConflicts ) {
            return response()->json(['message' => $teamA.' already has a match scheduled during this time range.'], 201);

        }
        else if($teamBConflicts){
            return response()->json(['message' =>$teamB. 'One of the teams already has a match scheduled during this time range.'], 201);
        }


        $match = new Matches;
        $match->teamA = $teamA;
        $match->teamB = $teamB;
        $match->match_start_time = $match_start_time;
        $match->match_end_time = $match_end_time;
        $match->save();

        return response()->json(['message' => 'Match created successfully.'], 200);
    }

public function getmatches(){
    $matches = Matches::all();
    return response()->json($matches,200);

}
}
