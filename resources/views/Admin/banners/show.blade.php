@extends('layouts.master')

@section('main-content')
    <h2 class="card-header">Quản lý banner</h2>
    <div class="card">
        <h5 class="card-header">Danh sách banner</h5>
        <div class="table-responsive text-nowrap">
          {{-- @if ($message = Session::get('message'))
              <h1 class="flashMessage">{{ $message }}</h1>
          @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($banners as $index => $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $index + 1 }}</strong>
                            </td>
                            <td><img src="{{ asset('storage/images/'.$item->pictures->image)  }}" alt="" width="200px" height="50px"></td>
                            <td>
                                <div class="dropdown row">
                                    <div class="col-2">
                                        <a href="{{ route('banners.edit', $item->id) }}">
                                            <button class="btn btn-secondary">Edit</button>
                                        </a>
                                    </div>
                                    <div class="col">
                                      <form action="{{ route('banners.delete', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</button>
                                      </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <a href="{{ route('banners.create') }}">
            <button class="btn btn-primary">Thêm mới</button>
        </a>
    </div>
@endsection
