@extends('layout.admin')

@section('content')
<div style="display: flex; justify-content: space-between">
    <h2>Thêm Danh mục</h2>

</div>

<hr>
<form action="/admin/category" method="POST">
    @csrf
    <div class="form-group">
      <label for="category">Tên danh mục</label>
      <input type="text" class="form-control" id="category" name="name" placeholder="Nhập tên danh mục">
      @error('name')
    <div class="text-danger">{{ $message }}</div>
@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
      </div>

    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection
