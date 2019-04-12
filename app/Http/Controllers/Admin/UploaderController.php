<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class UploaderController extends Controller
{
    //判断文件是否上传成功
    public function webuploader(Request $request){
    	//有文件上传
    	if($request->hasFile('file')&&$request->file('file')->isValid()){
            $filename=sha1(time().$request->file('file')->getClientOriginalName()).$request->file('file')->getClientOriginalExtension();
            Storage::disk('public')->put($filename,file_get_contents($request->file('file')->path()));
            //返回数据
            $result=[
                'errCode'=>'0',
                'errMsg'=>  '',
                'succMsg'=>  '文件上传成功',
                'path'  => '/storage/'.$filename,
            ];
            return response()->json($result);
    	}else{
    		$request=[
               'errCode'  => '000001',
               'errMsg'   =>$request->file('file')->getErrorMessage()
    		];
    		//返回信息
    		return response()->json($result);
    	}
    }
}
