<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //访问成功
    public function success($data = [], $message)
    {
        return response()->json([
            'status'  => 1,
            'message' => $message,
            'result'    => $data,
        ]);
    }

    //访问失败
    public function fail($data = [], $message)
    {
        return response()->json([
            'status'  => 0,
            'message' => $message,
            'result'    => $data,
        ]);
    }

    //访问异常
    public function exception($data = [], $message)
    {
        return response()->json([
            'status'  => -1,
            'message' => $message,
            'result'    => $data,
        ]);
    }

}
