<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $table = 'order_detail';
    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'promotion_id'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

}
