<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\UserController;
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

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);
});

Route::get('/', [BookController::class, 'welcome']);
Route::get('/home', [BookController::class, 'home'])->middleware('auth');

//книги
Route::resource('/books', BookController::class)->middleware('auth');
Route::get('/books/{slug}/exchange_request', [BookController::class, 'bookRequest'])->name('exchange.request');

//повідомлення
Route::get('/exchange_notifications', [NotificationsController::class, 'lookRequests'])->name('exchange.request');

Route::get('/exchanges/{id}/choose_exchange_book', [BookController::class, 'choose_exchange_book'])->middleware('auth');
Route::post('/exchanges/{id}/accept/{book_id}', [BookController::class, 'accept_exchange_book'])->middleware('auth');
//Route::post('/books/{slug}/order', BookController::class);
//Route::get('/books', [BookController::class, 'get_all_books'])->middleware('auth');
//профіль
Route::get('/profile/{slug}', [UserController::class, 'get_profile'])->middleware('auth');

