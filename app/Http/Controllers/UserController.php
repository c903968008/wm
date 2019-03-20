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
}
