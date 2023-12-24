<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\MessagesController@create')->name('home');
Route::resource('mensajes', MessagesController::class);

Route::get('mensajes-exportar', 'App\Http\Controllers\MessagesController@export')->name('mensajes.export');
Route::get('mensajes-importar', 'App\Http\Controllers\MessagesController@import')->name('mensajes.import');
Route::post('mensajes-importar', 'App\Http\Controllers\MessagesController@import')->name('mensajes.import');


Route::get('documentacion', 'App\Http\Controllers\PagesController@docu')->name('docu');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
