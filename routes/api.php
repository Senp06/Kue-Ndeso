<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KueController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\AuthController;

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
//Akses
//Publik
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Protected


//Menu
Route::get('/kues', [KueController::class, 'index']);
Route::get('/kues/{id}', [KueController::class, 'show']);
Route::post('/kues', [KueController::class, 'store']);
Route::put('/kues/{id}', [KueController::class, 'update']);
Route::delete('/kues/{id}', [KueController::class, 'destroy']);

//Pesan
Route::get('/pesans', [PesanController::class, 'index']);
Route::get('/pesans/{id}', [PesanController::class, 'show']);
Route::post('/pesans', [PesanController::class, 'store']);
Route::put('/pesans/{id}', [PesanController::class, 'update']);
Route::delete('/pesans/{id}', [PesanController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
