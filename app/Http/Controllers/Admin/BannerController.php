<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::all();
        $categories = Category::all();
        return view('Admin.banners.show', compact('banners', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pictures = Picture::all();
        return view('Admin.banners.create',compact('pictures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->file('image') != ''){
            $image = $request->image->hashName();
        Picture::create([
            'image' => $image
        ]);
        $request->image->storeAs('images', $image);
        $picture = Picture::orderBy('id', 'desc')->first();
        Banner::create([
            'picture_id' => $picture->id
        ]);
        }else{
            Banner::create([
                'picture_id'=>$request->image
            ]);
        };
        return redirect()->route('banners.index')->with('message','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
        $categories = Category::all();
        $pictures = Picture::all();
        return view('Admin.banners.edit', compact('categories', 'banner','pictures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
        if ($request->file('image') != '') {
            $image = $request->image->hashName();
            Picture::create([
                'image' => $image
            ]);
            $request->image->storeAs('images', $image);
            $picture = Picture::orderBy('id', 'desc')->first();
            $banner->update([
                'picture_id' => $picture->id
            ]);
        }
        else{
            $banner->update([
                'picture_id'=>$request->image
            ]);
        }
        return redirect()->route('banners.index')->with('message','Cập nhật thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
        $banner->delete();
        return redirect()->route('banners.index')->with('message','Xóa thành công');
    }
}
