<?php
namespace app\controller;

use app\BaseController;
use think\facade\Config;
use think\facade\Env;

class Test extends BaseController
{
    public function index()
    {
        var_dump($this->request->action());
        var_dump($this->app->getBasePath());
        return $this->request->action();
    }

    // 配置获取
    public function getEnv()
    {
        return Env::get('DATABASE.HOSTNAME');
    }

    public function getConfig()
    {
        return Config::get('view.type');
    }

    public function router($name = '123')
    {
        return 'aaaaaaaaaaa ' . $name;
    }

    public function arrayOutput()
    {
        $array = ['a' => 1, 'b' => 2, 'c' => 3];
        halt('中断函数，中断程序！');
        return json($array);
    }
}