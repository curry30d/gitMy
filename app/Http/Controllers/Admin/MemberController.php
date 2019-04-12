<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型
use App\Admin\Member;
use Illuminate\Support\Facades\Input;
class MemberController extends Controller
{
    //列表方法
    public function index(){
    	//查询数据
        $data=Member::get();
    	//展示视图
    	return view('admin.member.index',compact('data'));
    }
    public function add(){
    	//判段请求
       if(Input::method() == "POST"){

        $result=Member::insert([
             'username'  =>Input::get('username'),
             'password'  =>bcrypt('password'),
             'gender'    =>Input::get('gender'),
             'mobie'     =>Input::get('mobie'),
             'email'     =>Input::get('email'),
             'avatar'    =>Input::get('avatar'),
             'type'      =>Input::get('type'),
             'status'    =>Input::get('status'),
             'created_at'=>date('Y-m-d H:i:s')
         ]);
        return $result ?1:0;
        }else{

        	return view('admin.member.add');
        }
    }
}
