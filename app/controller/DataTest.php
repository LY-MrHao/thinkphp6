<?php
namespace app\controller;

use app\model\User;
use think\facade\Db;

class DataTest
{
    public function index()
    {
        $users = Db::table('user')->select();
        // 选择连接信息 Db::connect('test')
        $users1 = Db::connect('demo')->table('user')->select();
        // 直接使用数据库名.表名 选择使用指定表
        $users2 = Db::table('thinkphp6.user')->select();
        return $users1;
    }

    public function getUser()
    {
        $users = User::select();
        return json($users);
    }

    public function findBy()
    {
        $user = Db::table('user')->where('username', '小明')->find();
        return json($user);
    }

    public function sql()
    {
        $userTable = DB::table('user');
        $users = $userTable->order('id', 'desc')->select();
        // $users = $userTable->removeOption('order')->select();
        // removeOption清除之前sql的条件
        $users = $userTable->removeOption('order')->where('username', '小明')->select();
        return DB::getLastSql();
    }

    public function query()
    {
        // $result = DB::table('user')->where('gender', '男')->where('password', '123456')->select();
        // $result = DB::table('user')->where(['gender' => '男', 'password' => '123456'])->select();
        // $result = DB::table('user')->where([['gender', '=', '男'], ['password', '=', '123456']])->select();
        // $result = DB::table('user')->whereRaw('username=:username', ['username' => '小a'])->find();
        // $result = DB::table('user')->whereRaw('username = ?', ['小红'])->find();
        // $result = DB::table('user')->whereRaw('username = BINARY ?', ['小A'])->find();
        // $result = DB::table('user')->whereRaw('username=:username and gender=:gender', ['username' => '小a', 'gender' => '男'])->find();
        //$result = DB::table('user')->whereRaw('username = ? and gender = ?', ['小红', '男'])->find();
        // $result = DB::table('user')->field('username')->select();
        //$result = DB::table('user')->find(1);
        $result = DB::table('user a')->find(1);
        return DB::getLastSql();
        return json($result);
    }

    public function where()
    {
        // $result = DB::table('user')->where('username', '小a')->where('gender', '男')->find();
        //$result = DB::table('user')->where([[['username','=','小a'],['gender','=','男']]])->select();
        //return DB::getLastSql();
        //$result = DB::table('user')->field('*,UPPER(email) as email')->select();
        // 获取器
        $result = DB::table('user')->withAttr('email', function ($v, $data) {
            return strtoupper($v);
        })->select();
        return json($result);
    }

    public function transaction()
    {
        // 自动事务
        // DB::Transaction(function() {
        //     DB::table('user')->where('id', 1)->exp('price', 'price+3')->update();
        //     DB::table('user2')->where('id', 2)->exp('price', 'price-3')->update();
        // });
        
        // 手动事务
        try {
            DB::startTrans();
            DB::table('user')->where('id', 1)->exp('price', 'price+3')->update();
            DB::table('user2')->where('id', 2)->exp('price', 'price-3')->update();
            DB::commit();
        } catch (\think\db\exception\DbException $e) {
            dump('DB发生错误！！！');
            DB::rollback();
        } catch (\Exception $e) {
            dump('发生错误！！！');
            DB::rollback();
        }
    }
}