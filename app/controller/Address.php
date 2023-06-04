<?php
namespace app\controller;

class Address
{
    public function index()
    {
        return 'index';
    }

    public static function index2()
    {
        return 'index2';
    }

    public function details($id = 'think')
    {
        return '详情id:' . $id;
    }
}