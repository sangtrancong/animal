@extends('layout.admin')

@section('content')
    <div style="display: flex; justify-content: space-between">
        <h2>Tạo tài khoản</h2>

    </div>

    <hr>
    <form action="/admin/account/accountPage" method="POST">
        @csrf
        <div class="row">

            <div class="col-lg-6">
                <div class="form-group">

                    <label for="username">Username</label>
                    <input disabled type="text" class="form-control" id="username" name="username" value="{{session('adminSession')[0]['username']}}" >
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{session('adminSession')[0]['email']}}" >
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="phone" class="form-control" id="phone" value="{{session('adminSession')[0]['phone']}}"  name="phone" >
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" class="form-control" id="address" value="{{session('adminSession')[0]['address']}}"  name="address" >
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


            </div>
        </div>

        @if (session()->has('changeSuccess'))
        <div class="text-success">
            {{ session()->get('changeSuccess') }}
        </div>
         @endif

        <button type="submit" class="btn btn-violet">Cập nhật thông tin</button>
    </form>
@endsection
