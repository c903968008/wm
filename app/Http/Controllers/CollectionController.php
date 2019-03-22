<?php

namespace App\Http\Controllers;

use App\Repositories\CollectionRepository;
use App\User;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    protected $collectionRepository;

    public function __construct(CollectionRepository $collectionRepository)
    {
        $this->collectionRepository = $collectionRepository;
    }

    //收藏店铺
    public function collect(Request $request)
    {
        $user_id = $request->get('user_id');
        $shop_id = $request->get('shop_id');
        $clct = $this->collectionRepository->collect($user_id,$shop_id);
        if($clct) {
            return $this->success($clct,"收藏操作成功");
        } else {
            return $this->fail($clct,"收藏操作失败");
        }
    }

    //判断是否已收藏
    public function isCollect(Request $request)
    {
        $user_id = $request->get('user_id');
        $shop_id = $request->get('shop_id');
        $isCollect = $this->collectionRepository->isCollect($user_id,$shop_id);
        if($isCollect->isEmpty()) {
            return $this->fail($isCollect,"未收藏");
        } else {
            return $this->success($isCollect,"已收藏");
        }
    }

    //取消收藏
    public function ncollect(Request $request)
    {
        $user_id = $request->get('user_id');
        $shop_id = $request->get('shop_id');
        $ncollect = $this->collectionRepository->ncollect($user_id,$shop_id);
        if($ncollect == 'success') {
            return $this->success($ncollect,"删除收藏操作成功");
        } else {
            return $this->fail($ncollect,"删除收藏操作失败");
        }
    }

    //通过user_id查找
    public function getByUserId(Request $request)
    {
        $user_id = $request->get('user_id');
        $collection = $this->collectionRepository->getByUserId($user_id);
        if(count($collection)){
            return $this->success($collection,'查找收藏成功');
        } else{
            return $this->fail($collection,'查找收藏失败');
        }

    }
}
