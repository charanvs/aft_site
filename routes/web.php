<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\JudgementController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Admin All Route
Route::middleware(['auth'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });
});


// Judgement Routes
Route::controller(JudgementController::class)->group(function () {
    Route::get('/cases/2015', 'ShowJudgements2015')->name('judgement2015.page');
    Route::get('/cases/2020', 'ShowJudgements2020')->name('judgement2020.page');
    Route::get('/cases/2024', 'ShowJudgements2024')->name('judgement2024.page');
    Route::get('/judgements/search', 'ShowJudgements')->name('judgements.page');
    Route::get('/judgements/search/fileno', 'ShowJudgementsFileno')->name('judgements.fileno');
    Route::get('/judgements/search/show/{id}', 'ShowJudgementsData')->name('judgements.show');
});

// Judgement Routes
Route::controller(FrontendController::class)->group(function () {
    Route::get('/members', 'Members')->name('members.page');
    Route::get('/daily_cause_list', 'DailyCauseList')->name('daily_cause_list.page');
    Route::get('/vacancies', 'Vacancies')->name('vacancies.page');
});

require __DIR__ . '/auth.php';
