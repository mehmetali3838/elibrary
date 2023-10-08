<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('registerUser') }}">
        @csrf
        <input type="text" name="name_surname" placeholder="Name Surname">
        <input type="text" name="age" placeholder="Age">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Register</button>
    </form>
</body>

</html>
