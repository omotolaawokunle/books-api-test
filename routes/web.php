<?php

use App\Models\Book;
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

Route::get('/', function () {
    return view('books.index', ['books' => Book::take(10)->get()]);
});

Route::get('/books/{book}/edit', function (Book $book) {
    return view('books.edit', ['book' => $book]);
})->name('edit-book');
