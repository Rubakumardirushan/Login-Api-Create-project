<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function store(Request $request){
        $team = new Team;
        $team->Team_name = $request->input('Team_name');
        $team->save();
        return response()->json([
            "message" => "Team record created"
        ], 201);

    }
}
