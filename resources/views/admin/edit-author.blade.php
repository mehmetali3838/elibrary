<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('createAuthor') }}">
        @csrf
        <input type="text" name="name_surname" placeholder="name_surname">
        <input type="text" name="age" placeholder="age">
        <input type="text" name="birthday" placeholder="birthday">
        <input type="text" name="deathday" placeholder="deathday">
        <button type="submit">Create</button>
    </form>

    <table>
        <tr>
            <td>name_surname</td>
            <td>age</td>
            <td>birthday</td>
            <td>deathday</td>
            <td>Delete</td>
            <td>Deatil</td>
        </tr>
        @foreach ($authors as $author)
            <form method="POST" action="{{ route('deleteAuthor', $author->id) }}">
                @csrf
                <tr>
                    <td>{{ $author->name_surname }}</td>
                    <td>{{ $author->age }}</td>
                    <td>{{ $author->birthday }}</td>
                    <td>{{ $author->deathday }}</td>
                    <td><button type="submit">Delete</button></td>
                    <td><a href="{{ route('authorDetail', $author->id) }}">Detay</a></td>
                </tr>
            </form>
        @endforeach
    </table>
</body>

</html>
