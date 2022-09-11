<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Linh</title>
</head>
<body>
    @php
        $a = ['Hai', 'Linh', 'VKU'];
        echo "Hellooooo";
    @endphp

    <h1>{{ date('Y-m-d  h:i:s') }}</h1>
    

    @if ($a == 10)
        A = 10
    @endif

    @foreach ($a as $item)
        {{ $item }} <br>
    @endforeach

    @for ($i = 0; $i < 3; $i++)
    <h1 style="color:blueviolet" >Hello Linh {{ $i }}</h1>
    @endfor

    <form action="/hai" method="post">
        @csrf
        <input type="text" name="username" id="username" placeholder="username">
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        <input type="submit" value="Gửi">
    </form>
    
</body>
</html>