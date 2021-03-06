﻿<!DOCTYPE HTML>
<html>
<head>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>注册-拉勾网-最专业的互联网招聘平台</title>
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
        
    	<input type="hidden" id="resubmitToken" value="9b207beb1e014a93bc852b7ba450db27" />		
		<div class="login_box">
        	<form id="loginForm" action="{{url('login_register')}}" method="post" onsubmit="return login()">

        		<ul class="register_radio clearfix">
		            <li class="current">
		            <!--防止csrf_token攻击-->
		            	找工作
		              	<input type="radio" value="0" name="type"/> 
		              	<em></em>
		            </li>
		            <li>
		           	    招人(企业)
		              	<input type="radio" value="1" name="type"/> 
		            </li>
		        </ul> 
		            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">	
            	<input type="text" id="email" class="phone" name="phone" tabindex="1" placeholder="请输入手机号" />
				<br>
                <span id="c_phone" style="color:red;"></span>

            	<input type="text" id="email" class="email" name="email" tabindex="1" placeholder="请输入邮箱" />
				<br>
                <span id="c_name" style="color:red;"></span>
                <span class="error" id="beError"></span>


                <input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />

            	<label class="fl registerJianJu" for="checkbox">
            		<input type="checkbox" id="checkbox" name="checkbox" checked  class="checkbox valid" />我已阅读并同意<a href="h/privacy" target="_blank">《拉勾用户协议》</a>
           			<br>
           			<span id="check" style="color:red;"></span>
           		</label>
                <input type="submit" id="submitLogin" value="注 &nbsp; &nbsp; 册" />
                
                
            </form>
            <div class="login_right">
            	<div>已有拉勾帐号</div>
            	<a  href="login"  class="registor_now">直接登录</a>
                <div class="login_others">使用以下帐号直接登录:</div>
                <a  href="h/ologin/auth/sina"  target="_blank" class="icon_wb" title="使用新浪微博帐号登录"></a>
               	<a  href="h/ologin/auth/qq"  class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录" ></a>
            </div>
        </div>
        <div class="login_box_btm"></div>
    </div>
    
    <script type="text/javascript">
    var gload="";//全局变量
    $(document).ready(function(e) {
    	$('.register_radio li input').click(function(e){
    		$(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();
    	});
    	
    	$('#email').focus(function(){
    		$('#beError').hide();
    	});
    	//验证表单
    	 $("#loginForm").validate({
    	        rules: {
    	        	type:{
    	        		required: true
    	        	},
		    	   	password: {
		    	    	required: true,
		    	    	rangelength: [6,16]
		    	   	},
		    	   	checkbox:{required:true}
		    	},
		    	messages: {
		    		type:{
    	        		required:"请选择使用拉勾的目的"
    	        	},
		    	   	password: {
		    	    	required: "请输入密码",
		    	    	rangelength: "请输入6-16位密码，字母区分大小写"
		    	   	},
		    	   	checkbox: {
		    	    	required: "请接受拉勾用户协议"
		    	   	}
		    	}
    	});
    });
    //手机号
    $(".phone").blur(function(){
    	var type = $('input:radio');
    	for(var i = 0;i<type.length;i++)
    	{
    		if(type.eq(i).prop('checked') == true)
    		{
    			type = type.eq(i).val();
    		}
    	}
    	var phone=$(".phone").val();
    	var reg=/^1[34578]{1}\d{9}$/;
    	if(phone==""){
			$("#c_phone").text("手机号不得为空");
				gload=0;
		}else{
			if(!reg.test(phone)){
				$("#c_phone").text("请输入正确的手机号");
				gload=0;

			}else{
				$.ajax({
				   type: "get",
				   url: "{{url('loginone')}}",
				   data: "phone="+phone+'&type='+type,
				   success: function(msg){
				   		if(msg=="1"){
				   			$("#c_phone").text("手机号已注册,请重新注册");
				   			gload=0;
				   		}else if(msg=="2"){
				   			$("#c_phone").text("");
				   			gload=1;
				   		}
				   }
				});
				
			}
		}


    })
    //邮箱
    $(".email").blur(function(){
    	var type = $('input:radio');
    	for(var i = 0;i<type.length;i++)
    	{
    		if(type.eq(i).prop('checked') == true)
    		{
    			type = type.eq(i).val();
    		}
    	}

		var email=$(".email").val();
		var reg=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(email==""){
			$("#c_name").text("邮箱不得为空");
				gload=0;
		}else{
			if(!reg.test(email)){
				$("#c_name").text("请输入正确邮箱");
				gload=0;

			}else{
				$.ajax({
				   type: "get",
				   url: "{{url('loginone')}}",
				   data: "email="+email+'&type='+type,
				   success: function(msg){
				   		if(msg=="1"){
				   			$("#c_name").text("邮箱已注册,请重新注册");
				   			gload=0;
				   		}else if(msg=="2"){
				   			$("#c_name").text("");
				   			gload=1;
				   		}
				   }
				});
				
			}
		}
	})
	/**
	 * [login 验证非法登录]
	 * @return {[type]} [description]
	 */
	function login(){
		if(gload==0){
			$("#check").text("请正确填写您的信息");
			return false;
		}else if(gload==1){
			return true;
		}
	}

    </script>
</body>
</html>
