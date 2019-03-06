<?php

namespace App\Http\Controllers;

use App\Repositories\CollectionRepository;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    protected $collectionRepository;

    public function __construct(CollectionRepository $collectionRepository)
    {
        $this->collectionRepository = $collectionRepository;
    }

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

    public function ncollect(Request $request)
    {
        $user_id = $request->get('user_id');
        $shop_id = $request->get('shop_id');
        $ncollect = $this->collectionRepository->ncollect($user_id,$shop_id);
        if($ncollect) {
            return $this->success($ncollect,"删除收藏操作成功");
        } else {
            return $this->fail($ncollect,"删除收藏操作失败");
        }
    }
}
