@extends('layouts.master')

@section('main-content')
    <h2 class="card-header">Quản lý user</h2>
    @if ($message = Session::get('message'))
    <p class="message" style="color: rgb(17, 186, 9); margin-left:20px"><i class="fa-solid fa-check"></i> {{ $message }}</p>
@endif
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-header">Danh sách user</h5>
            </div>
            <div class="col-md-6 card-header">
                <form action="{{ route('users.index') }}" method="GET">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" name="keyword" class="form-control" placeholder="Search..." aria-label="Search..."
                            aria-describedby="basic-addon-search31">
                    </div>
                    <button type="submit" hidden></button>
                </form>
            </div>
        </div>
        <div class="table-responsive text-wrap">
          {{-- @if ($message = Session::get('message'))
              <h1 class="flashMessage">{{ $message }}</h1>
          @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Ảnh</th>
                        <th>Quyền hạn</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $index => $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $index + 1 }}</strong>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td><img src="{{ asset('storage/images/'.($item->picture_id ? $item->pictures->image : '1.png')) }}" alt="" width="80px" height="50px"></td>
                            <td>{{($item->role == 0)? 'Người dùng':(($item->role == 1)?"Admin":"Nhân viên")}}</td>
                            <td>
                                <div class="dropdown row">
                                    <div class="col-5">
                                        <a href="{{ route('users.edit', $item->id) }}">
                                            <button class="btn btn-secondary">Edit</button>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                      <form action="{{ route('users.delete', $item->id) }}" method="post">
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
        {{ $users->links() }}
    </div>
    <div>
        <a href="{{ route('products.create') }}">
            <button class="btn btn-primary">Thêm mới</button>
        </a>
    </div>
@endsection
