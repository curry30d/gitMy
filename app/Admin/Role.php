<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //定义关联数据表
    protected $table='role';
    //禁用时间
    public $timestamps=false;
    //将分派的权限进行处理
    public function assignAuth($data){
    	//获取auth_ids字段的值
    	$post['auth_ids']=implode(',', $data['auth_id']);
    	var_dump($post);
    	//获取auth_ac
    	$tmp=\App\Admin\Auth::where('pid','!=','0')->whereIn('id',$data['auth_id'])->get();

    	//循环拼凑Controller和action

    	$ac='';
        foreach ($tmp as $key => $value) {
        	$ac.=$value-> controller.'@'.$value-> action.',';

        }

        //去除都好
        $post['auth_ac']=strtolower(rtrim($ac,','));

        
        return self::where('id',$data['id'])->update($post);

    }
}
