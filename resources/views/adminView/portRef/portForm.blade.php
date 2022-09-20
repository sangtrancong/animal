@extends('layout.admin')

@section('content')
    <div>
        <h2>Chỉnh sửa bài viết</h2>
    </div>

    <hr>
    <form action="/admin/portRef/{{$port->id}}" enctype="multipart/form-data" method="POST">
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
            <label for="title">Đường dẫn liên kết</label>
            <input hidden value="{{$port->url}}" name="id">
            <input type="text" class="form-control" id="title" name="url" value="{{$port->url}}">
            @error('url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="category">Trạng thái</label>
                   <select class="form-control" name="status">
                            <option {{$port->status==true?"selected":""}} value="1">Hiển thị</option>
                            <option  {{$port->status==false?"selected":""}} value="0">Ẩn</option>
                   </select>
                </div>
            </div>
           <div class="col-sm-6">
            <div class="form-group">
                <label for="file">Hình ảnh đại diện</label>
                <input id="imageUpload" onchange="readURL(this)" type="file" class="form-control" id="file" name="file" >
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <img id="category-img-tag" style="max-width: 300px;" src="/storage/{{$port->image}}"/>
            </div>
           </div>

        </div>


        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
    </form>
@endsection
@section('script')
<script>
    var editor = new FroalaEditor('#textEditor', {
    // // Set the file upload URL.
    // imageUploadParam: 'image_param',
    // imageUploadMethod:'POST',
    // hight:200,
    // imageUploadURL: "/admin/uploadImage",
    // imageUploadParams: {
    //     froala:'true',
    //     _token: "{{ csrf_token() }}",
    // },
    // requestHeaders: {
    //   'X-CSRF-TOKEN': "{{ csrf_token() }}",
    // },

});
</script>
@endsection
