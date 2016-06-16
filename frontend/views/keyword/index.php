<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>热词设置</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">热门关键字</a>&nbsp;-</span>&nbsp;热词添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>热词添加</span>
					    <a class="addA" href="index.php?r=keyword/show">热词列表</a>
				</div>
				<form action="index.php?r=keyword/index" method="post">
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;关&nbsp;&nbsp;键&nbsp;字：<input type="text"
							class="input3" name="k_name" id="k_name"/><span id="check_k_name"></span>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;搜索次数：<input type="text"
							class="input3" name="k_num" id="k_num"/><span id="check_k_num"></span>
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
	$("#k_name").blur(function(){
		var k_name=$(this).val();
		if(k_name=='')
		{
             $('#check_k_name').html("<font color='red'>！热词不能为空</font>");
             str=false;
		}
		else
		{
			 $('#check_k_name').html('');
			 str=true;
		}
	})

	$("#k_num").blur(function(){
		var k_num=$(this).val();

		//编写正则
		var reg=/^\d+$/;

		if(k_num=='')
		{
            $('#check_k_num').html("<font color='red'>！次数不能为空</font>");     
            str=false;
        }
        else
        {
        	if(!reg.test(k_num))
			{
	            $('#check_k_num').html("<font color='red'>！次数只能为数字</font>");
	            str=false;
			}
			else
			{
				$('#check_k_num').html('');
				str=true;
			}
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