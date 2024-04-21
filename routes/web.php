<?php

use App\Http\Controllers\LecturesController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.admin-home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminCheck::class])->prefix('admin')->group(function () {

    Route::get('/add-new-lecture', [LecturesController::class, 'addNewLecture'])->name('lecture.add');
    Route::get('/all-lectures', [LecturesController::class, 'allLectures'])->name('lecture.all');
    Route::get('/edit-lectures', [LecturesController::class, 'editLectures'])->name('lecture.edit');

    Route::post('/save-new-product', [LecturesController::class, 'saveNewLecture'])->name('lecture.save');
    Route::post('/admin/lecture/delete',[LecturesController::class,'deleteLecture'])->name('lecture.delete');
});

require __DIR__ . '/auth.php';

//Napravi ovako:
//- Authentikacija DONE
//- Role admin, moderator i user DONE
//- Sistem za dodavanje predavanja (+dodavanje slika) DONE
//- 	- Admin moze da dodaje predavanja, edituje i brise
//- - Moderator moze da samo edituje predavanja
//- - User moze da samo gleda predavanja
