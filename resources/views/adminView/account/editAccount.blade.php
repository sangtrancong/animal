@extends('layout.admin')

@section('content')
<div style="display: flex; justify-content: space-between">
    <h2>Chỉnh sửa danh mục</h2>

</div>

<hr>
<form action="/admin/account/{{$account->id}}" method="POST">
    @csrf
    {{method_field('PUT')}}
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" value="{{$account->username}}" id="username" name="username" value="">
        @error('username')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" value="{{$account->password}}" id="password"   name="password">
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
  </form>
@endsection
