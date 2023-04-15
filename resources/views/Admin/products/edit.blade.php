@extends('layouts.master')

@section('main-content')
<div class="col-md-8 center-block" id="class-create">
  <div>
    <h2 style="margin:20px;">Quản lý sản phẩm</h2>
  </div>
    <div class="card mb-4" >
      <h5 class="card-header">Chỉnh sửa</h5>
      <div class="card-body">
        <form action="{{ route('products.update',$product->id) }}" method="POST" id="classForm" enctype="multipart/form-data">
          @method('PUT')
          @csrf
        <div>
          <label for="defaultFormControlInput" class="form-label">Tên sản phẩm</label>
          <input type="text" name="title" class="form-control" id = {{ $errors->has('title') ? 'has_error':'' }} placeholder="" aria-describedby="defaultFormControlHelp" value = "{{ $product->title }}">
          @if ($errors->any())
          <span style="color:red">@error('title'){{$message}}@enderror</span><br>
          @endif
          <label for="defaultFormControlInput" class="form-label">Giá</label>
          <input type="number" name="price" class="form-control" id = {{ $errors->has('price') ? 'has_error':'' }} placeholder="" aria-describedby="defaultFormControlHelp" value = "{{ $product->price }}">
          @if ($errors->any())
          <span style="color:red">@error('price'){{$message}}@enderror</span><br>
          @endif
          <div>
            <label for="exampleFormControlTextarea1" class="form-label">Mô tả ngắn</label>
            <textarea name="meta_description" class="form-control" id = {{ $errors->has('meta_description') ? 'has_error':'' }} rows="3" >{{ $product->meta_description }}</textarea>
          </div>
          @if ($errors->any())
          <span style="color:red">@error('meta_description'){{$message}}@enderror</span><br>
          @endif
          <div>
            <label for="exampleFormControlTextarea1" class="form-label">Thông tin sản phẩm</label>
            <textarea name="product_detail" class="form-control" id = {{ $errors->has('product_detail') ? 'has_error':'' }} rows="3" >{{ $product->product_detail }}</textarea>
          </div>
          @if ($errors->any())
          <span style="color:red">@error('product_detail'){{$message}}@enderror</span><br>
          @endif
          <label for="defaultFormControlInput" class="form-label">Mô tả</label><br>
          <div>
            <textarea name="description" id="editor" cols="50" rows="10">{{ $product->description }}</textarea>
          </div>
          @if ($errors->any())
          <span style="color:red">@error('description'){{$message}}@enderror</span><br>
          @endif
          <div class="mb-3">
            <label for="defaultSelect" class="form-label">Danh mục</label>
            <select id="defaultSelect" class="form-select" name="category_id">
              <option value="{{ $product->categories->id }}">{{ $product->categories->name }}</option>
              @foreach ($categories as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          @if ($errors->any())
          <span style="color:red">@error('category_id'){{$message}}@enderror</span><br>
          @endif
          <div class="mb-3">
            <label for="formFile" class="form-label">Tải ảnh lên</label>
            <input class="form-control" type="file" id="formFile" name="image">
            <img src="{{ asset('storage/images/'.$product->pictures->image) }}" alt="" width="120px" height="60px">
            <input type="hidden" name="productImage" id="" value="{{ $product->picture_id }}">
          </div>
        </div>
        
      </form>
      <div>
        <button type="sumbit" class="btn btn-primary" form="classForm">Sửa</button>
        <a href="{{ route('products.index') }}">
          <button class="btn btn-success">Trở lại</button>
        </a>
    </div>
      </div>
    </div>
  </div>
  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection