<?php

use App\Http\Controllers\apicontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
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
