@extends('Client.layout')

@section('content')
<div class="container-fluid">
    <div>
        <h3>Shopping Cart</h3>
    </div>
    <div class="row">
        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Price</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Subtotal</th>
                                <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (session('cart') as $id=> $item)
                            <tr data-id="{{ $id }}">
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside"><img src="{{ asset('storage/images/'.$item['image']) }}" class="img-sm"></div>
                                        <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">{{ $item['product_title'] }}</a>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <div class="price-wrap"> <var class="price">{{number_format($item['price'],0,'','.')}} đ</var> </div>
                                </td>
                                <td> <input type="number" value="{{ $item['quantity'] }}" class="form-control quantity cart_update" min="1" /></td>
                                
                                <td>
                                    <div class="price-wrap"> <var class="price">{{ number_format($item['price']*$item['quantity'],0,'','.') }} đ</var> </div>
                                </td>
                                <td class="text-right d-none d-md-block actions" data-th=""><button  class="btn btn-light cart_remove"> Remove</button> </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('client.coupon') }}" method="POST">
                        @csrf
                        <div class="form-group"> <label>Have coupon?</label>
                            <div class="input-group"> <input type="text" class="form-control coupon" name="coupon" placeholder="Coupon code"> 
                                @if (isset($message))
                                    <p style="color:red;">{{ $message }}</p>
                                @endif
                                <span class="input-group-append"> 
                                <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <dl class="dlist-align">
                        <dt>Total price:</dt>
                        <strong class="text-right ml-3">{{ number_format($total,0,'','.') }} đ</strong>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Giảm giá: {{ (isset($couponValue))?$couponValue.'%':''}}</dt>
                        <dd class="text-right text-danger ml-3"></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd class="text-right text-dark b ml-3"><strong>{{(isset($discount_total)&&$discount_total!= 0)? number_format($discount_total,0,'','.'): number_format($total,0,'','.') }} đ</strong></dd>
                    </dl>
                    <hr> <a href="{{ route('client.checkout') }}" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Checkout </a> <a href="{{ route('client.home') }}" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('client.updateCart') }}',
            method: "put",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('client.deleteCart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection