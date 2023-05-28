<?php
namespace app\controller;

class Error {
    // 添加Error.php可以处理控制器不存在报错
    public function Index()
    {
        return '当前控制器不存在！';
    }
}