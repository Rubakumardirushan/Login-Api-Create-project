<?php

use App\Http\Controllers\apicontroller;
use Illuminate\Http\Request;
use App\Http\Controllers\pointscontroller;
use App\Http\Controllers\matchescontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\playercontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register',[apicontroller::class,'register']);
Route::post('/login',[apicontroller::class,'login']);
Route::get('/get',[apicontroller::class,'getuserinfo'])->middleware('auth:api');
Route::post('/addteam',[TeamController::class,'store']);
Route::get('/teamname',[TeamController::class,'getinfo']);
Route::post('/addplayer',[playercontroller::class,'store']);
Route::get('/getplayers',[playercontroller::class,'getplayers']);
Route::post('/creatematch',[matchescontroller::class,'creatematch']);
Route::get('/getmatches',[matchescontroller::class,'getmatches']);

Route::post('/addpoints',[pointscontroller::class,'store']);
Route::get('/jersey/{team_name}',[playercontroller::class,'getjersey']);
Route::get('/getpoints/{match_no}',[matchescontroller::class,'get_match_no']);
Route::get('/getallpoints',[pointscontroller::class,'getAllPoints']);
