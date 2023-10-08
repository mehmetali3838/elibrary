<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('updateAuthor', $author->id) }}">
        @csrf
        <input type="text" name="name_surname" value="{{ $author->name_surname }}">
        <input type="text" name="age" value="{{ $author->age }}">
        <input type="text" name="birthday" value="{{ $author->birthday }}">
        <input type="text" name="deathday" value="{{ $author->deathday }}">
        <button type="submit">Update</button>
    </form>
</body>

</html>
