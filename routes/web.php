<?php

use App\Http\Controllers\AlternativesController;
use App\Http\Controllers\CriteriasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectreController;
use App\Http\Controllers\MabacController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/electre', [ElectreController::class, 'index']);
Route::get('/mabac', [MabacController::class, 'index']);
Route::get('/criterias', [CriteriasController::class, 'index']);
Route::get('/alternatives', [AlternativesController::class, 'index']);