<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PublicArtworkController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Public Artworks
Route::get('/public/artworks', [PublicArtworkController::class, 'index']);
Route::get('/public/artworks/{id}', [PublicArtworkController::class, 'show']);


Route::middleware('auth:sanctum')->group(function () {


});

Route::group(

    ['middleware'=> ['auth:sanctum']],

    function () {

        Route::apiResource('artworks', ArtworkController::class);

        Route::patch('/artworks/{id}', [ArtworkController::class, 'update']);

        Route::apiResource('collections', CollectionController::class);

        Route::post('/logout', [AuthController::class, 'logout']);

    }

);

