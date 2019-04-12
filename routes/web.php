<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'admin'],function(){
   Route::get('public/login','Admin\PublicController@login')->name('login');
   Route::post('public/check','Admin\PublicController@check');
   Route::get('public/logout','Admin\PublicController@logout');
});
// Route::group(['prefix'=>'admin'],function(){
//    Route::get('public/login','Admin\PublicController@login')->name('login');
//    Route::post('public/check','Admin\PublicController@check');
//    Route::get('public/logout,Admin\PublicController@logout');

//    Route::get('index/index','Admin\IndexController@index');

//    Route::get('index/welcome','Admin\IndexController@welcome');
//    //管理员管理模块
//    Route::get('manager/index','Admin\ManagerController@index');

   
// });

 Route::group(['prefix'=>'admin','middleware'=>['auth:admin','checkrbac']],function(){
    Route::get('index/index','Admin\IndexController@index');


    Route::get('index/welcome','Admin\IndexController@welcome');
    //管理员管理模块
    Route::get('manager/index','Admin\ManagerController@index');
    //权限管理模块
    Route::get('auth/index','Admin\AuthController@index');
    Route::any('auth/add','Admin\AuthController@add');
    //角色管理模块
    Route::get('role/index','Admin\RoleController@index');
    Route::any('role/assign','Admin\RoleController@assign');

    //会员的管理的模块
    Route::get('member/index','Admin\MemberController@index');
    Route::any('member/add','Admin\MemberController@add');
    Route::post('uploader/webuploader','Admin\UploaderController@webuploader');//异步上传
    Route::any('member/getareabyid','Admin\MemberController@getAreaById');//ajax联动
   
 });