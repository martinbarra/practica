<?php
use App\Http\Controllers\CancioneController;
use App\Http\Controllers\MusicaController;
 use App\Http\Controllers\ProducController;
 use App\Http\Controllers\HomeController;
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

Route::middleware(['auth', 'can-cancion-admin'])->group(function () {
    Route::resource('canciones', CancioneController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('liked/{id}', [App\Http\Controllers\HomeController::class, 'like']);


Route::get('disliked/{id}', [HomeController::class, 'dislike']);

Route::resource('musicas', MusicaController::class);
Auth::routes();




Route::resource('producs', ProducController::class);
Auth::routes();



