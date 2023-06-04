<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});
 
Route::get('hello/:name', 'index/hello');
// [:id]可不传入的参数
Route::rule('details/:id', 'Address/details');
// 跳404
//Route::miss('public/miss');
//Route::get('rely/:id', 'Rely/index3')->cache(['rely/:id', 3600]);