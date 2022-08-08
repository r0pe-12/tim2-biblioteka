<?php

use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\BookWriteOffController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LibrarianController;
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

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/', fn() => view('dashboard.index'));
    Route::get('/activity', fn() => view('dashboard.activity'));

    Route::resource('/librarians', LibrarianController::class);
    Route::put('/librarians/{user}/resetPassword', [LibrarianController::class, 'passwordReset'])->name('librarian.pwreset');

    Route::resource('/authors', AuthorController::class);

//    rute za knjigu
        Route::resource('/books', BookController::class);
        Route::controller(BookBorrowController::class)->group(function (){
    //        izdaj knjigu
            Route::get('/books/{book}/izdaj', 'izdajForm')->name('izdaj.create');
            Route::post('/books/{book}/izdaj', 'izdaj')->name('izdaj.store');
    //        END-izdaj knjigu

            Route::get('/izdate', 'izdate')->name('izdate');
            Route::get('/books/{book}/evidencija/izdate', 'izdate1')->name('izdate1');
            Route::get('/books/{book}/evidencija/izdate/{borrow}', 'show')->name('izdate.show');

        });

        Route::controller(BookWriteOffController::class)->group(function (){
    //      otpisi knjigu
            Route::get('/books/{book}/otpisi', 'otpisiForm')->name('otpisi.create');
            Route::put('/books/{book}/otpisi', 'otpisi')->name('otpisi.store');
    //      END-otpisi knjigu

            Route::get('/prekoracene', 'prekoracene')->name('prekoracene');
            Route::get('/books/{book}/evidencija/prekoracene', 'prekoracene1')->name('prekoracene1');
        });

        Route::controller(BookReturnController::class)->group(function (){
    //      vrati knjigu
            Route::get('/books/{book}/vrati', 'vratiForm')->name('vrati.create');
            Route::put('/books/{book}/vrati', 'vrati')->name('vrati.store');
    //      END-vrati knjigu

            Route::get('/vracene', 'vracene')->name('vracene');
            Route::get('/books/{book}/evidencija/vracene', 'vracene1')->name('vracene1');
        });
//    END-rute za knjigu

    Route::resource('/students', StudentController::class);
    Route::put('/students/{user}/resetPassword', [StudentController::class, 'passwordReset'])->name('student.pwreset');
});

Route::get('/arhivirane', function (){
    return view('izdavanje.arhivirane');
});

Route::get('/arhivirane1', function (){
    return view('book.evidencija.arhivirane');
});
