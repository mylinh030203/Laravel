@extends('Layout.main')



@section('content')
<div class="container">
  <h1 class="badge badge-danger">{{ Session('thongbao') }}</h1>
  <h3>Danh sách account</h3>
  <a class="btn btn-danger" href="{{ route('account.formCreate') }}" >Them</a>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Created_at</th>
          <th scope="col">Updated_at</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          @foreach ($danhsach as $item)
          <tr>
              <th scope="row">{{ $item->id }}</th>
              <td>{{ $item->username }}</td>
              <td>{{ $item->password }}</td>
              <td>{{ $item->created_at }}</td>
              <td>{{ $item->updated_at }}</td>
              <td><a class="btn btn-info" href="{{ route('sua') }}/{{ $item->id }}" >Sửa</a>
                <a class="btn btn-danger" href="{{ route('xoa') }}/{{ $item->id }}" >Xóa</a></td>
          </tr>
          @endforeach
        
      </tbody>
    </table>
</div>
@endsection