@extends('layout.admin')

@section('content')
<div class="logout-container">
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Xin chào {{session('adminSession')[0]['username']}}
        </button>
        <div class="dropdown-menu dropdown-menu-right">
          <button class="dropdown-item" type="button">Trang cá nhân</button>
          <a href="/logout" class="dropdown-item" type="button">Đăng xuất</a>
        </div>
      </div>
</div>
<div style="display: flex; justify-content: space-between">
    <h2>Danh mục sản phẩm</h2>
   <a class="btn btn-primary" href="/admin/account/create">Thêm tài khoản</a>
</div>

<hr>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1?>
        @foreach ($list as $item)

        <tr>
            <td>{{$i++}}</td>
            <td>{{$item->username}}</td>
            <td>
                @if ($item->status==1)
                <span class="badge badge-success">Hiển thị</span>
                @else
                <span class="badge badge-warning">Ẩn</span>
                @endif
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Tùy chọn
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" onclick="location.href='/admin/account/{{$item->id}}'" type="button">Chỉnh sửa</button>
                      <a class="dropdown-item" onclick="return confirm('Bạn chắc chắn muốn reset password?')" href="/admin/account/{{$item->id}}/edit">Đặt lại mật khẩu</a>
                    </div>
                  </div>
            </td>
        </tr>
        @endforeach


    </tbody>
</table>
@endsection
