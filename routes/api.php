<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ExternalBooksController;
use App\Models\Book;
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

Route::get('external-books', [ExternalBooksController::class, 'getBooks']);

Route::prefix('/v1/books')->group(function () {
    Route::post('/', [BookController::class, 'store']);
    Route::get('/', [BookController::class, 'index']);
    Route::patch('/{book}', [BookController::class, 'update'])->whereNumber("book");
    Route::delete('/{book}', [BookController::class, 'destroy'])->whereNumber("book");
    Route::get('/{book}', [BookController::class, 'show'])->whereNumber("book");
});
