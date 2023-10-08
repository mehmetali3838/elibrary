<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    .books-area {
        width: 100%;
        height: auto;
        display: flex;
    }

    .book {
        width: 300px;
        height: 300px;
        background-color: red;
        margin-left: 50px;
        display: flex;
        flex-direction: column;
    }
</style>

<body>
    <a href="{{ route('dashboard') }}">Dashboard</a>


    <div class="login-section">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button>Logout</button>
                <a href="{{ route('userBooks', Auth::id()) }}">Rented books</a>
            </form>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>


    <div class="books-area">
        @foreach ($books as $book)
            <div class="book">
                {{ $book->book_name }}
                <a href="{{ route('bookDetail', $book->id) }}">Detail</a>
            </div>
        @endforeach
    </div>

    <h3>KİRALANAN TOPLAM KİTAP SAYISI = {{ $rentedBooks }}</h3>
    @if ($mostRentedStudent)
        <h3>EN ÇOK KİTAP KİRALAYAN ÖĞRENCİ = {{ $mostRentedStudent->user->name_surname }}</h3>
    @else
    @endif


    <h3>KÜTÜPHANEDE HİÇ KİTAP KİRALAMAMIŞ ÖĞRENCİLERİN LİSTESİ</h3>
    <table border="1">
        <tr>
            <td>Name surname</td>
            <td>age</td>
            <td>address</td>
        </tr>
        @foreach ($noRentedBookUsers as $user)
            <tr>
                <td>{{ $user->name_surname }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->address }}</td>
            </tr>
        @endforeach
    </table>



    <h3>YAZARLARIN KİTAP SAYILARININ LİSTESİ</h3>
    <table border="1">
        <tr>
            <td>Name surname</td>
            <td>age</td>
        </tr>
        @foreach ($authorBooks as $author)
            <tr>
                <td>{{ $author->name_surname }}</td>
                <td>{{ $author->age }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <ul>
                        @foreach ($author->books as $book)
                            <li>{{ $book->book_name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>YAŞI 15 TEN BÜYÜK OLAN ÖĞRENCİLER</h3>
    <table border="1">
        <tr>
            <td>Name surname</td>
            <td>age</td>
            <td>address</td>
        </tr>
        @foreach ($bigStudents as $user)
            <tr>
                <td>{{ $user->name_surname }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->address }}</td>
            </tr>
        @endforeach
    </table>


</body>

</html>
