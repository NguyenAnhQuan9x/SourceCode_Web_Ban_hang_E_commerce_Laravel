<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionRequest;
use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    //
    public function index()
    {
        $promotions = Promotion::orderBy('id','desc')->paginate(5);
        return view('Admin.promotions.show',compact('promotions'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('Admin.promotions.create', compact('categories'));
    }
    public function store(PromotionRequest $request)
    {
            Promotion::create($request->all());
            return redirect()->route('promotions.index')->with('message','Thêm thành công');
    }
    public function edit(Promotion $promotion)
    {
        $categories = Category::all();
        return view('Admin.promotions.edit',compact('promotion','categories'));
    }
    public function update(PromotionRequest $request, Promotion $promotion)
    {
        $promotion->update($request->all());
        return redirect()->route('promotions.index')->with('message','Cập nhật thành công');
    }
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotions.index')->with('message','Xóa thành công');
    }
}
