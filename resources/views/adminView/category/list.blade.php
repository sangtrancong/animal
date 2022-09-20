@extends('layout.admin')

@section('content')
<div style="display: flex; justify-content: space-between">
    <h2>Danh mục sản phẩm</h2>
   <a class="btn btn-primary" href="/admin/category/create">Thêm danh mục</a>
</div>

<hr>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1?>
        @foreach ($list as $item)

        <tr>
            <td>{{$i++}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Tùy chọn
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" onclick="location.href='/admin/category/{{$item->id}}'" type="button">Chỉnh sửa</button>
                      <button class="dropdown-item" type="button">Xóa</button>
                    </div>
                  </div>
            </td>
        </tr>
        @endforeach


    </tbody>
</table>
@endsection
