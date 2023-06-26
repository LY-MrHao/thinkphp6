<?php
declare (strict_types = 1);

namespace app\middleware;

// 获取登录信息前置中间件
class LoginInfo
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        // 用户信息查询Token->SQL
        echo '用户信息查询<br>';
        // 用户信息赋值
        $loginInfo = new \stdClass();
        $loginInfo->no = 1;
        $loginInfo->name = 'Mr.Hao';
        $request->loginInfo = $loginInfo;

        return $next($request);
    }
}
