<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<script id="allmobilize" charset="utf-8" src="./style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>拉勾网-最专业的互联网招聘平台</title>
<meta property="qc:admins" content="23635710066417756375" />
<meta content="" name="description">
<meta content="" name="keywords">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6" />

<!-- <div class="web_root"  style="display:none">h</div> -->
<script type="text/javascript">
var ctx = "h";
console.log(1);
</script>
<link rel="Shortcut Icon" href="h/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="style/css/style.css"/>
<link rel="stylesheet" type="text/css" href="style/css/external.min.css"/>
<link rel="stylesheet" type="text/css" href="style/css/popup.css"/>
<script src="style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/jquery.lib.min.js"></script>
<script src="style/js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/additional-methods.js"></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="style/js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript">
var youdao_conv_id = 271546; 
</script> 
<script type="text/javascript" src="style/js/conv.js"></script>
</head>
<body>
<div id="body">
	<div id="header">
    	<div class="wrapper">
    		<a href="index.html" class="logo">
    			<img src="style/images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
    		</a>
    		<ul class="reset" id="navheader">
    			<?php if(empty(session('key'))){?>
                           <li ><a href="index">首页</a></li>
                           <li ><a href="companylist" >职位</a></li>
                          <li ><a href="toForum" target="_blank">论坛</a></li>
                          <li ><a href="login" rel="nofollow">个人中心</a></li>
                          <li ><a href="login" rel="nofollow">发布职位</a></li>
                <?php }else if(session('key')==1){?>
                         <li ><a href="index">首页</a></li>
                         <li ><a href="companylist" >职位</a></li>
                         <li ><a href="toForum" target="_blank">论坛</a></li>
                         <li ><a href="jianli" rel="nofollow">个人中心</a></li>
                         <li ><a href="create" rel="nofollow">发布职位</a></li>
                <?php }else if(session('key')==0){?>
                        <li ><a href="index">首页</a></li>
                         <li ><a href="companylist" >职位</a></li>
                         <li ><a href="toForum" target="_blank">论坛</a></li>
                         <li ><a href="jianli" rel="nofollow">个人中心</a></li>
                         <li ><a href="create" rel="nofollow">发布职位</a></li>
                <?php  }?>

	    	</ul>
        	            <ul class="loginTop">
            	<li><a href="login" rel="nofollow" target="_parent">登录</a></li> 
            	<li>|</li>
            	<li><a href="register" rel="nofollow">注册</a></li>
            </ul>
                                </div>
    </div><!-- end #header -->




<script type="text/javascript" src="style/js/core.min.js"></script>
<script type="text/javascript" src="style/js/popup.min.js"></script>

<!-- <script src="style/js/wb.js" type="text/javascript" charset="utf-8"></script>
 -->

</body>
</html>	