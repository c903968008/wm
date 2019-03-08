<?php
/**
 * Created by PhpStorm.
 * User: 新用户
 * Date: 2019/3/3
 * Time: 12:55
 */

namespace App\Repositories;


use App\Good;

class GoodRepository
{

    //通过shop_id查找
    public function getByShopId($shop_id)
    {
        return Good::query()->where('shop_id',$shop_id)->get();
    }

}