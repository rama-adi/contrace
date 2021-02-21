<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fill/{team}-{location:slug}', [LocationController::class, 'show_public'])->name('locations.show_public');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function (){
    Route::resource('locations', LocationController::class);
    Route::get('locations/{location}/export', [LocationController::class, 'export'])->name('locations.export');
    Route::get('locations/{location}/visitation', [LocationController::class, 'visitation'])->name('locations.visitation');
});
