@extends('layouts.master')

@section('main-content')
    <h2 class="card-header">Quản lý danh mục</h2>
            <div class="table-responsive text-nowrap">
          @if ($message = Session::get('message'))
              <p class="message" style="color: rgb(17, 186, 9); margin-left:20px"><i class="fa-solid fa-check"></i> {{ $message }}</p>
          @endif
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-header">Danh sách danh mục</h5>
            </div>
            <div class="col-md-6 card-header">
                <form action="{{ route('categories.index') }}" method="GET">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" name="keyword" class="form-control" placeholder="Search..." aria-label="Search..."
                            aria-describedby="basic-addon-search31">
                    </div>
                    <button type="submit" hidden></button>
                </form>
            </div>
        </div>  
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $index => $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $index + 1 }}</strong>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="dropdown row">
                                    <div class="col-2">
                                        <a href="{{ route('categories.edit', $item->id) }}">
                                            <button class="btn btn-secondary">Edit</button>
                                        </a>
                                    </div>
                                    <div class="col">
                                      <form action="{{ route('categories.delete', $item->id) }}" method="post">
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
        {{ $categories->links() }}
    </div>
    <div>
        <a href="{{ route('categories.create') }}">
            <button class="btn btn-primary">Thêm mới</button>
        </a>
    </div>
@endsection
