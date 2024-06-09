<?php

use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\JudgementController;
use App\Http\Controllers\File\FileController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


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
    Route::get('/judgements/search/all', 'JudgementsSearch')->name('judgements.search');
    Route::get('/judgements/search/type/{casetype}', 'JudgementsSearchType')->name('judgements.search.type');
    Route::get('/judgements/search/casedate/{casedate}', 'JudgementsSearchDate')->name('judgements.search.date');
    Route::get('/judgements/search/subject/{subject}', 'JudgementsSearchSubject')->name('judgements.search.subject');

    Route::get('/judgements/search/advocate/{advocate}', 'JudgementsSearchAdvocate')->name('judgements.search.advocate');
    Route::get('/judgements/search/show/{id}', 'ShowJudgementsData')->name('judgements.show');
    Route::get('/judgements/pdf/{id}', 'ShowPdf')->name('judgements.pdf');
    Route::get('/judgements/reportable', 'ReportableJudgements')->name('judgements.reportable');
    Route::get('/judgements/large/bench', 'LargeBenchJudgements')->name('judgements.largebench');
});

// Judgement Routes
Route::controller(FrontendController::class)->group(function () {
    Route::get('/home', 'Home')->name('home');
    Route::get('/members', 'Members')->name('members.page');
    Route::get('/daily_cause_list', 'DailyCauseList')->name('daily_cause_list.page');
    Route::get('/vacancies', 'Vacancies')->name('vacancies.page');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(TeamController::class)->group(function () {
        Route::get('/all/team', 'AllTeam')->name('all.team');
        Route::get('/add/team', 'AddTeam')->name('add.team');
        Route::post('/team/store', 'StoreTeam')->name('team.store');
        Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
        Route::post('/team/update', 'UpdateTeam')->name('team.update');
    });
});

require __DIR__ . '/auth.php';

Route::get('/standardize-filenames', [FileController::class, 'standardizeFilenames']);
Route::get('/file/name/change', [FileController::class, 'FileNameChange']);
