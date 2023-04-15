@extends('layouts.master')

@section('main-content')
<div class="col-md-8 center-block" id="class-create">
  <div>
    <h2 style="margin:20px;">Quản lý banner</h2>
  </div>
    <div class="card mb-4" >
      <h5 class="card-header">Chỉnh sửa</h5>
      <div>
        <img src="{{ asset('storage/images/'.$banner->pictures->image) }}" alt="" width="50%" height="150px" style="margin-left: 20px">
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="mt-3">
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#fullscreenModal" style="margin-left: 20px;">
            Kho ảnh
          </button>

          <!-- Modal -->
          <div class="modal fade" id="fullscreenModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalFullTitle">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <ul>
                    @foreach ($pictures as $index=>$item)
                    <li><input type="radio" name="image" id="{{'cb'.$index+1}}" value="{{ $item->id }}" form="classForm" />
                      <label for="{{'cb'.$index+1}}"><img src="{{ asset('storage/images/'.$item->image) }}"/></label>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary" form="classForm">Sửa</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('banners.update',$banner->id) }}" method="POST" id="classForm" enctype="multipart/form-data">
          @method('PUT')
          @csrf
        <div>
          <label for="defaultFormControlInput" class="form-label">hoặc</label><br>
          <label for="defaultFormControlInput" class="form-label">Tải ảnh lên</label>
          <input type="file" name="image" class="form-control"  placeholder="" aria-describedby="defaultFormControlHelp">
{{--           @if ($errors->any())
          <span style="color:red">@error('name'){{$message}}@enderror</span>
          @endif --}}
        </div>
        
      </form>
      <div>
        <button type="sumbit" class="btn btn-primary" form="classForm">Sửa</button>
        <a href="{{ route('banners.index') }}">
          <button class="btn btn-secondary">Trở lại</button>
        </a>
    </div>
      </div>
    </div>
  </div>
@endsection