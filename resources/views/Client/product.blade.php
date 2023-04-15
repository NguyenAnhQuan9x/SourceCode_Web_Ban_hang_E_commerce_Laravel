@extends('Client.layout')
@section('content')
<div class="row">
    <!-- Product main img -->
    <div class="col-md-5 col-md-push-2">
        <div id="product-main-img">
            <div class="product-preview">
                <img src="{{ asset('storage/images/'.$product->pictures->image) }}" alt="">
            </div>
        </div>
    </div>
    <!-- /Product main img -->

    <!-- Product thumb imgs -->
    <div class="col-md-2  col-md-pull-5">
        <div id="product-imgs">
            <div class="product-preview">
                <img src="{{ asset('storage/images/'.$product->pictures->image) }}" alt="">
            </div>
        </div>
    </div>
    <!-- /Product thumb imgs -->

    <!-- Product details -->
    <div class="col-md-5">
        <div class="product-details">
            <h2 class="product-name">{{ $product->title }}</h2>
            <div>
                <h3 class="product-price">{{ number_format($product->price,0,'','.') }} đ <del class="product-old-price"></del></h3>
                <span class="product-available">In Stock</span>
            </div>
            <p>{{ $product->meta_description }}</p>

            <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="{{ route('client.addToCart',$product->id) }}">add to cart</a></button>
            </div>

            <ul class="product-btns">
                <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
            </ul>

            <ul class="product-links">
                <li>Category:</li>
                <li><a href="#">{{ $product->categories->name }}</a></li>
            </ul>

            <ul class="product-links">
                <li>Share:</li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
            </ul>

        </div>
    </div>
    <!-- /Product details -->

    <!-- Product tab -->
    <div class="col-md-12">
        <div id="product-tab">
            <!-- product tab nav -->
            <ul class="tab-nav">
                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                <li><a data-toggle="tab" href="#tab2">Details</a></li>
            </ul>
            <!-- /product tab nav -->

            <!-- product tab content -->
            <div class="tab-content">
                <!-- tab1  -->
                <div id="tab1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <p>{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
                <!-- /tab1  -->

                <!-- tab2  -->
                <div id="tab2" class="tab-pane fade in">
                    <div class="row">
                        <div class="col-md-12">
                            <p>{!! $product->product_detail !!}</p>
                        </div>
                    </div>
                </div>
                <!-- /tab2  -->

                <!-- tab3  -->
                
                <!-- /tab3  -->
            </div>
            <!-- /product tab content  -->
        </div>
    </div>
    <!-- /product tab -->
</div>
@endsection