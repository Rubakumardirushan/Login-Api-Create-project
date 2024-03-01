<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Players;

class playercontroller extends Controller
{
    public function store(Request $request)
    {
        $player_team = $request->input('Player_team');
        $player_jersey_number = $request->input('Player_jersey_number');
        $player_points = $request->input('Player_points');
        $player_role = $request->input('Player_role');
        $player_name = $request->input('Player_name');

        $existingPlayer = Players::where('Player_team', $player_team)
            ->where('Player_jersey_number', $player_jersey_number)
            ->first();

        if ($existingPlayer) {

            return response()->json(['message' => 'Player with the same team name and jersey number already exists'], 201);
        } else {
            $player = new Players;
            $player->Player_name = $player_name;
            $player->Player_role = $player_role;
            $player->Player_team = $player_team;
            $player->Player_jersey_number = $player_jersey_number;
            $player->Player_points = $player_points;

            $player->save();


            return response()->json(['message' => 'Player created successfully'], 200);
        }
    }

public function getplayers(){
    $player = Players::all();
    return response()->json($player,200);}




}
