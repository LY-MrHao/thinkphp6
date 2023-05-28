<?php
namespace app\model;

use think\Model;

class User extends Model
{
    // 选择表需要的连接信息 connection
    //protected $connection = 'demo';

    // class名和DB表名不一致的时候设置name属性
    protected $name = 'user'; // 模型名
    protected $table = 'user'; // 表名

    // DB表的主键不是id的时候需要定义，否则find(id)会报错
    protected $pk = 'id';

    // 设置字段信息
    // 模型的数据字段和对应数据表的字段是对应的，默认会自动获取（包括字段类型），但自动获取会导致增加一次查询
    // 因此你可以在模型中明确定义字段信息避免多一次查询的开销。
    // \config\database.php里fields_cache=true可以只查一次
    // protected $schema = [
    //     'id'          => 'int',
    //     'username'    => 'string',
    //     'password'    => 'string',
    //     'gender'      => 'string',
    //     'price'       => 'float',
    //     'email'       => 'string'
    // ];

    // 类型转换
    // protected $type = [
    //     'status'    =>  'integer',
    //     'score'     =>  'float',
    //     'birthday'  =>  'timestamp:Y/m/d',
    // ];

    // 强制全局查询钩子(key:查询范围)
    protected $globalScope = ['deleteFlg'];
    public function scopeDeleteFlg($query)
    {
        $query->where('deleteFlg', false);
    }

    // 初始化
    public static function init()
    {
        // ...
    }

    // 获取器(eg:给status字段赋值)(DB查询)
    public function getStatusAttr($v)
    {
        $status = [0 => '待验证', 1 => 'OK' , 2 => 'NG'];
        return $status[$v];
    }

    // 修改器(eg:给email字段小写)(DB更新插入)
    // !!!发现一个小Bug 使用User::insert()时 修改器不生效 需使用User::create()
    public function setEmailAttr($v)
    {
        return strtolower($v);
    }

    public function getUser($id, $includeDelete = false)
    {
        $query = $this;
        if ($includeDelete) {
            $query = $query->withoutGlobalScope(['deleteFlg']);
        }
        return $query->find($id);
    }
}