<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;

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

Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');
Route::get('/artist/{id}', [ArtistController::class, 'show'])
	->where('id', '[0-9]+')->name('artist.show');
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
	->where('id', '[0-9]+')->name('artist.edit');
Route::put('/artist/{id}', [ArtistController::class, 'update'])
	->where('id', '[0-9]+')->name('artist.update');
Route::get('/artist/create', [ArtistController::class, 'create'])->name('artist.create');
Route::post('/artist', [ArtistController::class, 'store'])->name('artist.store');
Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])
	->where('id', '[0-9]+')->name('artist.delete');

Route::prefix('admin')->group(function () {
	Route::get('/artist', [ArtistController::class, 'index'])->name('admin.artist.index');
	Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
		->where('id', '[0-9]+')->name('admin.artist.edit');
	Route::put('/artist/{id}', [ArtistController::class, 'update'])
		->where('id', '[0-9]+')->name('admin.artist.update');
	Route::get('/artist/create', [ArtistController::class, 'create'])->name('admin.artist.create');
	Route::post('/artist', [ArtistController::class, 'store'])->name('admin.artist.store');
	Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])
		->where('id', '[0-9]+')->name('admin.artist.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
