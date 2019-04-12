<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Admin\Auth;
use DB;
class AuthController extends Controller
{
    //列表
    public function index(){
        //查询数据
        $data=DB::table('auth as t1')->select('t1.*','t2.auth_name as parent_name')->leftJoin('auth as t2','t1.pid','=','t2.id')->get();
    	return view('admin.auth.index',compact('data'));
    }
    public function add(){

    	if(Input::method()=='POST'){
            //处理数据
            //如果需要验证数据可以仿照之前的规则去实现验证
            //接收数据进入数据表
            $data=Input::except('_token');
            $result=Auth::insert($data);
            return $result ? '1' : '2';
    	}else{
            //查询父级权限
            $parents= Auth::where('pid','=','0')->get();
            //展示视图
    		return view('admin.auth.add',compact('parents'));
    	}
    	
    }
}
