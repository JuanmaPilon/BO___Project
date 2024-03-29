<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\UsersController;
use Laravel\Passport\PassportServiceProvider; 

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



Route::delete('contact/{id}/delete', [ContactController::class,'destroy']);
Route::post('register', [UsersController::class,'register']);
Route::post('login', [UsersController::class,'login']);
Route::group([
    'middleware' => ['auth:api']
], function() {
    Route::post('contact', [ContactController::class, 'store']);
    Route::get('contact', [ContactController::class, 'index']);
    Route::put('contact/{id}/edit', [ContactController::class,'update']);
    Route::get('contact/{id}', [ContactController::class,'show']);
    Route::get('user', [UsersController::class,'user']);
    Route::get('refresh', [UsersController::class,'refreshToken']);
    Route::get('logout', [UsersController::class,'logout']);
});