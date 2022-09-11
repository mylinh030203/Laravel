<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('haipost') }}" method="post">
        @csrf
        <input type="text" name="username" id="username">
        <input type="submit" value="submit">
    </form>
</body>
</html>