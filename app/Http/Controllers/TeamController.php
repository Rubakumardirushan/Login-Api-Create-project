<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function store(Request $request)
{




    if (Team::where('Team_name', $request->input('Team_name'))->exists()) {
        return response()->json([
            "message" => "Team name already exists"
        ], 201);
    }


    $team = new Team;
    $team->Team_name = $request->input('Team_name');


    if ($team->save()) {
        return response()->json([
            "message" => "Team record created"
        ], 201);
    } else {
        return response()->json([
            "message" => "Team record not created"
        ], 201);
    }
}

public function getinfo(){
    $team = Team::all();
    $name=$team->pluck('Team_name');
    return response()->json($name,200);
}

}
