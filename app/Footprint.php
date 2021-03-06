<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footprint extends Model
{
    protected $fillable = [
        'user_id', 'shop_id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
