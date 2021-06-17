<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/new',[AdminController::class,'index']);
Route::post('/new', [AdminController::class,'store']);
Route::delete('/new/{id}',[AdminController::class,'destroy']);
Route::get('/news/{id}',[AdminController::class,'show']);

Route::patch('/news/{id}',[AdminController::class,'update']);


