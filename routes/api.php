<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);


    Route::get('user', [AuthController::class, 'index']);
    Route::get('user/{id}', [AuthController::class, 'show']);
    Route::post('create', [AuthController::class, 'store']);
    Route::put('update/{user}',  [AuthController::class, 'update']);
    Route::delete('delete/{user}',  [AuthController::class, 'destroy']);


    Route::get('showEtu',  [AdminController::class, 'index']);
    Route::post('addUser',  [AdminController::class, 'addUser']);
    Route::post('deleteUser/{id}',  [AdminController::class, 'destroy']);
    Route::post('uu',  [AdminController::class, 'register']);



});


