@extends('layout.admin')

@section('content')
    <div style="display: flex; justify-content: space-between">
        <h2>Thêm Bài viết</h2>

    </div>

    <hr>
    <form action="/admin/portRef" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input type="text" class="form-control" value="{{old('title')}}" id="title" name="title">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="file">Hình ảnh đại diện</label>
            <input id="imageUpload" onchange="readURL(this)" type="file" class="form-control" id="file" name="file" >
            <div ><img id="category-img-tag" style="max-width: 300px;"></div>
            @error('file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="url">Đường dẫn liên kết</label>
            <input type="text" class="form-control" value="{{old('url')}}" id="url" name="url">
            @error('url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
@section('script')
<script>
    var editor = new FroalaEditor('#textEditor', {
    // Set the file upload URL.
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
