<?php

namespace App\Http\Controllers;

use App\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    //添加商品
    public function create(Request $request)
    {
        $g = $request->get('good');
        $num = 0;
        foreach($g as $gd){
            $num += $gd['num'];
        }
        $order = [
            'user_id' => $request->get('user_id'),
            'shop_id' => $request->get('shop_id'),
            'state' => 0,
            'num' => $num,
            'price' => $request->get('price'),
        ];
        $good = $g;

        $addOrder = $this->orderRepository->create($order,$good);
        if($addOrder){
            return $this->success($addOrder,'添加订单成功');
        } else {
            return $this->fail($addOrder, '添加订单失败');
        }

    }

    //通过user_id查看订单
    public function getByUserId(Request $request)
    {
        $user_id = $request->get('user_id');
        $orders = $this->orderRepository->getByUserId($user_id);
        if(count($orders)){
            return $this->success($orders,'查看订单成功');
        } else{
            return $this->fail($orders,'查看订单失败');
        }
    }
}
