@extends('layouts.master')

@section('main-content')
<div class="col-md-8 center-block" id="class-create">
  <div>
    <h2 style="margin:20px;">Quản lý danh mục</h2>
  </div>
    <div class="card mb-4" >
      <h5 class="card-header">Chỉnh sửa</h5>
      <div class="card-body">
        <form action="{{ route('categories.update',$category->id) }}" method="POST" id="categoryForm">
          @method('PUT')
          @csrf 
        <div>
          <label for="defaultFormControlInput" class="form-label">Tên danh mục</label>
          <input type="text" name="name" class="form-control" id = {{ $errors->has('name') ? 'has_error':'' }} placeholder="" aria-describedby="defaultFormControlHelp" value = "{{ $category->name }}">
          @if ($errors->any())
          <span style="color:red">@error('name'){{$message}}@enderror</span>
          @endif
        </div>
        
      </form>
      <div>
        <button type="sumbit" class="btn btn-primary" form="categoryForm">Sửa</button>
        <a href="{{ route('categories.index') }}">
          <button class="btn btn-success">Danh sách</button>
        </a>
    </div>
      </div>
    </div>
  </div>
@endsection