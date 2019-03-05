<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{

    protected $fillable = [
        'name',
    ];


    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
}
