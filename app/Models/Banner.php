<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'picture_id'
    ];
    public function pictures()
    {
        return $this->belongsTo(Picture::class,'picture_id','id');
    }
}
