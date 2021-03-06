<?php

use App\Http\Controllers\Auths\FollowController;
use App\Http\Controllers\Auths\LoginController;
use App\Http\Controllers\Auths\LogoutController;
use App\Http\Controllers\Auths\ProfileController;
use App\Http\Controllers\Auths\RecipeController;
use App\Http\Controllers\Auths\RegisterController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout']);
    Route::post('/profile', [ProfileController::class, 'update']);
    Route::post('/recipes', [RecipeController::class, 'store']);
    Route::post('/recipes/{id}', [RecipeController::class, 'update']);
    Route::delete('/recipes/{id}', [RecipeController::class, 'delete']);
    Route::get('/recipes/{id}', [RecipeController::class, 'show']);
    Route::get('/recipes', [RecipeController::class, 'index']);
    Route::post('/follow', [FollowController::class, 'follow']);
    Route::get('/getFollowers', [FollowController::class, 'getFollowers']);

});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
