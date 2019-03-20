<?php
/**
 * Created by PhpStorm.
 * User: 新用户
 * Date: 2019/3/3
 * Time: 12:55
 */

namespace App\Repositories;


use App\Evaluation;
use App\Shop;
use App\User;

class EvaluationRepository
{
    //通过商铺id查找评价
    public function getEvaUserByShopId($shop_id)
    {
//        return Evaluation::query()->where('shop_id',$shop_id)->get();
        return Evaluation::with('user')->where('shop_id',$shop_id)->get();
    }

}