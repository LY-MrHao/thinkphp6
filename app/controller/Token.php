<?php

namespace app\controller;

use think\facade\Cache;
use think\facade\Cookie;
use think\facade\Request;
use think\facade\Session;

class Token
{
    public function index()
    {
        return view();
    }

    public function session()
    {
        Session::set('user', 'Mr.Hao');
        Session::set('count', '10');
        // return Session::get('user');
        // dump(Session::all());

        // 如果值不存在，返回空字符串
        dump(Session::get('name', ''));
        // 判断是否赋值
        dump(Session::has('name'));
        // 删除
        Session::delete('name');
        // 取值并删除
        Session::pull('name');
        // 清空
        Session::clear();

        // Request对象中读取Session
        // dump(Request::session('count'));
        //dump(Request::session());

        // 赋值
        session('name', 'thinkphp');
        // 判断是否赋值
        session('?name');
        // 取值
        session('name');
        // 删除
        session('name', null);
        // 清除session
        session(null);

    }

    public function cookie()
    {
        Cookie::set('user', 'Mr.Hao', 3600);
    }

    public function cache()
    {
        Cache::set('name', 'Hao', 3600);
        dump(Cache::get('name'));

        Cache::set('num', 1);
        // name自增（步进值为1）
        Cache::inc('num');
        dump(Cache::get('num'));

        // 如果缓存数据是一个数组，可以通过push方法追加一个数据。
        // 不能写关联数组
        Cache::set('array', ['aa', 'bb']);
        dump(Cache::get('array'));
        Cache::push('array', 'cc');
        dump(Cache::get('array'));

        // 不存在则写入缓存数据后返回
        Cache::set('start_time', 112233);
        Cache::remember('start_time', time());
        dump(Cache::get('start_time'));
    }

    public function upload()
    {
        return view('upload');
    }
}