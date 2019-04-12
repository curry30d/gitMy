<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="../../../public/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="../../../public/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../../../public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="../../../public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="../../../public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="../../../public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="../../../public/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="../../../public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加权限 - 权限管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
		<div>
		<dl>
			<label>人员管理</label>
			
			<dt>
				@foreach($top as $val)
				<input   
				type="checkbox" value="{{$val->id}}" name="auth_id[]" @if(in_array($val->id,explode(',',$ids))) checked="checked" @endif><b>{{$val->auth_name}}</b>
		    @endforeach
		    </dt>		   
               @foreach($top as $val)
	           <dd>

			    @foreach($cat as $v)
			    @if($v->pid == $val->id)
				<input type="checkbox" value="{{$v->id}}" name="auth_id[]" @if(in_array($v->id,explode(',',$ids))) checked="checked" @endif><b>{{$v->auth_name}}</b>
				@endif
				@endforeach

		        </dd>
		        @endforeach
		</dl>
	</div>
	{{csrf_field()}}
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="../../../public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="../../../public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../../public/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="../../../public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../../../public/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="../../../public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="../../../public/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "" ,
				success: function(data){
					if(data!=0){
						layer.msg('添加成功!',{icon:1,time:1500},function(){
						var index = parent.layer.getFrameIndex(window.name);
			            //parent.$('.btn-refresh').click();
			            parent.window.location=parent.window.location;
			            parent.layer.close(index);
					});
					}else{
						layer.msg('添加错误!',{icon:2,time:1500});
					
					}
				},
                error: function(XmlHttpRequest, textis_nav, errorThrown){
					layer.msg('error!',{icon:1,time:1500});
					
				}
			});
			
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>