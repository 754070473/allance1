<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导航栏设置</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航设置</a>&nbsp;-</span>&nbsp;导航添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>导航添加</span>
					    <a class="addA" href="index.php?r=navigation/show">导航栏列表</a>
				</div>
				<form action="index.php?r=navigation/index" method="post">
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;导航名称：<input type="text"
							class="input3" name="n_name" id="n_name"/><span id="check_n_name"></span>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;链接地址：<input type="text"
							class="input3" name="n_url" id="n_url"/><span id="check_n_url"></span>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;导航类型：
						<label><input type="radio" checked="checked" name="n_type" value="0" />&nbsp;顶部导航</label>
						<label><input type="radio" name="n_type" value="1"/>&nbsp;底部导航</label>
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
	$("#n_name").blur(function(){
		var n_name=$(this).val();
		if(n_name=='')
		{
             $('#check_n_name').html("<font color='red'>！导航名称不能为空</font>");
             str=false;
		}
		else
		{
			 $('#check_n_name').html('');
			 str=true;
		}
	})

	$("#n_url").blur(function(){
		var n_url=$(this).val();

		if(n_url=='')
		{
            $('#check_n_url').html("<font color='red'>！路径不能为空</font>");     
            str=false;
        }
        else
        {
			$('#check_n_url').html('');
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