<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Manager;
class ManagerController extends Controller
{
    //
     public function index(){
     	//查询数据
       $data=Manager::get();
       //展示视图
       return view('admin.manager.index',compact('data'));
       
    }
}
