<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('/surveys', SurveyController::class);
    Route::get('/question/{survey}', [QuestionController::class, 'getQuestion']);
    Route::get('/survey', function () {
        return view('survey');
    });
    Route::get('/admin', function () {
        return view('admin.surveys');
    });
    Route::middleware('isAdmin:1')->group(function () {
        Route::get('/get-user', [UserController::class, 'getCurrentUser']);
    });
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
