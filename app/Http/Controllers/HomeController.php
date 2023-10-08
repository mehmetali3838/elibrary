<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        // Tüm kullanıcıları al
        $allUsers = User::all();

        // Kiralanan kitapları kiralama yapmış kullanıcıların listesine ekle
        $rentedUsers = UserBook::pluck('user_id')->unique();

        // Kitap kiralamayan kullanıcıları bul
        $noRentedBookUsers = $allUsers->reject(function ($user) use ($rentedUsers) {
            return $rentedUsers->contains($user->id);
        });


        //EN ÇOK KİTAP KİRALAYAN ÖĞRENCİ
        $mostRentedStudent = UserBook::select('user_id', \DB::raw('COUNT(*) as rented_count'))
            ->groupBy('user_id')
            ->orderByDesc('rented_count')
            ->with('user')
            ->first();

        //KİRALANAN TÜM KİTAPLARIN SAYISI LAZIM
        $rentedBooks = UserBook::count();

        //TÜM KİTAPLAR
        $books = Book::all();

        //YAZARLAR VE KİTAPLARI
        $authorBooks = Author::with('books')->get();


        //YAŞI 15'TEN BÜYÜK OLAN ÖĞRENCİLER
        $bigStudents = User::where('age', '>', '15')->get();

        return view('home', compact('books', 'rentedBooks', 'mostRentedStudent', 'noRentedBookUsers', 'authorBooks', 'bigStudents'));
    }
}
