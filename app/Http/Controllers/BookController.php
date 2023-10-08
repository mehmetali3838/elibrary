<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function bookDetail($id)
    {
        $book = Book::with('author')->where('id', $id)->first();
        return view('book-detail', compact('book'));
    }
}
