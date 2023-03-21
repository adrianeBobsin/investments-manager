<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::prefix('user')->group(function (): void {
    Route::post('/create', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
    
});

Route::middleware('auth:sanctum')->group(function(): void {
    Route::post('transactions/create', [TransactionController::class, 'store']);
    Route::get('transactions/history', [TransactionController::class, 'index']);
});
