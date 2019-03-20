<?php
/**
 * Created by PhpStorm.
 * User: 新用户
 * Date: 2019/3/3
 * Time: 12:55
 */

namespace App\Repositories;


use App\Shop;

class ShopRepository
{

    //查找所有商铺信息
    public function getAll()
    {
        return Shop::all();
    }

    //通过id查找
    public function getById($id)
    {
        return Shop::query()->find($id);
    }



}