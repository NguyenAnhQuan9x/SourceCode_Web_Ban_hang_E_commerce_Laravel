<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\checkPromotion;
use App\Models\Order;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin',function(){
    return redirect('admin/home');
});
Auth::routes();

Route::group(['middleware'=>['auth','CheckAdmin'], 'prefix'=>'admin'],function(){
    Route::get('/home',[HomeController::class,'index']);
    Route::group(['prefix'=>'categories'],function(){
        Route::get('/',[CategoryController::class,'index'])->name('categories.index');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/store',[CategoryController::class,'store']);
        Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('categories.edit');
        Route::put('/update/{category}',[CategoryController::class,'update'])->name('categories.update');
        Route::delete('/delete/{category}',[CategoryController::class,'destroy'])->name('categories.delete');
    });
    Route::group(['prefix'=>'pictures'],function(){
        Route::get('/',[PictureController::class,'index'])->name('pictures.index');
        Route::get('/create',[PictureController::class,'create'])->name('pictures.create');
        Route::post('/store',[PictureController::class,'store'])->name('pictures.store');
    });
    Route::group(['prefix'=>'products'],function(){
        Route::get('/',[ProductController::class,'index'])->name('products.index');
        Route::get('/create',[ProductController::class,'create'])->name('products.create');
        Route::post('/store',[ProductController::class,'store']);
        Route::get('/edit/{product}',[ProductController::class,'edit'])->name('products.edit');
        Route::put('/update/{product}',[ProductController::class,'update'])->name('products.update');
        Route::delete('/delete/{product}',[ProductController::class,'destroy'])->name('products.delete');
    });
    Route::group(['prefix'=>'promotions'],function(){
        Route::get('/',[PromotionController::class,'index'])->name('promotions.index');
        Route::get('/create',[PromotionController::class,'create'])->middleware(checkPromotion::class)->name('promotions.create');
        Route::view('/view','Admin.promotions.promotionView')->name('promotion.view');
        Route::post('/store',[PromotionController::class,'store']);
        Route::get('/edit/{promotion}',[PromotionController::class,'edit'])->name('promotions.edit');
        Route::put('/update/{promotion}',[PromotionController::class,'update'])->name('promotions.update');
        Route::delete('/delete/{promotion}',[PromotionController::class,'destroy'])->name('promotions.delete');
    });
    Route::group(['prefix'=>'banners'],function(){
        Route::get('/',[BannerController::class,'index'])->name('banners.index');
        Route::get('/create',[BannerController::class,'create'])->name('banners.create');
        Route::post('/store',[BannerController::class,'store']);
        Route::get('/edit/{banner}',[BannerController::class,'edit'])->name('banners.edit');
        Route::put('/update/{banner}',[BannerController::class,'update'])->name('banners.update');
        Route::delete('/delete/{banner}',[BannerController::class,'destroy'])->name('banners.delete');
    });
    Route::group(['prefix'=>'orders'],function(){
        Route::get('/',[OrderController::class,'index'])->name('orders.index');
        Route::get('detail/{order}',[OrderController::class,'orderDetail'])->name('orders.detail');
        Route::get('/create',[OrderController::class,'create'])->name('orders.create');
        Route::post('/store',[OrderController::class,'store']);
        Route::get('/edit/{order}',[OrderController::class,'edit'])->name('orders.edit');
        Route::put('/update/{order}',[OrderController::class,'update'])->name('orders.update');
        Route::put('orders/updateStatus/{order}',[OrderController::class,'update'])->name('orders.updateStatus');
    });
    Route::group(['prefix'=>'users'],function(){
        Route::get('/',[UserController::class,'index'])->name('users.index');
        Route::get('/create',[UserController::class,'create'])->name('users.create');
        Route::post('/store',[UserController::class,'store']);
        Route::get('/edit/{user}',[UserController::class,'edit'])->name('users.edit');
        Route::put('/update/{user}',[UserController::class,'update'])->name('users.update');
        Route::delete('/delete/{user}',[UserController::class,'destroy'])->name('users.delete');
    });
    Route::get('/sendmail',[MailController::class,'SendMail']);
});

//client route
Route::get('/',[ClientController::class,'index'])->name('client.home');
Route::get('/product/{product}',[ClientController::class,'product'])->name('client.product');
Route::get('danhmuc/{category}',[ClientController::class,'categories'])->name('client.store');
Route::get('/cart',[ClientController::class,'cart'])->name('client.cart');
Route::post('cart',[ClientController::class,'coupon'])->name('client.coupon');
Route::get('/checkout',[ClientController::class,'checkout'])->name('client.checkout');
Route::post('order',[ClientController::class,'order'])->name('client.order');
Route::get('order/success',[ClientController::class,'successOrder'])->name('client.successOrder');
Route::get('add-to-cart/{product}',[ClientController::class,'addToCart'])->name('client.addToCart');
Route::put('update-cart',[ClientController::class,'updateCart'])->name('client.updateCart');
Route::delete('remove-cart',[ClientController::class,'removeCart'])->name('client.deleteCart');
Route::get('/search',[ClientController::class,'search'])->name('client.search');
