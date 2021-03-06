<?php
/**
 * Created by PhpStorm.
 * User: 新用户
 * Date: 2019/3/6
 * Time: 15:47
 */

namespace App\Repositories;


use App\Collection;

class CollectionRepository
{
    //用户收藏店铺
    public function collect($user_id,$shop_id)
    {
        return Collection::query()->create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
        ]);
    }

    //查看是否收藏
    public function isCollect($user_id,$shop_id)
    {
        return Collection::query()->where(['user_id'=>$user_id,'shop_id'=>$shop_id])->get();
    }

    //删除收藏
    public function ncollect($user_id,$shop_id)
    {
        $collect = Collection::query()->where(['user_id'=>$user_id,'shop_id'=>$shop_id])->first();
        if($collect->delete()){
            return 'success';
        } else{
            return 'error';
        }

    }

    //通过user_id查找
    public function getByUserId($user_id)
    {
        return Collection::with(['shop' => function($query){
            $query->select('id','name','logo','grade','sale');
        }])->where('user_id',$user_id)->get();

    }
}