<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CurrentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCurrentController;
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
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('redirects','App\Http\Controllers\HomeController@index')->middleware(['auth:sanctum', 'verified'])->name('redirects');

Route::resource('categories', CategoriesController::class)->middleware(['auth:sanctum', 'verified','isAdmin']);

Route::resource('current', CurrentController::class)->middleware(['auth:sanctum', 'verified', 'isAdmin']);

Route::resource('user', UserController::class)->middleware(['auth:sanctum', 'verified','isUser']);

Route::resource('userCurrent', UserCurrentController::class)->middleware(['auth:sanctum', 'verified','isUser']);
