<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class PublicController extends Controller
{
    //
	public function login(){
	  return view('admin.public.login');
	}
	public function check(Request $request){
       //开始自动验证

		// $this->validate($request,[
  //          //验证规则 需要验证的字段名   => '验证规则1'|'验证规则2'|'验证规则3'......		
		//    //必填,长度介于2-20
		//    'username'  =>  'required|min:2|max:20',
		//    //密码,必填,长度6位  
		//    'password'  =>  'required|min:6',
  //          //验证码，必填，长度等于5，必须是合法的验证码
  //          'captcha'   =>  'required|size：5|captcha'
  //       ]);
        $data=$request->only(['username','password']);
        $data['status']='2';//状态为启用用户
        $result=Auth::guard('admin')->attempt($data,$request->get('online'));
        //dd($result);
        //var_dump($result);
        if($result){
        	//echo "跳转网页";
        	return redirect('/admin/index/index');
        }else{
        	
        	return redirect('/admin/public/login')->withErrors([
               'loginError'=>'用户名密码错误',
        	]);
        }
	}
	public function logout(){

		Auth::guard('admin')->logout();
		return redirect('/admin/public/login');
	}
}
