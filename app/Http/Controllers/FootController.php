<?php

namespace App\Http\Controllers;

use App\Repositories\FootprintRepository;
use Illuminate\Http\Request;

class FootController extends Controller
{
    protected $footRepository;

    public function __construct(FootprintRepository $footRepository)
    {
        $this->footRepository = $footRepository;
    }

    //添加足迹
    public function create(Request $request)
    {
        $shop_id = $request->get('shop_id');
        $user_id = $request->get('user_id');
        $isFoot = $this->footRepository->isFoot($shop_id,$user_id);
        if($isFoot){
            $foot = $this->footRepository->edit($shop_id,$user_id);
            if($foot){
                return $this->success($foot,'添加足迹成功');
            } else{
                return $this->fail($foot,'添加足迹失败');
            }
        } else{
            $foot = $this->footRepository->create($shop_id,$user_id);
            if($foot){
                return $this->success($foot,'添加足迹成功');
            } else{
                return $this->fail($foot,'添加足迹失败');
            }
        }
    }

    //通过user_id查看足迹
    public function getByUserId(Request $request)
    {
        $user_id = $request->get('user_id');
        $foot = $this->footRepository->getByUserId($user_id);
        if($foot){
            return $this->success($foot,'查看足迹成功');
        } else{
            return $this->fail($foot,'查看足迹失败');
        }
    }

}
