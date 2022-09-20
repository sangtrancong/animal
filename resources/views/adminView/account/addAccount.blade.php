@extends('layout.admin')

@section('content')
    <div style="display: flex; justify-content: space-between">
        <h2>Thêm Danh mục</h2>

    </div>

    <hr>
    <form action="/admin/account" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" placeholder="Nhập username">
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" value="{{old('password')}}"  name="password" placeholder="Nhập password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" value="{{old('confirm_password')}}"  name="confirm_password" placeholder="Nhập lại password">
            @error('confirm_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
