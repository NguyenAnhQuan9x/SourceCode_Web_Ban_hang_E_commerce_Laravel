<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Mail\SendMail;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $banners = Banner::all();
        $productNew = Product::orderBy('id','desc')->take(5)->get();
        /* get top 10 productBestseller*/
        $Top10ProductBestSellers = OrderDetail::select('product_id',DB::raw("count(*) as order_total"))
                                    ->groupBy('product_id')
                                    ->orderBy('order_total','desc')
                                    ->get();
        /* $productTopSelling =  */
        return view('Client.home',compact('categories','productNew','banners','Top10ProductBestSellers'));
    }
    public function product(Product $product)
    {
        $categories = Category::all();
        return view('Client.product',compact('product','categories'));
    }
    public function cart()
    {
        $total = 0;
        foreach(session('cart') as $item){
            $total += $item['price']*$item['quantity'];
        }
        $categories = Category::all();
        return view('Client.cart',compact('categories','total'));
    }
    public function coupon(Request $request)
    {
        $coupon = $request->coupon;
        $categories = Category::all();
        $coupons = Promotion::all();
        $k= 0;
        $message = '';
        $total = 0;
        $discount_total = $total;
        foreach(session('cart') as $item){
            $total += $item['price']*$item['quantity'];
        }
        foreach($coupons as $item){
            if($coupon== $item->promotion_name){
                $couponValue = $item->promotion_value;
                $k++;
                $discount_total = $total-($couponValue*$total/100);
                session()->put('total',$discount_total);
            }
        }
        if($k == 0){
            $message = 'Mã giảm giá không có hiệu lực';
            $couponValue = 0;
            session()->put('total',$total);
        }
        
        return view('Client.cart',compact('categories','couponValue','message','discount_total','total'));

    }
    public function addToCart(Product $product)
    {
        $cart = session()->get('cart',[]);
        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity']++;
        }else{
            $cart[$product->id]=[
                'product_id'=>$product->id,
                'product_title'=>$product->title,
                'image'=>$product->pictures->image,
                'price'=>$product->price,
                'quantity'=>1
            ];
        };
        session()->put('cart',$cart);
        return redirect()->route('client.cart');
    }
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }
    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
    public function checkout()
    {
        $categories = Category::all();
        return view('Client.checkout',compact('categories'));
    }
    public function categories(Category $category)
    {
        $Top10ProductBestSellers = OrderDetail::select('product_id',DB::raw("count(*) as order_total"))
                                    ->groupBy('product_id')
                                    ->orderBy('order_total','desc')
                                    ->get();
        $categories = Category::all();
        $products = Product::where('category_id',$category->id)->get();
        return view('Client.store',compact('categories','products','Top10ProductBestSellers'));
    }
    public function search(Request $request)
    {
        $categories = Category::all();
        $products = Product::where('title','LIKE',"%{$request->keyword}%")->get();
        return view('Client.search',compact('products','categories'));
    }
    public function order(OrderRequest $request)
    {

        if(session('cart') != ''){
            Order::create($request->all());
            $order = Order::orderBy('id','desc')->first();
            
            session()->put('orderInfor',$order);
            foreach(session('cart') as $item){
                OrderDetail::create([
                    'product_id'=>$item['product_id'],
                    'order_id'=>$order->id,
                    'quantity'=>$item['quantity'],
                ]);
            };
        };
        return redirect()->route('client.successOrder');
    }
    public function successOrder()
    {
        $categories = Category::all();
        Mail::to(session('orderInfor')->email)->send(new SendMail());
        return view('Client.successOrder',compact('categories'));
    }
}