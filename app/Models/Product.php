<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function pictures()
    {
        return $this->belongsTo(Picture::class,'picture_id','id');
    }
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class,'product_id','id ');
    }
    protected $fillable = [
        'title'  ,
        'price',
        'meta_description',
        'product_detail',
        'description',
        'category_id',
        'picture_id'
    ];
}
