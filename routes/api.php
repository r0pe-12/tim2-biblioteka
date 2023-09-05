<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;
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
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout')->name('api-logout');
    });

    Route::controller(UserController::class)->group(function () {
        Route::post('/users/me', 'me')->name('api-me');
        Route::put('/users/me', 'updateMe')->name('api-update-me');

        Route::get('/users/me/izdavanja', 'izdavanjaMe');
        Route::get('/users/me/rezervacije', 'rezervacijeMe');
    });
//    END-user

    Route::group(['middleware' => 'librarian'], function () {
        //    knjige
        Route::controller(BookController::class)->group(function () {
            Route::get('/books', 'index')->name('api.books.index');

            Route::get('/books/create', 'create');
            Route::post('/books/store', 'store');

            Route::get('/books/{book}/edit', 'edit');
            Route::post('/books/{book}/update', 'update');

            Route::delete('/books/{book}/destroy', 'destroy');
            Route::delete('/books/bulkdelete', 'bulkDelete');

            Route::post('/books/{book}/reserve', 'reserve');
            Route::get('/books/reservations', 'reservations');
            Route::delete('/books/reservations/{reservation}/destroy', 'deleteReservation');
            Route::post('/books/reservations/cancel', 'cancelReservation');

            Route::post('/books/{book}/izdaj', 'izdaj');
            Route::get('/books/borrows', 'borrows');
            Route::delete('/books/borrows/{borrow}/destroy', 'deleteBorrow');
            Route::post('/books/vrati', 'vrati');
            Route::post('/books/otpisi', 'otpisi');

            Route::post('/books/{book}/review', 'review');

            Route::get('/books/{book}', 'show');
        });
        //    END-knjige

        //  students
        Route::controller(UserController::class)->group(function () {
            Route::get('/users', 'index');
            Route::get('/users/{user}', 'show');
            Route::post('/users/store', 'store');
            Route::put('/users/{student}', 'update');
            Route::delete('users/{user}', 'destroy');
        });
        //  END-students

        //  authors
        Route::controller(AuthorController::class)->group(function () {
            Route::get('/authors', 'index');
            Route::get('/authors/{author}', 'show');
            Route::post('/authors/store', 'store');
            Route::put('/authors/{author}', 'update');
            Route::delete('/authors/{author}', 'destroy');
        });
        //  END-authors
    });

});
