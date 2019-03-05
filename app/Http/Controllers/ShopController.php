<?php

namespace App\Http\Controllers;

use App\Repositories\ShopRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $shopRespository;

    public function __construct(ShopRepository $shopRepository)
    {
        $this->shopRespository = $shopRepository;
    }

    //展示所有商铺信息
    public function showAll()
    {
    
    }

}
