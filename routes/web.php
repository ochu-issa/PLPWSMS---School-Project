<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\retrieveDataController;
use App\Http\Controllers\storeDataController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth_check', 'prevent_back_history']], function () {
    Route::get('/login-page', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/authentication', [AuthController::class, 'authentication'])->name('authentication');
});

Route::group(['middleware' => ['auth', 'prevent_back_history']], function () {
    Route::get('/', [retrieveDataController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [retrieveDataController::class, 'Profile'])->name('profile');
    Route::get('/usermgt', [retrieveDataController::class, 'Usermgt'])->name('usermgt');
    Route::get('/retrievesubject', [retrieveDataController::class, 'retrieveSubject'])->name('retrievesubject');
    Route::get('/retrievetopic', [retrieveDataController::class, 'retrieveTopic'])->name('retrievetopic');
    Route::get('/workingscheme', [retrieveDataController::class, 'workingScheme'])->name('workingscheme');
    Route::get('/schemedetails/{id}', [retrieveDataController::class, 'schemeDetails'])->name('schemedetails');
    Route::get('/retrieveteacher', [retrieveDataController::class, 'retrieveTeacher'])->name('teacher');
    Route::get('/retrieveacademicmaster', [retrieveDataController::class, 'retrieveAcademicMaster'])->name('retrieveacademicmaster');
    Route::post('/createperiod', [storeDataController::class, 'createSchemePeriod'])->name('createperiod');
    Route::post('/createteacher', [storeDataController::class, 'createteacher'])->name('createteacher');
    Route::post('/createacademicmaster', [storeDataController::class, 'createAcademicMaster'])->name('createacademicmaster');
    Route::get('/lessonplan', [retrieveDataController::class, 'lessonPlan'])->name('lessonplan');
    Route::get('/plandetails/{id}', [retrieveDataController::class, 'planDetails'])->name('plandetails');
    Route::post('/addplan', [storeDataController::class, 'addPlan'])->name('addplan');


    Route::get('/logout-page', [AuthController::class, 'logout'])->name('logout');

});
