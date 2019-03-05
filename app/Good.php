<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{

    protected $fillable = [
        'name', 'logo', 'sale', 'praise', 'price',
    ];


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
