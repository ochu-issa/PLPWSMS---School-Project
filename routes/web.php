<?php

use App\Http\Controllers\retrieveDataController;
use Illuminate\Support\Facades\Route;

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
    return view('empty');
});

Route::get('/profile', [retrieveDataController::class, 'Profile'])->name('profile');
Route::get('/usermgt', [retrieveDataController::class, 'Usermgt'])->name('usermgt');
Route::get('/retrievesubject', [retrieveDataController::class, 'retrieveSubject'])->name('retrievesubject');
Route::get('/retrievetopic', [retrieveDataController::class, 'retrieveTopic'])->name('retrievetopic');
Route::get('/workingscheme', [retrieveDataController::class, 'workingScheme'])->name('workingscheme');