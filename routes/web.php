<?php

use App\Http\Controllers\BookController;
use App\Models\Author;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Book;

Route::inertia('/home', 'welcome')->name('home');

// Route::get('/', HomeController::class);

// Route::get('api/users/{username}', UserController::class . '@show');

// Route::get('authors', function() {
//     /*
//     $author = new Author;
//     $author->name = 'F. Scott Fitzgerald';
//     $author->nationality = 'American';
//     $author->save();
    
//     return $author;
//     */

//     // $author = new Author;
//     // $author->name = 'Gabriel García Márquez';
//     // $author->nationality = 'Colombian';
//     // $author->save();

//     // return $author;
// });


/** CREAR CADA RUTA DE MANERA INDIVIDUAL */

// Route::get('books', BookController::class . '@index') ->name('books.index');

// Route::get('books/create', BookController::class . '@create') ->name('books.create');

// Route::post('books', BookController::class . '@store') ->name('books.store');

// Route::get('books/{bookId}', BookController::class . '@show') ->name('books.show');

// Route::get('books/{bookId}/edit', BookController::class . '@edit') ->name('books.edit');

// Route::put('books/{bookId}', BookController::class . '@update') ->name('books.update');

// Route::delete('books/{bookId}', BookController::class . '@destroy') ->name('books.destroy');


/** CREAR TODAS LAS RUTAS DE MANERA AUTOMÁTICA */

Route::resource('books', BookController::class);