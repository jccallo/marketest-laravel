<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Item\ItemController;
use App\Http\Controllers\Note\NoteController;

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

/* login */
Route::post('login', [AuthController::class, 'login']); // listo
Route::post('recovery', [AuthController::class, 'recovery']); // listo
Route::post('reset', [AuthController::class, 'reset']); // listo
Route::get('home', [HomeController::class, 'index']); // listo
Route::get('dashboard', [DashboardController::class, 'index']); // listo


/* items */
Route::apiResource('items', ItemController::class);

/* customers */
Route::apiResource('customers', CustomerController::class);

/* notes */
Route::apiResource('notes', NoteController::class);

/* notes items*/
Route::apiResource('notes.items', NoteController::class);

/* protegidas */
Route::middleware(['auth:sanctum'])->group(function () {
    
    /* logout */
    Route::post('logout', [AuthController::class, 'logout']); // listo
});
