<?php
/**
 * Created by PhpStorm.
 * User: 新用户
 * Date: 2019/3/3
 * Time: 12:55
 */

namespace App\Repositories;


use App\Order;
use App\OrderGood;

class OrderRepository
{

    //添加订单
    public function create($order,$goods)
    {
        if(count($order)){
            $order = Order::query()->create($order);
        }
        if(count($goods)){
            foreach ($goods as $good){
                $good['order_id'] = $order['id'];
                OrderGood::query()->create($good);
            }
        }
        return 1;
    }

    //通过user_id查询订单
    public function getByUserId($user_id)
    {
        return Order::with('goods')->with(['shop' => function($query){
            $query->select('id','name','logo');
        }])->where('user_id',$user_id)->orderBy('id', 'desc')->get();
    }

}