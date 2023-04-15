<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
            $orders = Order::where('phone_number','LIKE',"%{$keyword}%")
                             ->orWhere('name','LIKE',"%{$keyword}%")
                             ->paginate(5);
        }
        else
        {
            $orders = Order::orderBy('id','desc')->paginate(5);
        }
        return view('Admin.orders.show',compact('orders'));
    }
    public function create()
    {
        return view('Admin.categories.create');
    }
/*     public function store(ClassRequest $request)
    {
        $categories = Category::all();
        foreach($categories as $category){
            if($request->name != $category->name){
                Category::create($request->all());
            }
        }
            return redirect()->route('categories.index');
    } */
    public function edit(Order $order)
    {
        return view('Admin.orders.edit',compact('order'));
    }
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.index');
    }
    public function updateStatus(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.index');
    }
    public function orderDetail(Order $order)
    {
        $order_detail = OrderDetail::where('order_id',$order->id)->get();
        return view('Admin.orders.detail',compact('order_detail'));
    }

}
