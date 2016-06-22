<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>推广类型添加</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">推广类型</a>&nbsp;-</span>&nbsp;推广类型添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>推广类型添加</span>
					    <a class="addA" href="index.php?r=generalize/show">推广列表</a>
				</div>
				<form action="index.php?r=generalize/addtype" method="post">
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;推广类型名称：<input type="text"
							class="input3" name="g_type_name" id="g_type_name"/><span id="check_g_type_name"></span>
					</div>		
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;推广类型单价：<input type="text"
							class="input3" name="g_type_price" id="g_type_price"/>元
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span id="check_g_type_price"></span>
					</div>		
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" type="submit">提交</button>
							<a class="btn_ok btn_no" type="reset">取消</a>
						</p>
					</div>
				</div>
				</form>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>
<script>
//定义全局变量
var str=false;
	$("#g_type_name").blur(function(){
		var g_type_name=$(this).val();
		if(g_type_name=='')
		{
             $('#check_g_type_name').html("<font color='red'>！推广类型不能为空</font>");
             str=false;
		}
		else
		{
			 $('#check_g_type_name').html('');
			 str=true;
		}
	})

	$("#g_type_price").blur(function(){
		var g_type_price=$(this).val();
		if(g_type_price=='')
		{
             $('#check_g_type_price').html("<font color='red'>！钱不能不要</font>");
             str=false;
		}
		else
		{
			 $('#check_g_type_price').html('');
			 str=true;
		}
	})

	$('form').submit(function(){
           if(str==false)
           {
               return false;
           }
           else
           {
           	   return true;
           }
	});
</script>