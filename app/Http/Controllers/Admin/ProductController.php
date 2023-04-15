<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Product;
use Illuminate\Http\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
            $products = Product::where('title','LIKE',"%{$keyword}%")->paginate(5);
        }
        else{
            $products = Product::orderBy('id','desc')->paginate(5);

        }
        return view('Admin.products.show',compact('products','categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('Admin.products.create',compact('categories'));
    }
    public function store(ProductRequest $request)
    {
        $image = $request->image->hashName();
             Picture::create([
                 'image'=>$image
             ]);
             $request->image->storeAs('images',$image);
             $picture = Picture::orderBy('id','desc')->first();
            Product::create([
                'title'=>$request->title,
                'price'=>$request->price,
                'meta_description'=>$request->meta_description,
                'product_detail'=>$request->product_detail,
                'description'=>$request->description,
                'category_id'=>$request->category_id,
                'picture_id'=>$picture['id']
            ]);
            return redirect()->route('products.index')->with('message','Thêm thành công');
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('Admin.products.edit',compact('categories','product'));
    }
    public function update(ProductRequest $request, Product $product)
    {
        
        if($request->image !=''){
            $image = $request->image->hashName();
            Picture::create([
                'image'=>$image
            ]);
            $request->image->storeAs('images',$image);
            $picture = Picture::orderBy('id','desc')->first();
            $product->update([
                'title'=>$request->title,
                'price'=>$request->price,
                'meta_description'=>$request->meta_description,
                'product_detail'=>$request->product_detail,
                'description'=>$request->description,
                'category_id'=>$request->category_id,
                'picture_id'=>$picture['id']
            ]);
        }
        $product->update($request->all());
        return redirect()->route('products.index')->with('message','Cập nhật thành công');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('message','Xóa thành công');
    }
}
