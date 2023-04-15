@extends('layouts.master')

@section('main-content')
    <h2 class="card-header">Quản lý mã khuyến mãi</h2>
    <div class="card">
        <h5 class="card-header">Danh sách mã khuyến mãi</h5>
        @if ($message = Session::get('message'))
        <p class="message" style="color: rgb(17, 186, 9); margin-left:20px"><i class="fa-solid fa-check"></i> {{ $message }}</p>
    @endif
        <div class="table-responsive text-nowrap">
          {{-- @if ($message = Session::get('message'))
              <h1 class="flashMessage">{{ $message }}</h1>
          @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã khuyến mãi</th>
                        <th>Giá trị</th>
                        <th>Tên danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($promotions as $index => $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $index + 1 }}</strong>
                            </td>
                            <td>{{ $item->promotion_name }}</td>
                            <td>{{ $item->promotion_value }}</td>
                            <td>{{ $item->categories->name }}</td>
                            <td>
                                <div class="dropdown row">
                                    <div class="col-3">
                                        <a href="{{ route('promotions.edit', $item->id) }}">
                                            <button class="btn btn-secondary">Edit</button>
                                        </a>
                                    </div>
                                    <div class="col">
                                      <form action="{{ route('promotions.delete', $item->id) }}" method="post">
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
    <div class="position-relative top-0 start-50" style="margin-top: 20px;">
        {{ $promotions->links() }}
    </div>
    <div>
        <a href="{{ route('promotions.create') }}">
            <button class="btn btn-primary">Thêm mới</button>
        </a>
    </div>
@endsection
