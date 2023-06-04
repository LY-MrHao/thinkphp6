<?php
namespace app\model;

use think\Model;

class Student extends Model
{
    // 关于join和模型关联的取舍，建议一对一 一对多用模型，多表关联用join
    public function profile()
    {
        //return $this->hasOne(Profile::class, 'user_id', 'id');
        return $this->hasMany(Profile::class, 'user_id', 'id');
    }
}