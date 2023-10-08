<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('updateBook', $book->id) }}">
        @csrf
        <input type="text" name="book_name" value="{{ $book->book_name }}">
        <input type="text" name="barkod_no" value="{{ $book->barkod_no }}">
        <input type="text" name="page_number" value="{{ $book->page_number }}">
        <input type="text" name="price" value="{{ $book->price }}">
        <button type="submit">Update</button>
    </form>
</body>

</html>
