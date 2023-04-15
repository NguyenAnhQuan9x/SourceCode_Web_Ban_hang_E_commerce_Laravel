<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Picture;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
            $users = User::where('name','LIKE',"%{$keyword}%")->paginate(5);
        }
        else{
            $users = User::orderBy('id','desc')->paginate(5);
        }
        return view('Admin.users.show',compact('users'));
    }
    public function create()
    {
        return view('Admin.users.create');
    }
    public function store(UserRequest $request)
    {
        if($request->image){
            $image = $request->image->hashName();
             Picture::create([
                 'image'=>$image
             ]);
             $request->image->storeAs('images',$image);
             $picture = Picture::orderBy('id','desc')->first();
             User::create(
                [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'role'=>$request->role,
                    'picture_id'=>$picture['id']
                ]
            );
        }
        return redirect()->route('users.index')->with('message','Thêm thành công');
    }
    public function edit(User $user)
    {
        return view('Admin.users.edit',compact('user'));
    }
    public function update(User $user, UserRequest $request)
    {
        if($request->image!=''){
            $image = $request->image->hashName();
            Picture::create([
                'image'=>$image
            ]);
            $request->image->storeAs('images',$image);
            $picture = Picture::orderBy('id','desc')->first();
            $user->update([
                'name'=>$request->name,
                'picture_id'=>$picture['id']
            ]);
        }
        $user->update(
            [
                'name'=>$request->name
            ]
        );
        return redirect()->route('users.index')->with('message','Cập nhật thành công');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message','Xóa thành công');
    }
}
