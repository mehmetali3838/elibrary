<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    //BOOK SECTION

    public function editBook()
    {
        $authors = Author::all();
        $books = Book::all();
        return view('admin.edit-book', compact('books', 'authors'));
    }

    public function createBook(Request $request)
    {
        $book = [
            'book_name' => $request->input('book_name'),
            'barkod_no' => $request->input('barkod_no'),
            'page_number' => $request->input('page_number'),
            'price' => $request->input('price'),
            'author_id' => $request->input('author_id'),
        ];

        $create = Book::create($book);

        if ($create) {
            return redirect()->back();
        }
    }

    public function bookDetail($id)
    {
        $book = Book::with("author")->where('id', $id)->first();
        return view('admin.edit-book-detail', compact('book'));
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);
        $book->book_name = $request->input('book_name');
        $book->barkod_no = $request->input('barkod_no');
        $book->page_number = $request->input('page_number');
        $book->price = $request->input('price');
        $book->save();
        return redirect('/admin/edit-book');
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->back();
    }






    //AUTHOR SECTION

    public function editAuthor()
    {
        $authors = Author::all();
        return view('admin.edit-author', compact('authors'));
    }

    public function createAuthor(Request $request)
    {
        $author = [
            'name_surname' => $request->input('name_surname'),
            'age' => $request->input('age'),
            'birthday' => $request->input('birthday'),
            'deathday' => $request->input('deathday'),
        ];

        $create = Author::create($author);

        if ($create) {
            return redirect()->back();
        } else {
            dd('Create error');
        }
    }

    public function authorDetail($id)
    {
        $author = Author::find($id);
        return view('admin.edit-author-detail', compact('author'));
    }

    public function updateAuthor(Request $request, $id)
    {
        $author = Author::find($id);
        $author->name_surname = $request->input('name_surname');
        $author->age = $request->input('age');
        $author->birthday = $request->input('birthday');
        $author->deathday = $request->input('deathday');
        $author->save();
        return redirect('/admin/edit-author');
    }

    public function deleteAuthor($id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->back();
    }
}
