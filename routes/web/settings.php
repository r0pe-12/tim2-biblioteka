<?php

use App\Http\Controllers\BookBindController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
*/

Route::resource('/policy', PolicyController::class);

Route::resource('/category', CategoryController::class);
Route::delete('/categories/bulkDelete', [CategoryController::class, 'bulkDelete'])->name('category.bulkDelete');

Route::resource('/genre', GenreController::class);
Route::resource('/publisher', PublisherController::class);
Route::resource('/bookbind', BookBindController::class);
Route::resource('/format', FormatController::class);
Route::resource('/script', ScriptController::class);
Route::resource('/language', LanguageController::class);
