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
        @foreach ($userBooks as $userBook)
            <div class="book">
                <p>{{ $userBook->book->book_name }}</p>
            </div>
        @endforeach
    </div>
</body>

</html>
