@extends('layouts.master')

@section('main-content')
    <h2 class="card-header">Quản lý đơn hàng</h2>
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-header">Danh sách đơn hàng</h5>
            </div>
            <div class="col-md-6 card-header">
                <form action="{{ route('orders.index') }}" method="GET">
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
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Trạng thái</th>
                        <th>Phương thức thanh toán</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($orders as $index => $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $index + 1 }}</strong>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td><form action="{{ route('orders.updateStatus',$item->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="sm-col-3">
                                        <select name="status" id="">
                                            <option value="0" {{ $item->status == 0?"selected":"" }}>Chờ xác nhận</option>
                                            <option value="1" {{ $item->status == 1?"selected":"" }}>Đang giao </option>
                                            <option value="2" {{ $item->status == 2?"selected":"" }}>Hoàn thành</option>
                                        </select>
                                    </div>
                                    <div class="sm-col-2">
                                        <button type="submit">Cập nhật</button>
                                    </div>
                                </div>
                                </form>
                            </td>
                            <td>{{ ($item->payment_method == 0)?"Thanh toán khi nhận hàng":"Thành toán online" }}</td>
                            <td>
                                <div class="dropdown row">
                                    <div class="col-5">
                                        <a href="{{ route('orders.edit', $item->id) }}">
                                            <button class="btn btn-secondary">Edit</button>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('orders.detail', $item->id) }}">
                                            <button class="btn btn-info">Detail</button>
                                        </a>
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
        {{ $orders->links() }}
    </div>
    <div>
        <a href="{{ route('orders.create') }}">
            <button class="btn btn-primary">Thêm mới</button>
        </a>
    </div>
@endsection
