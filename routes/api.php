<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'check.token'], function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login')->name('api-login');
        Route::post('register', 'register')->name('api-register');
    });

});

Route::group(['middleware' => 'auth:sanctum'], function () {
//    user
    Route::controller(StudentController::class)->group(function () {
        Route::post('/users/me', 'me')->name('api-me');
        Route::put('/users/me', 'update')->name('api-update');

        Route::get('/users/me/izdavanja', 'izdavanja');
        Route::get('/users/me/rezervacije', 'rezervacije');
    });
//    END-user

//    knjige
    Route::controller(BookController::class)->group(function () {
        Route::get('/categories', 'categories');

        Route::get('/books', 'index')->name('api.books.index');
        Route::get('/books/{book}', 'show');
        Route::post('/books/{book}/reserve', 'reserve');

        Route::post('/books/{book}/review', 'review');
    });
//    END-knjige
});
