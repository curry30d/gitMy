<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Role;
use App\Admin\Auth;
use Illuminate\Support\Facades\Input;
class RoleController extends Controller
{
    //列表
    public function index(){
       $data=Role::get();
       //展示数据
       return view('admin.role.index',compact('data'));
    }
    public function assign(){

    	if(Input::method()=='POST'){
    		$data=Input::only(['id','auth_id']);
            $role=new Role;
            
            $result=$role->assignAuth($data);
            

             return $result;
    	}else{
            $top=Auth::where('pid','0')->get();
            $cat=Auth::where('pid','!=','0')->get();
            //展示数据
            $ids=Role::where('id',Input::get('id'))->value('auth_ids');
            return view('admin.role.assign',compact('top','cat','ids'));
       }
    }
}
