<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Promotion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'promotion_name',
        'promotion_value',
        'category_id'
    ];
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
