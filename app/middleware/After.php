<?php
declare (strict_types = 1);

namespace app\middleware;

// 后置中间件（写入日志等）
class After
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
        $response = $next($request);
        // 后置中间件代码


        return $response;
    }
}
