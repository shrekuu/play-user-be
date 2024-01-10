<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/greetings', function () {
    return 'Hello world';
});

Route::post('/auth/login', [AuthController::class, 'login']);

// // Protected routes
// Route::group(['middleware' => ['auth:sanctum']], function () {

//     Route::get('/auth/user', [AuthController::class, 'getUser']);
//     Route::post('/auth/logout', [AuthController::class, 'logout']);

    
//     // Route::apiResource('/users', UserController::class);

// });
