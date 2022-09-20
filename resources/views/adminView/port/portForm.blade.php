@extends('layout.admin')

@section('content')
    <div>
        <h2>Chỉnh sửa bài viết</h2>
    </div>

    <hr>
    <form action="/admin/port/{{$port->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input hidden value="{{$port->id}}" name="id">
            <input type="text" class="form-control" id="title" name="title" value="{{$port->title}}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="video_url">Link Video</label>
            <input type="text" class="form-control" value="{{$port->video_url}}" id="video_url" name="video_url">
            @error('video_url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="file">Hình ảnh đại diện</label>
            <input type="file" class="form-control" id="file" name="file">
            @error('file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="category">Danh mục</label>
                   <select class="form-control" name="category_id">
                        @foreach (config('global') as $key=>$value)
                            <option {{$port->category_id==$value?"selected":""}}  value="{{$value}}">{{$key}}</option>
                        @endforeach
                   </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="category">Trạng thái</label>
                   <select class="form-control" name="status">
                            <option {{$port->status==true?"selected":""}} value="1">Hiển thị</option>
                            <option  {{$port->status==false?"selected":""}} value="0">Ẩn</option>
                   </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Nội dung ngắn</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  name="short_content" rows="3">{{$port->short_content}}</textarea>
        </div>
        <textarea id="content" name="content">{{$port->content}}</textarea>

        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
    </form>
@endsection
@section('script')
<script>
    CKEDITOR.config.allowedContent = true;
CKEDITOR.replace('content', {
    filebrowserBrowseUrl: '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
    filebrowserUploadUrl: "{{route('ckEditor', ['_token' => csrf_token() ])}}",
    filebrowserImageBrowseUrl: '/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    filebrowserUploadMethod: "form"
});
</script>
@endsection
