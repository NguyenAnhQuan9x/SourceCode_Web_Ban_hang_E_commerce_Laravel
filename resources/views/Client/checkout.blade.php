@extends('Client.layout')

@section('content')
<div class="row">
    <form action="{{ route('client.order') }}" id="checkoutForm" method="POST">
        @csrf
        <div class="col-md-7">
            <!-- Billing Details -->
            <div class="billing-details">
                <div class="section-title">
                    <h3 class="title">Billing address</h3>
                </div>
                <div class="form-group">
                    <input class="input" type="text" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                    <input class="input" type="email" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <input class="input" type="text" placeholder="Address" name="address">
                </div>
                <div class="form-group">
                    <input class="input" type="tel"  placeholder="Telephone" name="phone_number">
                </div>
                
            </div>
            <!-- /Billing Details -->
    
            <!-- Shiping Details -->
            <div class="shiping-details">
                <div>
                </div>
            </div>
            <!-- /Shiping Details -->
    
            <!-- Order notes -->
            <div class="order-notes">
                <textarea class="input" placeholder="Order Notes"></textarea>
            </div>
            <!-- /Order notes -->
        </div>
    </form>

    

    <!-- Order Details -->
    <div class="col-md-5 order-details">
        <div class="section-title text-center">
            <h3 class="title">Your Order</h3>
        </div>
        <div class="order-summary">
            <div class="order-col">
                <div><strong>PRODUCT</strong></div>
                <div><strong>TOTAL</strong></div>
            </div>
            <div class="order-products">
                @foreach (session('cart') as $item)
                <div class="order-col">
                    <div>{{ $item['quantity'].'x'.$item['product_title'] }}</div>
                    <div>{{ number_format(session('total'),0,'','.') }} đ</div>
                </div>
                @endforeach

            </div>
            <div class="order-col">
                <div>Shiping</div>
                <div><strong>FREE</strong></div>
            </div>
            <div class="order-col">
                <div><strong>TOTAL</strong></div>
                <div><strong class="order-total">{{ number_format(session('total'),0,'','.') }} đ</strong></div>
                
            </div>
        </div>
        <div class="payment-method">
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-1" value="0" form="checkoutForm">
                <label for="payment-1">
                    <span></span>
                    Thanh toán khi nhận hàng
                </label>
                
            </div>
            
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-3" value="1" form="checkoutForm">
                <label for="payment-3">
                    <span></span>
                    Thanh toán online
                </label>
               
            </div>
        </div>
        <div class="input-checkbox">
            <input type="checkbox" id="terms" name="check" form="checkoutForm">
            <label for="terms">
                <span></span>
                I've read and accept the <a href="#">terms & conditions</a>
            </label>
        </div>
        <button type="submit" class="primary-btn order-submit" form="checkoutForm">Place order</button>
    </div>
    <!-- /Order Details -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="newsletter">
            <p>Sign Up for the <strong>NEWSLETTER</strong></p>
            <form>
                <input class="input" type="email" placeholder="Enter Your Email">
                <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
            </form>
            <ul class="newsletter-follow">
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection