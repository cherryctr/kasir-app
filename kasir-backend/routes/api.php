<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware => auth:sanctum'],function () {
//     // return $request->user();
// });

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/create', [App\Http\Controllers\API\MakananController::class, 'create']);
Route::get('/data', [App\Http\Controllers\API\MakananController::class, 'getData']);
Route::get('/kategori', [App\Http\Controllers\API\MakananController::class, 'getKategori']);

Route::patch('/data/edit/{id}', [App\Http\Controllers\API\MakananController::class, 'edit']);
Route::post('/data/update/{id}', [App\Http\Controllers\API\MakananController::class, 'update']);
Route::delete('/data/delete/{id}', [App\Http\Controllers\API\MakananController::class, 'destroy']);


//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});