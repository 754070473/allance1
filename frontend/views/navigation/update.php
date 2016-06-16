<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导航栏修改</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航设置</a>&nbsp;-</span>&nbsp;导航修改
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>导航修改</span>
				</div>
				<form action="index.php?r=navigation/upnew" method="post">
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;导航名称：<input type="text"
							class="input3" name="n_name" value="<?= $arr['n_name']?>"/>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;链接地址：<input type="text"
							class="input3" name="n_url" value="<?= $arr['n_url']?>"/>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;导航类型：
						<?php if($arr['n_url']==0){?>
						<label>
							<input type="radio" checked="checked" name="n_type" value="0" />&nbsp;顶部导航
						</label>
						<label>
							<input type="radio" name="n_type" value="1"/>&nbsp;底部导航
						</label>
						<?php }else{?>
						<label>
							<input type="radio"  name="n_type" value="0" />&nbsp;顶部导航
						</label>
						<label>
							<input type="radio" checked="checked" name="n_type" value="1"/>&nbsp;底部导航
						</label>
						<?php }?>
					</div>
					<input type="hidden" value="<?= $arr['nav_id']?>" name="id" />
					
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" type="submit">修改</button>
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