@extends('client.layout')
@section('content')
<div class="row">

</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">

    <!-- section title -->
    <div class="col-md-12">
        Kết quả tìm kiếm cho từ khóa " <strong>{{ $_GET['keyword'] }}</strong>"
    </div>
    <!-- /section title -->

    <!-- Products tab & slick -->
    <div class="col-md-12">
        <div class="row">
            <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                    <div class="products-slick" data-nav="#slick-nav-1">
                        <!-- product -->
                        @foreach ($products as $item)
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ asset('storage/images/'.$item->pictures->image) }}" alt="">
                                <div class="product-label">
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $item->categories->name }}</p>
                                <h3 class="product-name"><a href="{{ route('client.product',$item->id) }}">{{ $item->title }}</a></h3>
                                <h4 class="product-price">{{ number_format($item->price,0,'','.') }} đ   <del class="product-old-price"></del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
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
                        @endforeach
                        <!-- /product -->

                        <!-- product -->
                        
                        <!-- /product -->
                    </div>
                    <div id="slick-nav-1" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
            </div>
        </div>
    </div>
    <!-- Products tab & slick -->
</div>
@endsection