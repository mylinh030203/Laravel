<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang Chủ</title>
</head>
<body>
    @for ($i = 1; $i <= 10; $i++)
        <h1>Xin chao{{ $i }}</h1>
    @endfor
</body>
</html>