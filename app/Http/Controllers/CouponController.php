<?php

namespace App\Http\Controllers;

use App\Repositories\CouponRepository;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    //通过user_id查找
    public function getWithShopByUserId(Request $request)
    {
        $user_id = $request->get('user_id');
        $coupon = $this->couponRepository->getWithShopByUserId($user_id);
        if(count($coupon) != 0){
            return $this->success($coupon, '查找优惠券信息成功');
        } else{
            return $this->fail($coupon, '查找优惠券信息失败');
        }
    }
}
