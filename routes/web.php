<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipeController;


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

Route::get('/', [HomeController::class, 'index'])->name('index');;
Route::get('/histoire/{id}', [HomeController::class, 'show'])->name('show');
Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::get('/equipes', [EquipeController::class, 'index'])->name("equipes");

Route::get('/show', [HomeController::class, 'index'])->name("histoires.show");



Route::get('/histoires/create', [HomeController::class, 'create'])->name('histoires.create');
Route::post('/histoires/store', [HomeController::class, 'store'])->name('histoires.store');
Route::get('/histoires/encours/{id}', [HomeController::class, 'encours'])->name('histoires.encours');

