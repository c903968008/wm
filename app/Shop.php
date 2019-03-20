<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    protected $fillable = [
        'name', 'grade', 'sale', 'address', 'logo', 'telephone', 'remark', 'discount', 'eva', 'goodEva', 'badEva',
    ];


    public function tabs()
    {
        return $this->belongsToMany(Tab::class);
    }


    public function foot()
    {
        return $this->belongsToMany(User::class);
    }

    public function collecte()
    {
        return $this->belongsToMany(User::class);
    }

//    public function evaluations()
//    {
//        return $this->belongsToMany(Evaluation::class);
//    }


}
