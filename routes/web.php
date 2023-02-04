<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BisController;

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
//


Route::get('/show/{show}', [BisController::class, 'show'])->name('show');
Route::get('/search', [BisController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [BisController::class, 'index'])->name('home');
Route::resource('/bis', BisController::class)->except('show')->middleware('auth');
