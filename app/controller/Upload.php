<?php

namespace app\controller;

use app\BaseController;
use think\facade\Filesystem;

class Upload extends BaseController
{

    public function index()
    {
        $file = request()->file('image');
        $uploadPath = Filesystem::putfile('topic', $file);

        // 以指定的文件名保存 putFileAs()
        $savename = \think\facade\Filesystem::putFileAs( 'topic', $file, 'abc.jpg');
        dump($uploadPath);
    }

}