<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh sửa</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <input type="text" name="username" id="username" value="{{ $sua->username }}">
        <input type="text" name="password" id="password" value="{{ $sua->password }}">
        <input type="submit" value="Edit">
    </form>
    
</body>
</html>