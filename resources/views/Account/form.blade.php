@extends('Layout.main')

@section('title')
  Danh sách account2
@endsection

@section('content')
<form action="{{ route('linhdapostformnay') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="username">Email address</label>
        <input type="text" class="form-control" name="username" placeholder="username">
        @error('username')
            <h4 class="text-danger">{{ $message }}</h4>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="password" placeholder="username">
        @error('password')
            <h4 class="text-danger">{{ $message }}</h4>
        @enderror
    </div>
    <input type="submit" value="submit">
</form>
@endsection