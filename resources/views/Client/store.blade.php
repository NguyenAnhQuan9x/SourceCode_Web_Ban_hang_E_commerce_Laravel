@extends('Client.layout')

@section('content')
<div class="row">
    <!-- ASIDE -->
    <div id="aside" class="col-md-3">
        <!-- aside Widget -->
        
        <!-- /aside Widget -->

        <!-- aside Widget -->
        <!-- /aside Widget -->

        <!-- aside Widget -->
        <div class="aside">
            <h3 class="aside-title">Top selling</h3>
            @foreach ($Top10ProductBestSellers as $item)
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ asset('storage/images/'.$item->products->pictures->image) }}" alt="">
                </div>
                <div class="product-body">
                    <p class="product-category">{{ $item->products->categories->name }}</p>
                    <h3 class="product-name"><a href="{{ route('client.product', $item->products->id) }}">{{ $item->products->title }}</a></h3>
                    <h4 class="product-price">{{ number_format($item->products->price,0,'','.') }}đ</h4>
                </div>
            </div>
            @endforeach

            
        </div>
        <!-- /aside Widget -->
    </div>
    <!-- /ASIDE -->

    <!-- STORE -->
    <div id="store" class="col-md-9">
        <!-- store top filter -->
        <div class="store-filter clearfix">
            <div class="store-sort">
                <label>
                    Sort By:
                    <select class="input-select">
                        <option value="0">Giá Thấp - Cao</option>
                        <option value="1">Giá Cao - Thấp</option>
                    </select>
                </label>

                <label>
                    Show:
                    <select class="input-select">
                        <option value="0">10</option>
                        <option value="1">20</option>
                    </select>
                </label>
            </div>
            <ul class="store-grid">
                <li class="active"><i class="fa fa-th"></i></li>
                <li><a href="#"><i class="fa fa-th-list"></i></a></li>
            </ul>
        </div>
        <!-- /store top filter -->

        <!-- store products -->
        
        <div class="row">
            @foreach ($products as $item)
                <!-- product -->
            <div class="col-md-4 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="{{ asset('storage/images/'.$item->pictures->image) }}" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{ $item->categories->name }}</p>
                        <h3 class="product-name"><a href="{{ route('client.product',$item->id) }}">{{ $item->title }}</a></h3>
                        <h4 class="product-price">{{ number_format($item->price,0,'','.') }} đ</h4>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="{{ route('client.addToCart',$item->id) }}">add to cart</a></button>
                    </div>
                </div>
            </div>
            <!-- /product -->
            @endforeach

            
        </div>
        <!-- /store products -->

        <!-- store bottom filter -->
        <div class="store-filter clearfix">
            <span class="store-qty">Showing 20-100 products</span>
            <ul class="store-pagination">
                <li class="active">1</li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
        <!-- /store bottom filter -->
    </div>
    <!-- /STORE -->
</div>

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
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection