<?php
declare (strict_types = 1);

namespace app\middleware;

// Check前置中间件（登陆判断，权限等）
class Check
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
        // 签名验证
        echo '签名验证<br>';
        // token等前置验证
        // ...

        return $next($request);
    }
}
