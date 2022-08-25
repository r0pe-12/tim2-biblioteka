<?php

use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\BookReserveConroller;
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

    //Route::get('/', fn() => view('dashboard.index'));
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard.index');
    //Route::get('/activity', fn() => view('dashboard.activity'));
    Route::get('/activity', [\App\Http\Controllers\DashboardController::class, 'activity'])->name('dashboard.activity');

    Route::resource('/librarians', LibrarianController::class);
    Route::delete('/librarian/bulkdelete', [LibrarianController::class, 'bulkDelete'])->name('librarian.bulk-delete');
    Route::put('/librarians/{user}/resetPassword', [LibrarianController::class, 'passwordReset'])->name('librarian.pwreset');

    Route::resource('/authors', AuthorController::class);
    Route::delete('/author/bulkdelete', [AuthorController::class, 'bulkDelete'])->name('author.bulk-delete');

//    rute za knjigu
        Route::resource('/books', BookController::class);
        Route::delete('/book/bulkdelete', [BookController::class, 'bulkDelete'])->name('book.bulk-delete');
        Route::controller(BookBorrowController::class)->group(function (){
    //        izdaj knjigu
            Route::get('/books/{book}/izdaj', 'izdajForm')->name('book.izdaj.create');
            Route::post('/books/{book}/izdaj', 'izdaj')->name('izdaj.store');
    //        END-izdaj knjigu

            Route::get('/izdate', 'izdate')->name('evidencija.izdate');
            Route::get('/books/{book}/evidencija/izdate', 'izdate1')->name('book.izdate1');
            Route::get('/books/{book}/evidencija/{borrow}/show', 'show')->name('book.izdate.show');

//            delete-zapis
            Route::delete('/books/izdate/{borrow}', 'destroy')->name('izdate.destroy');
//            ENDdelete-zapis

        });

        Route::controller(BookWriteOffController::class)->group(function (){
    //      otpisi knjigu
            Route::get('/books/{book}/otpisi', 'otpisiForm')->name('book.otpisi.create');
            Route::put('/books/{book}/otpisi', 'otpisi')->name('otpisi.store');
    //      END-otpisi knjigu




            Route::get('/prekoracene', 'prekoracene')->name('evidencija.prekoracene');
            Route::get('/books/{book}/evidencija/prekoracene', 'prekoracene1')->name('book.prekoracene');

            Route::get('/otpisane', 'otpisane')->name('evidencija.otpisane');
            Route::get('/books/{book}/evidencija/otpisane', 'otpisane1')->name('book.otpisane');
        });

        Route::controller(BookReturnController::class)->group(function (){
    //      vrati knjigu
            Route::get('/books/{book}/vrati', 'vratiForm')->name('book.vrati.create');
            Route::put('/books/{book}/vrati', 'vrati')->name('vrati.store');
    //      END-vrati knjigu

            Route::get('/vracene', 'vracene')->name('evidencija.vracene');
            Route::get('/books/{book}/evidencija/vracene', 'vracene1')->name('book.vracene1');
        });

        Route::controller(BookReserveConroller::class)->group(function (){
    //      rezervisi knjigu
            Route::get('/books/{book}/rezervisi', 'reserveForm')->name('book.reserve.create');
            Route::post('/books/{book}/rezervisi', 'reserve')->name('reserve.store');
    //      END-rezervisi knjigu
            Route::get('/aktivne-rezervacije', 'active')->name('evidencija.aktivne-rezervacije');
            Route::get('/arhivirane-rezervacije', 'archive')->name('evidencija.arhivirane-rezervacije');
    //      rezervacije jedne knjige
            Route::get('/books/{book}/evidencija/aktivne-rezervacije', 'active1')->name('evidencija.aktivne-rezervacije1');
            Route::get('/books/{book}/evidencija/arhivirane-rezervacije', 'archive1')->name('book.arhivirane-rezervacije1');
    //      ENDrezervacije jedne knjige
    //      otkazi rezervaciju
            Route::put('/rezervacija/{reservation}/otkazi', 'cancel')->name('rezervacija.otkazi');
    //      END-otkazi rezervaciju

            Route::get('/books/{book}/rezervacija/{reservation}/show', 'show')->name('book.rezervisane.show');
//            obrisi zapis
            Route::delete('/books/rezervisane/{reservation}', 'destroy')->name('rezervisane.destroy');
//            ENDobrisi zapis
        });
//    END-rute za knjigu

    Route::resource('/students', StudentController::class);
    Route::delete('/student/bulkdelete', [StudentController::class, 'bulkDelete'])->name('student.bulk-delete');
    Route::put('/students/{user}/resetPassword', [StudentController::class, 'passwordReset'])->name('student.pwreset');
    Route::controller(StudentController::class)->prefix('/students/{student:username}')->group(function (){
        Route::get('/izdate', 'izdate')->name('ucenik.izdate');
        Route::get('/vracene', 'vracene')->name('ucenik.vracene');
        Route::get('/otpisane', 'otpisane')->name('ucenik.otpisane');
        Route::get('/prekoracene', 'prekoracene')->name('ucenik.prekoracene');
        Route::get('/aktivne-rezervacije', 'aktivne')->name('ucenik.aktivne');
        Route::get('/arhivirane-rezervacije', 'arhivirane')->name('ucenik.arhivirane');
    });
});

//    test routes



//    END-test routes

