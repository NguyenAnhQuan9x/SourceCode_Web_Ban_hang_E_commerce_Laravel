@extends('Client.layout')

@section('content')
    <div class="row">
       <div class="col-md-6 mx-auto mt-5">
          <div class="payment d-flex justify-content-center">
             <div class="payment_header">
                <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
             </div>
             <div class="content">
                <h1>Đặt hàng thành công</h1>
             </div>
             <div class="content-order">
                <p>Bạn làm ơn để ý điện thoại, nhân viên của chúng tôi sẽ gọi lại cho bạn để xác nhận đơn hàng của bạn</p>
                <p>Bạn có thể kiểm tra thông tin đơn hàng qua email</p>
                <p>Cảm ơn bạn đã tin tưởng và đặt mua sản phẩm của chúng tôi</p>
                <p>Trân trọng!</p>
                <p></p>
                <a href="{{ route('client.home') }}">Trở về trang chủ</a>
             </div>
             
          </div>
       </div>
    </div>
@endsection