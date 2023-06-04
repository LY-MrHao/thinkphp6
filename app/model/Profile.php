<?php
namespace app\model;

use think\Model;

class Profile extends Model
{
    public function student()
    {
        // 反向关联belongsTo 
        return $this->belongsTo(Student::class, 'user_id', 'id');
    }
}