<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
            $categories = Category::where('name','LIKE',"%{$keyword}%")->paginate(5);
        }
        else{
            $categories = Category::orderBy('id','desc')->paginate(5);
        }
        return view('Admin.categories.show',compact('categories'));
    }
    public function create()
    {
        return view('Admin.categories.create');
    }
    public function store(ClassRequest $request)
    {

            Category::create($request->all());
            return redirect()->route('categories.index')->with('message','Bạn đã thêm thành công');
    }
    public function edit(Category $category)
    {
        return view('Admin.categories.edit',compact('category'));
    }
    public function update(ClassRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index')->with('message','Cập nhật thành công');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('message','Xóa thành công');
    }
    
}
