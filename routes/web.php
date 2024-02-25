<?php

use App\Http\Controllers\ArtistController;
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

Route::get('/', function () {
    return view('welcome');
});

// READ
Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');
Route::get('/artist/{id}', [ArtistController::class, 'show'])
    ->where('id', '[0-9]+')->name('artist.show');


// CREATE
// Pour la création d'un artiste il faudra utiliser 2 routes, une pour afficher le formulaire et une pour traiter le formulaire
// route pour afficher le formulaire de création d'un artiste
Route::get('/artist/create', [ArtistController::class, 'create'])->name('artist.create');
// route pour traiter le formulaire de création d'un artiste
Route::post('/artist', [ArtistController::class, 'store'])->name('artist.store');


// UPDATE
// Pour la edit il faudra utiliser 2 routes, une pour afficher le formulaire et une pour traiter le formulaire
// route pour la modification d'un artiste
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
    ->where('id', '[0-9]+')->name('artist.edit');
// route pour la mise à jour d'un artiste
Route::put('/artist/{id}', [ArtistController::class, 'update'])
    ->where('id', '[0-9]+')->name('artist.update');

// DELETE
// route pour la suppression d'un artiste
Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])
    ->where('id', '[0-9]+')->name('artist.delete');
