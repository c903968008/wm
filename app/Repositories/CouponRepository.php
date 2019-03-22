<?php
/**
 * Created by PhpStorm.
 * User: 新用户
 * Date: 2019/3/3
 * Time: 12:55
 */

namespace App\Repositories;


use App\Coupon;

class CouponRepository
{

    //通过用户id查找
    public function getWithShopByUserId($user_id)
    {
        return Coupon::with(['shop' => function($query){
            $query->select('id','name','logo');
        }])->where('user_id',$user_id)->get();
    }

}