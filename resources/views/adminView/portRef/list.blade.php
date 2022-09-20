@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <h2>Bài viết liên kết</h2>
        </div>
        <div class="col-lg-2 offset-lg-6">
            <a class="btn btn-primary" href="/admin/portRef/create">Thêm bài viết</a>
        </div>

    </div>

    <hr>
    <table id="datatable" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Hình ảnh đại diện</th>
                <th>Tiêu đề</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1?>
            @foreach ($list as $item)

                <tr>
                    <td>{{ $i++; }}</td>
                    <td><a ><img style="max-width: 100px;"
                        src="/storage/{{ $item->image }}" /></a></td>
                    <td>{{ $item->title }}</td>
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
                              <button class="dropdown-item" onclick="location.href='/admin/portRef/{{$item->id}}'" type="button">Chỉnh sửa</button>
                              <a class="dropdown-item" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này?')" href="/admin/portRef/{{$item->id}}/edit">Xóa</a>
                            </div>
                          </div>
                    </td>
                </tr>
            @endforeach


        </tbody>

    </table>
@endsection
