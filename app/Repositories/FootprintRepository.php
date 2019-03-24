<?php
/**
 * Created by PhpStorm.
 * User: 新用户
 * Date: 2019/3/24
 * Time: 8:43
 */

namespace App\Repositories;


use App\Footprint;

class FootprintRepository
{
    //添加足迹
    public function create($shop_id,$user_id)
    {
        return Footprint::query()->create([
            'shop_id' => $shop_id,
            'user_id' => $user_id
        ]);
    }

    //查看是否已有足迹
    public function isFoot($shop_id,$user_id)
    {
        $foot = Footprint::query()->where([
            'shop_id' => $shop_id,
            'user_id' => $user_id
        ])->first();
        if($foot){
            return 1;
        } else{
            return 0;
        }
    }

    //已有足迹的情况下修改update_at
    public function edit($shop_id,$user_id)
    {
        $showtime = date("Y-m-d H:i:s");
        return Footprint::query()->where([
            'shop_id' => $shop_id,
            'user_id' => $user_id
        ])->update([
            'updated_at' => $showtime
        ]);
    }

    //通过user_id查询足迹
    public function getByUserId($user_id){
        return Footprint::with(['shop' => function($query){
            $query->select('id','name','logo','grade','sale');
        }])->where('user_id',$user_id)->orderBy('updated_at','desc')->get();
    }
}