<?php

use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\HistoireController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HistoireController::class, 'index'])->name('index');;
Route::get('/histoire/{id}', [HistoireController::class, 'show'])->name('histoire.show');
Route::get('/histoire/{id}/chapitre/first', [ChapitreController::class, 'show'])->name('chapitre.show');
Route::get('/histoire/{id}/chapitre/next', [ChapitreController::class, 'show'])->name('chapitre.showNext');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::get('/equipes', [EquipeController::class, 'index'])->name("equipes");

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth'])->name('home');
Route::get('/user/{idCurr}', [UserController::class, 'index'])->name('user.index')->middleware(['auth']);


Route::get('/histoire/{histoire}/chapitre/premier', [ChapitreController::class, 'premier'])->name('chapitre.premier');
Route::get('/histoire/{histoire}/create', [ChapitreController::class, 'store'])->name('chapitre.create');