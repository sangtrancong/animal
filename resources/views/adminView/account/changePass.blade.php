@extends('layout.admin')

@section('content')
<div style="display: flex; justify-content: space-between">
    <h2>Đổi mật khẩu</h2>

</div>

<hr>
<form action="/admin/account/changePass" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            @if (session()->has('changeFail'))
            <div class="text-danger">
                {{ session()->get('changeFail') }}
            </div>
             @endif
            @if (session()->has('changeSuccess'))
            <div class="text-success">
                {{ session()->get('changeSuccess') }}
            </div>
             @endif
            <div class="form-group">
                <label for="oldPass">Mật khẩu cũ</label>
                <input class="form-control" type="password"  id="username" name="oldPass" >
                @error('oldPass')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu mới</label>
                <input  class="form-control"  type="password"  id="password" name="password" >
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="confirmPass">Nhập lại mật khẩu</label>
                <input class="form-control"  type="password" id="confirmPass" name="confirmPass" >
                @error('confirmPass')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

    </div>
    <button type="submit" class="btn btn-violet">Đổi mật khẩu</button>
  </form>
@endsection
