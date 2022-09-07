<?php

use App\Http\Controllers\BookListController;
use App\Http\Controllers\HomeController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/delete/{reserve}', [HomeController::class, 'destroy'])->name('home.destroy');
    Route::get('/', HomeController::class);
    //Books
    Route::get('/get-book-list', [BookListController::class, 'getBookList']);
    Route::put('/book-list/{book}/reserve', [BookListController::class, 'reserve']);
    Route::resource('book-list', BookListController::class)->parameters(['book-list' => 'book']);
});
