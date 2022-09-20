@extends('layout.admin')

@section('content')
    <div style="display: flex; justify-content: space-between">
        <h2>Thêm Bài viết</h2>

    </div>

    <hr>
    <form action="/admin/port" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="video_url">Video Youtube ID</label>
            <input type="text" class="form-control" id="video_url" value="{{ old('video_url') }}" name="video_url">
            @error('video_url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Thể loại</label>
            <select value="{{ old('category_id') }}" class="form-control" name="category_id">
                @foreach (config('global') as $key=> $value)
                    <option value="{{ $value }}">{{ $key }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="file">Hình ảnh đại diện</label>
            <input type="file" class="form-control" id="file" name="file">
            @error('file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Nội dung ngắn</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="short_content" rows="3">{{ old('short_content') }}</textarea>
        </div>
        <textarea id="content" name="content">{{ old('content') }}</textarea>

        <button type="submit" class="btn btn-primary">Thêm</button>
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
