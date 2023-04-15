<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRequest;
use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    //
    public function store(ClassRequest $request)
    {
        Picture::create($request->all());
    }
}
