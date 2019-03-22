<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    //通过id查找
    public function getById(Request $request)
    {
        $id = $request->get('id');
        $user = $this->userRepository->getById($id);
        if($user){
            return $this->success($user,"根据id查找用户信息成功");
        } else {
            return $this->fail($user,"根据id查找用户信息失败");
        }
    }

    //修改头像
    public function editAvatar(Request $request)
    {
        $id = $request->get('id');
        $avatar = $request->get('avatar');
        $flag = $this->userRepository->editAvatarById($id, $avatar);
        if($flag){
            $user = $this->userRepository->getById($id);
            return $this->success($user,"根据id修改用户头像成功");
        } else {
            return $this->fail(null,"根据id修改用户头像失败");
        }
    }

    //修改用户名
    public function editName(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $flag = $this->userRepository->editNameById($id, $name);
        if($flag){
            $user = $this->userRepository->getById($id);
            return $this->success($user,"根据id修改用户名成功");
        } else {
            return $this->fail(null,"根据id修改用户名失败");
        }
    }

    //修改密码
    public function editPassword(Request $request)
    {
        $id = $request->get('id');
        $password = $request->get('password');
        $flag = $this->userRepository->editPasswordById($id, $password);
        if($flag){
            $user = $this->userRepository->getById($id);
            return $this->success($user,"根据id修改密码成功");
        } else {
            return $this->fail(null,"根据id修改密码失败");
        }
    }
}
