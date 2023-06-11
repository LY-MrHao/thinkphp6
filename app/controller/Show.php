<?php
namespace app\controller;

use app\model\User;
use think\facade\View;
use think\Request;

/**
 * TP模板
 * ！！！ 需要安装拓展 composer require topthink/think-view
 */
class Show
{
    public $age = 100;
    const PI = 3.14;
    public static function fn(){return '方法';}

    public function index(Request $request)
    {
        // View::assign('name', 'Mr.Lee');
        /*View::assign([
           'name' => 'Mr.Lee',
           'sex' => 'man'
        ]);*/
        // return View::fetch('index', ['name' => 'Mr.Lee', 'sex' => 'man']);

        // 使用助手函数view()
        // return view('index', ['name' => 'Mr.Lee', 'sex' => 'man']);

        // 内容过滤
        /*return View::filter(function ($content) {
            return strtoupper($content);
        })->fetch('index', ['name' => 'Mr.Lee', 'sex' => 'man']);*/
        return view('index', ['name' => 'Mr.Lee', 'sex' => 'man'])->filter(function ($content) {
            return strtoupper($content);
        });
    }

    // 变量输出
    public function paramOutput()
    {
        //return view('paramOutput', ['result' => ['name' => 'Mr.Lee', 'sex' => 'man']]);

        return view('paramOutput', [
            'array' => ['name' => 'Mr.Lee', 'sex' => 'man'],
            // 对象
            'object' => $this,
            'password' => 123456,
            'time' => time()
        ]);
    }

    public function loop()
    {
        return view('loop', ['result' => User::select()]);
    }

    public function eq()
    {
        return view('eq', ['username' => 'Mr.Hao', 'key' => 'Mr.Hao1']);
    }

    public function condition()
    {
        return view('condition', [
            'number' => 10,
            'name' => 'Mr.Lee'
        ]);
    }
}