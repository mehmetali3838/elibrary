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
    <div class="books-area">
        <div class="book">
            {{ $book->book_name }}
            {{ $book->author->name_surname }}
            @auth
                <form method="POST" action="{{ route('rentABook', $book->id) }}">
                    @csrf
                    <button>Rent a book</button>
                </form>
            @else
                <h3>Please <a href="/login">login</a></h3>
            @endauth
        </div>
    </div>
</body>

</html>
