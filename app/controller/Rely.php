<?php
namespace app\controller;

use app\BaseController;
//use think\Request;
use think\facade\Request;

class Rely extends BaseController
{
    // protected $request;
    // public function __construct(Request $request)
    // {
    //     $this->request = $request;
    // }
    public function index(Request $request)
    {
        return $request->param('username');
    }

    public function index2()
    {
        // use think\facade\Request; 门面类
        // return json(json_decode(Request::param('body')));
        //return json($this->request->param());
        return json(input('username'));
    }

    public function index3($id = 0)
    {
        $a = 'afaf';
        return json($id);
    }
}