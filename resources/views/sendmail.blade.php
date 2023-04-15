<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>Thông tin đơn hàng của bạn</h3>
        <div>
            <p>Mã đơn hàng: {{'XS'.session('orderInfor')->id}}</p>
            <p>Tên: <strong>{{session('orderInfor')->name}}</strong></p>
            <p>Địa chỉ nhận hàng: <strong>{{session('orderInfor')->address}}</strong></p>
            <p>Số điện thoại: <strong>{{session('orderInfor')->phone_number}}</strong></p>
            @foreach (session('cart') as $item)
                <p>Sản phẩm: {{ $item['product_title'] }}</p>
                <p>Số lượng: {{ $item['quantity'] }}</p>
                <p>Giá: {{ number_format($item['price'],0,'','.') }} đ</p>
            @endforeach
            <p><strong>Tổng giá trị đơn hàng: {{ number_format(session('total'),0,'','.') }} đ</strong></p>
        </div>
    </div>
</body>
</html>