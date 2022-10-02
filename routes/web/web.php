<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\BookReserveConroller;
use App\Http\Controllers\BookReturnController;
use App\Http\Controllers\BookWriteOffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
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

Route::get('/', fn() => view('landingPage'));

Route::middleware(['auth', 'librarian'])->group(function (){
    Route::post('/search', [SearchController::class, 'search']);

//    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
    Route::get('/activity', [DashboardController::class, 'activity'])->name('dashboard.activity');

    Route::middleware('admin')->group(function () {
        Route::resource('/admins', AdminController::class);
        Route::delete('/admin/bulkdelete', [AdminController::class, 'bulkdelete'])->name('admin.bulkdelete');
        Route::put('/admins/{user}/resetPassword', [AdminController::class, 'passwordReset'])->name('admin.pwreset');
        Route::post('/admins/{user}/deleteProfilePhoto', [AdminController::class, 'deleteProfilePhoto'])->name('admin.delete-profile-photo');
    });

    Route::resource('/librarians', LibrarianController::class);
    Route::delete('/librarian/bulkdelete', [LibrarianController::class, 'bulkDelete'])->name('librarian.bulk-delete');
    Route::put('/librarians/{user}/resetPassword', [LibrarianController::class, 'passwordReset'])->name('librarian.pwreset');
    Route::post('/librarians/{user}/deleteProfilePhoto', [LibrarianController::class, 'deleteProfilePhoto'])->name('librarian.delete-profile-photo');

    Route::resource('/authors', AuthorController::class);
    Route::delete('/author/bulkdelete', [AuthorController::class, 'bulkDelete'])->name('author.bulk-delete');
    Route::post('/author/{author}/deleteProfilePhoto', [AuthorController::class, 'deleteProfilePhoto'])->name('author.delete-profile-photo');

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
    Route::post('/students/{user}/deleteProfilePhoto', [StudentController::class, 'deleteProfilePhoto'])->name('student.delete-profile-photo');
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

//    Route::post('/dfh', function (){
//        $diff =str_replace(['pre', 'nedelju', 'mesec', '1 sekundu', 'prije Danas'], ['prije', 'nedelja', 'mjesec', 'Danas', 'Danas'], \App\Models\Carbon::parse(date('Y-m-d', strtotime(request('date1'))))->diffForHumans(today('Europe/Belgrade'), null, false, 3));
//        return response()->json([
//            'diff'=>$diff
//        ]);
//    });

//    END-test routes

//    rute za ucenika koji se loguje na sajt - client
Route::middleware(['auth'])->group(function () {
    Route::controller(\App\Http\Controllers\Public\StudentController::class)->group(function () {
        Route::get('/me/edit', 'edit')->name('me.edit');
        Route::put('/me/update', 'update')->name('me.update');

        Route::get('/me/rezervisane', 'rezervisane')->name('me.rezervisane');

        Route::get('/me', 'show')->name('me.show');
    });

    Route::controller(\App\Http\Controllers\Public\BookController::class)->group(function () {
//        Route::get('/knjige', 'index')->name('knjige.index');
        Route::get('/knjige/{book}', 'show')->name('knjige.show');

        Route::post('/knjige/{book}/rezervisi', 'reserve')->name('knjige.reserve');
    });
});

Route::get('/knjige', [\App\Http\Controllers\Public\BookController::class, 'index'])->name('knjige.index');
Route::post('/client-search', [\App\Http\Controllers\Public\BookController::class, 'search'])->name('knjige.search');
