<?php
namespace App\Http\Middleware;
use Closure;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //固定格式，固定方法，固定参数
    public function handle($request, Closure $next, $param)
    {
        //拦截代码写这里
        if ($request->get('id') != 1) {
            //echo $param;
            return redirect(url('/abc'));
        }
        //echo '拦截！';

        //固定返回，让其继续往下执行主体代码
        return $next($request);
    }

    public function terminate($request, $response)
    {
        echo '<br>Http响应完毕后再调用我';
    }

    //后置中间件
//    public function handle($request, Closure $next)
//    {
//        //先执行主体代码
//        $response = $next($request);
//
//        echo '拦截！';
//
//        //固定返回
//        return $response;
//    }



}




