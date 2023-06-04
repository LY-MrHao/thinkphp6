<?php
namespace app\controller;

use app\model\Profile;
use app\model\Student;
use app\model\User;
use think\facade\Db;

class JoinTest
{
    public function index()
    {
        // $student = Student::find(1);
        // dump($student->profile);
        $profile = Profile::find(1);
        dump($profile->student);
    }

    public function select()
    {
        // 预载入查询（2个SQL）
        $students = Student::with('profile')->select();
        dump($students);
        // 关联查询（inner join一个SQL）
        // $students = Student::withJoin('profile')->select();
        // foreach ($students as $student) {
        //     dump($student->toArray());
        // }
    }

    public function update()
    {
        $student = Student::find(1);
        $student->profile->save(['hobby' => '喜欢小姐姐']);
    }

    public function insert()
    {
        $student = Student::find(1);
         $student->profile()->save(['hobby' => '喜欢小动物']);
    }

    public function delete()
    {
        $student = Student::find(1);
        // 删除当前及关联数据
        $student->together(['profile'])->delete();
    }

    public function hasMany()
    {
        $student = Student::find(1);
        // 关联查询
        dump($student->profile()->where('id', '>', 1)->select());
    }

    // 预载入查询
    public function with()
    {
        // 只查询profile的某些字段（闭包）
        $students = Student::with(['profile' => function($query) {
            $query->field('id,user_id,hobby');
        }])->select();
        foreach ($students as $student) {
            dump($student->profile->toArray());
        }
    }
}