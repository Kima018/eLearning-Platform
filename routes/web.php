<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/allLectures');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', \App\Http\Middleware\AdminCheck::class])->prefix('admin')->group(function () {
    Route::get('/add-new-lecture', [\App\Http\Controllers\LecturesController::class, 'addNewLecture'])->name('lecture.add');
    Route::get('/all-lectures', [\App\Http\Controllers\LecturesController::class, 'allLectures'])->name('lecture.all');

    Route::post('/save-new-product', [\App\Http\Controllers\LecturesController::class, 'saveNewLecture'])->name('lecture.save');
});


require __DIR__ . '/auth.php';

//Napravi ovako:
//- Authentikacija
//- ⁠Role admin, moderator i user
//- ⁠Sistem za dodavanje predavanja
//- ⁠	- Admin moze da dodaje predavanja, edituje i brise
//- ⁠- Moderator moze da samo edituje predavanja
//- ⁠- User moze da samo gleda predavanja
