<?php
namespace app\controller;

use app\model\User;
use think\facade\Db; 

class ModelTest
{
    public function index()
    {
        //$result = User::select();
        //$result = User::find(2);
        // $result = User::findOrEmpty(2222);
        //var_dump($result->isEmpty());
        $result = User::find(2222);
        dump(empty($result));
        return $result;
    }

    public function update()
    {
        $result = User::where('id', 2)->update(['email'=>'123@163.com']);
        var_dump($result);
    }

    public function field()
    {
        //User::select();
        //DB::table('user')->field(true)->select();
        $userModel = new User();
        $user = $userModel->getUser(4);
        // return json($user);
        // return User::insert([
        //     'username' => '小Wang',
        //     'password' => '123456',
        //     'price' => '100',
        //     'email' => 'WANG@126.com'
        // ]);
        // return json(User::select());
        return json($user);
    }
}