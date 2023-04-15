<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->hasMany(Product::class,'picture_id','id');
    }
    public function banners()
    {
        return $this->hasMany(Banner::class,'picture_id','id');
    }
    public function users()
    {
        return $this->hasMany(User::class,'picture_id','id');
    }
    protected $fillable = [
        'image'
    ];
}
