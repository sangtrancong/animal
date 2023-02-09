@extends('layout.admin')

@section('content')
<div style="display: flex; justify-content: space-between">
    <h2>Chỉnh sửa tài khoản</h2>

</div>

<hr>
<form action="/admin/account/{{$account->id}}" method="POST">
    @csrf
    {{method_field('PUT')}}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" value="{{$account->username}}" id="username" name="username" value="">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" value="{{$account->email}}" id="email" name="email" value="">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <label >Role</label>
                <div class="form-group">

                    <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" {{$account->role==1 ?'checked':''}} class="form-check-input" value="1" name="role">Admin
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" {{$account->role==2 ?'checked':''}} class="form-check-input" value="2" name="role">Bloger
                        </label>
                      </div>
                      <div class="form-check-inline disabled">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="3" name="role" disabled>Customer
                        </label>
                      </div>
                </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" value="{{$account->phone}}" id="phone" name="phone" value="">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" value="{{$account->address}}" id="address" name="address" value="">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-violet">Cập nhật</button>
  </form>
@endsection
