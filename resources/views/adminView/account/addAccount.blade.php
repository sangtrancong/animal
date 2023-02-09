@extends('layout.admin')

@section('content')
    <div style="display: flex; justify-content: space-between">
        <h2>Tạo tài khoản</h2>

    </div>

    <hr>
    <form action="/admin/account" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" >
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" >
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" value="{{old('password')}}"  name="password" >
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" value="{{old('confirm_password')}}"  name="confirm_password" >
                    @error('confirm_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" >
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="phone" class="form-control" id="phone" value="{{old('phone')}}"  name="phone" >
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label >Role</label>
                <div class="form-group">

                    <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="1" name="role">Admin
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="2" name="role">Bloger
                        </label>
                      </div>
                      <div class="form-check-inline disabled">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="3" name="role" disabled>Customer
                        </label>
                      </div>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-violet">Thêm</button>
    </form>
@endsection
