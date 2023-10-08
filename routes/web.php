<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserBookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

//AUTHOR SECTION

//GET

Route::get('/admin/edit-author', [AdminController::class, 'editAuthor'])->name('dashboardAuthor');

Route::get('/admin/edit-author/detail/{id}', [AdminController::class, 'authorDetail'])->name('authorDetail');

//POST

Route::post('createAuthor', [AdminController::class, 'createAuthor'])->name('createAuthor');

Route::post('updateAuthor/{id}', [AdminController::class, 'updateAuthor'])->name('updateAuthor');

Route::post('deleteAuthor/{id}', [AdminController::class, 'deleteAuthor'])->name('deleteAuthor');





//BOOK SECTION

//GET

Route::get('/admin/edit-book', [AdminController::class, 'editBook'])->name('dashboardBook');

Route::get('/admin/edit-book/detail/{id}', [AdminController::class, 'bookDetail'])->name('editBookDetail');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');


//POST

Route::post('createBook', [AdminController::class, 'createBook'])->name('createBook');

Route::post('updateBook/{id}', [AdminController::class, 'updateBook'])->name('updateBook');

Route::post('deleteBook/{id}', [AdminController::class, 'deleteBook'])->name('deleteBook');




//AUTH SECTION

Route::get('/login', [AuthController::class, 'login']);

Route::post('login', [AuthController::class, 'loginUser'])->name('loginUser');

Route::get('/register', [AuthController::class, 'register']);

Route::post('register', [AuthController::class, 'registerUser'])->name('registerUser');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');





//BOOK SECTION

Route::get('/book-detail/{id}', [BookController::class, 'bookDetail'])->name('bookDetail');

Route::post('userBook/{id}', [UserBookController::class, 'rentABook'])->name('rentABook');

Route::get('/user-books/{id}', [UserBookController::class, 'userBooks'])->name('userBooks');
