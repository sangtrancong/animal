@extends('layout.admin')

@section('content')
    <div style="display: flex; justify-content: space-between">
        <h2>Thêm sản phẩm</h2>

    </div>

    <hr>
    <form action="/admin/product" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Mã sản phẩm</label>
                    <input type="text" class="form-control" id="code" name="code">
                    @error('code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name" name="name" >
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url">Đường dẫn liên kết</label>
                    <input type="text"  class="form-control" id="url" name="url" >
                    @error('url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category">Danh mục</label>
                   <select class="form-control" name="category_id">
                        @foreach ($cats as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="file">Hình ảnh</label>
                    <input type="file" onchange="readURL(this)" class="form-control" id="file" name="file" >
                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div ><img id="category-img-tag" style="max-width: 300px;"></div>
            </div>

        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
