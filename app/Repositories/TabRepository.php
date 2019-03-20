<?php
/**
 * Created by PhpStorm.
 * User: 新用户
 * Date: 2019/3/3
 * Time: 12:56
 */

namespace App\Repositories;


use App\Shop;

class TabRepository
{
    //根据商铺id查找标签
    public function getNameByShopId($shop_id)
    {
        return Shop::query()->find($shop_id)->tabs()->get(['name']);
    }

}