<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderGood extends Model
{
    protected $fillable = [
        'order_id', 'good_id', 'num'
    ];

    public function goods()
    {
        return $this->belongsToMany(Good::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
