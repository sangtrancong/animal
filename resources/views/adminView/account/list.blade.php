@extends('layout.admin')

@section('content')

<div style="display: flex; justify-content: space-between">
    <h2>Danh sách tài khoản</h2>
   <a class="btn btn-violet" href="/admin/account/create">Thêm tài khoản</a>
</div>

<hr>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Role</th>
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
            <td>{{$item->phone}}</td>
            <td>
                @if ($item->role==1)
                <span class="badge badge-success">Admin</span>
                @elseif ($item->role==2)
                <span class="badge badge-warning">Bloger</span>
                @else
                <span class="badge badge-danger">Customer</span>
                @endif
            </td>

            <td>
                @if ($item->status==1)
                <span class="badge badge-success"><i class="fa  fa-unlock"></i></span>
                @else
                <span class="badge badge-danger"><i class="fa  fa-lock"></i></span>
                @endif
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Tùy chọn
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" onclick="location.href='/admin/account/{{$item->id}}'" type="button">Chỉnh sửa</button>
                      <a class="dropdown-item" onclick="return confirm('Mật khẩu được đặt về 1234512345! Bạn chắc chắn muốn đặt lại mật khẩu không?')" href="/admin/account/{{$item->id}}/edit">Đặt lại mật khẩu</a>
                      @if ($item->status===1)
                      <a class="dropdown-item" href="/admin/account/lock/{{$item->id}}">Khóa tài khoản</a>
                      @else
                      <a class="dropdown-item" href="/admin/account/unlock/{{$item->id}}">Mở tài khoản</a>
                      @endif



                    </div>
                  </div>
            </td>
        </tr>
        @endforeach


    </tbody>
</table>
@endsection
