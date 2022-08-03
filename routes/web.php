<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SPAController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('index');
//});

Route::prefix('user')->middleware('auth:sanctum')->group( function () {
    Route::get('/', [SPAController::class, 'index']);
});

Route::get('/login', [SPAController::class, 'index'])->name('login');
Route::get('/{any}', [SPAController::class, 'index'])->where('any', '.*');
