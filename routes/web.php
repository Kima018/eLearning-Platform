<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LecturesController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\CheckIsAdminOrModerator;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homePage']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/all-lectures', [LecturesController::class, 'allLectures'])->name('lecture.all');
    Route::get('/lecture/{lecture}', [LecturesController::class, 'watchSingleLecture'])->name('lecture.watch');

});


Route::middleware(['auth', CheckIsAdminOrModerator::class])->group(function () {
    Route::get('/edit-lectures', [LecturesController::class, 'editLectures'])->name('lecture.edit');
    Route::get('/lecture/{lecture}/edit', [LecturesController::class, 'singleLecture'])->name('lecture.single');
    Route::post('/lecture/update', [LecturesController::class, 'updateLecture'])->name('lecture.update');
});

Route::middleware(['auth', AdminCheck::class])->prefix('admin')->group(function () {
    Route::view('/', 'admin.admin-home');
    Route::get('/add-new-lecture', [LecturesController::class, 'addNewLecture'])->name('lecture.add');

    Route::post('/save-new-product', [LecturesController::class, 'saveNewLecture'])->name('lecture.save');
    Route::post('/lecture/delete', [LecturesController::class, 'deleteLecture'])->name('lecture.delete');
});


require __DIR__ . '/auth.php';

//Napravi ovako:
//- Authentikacija DONE
//- Role admin, moderator i user DONE
//- Sistem za dodavanje predavanja (+dodavanje slika) DONE
//- 	- Admin moze da dodaje predavanja, edituje i brise
//- - Moderator moze da samo edituje predavanja
//- - User moze da samo gleda predavanja

/*
 * Ostalo
 *      -Moderator Interface
 *      -User Insterface
 *      -Srediti Rute
 *
 * PITANJA
 *      -Da li je bolje praviti AdminController i funkcije u njemu da stoje koje su za admina
 *      ucitavalje bladeova, i logika vezana za to
 *      -Praviti Odvojene bladeove za moderatora admina i usera(koliko je okeij da se koristi if statemate za prikaz elemenata
 *
 */
