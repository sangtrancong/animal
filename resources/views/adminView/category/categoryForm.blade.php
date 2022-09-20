@extends('layout.admin')

@section('content')
<div style="display: flex; justify-content: space-between">
    <h2>Chỉnh sửa danh mục</h2>

</div>

<hr>
<form action="/admin/category/{{$category->id}}" method="POST">
    @csrf
    {{method_field('PUT')}}
    <div class="form-group">
        <input hidden name="id" value="{{$category->id}}"/>
      <label for="category">Tên danh mục</label>
      <input type="text" class="form-control" id="category" value="{{$category->name}}" name="name" placeholder="Nhập tên danh mục">
      @error('name')
    <div class="text-danger">{{ $message }}</div>
@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{$category->description}}</textarea>
      </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
  </form>
@endsection
