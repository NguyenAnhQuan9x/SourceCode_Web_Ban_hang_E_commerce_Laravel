@extends('layouts.master')

@section('main-content')
<div class="col-md-8 center-block" id="class-create">
  <div>
    <h2 style="margin:20px;">Quản lý đơn hàng</h2>
  </div>
    <div class="card mb-4" >
      <h5 class="card-header">Chỉnh sửa</h5>
      <div class="card-body">
        <form action="{{ route('orders.update',$order->id) }}" method="POST" id="categoryForm">
          @method('PUT')
          @csrf 
        <div>
          <label for="defaultFormControlInput" class="form-label">Tên người nhận</label>
          <input type="text" name="name" class="form-control"  placeholder="" aria-describedby="defaultFormControlHelp" value = "{{ $order->name }}">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Số điện thoại</label>
            <input type="text" name="phone_number" class="form-control"  placeholder="" aria-describedby="defaultFormControlHelp" value = "{{ $order->phone_number }}">
          </div>
          <div>
            <label for="defaultFormControlInput" class="form-label">Địa chỉ nhận hàng</label>
            <input type="text" name="address" class="form-control"  placeholder="" aria-describedby="defaultFormControlHelp" value = "{{ $order->address }}">
          </div>
      </form>
      <div>
        <button type="sumbit" class="btn btn-primary" form="categoryForm">Sửa</button>
        <a href="{{ route('orders.index') }}">
          <button class="btn btn-success">Trở lại</button>
        </a>
    </div>
      </div>
    </div>
  </div>
@endsection