<?php

use App\Http\Controllers\TrenController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('trenes',TrenController::class);
Route::get('trenes/{id}/pasajeros', [TrenController::class, 'getPasajeros']);
Route::post('login', [UserController::class, 'login']);
