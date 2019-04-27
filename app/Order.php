<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id', 'shop_id', 'state', 'num', 'price', 'remark'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function goods()
    {
        return $this->belongsToMany(Good::class,'order_goods')->withPivot('num');
    }

    public function goodd()
    {
        return $this->belongsToMany(Good::class,'order_goods')->withPivot('num')->using('App\OrderGood');
    }
}
