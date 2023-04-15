@extends('layouts.master')

@section('main-content')
    <h2 class="card-header">Quản lý đơn hàng</h2>
    <div class="card">
        <h5 class="card-header">Đơn hàng chi tiết</h5>
        <div class="table-responsive text-wrap">
          {{-- @if ($message = Session::get('message'))
              <h1 class="flashMessage">{{ $message }}</h1>
          @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Sản phẩm</th>
                        <th>Giá </th>
                        <th>Số lượng</th>
                        <th>Giá tổng</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $total = 0 @endphp
                    @foreach ($order_detail as $index => $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $index + 1 }}</strong>
                            </td>
                            <td>{{ $item->orders->id }}</td>
                            <td>{{ $item->products->title }}</td>
                            <td>{{ $item->products->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->products->price*$item->quantity,0,'','.') }} đ</td>
                        </tr>
                        @php $total +=$item->products->price*$item->quantity @endphp
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Tổng:</td>
                        <td>{{ number_format($total,0,'','.') }} đ</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <a href="{{ route('orders.index') }}">
            <button class="btn btn-primary">Trở lại</button>
        </a>
    </div>
@endsection
