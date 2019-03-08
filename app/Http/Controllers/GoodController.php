<?php

namespace App\Http\Controllers;

use App\Repositories\GoodRepository;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    protected $goodRepository;

    public function __construct(GoodRepository $goodRepository)
    {
        $this->goodRepository = $goodRepository;
    }

    //获取商铺的商品
    public function getByShopId(Request $request)
    {
        $shop_id = $request->get('shop_id');
        $goods = $this->goodRepository->getByShopId($shop_id);
        if(count($goods)!=0){
            return $this->success($goods,"获取商品成功");
        } else {
            return $this->fail($goods,"获取商品失败");
        }
    }

}
