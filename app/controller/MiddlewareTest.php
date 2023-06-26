<?php

namespace app\controller;

use app\BaseController;
use think\Exception;

class MiddlewareTest extends BaseController
{
    // 调用auth中间件
    //protected $middleware = ['auth'];
    // 排除控制器方法
    /*protected $middleware = [
        'auth' 	=> ['except' 	=> ['hello'] ],
        'check' => ['only' 		=> ['hello'] ],
    ];*/

    public function index()
    {
        //dump($this->request->loginInfo);
        echo '<br>Controller执行';
        throw new Exception();
    }
}