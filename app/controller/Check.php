<?php
namespace app\controller;

use app\validate\User;
use think\exception\ValidateException;
use think\facade\Validate;

class Check
{
    public function index()
    {
        try {
            // $result = validate(User::class)->batch(true)->check([
            //     'name' => 'check2',
            //     'price' => 99,
            //     'email' => 'abc@126.com',
            //     'type' => 1
            // ]);
            // if (true !== $result) {
            //     // 验证失败 输出错误信息
            //     dump($result);
            // }

            // scene()设置验证场景
            $result = validate(User::class)->batch(true)->scene('update')->check([
                'name' => 'check2',
                'price' => 99,
                'email' => 'abc@126.com',
                'type' => 1
            ]);
        } catch (ValidateException $e) {
            //dump($e->getError());
        }
    }

    public function validate()
    {
        dump(Validate::isEmail('aaa@qq.com'));
    }
}