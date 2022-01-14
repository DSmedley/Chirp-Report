<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\AnalysesController;
use App\Http\Controllers\CashtagController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class,'getHome'])->name('welcome');
Route::get('/about', [PagesController::class,'getAbout'])->name('about');
Route::get('/contact', [PagesController::class,'getContact'])->name('contact');

Route::get('/analyze', [AnalysesController::class,'index'])->name('analyze');
Route::post('/analyze', [AnalysesController::class,'analyze'])->name('analysis');
Route::post('/analyze/{name}', [AnalysesController::class,'analyze'])->name('analysis.name');
Route::get('/analysis/{id}/{name}', [AnalysesController::class,'getAnalysis'])->name('analysis.view');
Route::get('/save/{id}', [UserController::class,'linkAnalysis'])->name('analysis.save');

Route::get('/cashtag', [CashtagController::class,'index'])->name('cashtag');
Route::post('/cashtag', [CashtagController::class,'analyze'])->name('cashtag');
Route::post('/cashtag/{cashtag}', [CashtagController::class,'analyze'])->name('cashtag.name');
Route::get('/cashtag/{id}/{cashtag}', [CashtagController::class,'getCashtag'])->name('cashtag.view');

Route::get('/hashtag', [HashtagController::class,'index'])->name('hashtag');
Route::post('/hashtag', [HashtagController::class,'analyze'])->name('hashtag');
Route::post('/hashtag/{hashtag}', [HashtagController::class,'analyze'])->name('hashtag.name');
Route::get('/hashtag/{id}/{hashtag}', [HashtagController::class,'getHashtag'])->name('hashtag.view');

Route::get('/compare', [CompareController::class,'index'])->name('compare');
Route::post('/compare', [CompareController::class,'compare'])->name('compare');
Route::get('/compare/{first}/{second}/{third?}/{fourth?}', [CompareController::class,'getCompare'])->name('compare.view');

Auth::routes();

Route::prefix('user')->group(function(){
    Route::get('/', [UserController::class,'index'])->name('user');
    Route::get('/edit', [UserController::class,'edit'])->name('user.edit');
    Route::post('/edit', [UserController::class,'updateProfile']);
    Route::get('/inbox', [UserController::class,'inbox'])->name('user.inbox');
});

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminLoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class,'login'])->name('admin.login.submit');
    Route::get('/', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/logout', [AdminLoginController::class,'logout'])->name('admin.logout');
    Route::get('/settings', [AdminController::class,'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class,'updateSettings']);
    Route::get('/users', [AdminController::class,'users'])->name('admin.users');
    Route::get('/users/{id}', [AdminController::class,'getUser'])->name('admin.user.edit');
    Route::post('/users/{id}', [AdminController::class,'updateUser'])->name('admin.user.edit');
    Route::get('/users/ban/{id}', [AdminController::class,'banUser'])->name('admin.user.ban');
    Route::get('/users/unban/{id}', [AdminController::class,'unbanUser'])->name('admin.user.unban');

});
