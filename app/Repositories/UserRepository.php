<?php
/**
 * Created by PhpStorm.
 * User: 新用户
 * Date: 2019/3/3
 * Time: 12:56
 */

namespace App\Repositories;

use App\User;

class UserRepository
{
    //查找 手机号、密码
    public function queryWithTelAndPswd($telephone,$password)
    {
        return User::query()->where('telephone',$telephone)->where('password',$password)->first();
    }

    //创建用户
    public function create($telephone,$password)
    {
        return User::query()->create([
            'telephone' => $telephone,
            'password' => $password,
        ]);
    }

    //查找 手机号 是否存在
    public function queryWithTel($telephone)
    {
        return User::query()->where('telephone',$telephone)->first();
    }

    //通过id查找
    public function getById($id)
    {
        return User::query()->find($id);
    }

}