<?php

namespace App\Http\Controllers;

use App\Repositories\EvaluationRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    protected $evaluationRepository;
    protected $userRepository;

    public function __construct(EvaluationRepository $evaluationRepository, UserRepository $userRepository)
    {
        $this->evaluationRepository = $evaluationRepository;
        $this->userRepository = $userRepository;
    }

    //查找店铺相关评价
    public function getByShopId(Request $request)
    {
        $shop_id = $request->get('shop_id');
        $evas = $this->evaluationRepository->getEvaUserByShopId($shop_id);
        if($evas){
            return $this->success($evas,"根据shop_id查找评价成功");
        } else {
            return $this->fail($evas,"根据shop_id查找评价失败");
        }
    }

    public function add(Request $request)
    {
        $data = [
            'user_id' => $request->get('user_id'),
            'shop_id' => $request->get('shop_id'),
            'point' => 3,
            'content' => $request->get('content'),
            'photo' => '无'
        ];
        $eva = $this->evaluationRepository->add($data);
        if($eva){
            return $this->success($eva,"提交评价成功");
        } else {
            return $this->fail($eva,"提交评价失败");
        }
    }

}
