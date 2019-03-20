<?php

namespace App\Http\Controllers;

use App\Repositories\ShopRepository;
use App\Repositories\TabRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $shopRespository;
    protected $tabRepository;

    public function __construct(ShopRepository $shopRepository,TabRepository $tabRepository)
    {
        $this->shopRespository = $shopRepository;
        $this->tabRepository = $tabRepository;
    }

    //展示所有商铺信息
    public function showAll()
    {
        $shop = $this->shopRespository->getAll();
        if($shop){
            return $this->success($shop,"获取所有商铺信息成功");
        } else{
            return $this->fail($shop,'获取所有商铺信息失败');
        }
    
    }

    //通过id查找
    public function getById(Request $request)
    {
        $id = $request->get('id');
        $shop = $this->shopRespository->getById($id);
        $tabs = $this->tabRepository->getNameByShopId($id);
        if($shop){
            return $this->success([$shop,$tabs],"根据id查找商铺成功");
        } else {
            return $this->fail($shop,"根据id查找商铺失败");
        }
    }


}
