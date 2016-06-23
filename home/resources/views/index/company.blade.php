<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>全国-公司列表-拉勾网-最专业的互联网招聘平台</title>
<meta property="qc:admins" content="23635710066417756375" />
<meta content="全国condition-condition-公司列表-拉勾网-最专业的互联网招聘平台" name="description">
<meta content="全国condition-公司列表-拉勾网-最专业的互联网招聘平台" name="keywords">
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
<style>
*{margin:0;padding:0;list-style-type:none;}
.clearfix:after{content:".";display:block;height:0;clear:both;visibility:hidden}
.clearfix{display:inline-table}
*html .clearfix{height:1%}
.clearfix{display:block}
*+html .clearfix{min-height:1%}
/* nav_menu */
.nav_menu{ height: 42px; background-color: #fff; }
.nav{width:1006px;height:41px;position:relative;margin:0 auto;}
.nav .list li{float:left;}
.nav .list a{float:left;display:block;width:100px;height:42px;text-align:center;font:bold 13px/36px "微软雅黑";color:#333;}
.nav .list a:hover{color:#FFA304;}
.nav .list a:hover,.nav .list .now{color:#F00;background:#fff;}
.nav .box{position:absolute;left:-5px;top:42px;width:1006px;background:#FFF;overflow:hidden;height:0;filter:alpha(opacity=0);opacity:0;border-bottom:2px solid #074c52;}
.nav .cont{position:relative;padding:25px 0 0px 24px;}
/* sublist */
.sublist li{float:left;width:168px;padding-right:24px;padding-bottom:24px;}
.sublist li h3.mcate-item-hd{font-family:'微软雅黑';padding-left:2px;font-size:14px;height:26px;line-height:26px;border-bottom:1px dashed #666666;}
.sublist li p.mcate-item-bd{padding-left:2px;}
.sublist li p.mcate-item-bd a{height:26px;line-height:26px;margin-right:5px;font-size:12px;color:#666666;text-decoration:none;display:inline-block;}
.sublist li p.mcate-item-bd a:hover{color:#6c5143;text-decoration:underline;}
</style>
</head>
<body>
<div id="body">
	<div id="header">
    	<div class="wrapper">
    		<a href="index" class="logo">
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
                         <li ><a href="company" >职位</a></li>
                         <li ><a href="toForum" target="_blank">论坛</a></li>
                         <?php if(empty(session('key'))){ ?>
                         <li ><a href="login" rel="nofollow">个人中心</a></li>
                          <li ><a href="login" rel="nofollow">发布职位</a></li>
                        <?php }else{?>
                         <li ><a href="jianli" rel="nofollow">个人中心</a></li>
                         <li ><a href="create" rel="nofollow">发布职位</a></li>
                         <?php }?>
                <?php }else if(session('key')==0){?>
                        <li ><a href="index">首页</a></li>
                         <li ><a href="companylist" >职位</a></li>
                         <li ><a href="toForum" target="_blank">论坛</a></li>
                         <?php if(empty(session('key'))){ ?>
                         <li ><a href="login" rel="nofollow">个人中心</a></li>
                          <li ><a href="login" rel="nofollow">发布职位</a></li>
                        <?php }else{?>
                         <li ><a href="jianli" rel="nofollow">个人中心</a></li>
                         <li ><a href="create" rel="nofollow">发布职位</a></li>
                         <?php }?>
                <?php  }?>

	    		    		</ul>
        	            <ul class="loginTop">
            	<li><a href="login" rel="nofollow">登录</a></li> 
            	<li>|</li>
            	<li><a href="register" rel="nofollow">注册</a></li>
            </ul>
                                </div>
    </div><!-- end #header -->
    <div id="container">
        
        <div class="clearfix">
            <div class="content_l">
            	<form id="companyListForm" name="companyListForm" method="get" action="h/c/companylist">
	                <input type="hidden" id="city" name="city" value="全国" />
	                <input type="hidden" id="fs" name="fs" value="" />
	                <input type="hidden" id="ifs" name="ifs" value="" />
	                <input type="hidden" id="ol" name="ol" value="" />
	                <dl class="hc_tag">
	                    <dt>
	                       <!--  <h2 class="fl">热门公司</h2> -->
	                        <ul class="workplace reset fr" id="workplaceSelect">
	                        	                                <li >
                                	<a href="javascript:void(0)"  class="current" >全国</a> 
                                	                                	|
                                	                                </li>
	                                                            <li >
                                	<a href="javascript:void(0)" >北京</a> 
                                	                                	|
                                	                                </li>
	                                                            <li >
                                	<a href="javascript:void(0)" >上海</a> 
                                	                                	|
                                	                                </li>
	                                                            <li >
                                	<a href="javascript:void(0)" >广州</a> 
                                	                                	|
                                	                                </li>
	                                                            <li >
                                	<a href="javascript:void(0)" >深圳</a> 
                                	                                	|
                                	                                </li>
	                                                            <li >
                                	<a href="javascript:void(0)" >成都</a> 
                                	                                	|
                                	                                </li>
	                                                            <li >
                                	<a href="javascript:void(0)" >杭州</a> 
                                	                                	|
                                	                                </li>
	                                                            <li >
                                	<a href="javascript:void(0)" >武汉</a> 
                                	                                	|
                                	                                </li>
	                                                            <li >
                                	<a href="javascript:void(0)" >南京</a> 
                                	                                	|
                                	                                </li>
	                                                            <li  class="more" >
                                	<a href="javascript:void(0)" >其他</a> 
                                	                                	<div class="triangle citymore_arrow"></div>
                                	                                </li>
	                            	                            <li id="box_expectCity" class="searchlist_expectCity dn">
					            	<span class="bot"></span>
					            	<span class="top"></span>
						    								    										    							    										    		<dl>
							    			<dt>ABCDEF</dt>
							    			<dd>
							     			<span>北京</span>
							     			<span>长春</span>
							     			<span>成都</span>
							     			<span>重庆</span>
							     			<span>长沙</span>
							     			<span>常州</span>
							     			<span>东莞</span>
							     			<span>大连</span>
							     			<span>佛山</span>
							     			<span>福州</span>
							     			</dd>
							    	  	</dl>
							    	  								    							    										    		<dl>
							    			<dt>GHIJ</dt>
							    			<dd>
							     			<span>贵阳</span>
							     			<span>广州</span>
							     			<span>哈尔滨</span>
							     			<span>合肥</span>
							     			<span>海口</span>
							     			<span>杭州</span>
							     			<span>惠州</span>
							     			<span>金华</span>
							                                <span>济南</span>
							     		          <span>嘉兴</span>							     											     				
							     			</dd>
							    	  	</dl>
							    	  								    							    										    		<dl>
							    			<dt>KLMN</dt>
							    			<dd>
							     			<span>昆明</span>
							     			<span>廊坊</span>
							     			<span>宁波</span>
							     			<span>南昌</span>
							     			<span>南京</span>
							     			<span>南宁</span>
							     			<span>南通</span>
							     			</dd>
							    	  	</dl>
							    	  								    							    										    		<dl>
							    			<dt>OPQR</dt>
							    			<dd>
							     			<span>青岛</span>
							     			<span>泉州</span>
							     			/dd>
							    	  	</dl>
							    	  								    							    										    		<dl>
							    			<dt>STUV</dt>
							    			<dd>
							     			<span>上海</span>
							     			<span>石家庄</span>
							     			<span>绍兴</span>
							     			<span>沈阳</span>
							     			<span>深圳</span>
							     			<span>苏州</span>
							     			<span>天津</span>
							     			<span>太原</span>
							     			<span>台州</span>
							     			</dd>
							    	  	</dl>
							    	  								    							    										    		<dl>
							    			<dt>WXYZ</dt>
							    			<dd>
							     			<span>武汉</span>
							     			<span>无锡</span>
							     			<span>温州</span>
							     			<span>西安</span>
							     			<span>厦门</span>
							     			<span>烟台</span>
							     			<span>珠海</span>
							     			<span>中山</span>
							     			<span>郑州</span>
							     			</dd>
							    	  	</dl>
							    	  								    								    </li>
	                        </ul>
	                    </dt>
	                </dl>  
	<div class="nav_menu" style="z-index:9999">
	<div class="nav">
		<div class="list" id="navlist">
			<ul id="navfouce" style="width:680px;">
				@foreach($ar as $val)
				<li><a href="http://sc.chinaz.com/jiaoben/">{{$val['i_name']}}</a></li>   
				@endforeach
			</ul>
		</div>
		<div class="box" id="navbox" style="height:0px;opacity:0;overflow:hidden;z-index:9999;">
		@foreach($ar as $val)
			<div class="cont" style="display:none;">
				<ul class="sublist clearfix">
					@foreach($val['son'] as $va)
					<li>
						<h3 class="mcate-item-hd"><span>{{$va['i_name']}}</span></h3>
						<p class="mcate-item-bd">
							@foreach($va['son'] as $v)
							<a href="http://sc.chinaz.com/jiaoben">{{$v['i_name']}}</a>
							@endforeach
						</p>
					</li>
					@endforeach
				</ul>
			</div>
			@endforeach
		</div>
	</div>
</div>
<script type="text/javascript">
(function(){

	var time = null;
	var list = $("#navlist");
	var box = $("#navbox");
	var lista = list.find("a");
	
	for(var i=0,j=lista.length;i<j;i++){
		if(lista[i].className == "now"){
			var olda = i;
		}
	}
	
	var box_show = function(hei){
		box.stop().animate({
			height:hei,
			opacity:1
		},400);
	}
	
	var box_hide = function(){
		box.stop().animate({
			height:0,
			opacity:0
		},400);
	}
	
	lista.hover(function(){
		lista.removeClass("now");
		$(this).addClass("now");
		clearTimeout(time);
		var index = list.find("a").index($(this));
		box.find(".cont").hide().eq(index).show();
		var _height = box.find(".cont").eq(index).height()+54;
		box_show(_height)
	},function(){
		time = setTimeout(function(){	
			box.find(".cont").hide();
			box_hide();
		},50);
		lista.removeClass("now");
		lista.eq(olda).addClass("now");
	});
	
	box.find(".cont").hover(function(){
		var _index = box.find(".cont").index($(this));
		lista.removeClass("now");
		lista.eq(_index).addClass("now");
		clearTimeout(time);
		$(this).show();
		var _height = $(this).height()+54;
		box_show(_height);
	},function(){
		time = setTimeout(function(){		
			$(this).hide();
			box_hide();
		},50);
		lista.removeClass("now");
		lista.eq(olda).addClass("now");
	});

})();
</script>
	                        <!-- <dl>
	                            <dt>热门标签：</dt>
	                            <dd>
	                                	                                			                               	<a href="javascript:void(0)">年底双薪</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">专项奖金</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">股票期权</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">绩效奖金</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">年终分红</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">带薪年假</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">交通补助</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">通讯津贴</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">午餐补助</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">定期体检</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">弹性工作</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">年度旅游</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">节日礼物</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">免费班车</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">帅哥多</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">美女多</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">领导好</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">扁平管理</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">管理规范</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">技能培训</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">岗位晋升</a>
		                                	                                	                                			                               	<a href="javascript:void(0)">五险一金</a>
		                                	                                	                            </dd>
	                        </dl> -->
	                                                       <ul class="hc_list reset"    >
	               	                	  @foreach ($users as $v=>$user)
	               	                	<?php  if(($v+1)%3==1){ ?> 
                                                                     <li  style="clear:both;  "  >
                                                                     	<?php }else{?>
                                                                     	<li>
                                                                     	<?php } ?>
			                        <a href="h/c/25829" target="_blank">
			                        	<h3 title="CCIC">简历</h3>
			                        	<div class="comLogo">
				                        	<img src="style/images/logo_default.png" width="190" height="190" alt="CCIC" />
				                        	<ul>
				                        		<li>{{ $user->p_name}}</li>
				                        		<li>{{ $user->i_name }}</li>
				                        	</ul>
			                        	</div>
			                        </a>
			                        
			                    
			                    </li>
			                   
			                  
			               
			                 
			             
		                          @endforeach    		                
		                	   </ul>
		                		               	<!-- <div class="Pagination"></div> -->
		               		                                {!! $users->render() !!}
		               		                            </form>
<div class="container">
    

</div>


            </div>	
            <div class="content_r">
            	<div class="subscribe_side">
	            	<a href="subscribe" target="_blank">
	                    <div class="subpos"><span>订阅</span> 职位</div>
	                    <div class="c7">拉勾网会根据你的筛选条件，定期将符合你要求的职位信息发给你
	                    </div>
	                    <div class="count">已有
	                    		                    		<em>3</em>
	                    		                    		<em>4</em>
	                    		                    		<em>2</em>
	                    		                    		<em>1</em>
	                    		                    		<em>0</em>
	                    		                    	人订阅
	                    </div>
	                    <i>我也要订阅职位</i>
	            	</a>
	            </div> 
                <div class="greybg qrcode mt20">
                	<img src="style/images/companylist_qr.png" width="242" height="242" alt="拉勾微信公众号二维码" />
                    <span class="c7">扫描拉勾二维码，微信轻松搜工作</span>
                </div>
               	<!-- <a href="h/speed/speed3" target="_blank" class="adSpeed"></a> -->
                <a href="h/subject/jobguide" target="_blank" class="eventAd">
               		<img src="style/images/subject280.jpg" width="280" height="135" />
               	</a>
               	<a href="h/subject/risingPrice" target="_blank" class="eventAd">
               		<img src="style/images/rising280.png" width="280" height="135" />
               	</a>
            </div>
       	</div>
   	
   	<input type="hidden" value="" name="userid" id="userid" />
      
<script type="text/javascript" src="style/js/company_list.min.js"></script>

<script src="JavaScript/jQuery-1.2.6.min.js" type="text/javascript" ></script>
<script src="JavaScript/jquery.pager.js" type="text/javascript"></script>

<link href="Styles/Pager.css" rel="stylesheet" type="text/css" />
<javascript>
<mce:script type="text/javascript"><!-- 
            $(Pagination).ready(function()   
            {  
                $("#pager").pager({ pagenumber: 1, pagecount: <%=this.UserPageCount %>, buttonClickCallback: PageClick });  
            });  
            PageClick = function(pageclickednumber)  
            {  
                $("#pager").pager({ pagenumber: pageclickednumber, pagecount: <%=this.UserPageCount %>, buttonClickCallback: PageClick });  
                $.get("AjaxServer/UserMgr.ashx", { page: pageclickednumber, action: "getlist" }, function(data) {  
                    $("#pnlUserMain").html(data);});  
            }  
   </mce:script>   -->
</javascript>

 	
			<div class="clear"></div>
			<input type="hidden" id="resubmitToken" value="" />
	    	<a id="backtop" title="回到顶部" rel="nofollow"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->
	<div id="footer">
		<div class="wrapper">
			<a href="h/about" target="_blank" rel="nofollow">联系我们</a>
		    <a href="h/af/zhaopin" target="_blank">互联网公司导航</a>
		    <a href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
		    <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
			<div class="copyright">&copy;2013-2014 Lagou <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action">京ICP备14023790号-2</a></div>
		</div>
	</div>

<script type="text/javascript" src="style/js/core.min.js"></script>
<script type="text/javascript" src="style/js/popup.min.js"></script>

<!--  -->

</body>
</html>