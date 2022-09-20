@extends('layout.admin')

@section('content')
    <div>
        <h2>Chỉnh sửa sản phẩm</h2>
    </div>

    <hr>
    <form action="/admin/product/{{$product->id}}" enctype="multipart/form-data" method="POST" >
        @csrf
        {{method_field('PUT')}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input name="id" value="{{$product->id}}" hidden/>
                    <label for="code">Mã sản phẩm</label>
                    <input type="text" class="form-control" value="{{$product->code}}" id="code" name="code">
                    @error('code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" class="form-control" value="{{$product->name}}" id="name" name="name" >
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url">Đường dẫn liên kết</label>
                    <input type="text" class="form-control" value="{{$product->url}}" id="url" name="url" >
                    @error('url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Trạng thái</label>
                   <select class="form-control" name="status">
                            <option {{$product->status==true?"selected":""}} value="1">Hiển thị</option>
                            <option  {{$product->status==false?"selected":""}} value="0">Ẩn</option>
                   </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category">Danh mục</label>
                   <select class="form-control" name="category_id">
                        @foreach ($cats as $c)
                            <option {{$product->category_id==$c->id?"selected":""}} value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="file">Hình ảnh</label>
                    <input id="imageUpload" onchange="readURL(this)" type="file" class="form-control" id="file" name="file" >
                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <img id="category-img-tag" style="max-width: 300px;" src="/storage/{{$product->image}}"/>
                </div>
            </div>

        </div>


        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
    </form>
@endsection
