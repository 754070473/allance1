﻿<!DOCTYPE HTML>
<html>
<head>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>登录-拉勾网-最专业的互联网招聘平台</title>
<meta property="qc:admins" content="23635710066417756375" />
<meta content="拉勾网是3W旗下的互联网领域垂直招聘网站,互联网职业机会尽在拉勾网" name="description">
<meta content="拉勾,拉勾网,拉勾招聘,拉钩, 拉钩网 ,互联网招聘,拉勾互联网招聘, 移动互联网招聘, 垂直互联网招聘, 微信招聘, 微博招聘, 拉勾官网, 拉勾百科,跳槽, 高薪职位, 互联网圈子, IT招聘, 职场招聘, 猎头招聘,O2O招聘, LBS招聘, 社交招聘, 校园招聘, 校招,社会招聘,社招" name="keywords">

<meta name="baidu-site-verification" content="QIQ6KC1oZ6" />

<!-- <div class="web_root"  style="display:none">h</div> -->
<script type="text/javascript">
var ctx = "h";
console.log(1);
</script>
<link rel="Shortcut Icon" href="h/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="style/css/style.css"/>

<script src="style/js/jquery.1.10.1.min.js" type="text/javascript"></script>

<script type="text/javascript" src="style/js/jquery.lib.min.js"></script>
<script type="text/javascript" src="style/js/core.min.js"></script>


<script type="text/javascript">
var youdao_conv_id = 271546; 
</script> 
<script type="text/javascript" src="style/js/conv.js"></script>
</head>

<body id="login_bg">
	<div class="login_wrapper">
		<div class="login_header">
        	<a href="h/"><img src="style/images/logo_white.png" width="285" height="62" alt="拉勾招聘" /></a>
            <div id="cloud_s"><img src="style/images/cloud_s.png" width="81" height="52" alt="cloud" /></div>
            <div id="cloud_m"><img src="style/images/cloud_m.png" width="136" height="95"  alt="cloud" /></div>
        </div>
        
    	
		 <div class="login_box">
        	<form id="loginForm" action="index">

				<input type="text" id="email" name="name" value="{{$phone}}" tabindex="1" placeholder="请输入登录邮箱或手机号" />
			  	<input type="password" id="password" name="pwd" tabindex="2" placeholder="请输入密码" />
				<span class="error" style="display:none;" id="beError"></span>

			    <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
			    <a href="reset" class="fr" target="_blank">忘记密码？</a>

			    
				<!-- <input type="submit" id="submitLogin" value="登 &nbsp; &nbsp; 录" /> -->
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">	
				
				<br>
				<br>
			    <span id="check" style="color:red;"></span>
			    <br>
				<a style="color:#fff;" href="javascript:void(0)" class="submitLogin" title="登 &nbsp; &nbsp; 录"/>登 &nbsp; &nbsp; 录</a>
			</form>
			<div class="login_right">
				<div>还没有拉勾帐号？</div>
				<a  href="register"  class="registor_now">立即注册</a>
			    <div class="login_others">使用以下帐号直接登录:</div>
			    <a  href="h/ologin/auth/sina"  target="_blank" class="icon_wb" title="使用新浪微博帐号登录"></a>
			    <a  href="h/ologin/auth/qq"  class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a>
			</div>
        </div>
        <div class="login_box_btm"></div>
    </div>

<script type="text/javascript">
var kaiguan = null;
var num = 20;
var gload="";//全局变量
$(".submitLogin").click(function(){
	var name=$('#email').val();
	var pwd=$('#password').val();

	
   	var phone=/^1[34578]{1}\d{9}$/;
   	var email=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   	if(name==""){
		$("#check").text("用户名不得为空");
	}else{
		if(!(phone.test(name)||email.test(name))){
			$("#check").text("请输入正确邮箱或手机号");
		}else{
			$.ajax({
			   type: "get",
			   url: "{{url('login_pro')}}",
			   data: "name="+name+'&pwd='+pwd,
			   success: function(msg){
			   	if (msg=="1") {
			   		$('#check').html('');
			   		window.location.href="index";
			   	} else if (msg=="2") {
			   		$('#check').html('你的密码错误');
			   	} else if(msg=="3"){
			   		$('#check').html('你的邮箱或手机号有误');
			   	} else if(msg=="4"){
			   		$('#check').html('');
			   		window.location.href="index";
			   	}
			   	
			   //  if(msg==1){
			   //    alert(1)
			   //  }else if(msg==2){
			   //      num = 20;
			   //      $('#submitLogin').attr('disabled',true);
			   //      kaiguan = setInterval(run,1000);
			   //    $('#check').html('此账号还在锁定期间,20秒候重新登录');
			   //  }else{
			   //    $('#check').html(msg);
			   //    window.ready();
			   //  }
			   //    closeme();
			   }
			});
			
		}
	}

	
})

// function run(){
//   num--;
//   $('.Prompt').html('此账号还在锁定期间,请('+num+')秒后重新登录');
//   if(num == 0){
//       $('#login_button').attr('disabled',false);
//       $('.Prompt').html('');
//       clearInterval(kaiguan);
//   }
// }


</script>

</body>
</html>