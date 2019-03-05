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
        $shop = $this->shopRespository->qureyAll();
        if($shop){
            return $this->success($shop,"获取所有商铺信息成功");
        } else{
            return $this->fail($shop,'获取所有商铺信息失败');
        }
    
    }

}
