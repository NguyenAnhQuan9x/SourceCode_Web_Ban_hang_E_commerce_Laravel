<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Top10ProductBestSellers = OrderDetail::select('product_id',DB::raw("count(*) as order_total"))
                                    ->groupBy('product_id')
                                    ->orderBy('order_total','desc')
                                    ->get();
        $orderCount = Order::count();
        $userCount = User::where('role',0)->count();
        return view('home',compact('orderCount','userCount','Top10ProductBestSellers'));
    }
}
