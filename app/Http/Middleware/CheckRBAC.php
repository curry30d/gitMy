<?php

namespace App\Http\Middleware;

use Closure;
//引入需要的门面
use Route;
use Auth;
class CheckRBAC
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(Auth::guard('admin')->user()->role_id!=1){
          //RBAC 鉴权
          //获取当前路由 App\Http\Controller\Admin\IndexController@index
          $route=Route::currentRouteAction(); 
          //获取当前用户对应的角色已经具备的权限
          $ac=Auth::guard('admin')->user()->role->auth_ac;
          $ac=strtolower($ac.',IndexController@index,IndexController@welcome');

          $routeArr=explode('\\',$route);

          if(strpos($ac,strtolower(end($routeArr)))===false){
              exit("<h1>你没有访问权限</h1>");
          } 
        }
        return $next($request);
    }
}
