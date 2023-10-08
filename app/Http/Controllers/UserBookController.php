<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class UserBookController extends Controller
{

    public function userBooks($id)
    {
        $user = User::find($id);

        $userId = $user->id;

        $userBooks = UserBook::with('book', 'user')
            ->where('user_id', $userId)
            ->get();

        return view('books', compact('userBooks'));
    }

    public function rentABook($id)
    {
        $userId = Auth::id();
        $book = Book::find($id);
        $bookId = $book->id;

        $userBook = [
            'user_id' => $userId,
            'book_id' => $bookId,
        ];

        //Bir kullanıcı aynı kitabı birden fazla kiralayamaz
        $check1 = UserBook::where('user_id', Auth::id())->where('book_id', $bookId)->first();

        //Herhangi bir kullanıcı daha önce kiralanmış (aktif olarak kirada olan) kitabı kiralayamaz
        $check2 = UserBook::where('book_id', $bookId)->first();


        if ($check1) {
            dd('Aynı kitabı birden fazla kez kiralayamazsınız');
        } else if ($check2) {
            dd('Bu kitap daha önce kiralanmış');
        } else {

            $create = UserBook::create($userBook);
            //Kullanıcı kitabı başarılı bir şekilde kiraladıysa olacaklar
            if ($create) {
                return redirect("/");
            }

            //Kitap eklenirken hata oluşursa dönecek hata
            else {
                dd('Error');
            }
        }
    }
}
