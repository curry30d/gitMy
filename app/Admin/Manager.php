<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
//引入trait
use \Illuminate\Auth\Authenticatable;
class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //定义当前模型需要关联的数据表
    protected $table='manager';
    //使用trait,就相当于将整个trait代码复制到这个位置
    use Authenticatable;
    //定义模型与角色模型关联的操作
    public function role(){
    	return $this->hasOne('App\admin\Role','id','role_id');
    }
}
