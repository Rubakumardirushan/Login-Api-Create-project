<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poinst;
class pointscontroller extends Controller
{
    public function store(Request $request){

        $match_no= $request->input('Match_no');
        $Team_name= $request->input('Team_name');
        $points= $request->input('Points');
        $jersey= $request->input('jersey_number');
        $existingRecord = Poinst::where('Match_no', $match_no)
                             ->where('jersey_number', $jersey)->where('Team_name', $Team_name)
                             ->exists();

    if($existingRecord) {
        return response()->json(['message' => 'Duplicate entry for match number and jersey number combination.'], 200);
    }

    $point = new Poinst;
    $point->Match_no = $match_no;
    $point->Team_name = $Team_name;
    $point->Points = $points;
    $point->jersey_number = $jersey;
    $point->save();
    return response()->json(['message'=>'Points added successfully'],200);
    }













    public function getAllPoints() {
        $allPoints = Poinst::all();
        return response()->json(['points' => $allPoints], 200);
    }

}
