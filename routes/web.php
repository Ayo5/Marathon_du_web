<?php

use App\Http\Controllers\AvisController;
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
Route::get('/histoire/{id}', [HistoireController::class, 'show'])->name('histoires.show');
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
Route::get('/histoire/{histoire}/chapitre/{id}', [ChapitreController::class, 'show'])->name('chapitre.show');


Route::get('/histoire/{id}/comment/create', [AvisController::class, 'create'])->name('avis.create');
Route::post('/avis/store', [AvisController::class, 'store'])->name('avis.store');
Route::delete('/avis/{id}', [AvisController::class, 'destroy'])->name('avis.destroy');
Route::get('/avis/{id}/edit', [AvisController::class, 'edit'])->name('avis.edit');
Route::put('/avis/{id}', [AvisController::class, 'update'])->name('avis.update');


Route::get('/histoires/create', [HistoireController::class, 'create'])->name('histoires.create');
Route::post('/histoires/store', [HistoireController::class, 'store'])->name('histoires.store');
Route::get('/histoires/encours/{id}', [HistoireController::class, 'encours'])->name('histoires.encours');

