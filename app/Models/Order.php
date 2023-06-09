<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'address',
        'status',
        'payment_method'
    ];
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
