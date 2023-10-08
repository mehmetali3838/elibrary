<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('createBook') }}">
        @csrf
        <input type="text" name="book_name" placeholder="book_name">
        <input type="text" name="barkod_no" placeholder="barkod_no">
        <input type="text" name="page_number" placeholder="page_number">
        <input type="text" name="price" placeholder="price">
        <select name="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name_surname }}</option>
            @endforeach
        </select>
        <button type="submit">Create</button>
    </form>

    <table border="1">
        <tr>
            <td>book_name</td>
            <td>barkod_no</td>
            <td>page_number</td>
            <td>price</td>
            <td>Delete</td>
            <td>Deatil</td>
        </tr>
        @foreach ($books as $book)
            <form method="POST" action="{{ route('deleteBook', $book->id) }}">
                @csrf
                <tr>
                    <td>{{ $book->book_name }}</td>
                    <td>{{ $book->barkod_no }}</td>
                    <td>{{ $book->page_number }}</td>
                    <td>{{ $book->price }}</td>
                    <td><button type="submit">Delete</button></td>
                    <td><a href="{{ route('editBookDetail', $book->id) }}">Detay</a></td>
                </tr>
            </form>
        @endforeach
    </table>
</body>

</html>
