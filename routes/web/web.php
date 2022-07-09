<?php
use App\Http\Controllers\StudentController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/librarians', LibrarianController::class);
Route::put('/librarians/{user}/resetPassword', [LibrarianController::class, 'passwordReset'])->name('librarian.pwreset');

Route::resource('/students', StudentController::class);

