<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class User extends Validate
{
    // 个人认为用于表单提交，查询|删除接口的参数检查不太适用

    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'name|用户名' => 'require|max:20|checkName',
        'price' => 'number|between:1,100',
        'email' => 'email'
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'name.require' => '姓名不能为空',
        'name.max' => '姓名不能大于20位',
        'price.number' => '价格必须是数字',
        'price.between' => '价格必须 1-100之间',
        'email' => '邮箱格式错误'
    ];

    // 验证的场景
    protected $scene = [
        'insert' => ['name', 'price', 'email'],
        //'update' => ['name', 'price' ]
    ];
    
    protected function sceneUpdate()
    {
        return $this->only(['name', 'price']) // 指定需要验证的字段列表
            ->remove('name', 'max') // 移除某个字段的验证规则
            ->append('price', 'require'); // 追加某个字段的验证规则
    }

    /**
     * 自定义规则
     * 
     * @param1:验证数据
     * @param2:验证规则
     * @param3:全部数据（数组）
     * @param4:字段名
     * @param5:字段描述
     */
    public function checkName($value, $rule, $dataArray, $feild, $feildContent)
    {
        if ($dataArray['type'] === 1 && $value !== 'check') {
            return '非法name';
        }
        return $value !== '' ? true : '非法name2';
    }
}
