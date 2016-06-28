<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>职位订阅-强强联合-最专业的互联网招聘平台</title>
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
</script>
</head>
<script type="text/javascript">
    $(function(){
     $.get("{{url('top')}}",function(m){
         $('#cache').html(m);
     })
    })
</script>

<body>
<div id="body">
<!--头部-->
<div id="cache">

</div>
    <div id="container">
        	  	
        <div class="clearfix">
            <div class="content_l">
            	<h1>我的职位订阅</h1>
            	            		            
	           <!--      -->
          		<input type="hidden" id="orderCount" value="0" />

                	<input type="hidden" value="" name="id" id="orderId" />
	                <div class="s_form">
	                	<p>筛选下面的职位订阅条件，实现精准匹配的个性化职位定制，我们帮你挑工作！</p>
	                    <dl>
	                    	<dt>
	                        	<h3>接收邮箱  <i class="rss_circle"></i>&nbsp; 发送周期 <em></em><span>（必填）</span></h3>
	                        </dt>
	                        <dd>
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                        	<input type="text" id="subEmail" name="email" placeholder="请输入接收邮箱" value="" />	
	                        	<span id="emailError" class="error" style="display:none;">请输入接收邮箱</span>
	                        </dd>
	                        <dd>
	                        	<input type="hidden" id="select_day_hidden" name="sendMailPer" value="" />
	                       		<ul class="s_radio clearfix" id="sendMailPer">
                                    <li title="3" class="sendMailPer">3天</li>
                                    <li title="7" class="sendMailPer">7天</li>
                                </ul>
	                            <span id="sendError" class="error" style="display:none;">请选择发送周期</span>
	                        </dd>
	                    </dl>
                        <dl>
	                    	<dt>
	                        	<h3>职位名称 <em></em><span>（必填）</span></h3>	
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_job_hidden" name="positionName" value="" />
	                       		<input type="button" class="select" id="select_job" value="请选择职位名称" />
	                       		
	                            <div id="sub_box_job" class="dn">
                                    @foreach($post as $val)
                                        <dl>
		                                	<dt>{{$val['i_name']}}</dt>
		                                    <dd>
		                                    	<ul class="reset job_main">
                                                    @foreach($val['son'] as $va)
		                                            <li>
			                                            {{$va['i_name']}}
                                                        <ul class="reset job_sub dn">
                                                            @foreach($va['son'] as $v)
                                                            <li>{{$v['i_name']}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @endforeach
                                                </ul>
		                                    </dd>
		                                </dl>
                                        @endforeach
                                </div>
	                            <span id="positionError" class="error" style="display:none;">请选择职位名称 </span>		
	                        </dd>
	                    </dl>
	                    <dl>
	                    	<dt>
	                        	<h3>工作地点 <em></em><span>（必填）</span></h3>
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_city_hidden" name="city" value="" />
	                            <ul class="s_radio clearfix">
	                            	<li title="北京" class="city">北京</li>
                                    <li title="上海" class="city">上海</li>
                                    <li title="广州" class="city">广州</li>
                                    <li title="深圳" class="city">深圳</li>
                                    <li title="成都" class="city">成都</li>
                                    <li title="杭州" class="city">杭州</li>
	                            </ul>
	                            <span id="cityError" class="error" style="display:none;">请选择工作地点 </span>	
	                        </dd>
	                    </dl>
	                    <dl>
	                    	<dt>
	                        	<h3>发展阶段 <em></em></h3>
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_stage_hidden" name="financeStage" value="" />
	                        	<ul class="s_tips clearfix s_radio_sp">
	                            	<li title="初创型" class="financeStage">初创型<span class="dn">刚成立或已获得天使投资</span></li>
                                    <li title="成长型" class="financeStage">成长型<span class="dn">已获得A轮/B轮/C轮融资</span></li>
                                    <li title="成熟型" class="financeStage">成熟型<span class="dn">有D轮及以上的融资</span></li>
                                    <li title="上市公司" class="financeStage">上市公司<span class="dn">上市公司</span></li>
	                            </ul>
	                            <span id="stageError" class="error" style="display:none;">请选择发展阶段 </span>		
	                        </dd>
	                    </dl>
	                    <dl>
	                    	<dt>
	                        	<h3>行业领域 <em></em></h3>
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_industry_hidden" name="industryField" value="" />
	                            <input type="button" class="select" id="select_industry" value="请选择行业领域" />
	                            <div id="box_industry" class="dn">
	                            	<ul class="reset">
                                            @foreach($industry as $i)
                                                <li>{{$i->h_name}}</li>
                                            @endforeach
                                    </ul>
	                            </div>
	                            <span id="fieldError" class="error" style="display:none;">请选择行业领域 </span>	
	                        </dd>
	                    </dl>
	                    <dl>
	                    	<dt>
	                        	<h3>月薪范围 <em></em></h3>
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_salary_hidden" name="salary" value="" />
	                            <input type="button" class="select" id="select_salary" value="请选择月薪范围" />
	                            <div id="box_salary" class="dn">
	                            	<ul class="reset">
                                        <li>2k以下</li>
                                        <li>2k-5k</li>
                                        <li>5k-10k</li>
                                        <li>10k-15k</li>
                                        <li>15k-25k</li>
                                        <li>25k-50k</li>
                                        <li>50k以上</li>
                                    </ul>
	                            </div>
	                            <span id="salaryError" class="error" style="display:none;">请选择月薪范围 </span>	
	                        </dd>
	                    </dl>
	                    <span id="commonError" class="error" style="display:none;">系统异常</span>
	                    <input type="button" class="btn_big" id="subSubmit" value="保 存" onclick="ck_sub()"/>
	                    <a href="javascript:void(0)" class="btn_cancel">取 消</a>
	                </div>
            </div>
            <script type="text/javascript">
                function ck_sub(){
                    //email
                    var subEmail = $('#subEmail').val();
                    //发送周期
                    var select_day_hidden = $('#select_day_hidden').val();
                    //职位名称
                    var select_job_hidden = $('#select_job_hidden').val();
                    //工作地点
                    var select_city_hidden = $('#select_city_hidden').val();
                    //发展阶段
                    var select_stage_hidden = $('#select_stage_hidden').val();
                    //行业领域
                    var select_industry_hidden = $('#select_industry_hidden').val();
                    //月薪范围
                    var select_salary_hidden = $('#select_salary_hidden').val();
					if(subEmail=="" || select_day_hidden=="" || select_city_hidden=="")
					{
						if(subEmail == "")
						{
							$('#emailError').show();
						}
						if(select_day_hidden == "")
						{
							$('#sendError').show();
						}
						if(select_job_hidden == "")
						{
							$('#positionError').show();
						}
						if(select_city_hidden == "")
						{
							$('#cityError').show();
						}
					}else
					{
						$.ajax({
							type : 'GET',
							url : '{{url("subinfo")}}',
							data : 'email='+subEmail+'&day='+select_day_hidden+'&job='+select_job_hidden+'&city='+select_city_hidden+'&stage='+select_stage_hidden+'&industry='+select_industry_hidden+'&salary='+select_salary_hidden,
							success : function(msg)
							{
                                alert(msg);
								if(msg == 0)
                                {
                                    $.colorbox({
                                        inline: !0,
                                        href: "#loginPop",
                                        title: "登录"
                                    });
                                }
                                else if(msg == 1)
                                {
                                    $('#r_email').html(subEmail);
                                    $.colorbox({
                                        inline: !0,
                                        href: "#subscribeSuccessLogined",
                                        title: "登录"
                                    });
                                }
                                else
                                {
                                    alert('系统繁忙，请稍后再试')
                                }
							}
						})	
					}
                }
                $('#subEmail').blur(function(){
					var subEmail = $('#subEmail').val();
					if(subEmail == ""){
						$('#emailError').show();
					}else{
						$('#emailError').hide();
					}
                });
				$('#select_job').click(function(){
					$('#positionError').hide();
                });
				$('.sendMailPer').click(function(){
					$('#sendError').hide();
                });
				$('.city').click(function(){
					$('#cityError').hide();
                });
				$('.financeStage').click(function(){
					$('#stageError').hide();
                });
				$('#select_industry').click(function(){
					$('#fieldError').hide();
                });
				$('#select_salary').click(function(){
					$('#salaryError').hide();
                });

                function ck_login()
                {
                    var email = $('#email').val();
                    var password = $('#password').val();
                    $.ajax({
                        type : 'GET',
                        url : 'login_pro',
                        data : 'name='+email+'&pwd='+password,
                        success:function(msg)
                        {
                            alert(msg)
                            if(msg == 4)
                            {
                                ck_sub();
                            }
                            else
                            {
                                $('#beError').show();
                            }
                        }
                    })
                }
            </script>
            <div class="content_r">
            	<div class="subscribe_side mb20 c5">
                    <div class="why">我们为什么强烈推荐你</div>
                    <h2>订阅</h2>
                    <ul class="reset">
                    	<li class="sub1">帮助你节省浏览和筛选时间，快速找到适合的职位信息。</li>
                    	<li class="sub2">我们会严格按照你订阅的频次和条件给你发送邮件，并对你的个人信息绝对保密。</li>
                    </ul>
                </div>
            </div>
       	</div>
      <input type="hidden" value="" name="userid" id="userid" />

<!------------------------------------- 弹窗lightbox ----------------------------------------->
<div style="display:none;">
	<!-- 
		登录帐号订阅成功
		1、已登录用户，且是自有用户，已验证，订阅职位<=1，提示订阅成功；接收邮箱默认为登录邮箱，可修改。
		2、已登录用户，但是第三方用户，订阅职位<=1，提示订阅成功；接收邮箱手动输入可修改。
		未登录帐号订阅成功 
		未登录用户，但填写的邮箱为已注册、已验证邮箱，且订阅职位<=1，订阅成功，点击确定显示登录框
	-->
		<div id="subscribeSuccessLogined" class="popup">
        	<h4>职位订阅成功！</h4>
        	<p>我们将定期发送订阅邮件至：<a id="r_email"></a>，请注意查收。</p>
            <table width="100%">
            	<tr>
                	<td align="center"><a href="subscribe" class="btn_s">确&nbsp;定</a></td>
                </tr>
            </table>
        </div><!--/#subscribeSuccessLogined-->
   	
   	<!-- 
		未登录未注册帐号订阅成功
		提示注册框
	-->
		<div id="subscribeSuccessRegister" class="popup" style="height:370px;">
        	<h4>职位订阅成功！</h4>
        	<p>我们将定期发送订阅邮件至：<a><em></em></a>，请注意查收。</p>
        	<hr>
        	<p>现在只需设置密码就可成功注册拉勾，并可长期保存及管理订阅信息。</p>
        	<form id="registerPopForm">
	            <table width="100%">
	            	<tr>
	                	<td>注册邮箱 :</td>
	                	<td><em></em></td>
	                </tr>
	                <tr>
	                	<td valign="top">注册密码 :</td>
	                	<td>
	                		<input type="password" name="password" id="psw"  placeholder="请输入注册密码" />
	                		<span class="error" style="display:none;" id="beError_register"></span>
	                	</td>
	                </tr>
	                <tr>
	                	<td></td>
	                	<td>
	                		<label class="fl" for="checkbox">
	                			<input type="checkbox" id="checkbox" name="checkbox" checked  class="checkbox valid" />
	                			我已阅读并同意<a href="h/privacy" target="_blank">《拉勾用户协议》</a>
	                		</label>
	                	</td>
	                </tr>
	            	<tr>
	            		<td></td>
	                	<td>
	                		<input type="submit" class="btn_s" value="注 册" />
	                	</td>
	                </tr>
	            </table>
	        </form>
        </div><!--/#subscribeSuccessRegister-->
        
     <!-- 
		未登录注册帐号订阅成功
		弹出框有登录按钮，提示登录
	-->
		<div id="subscribeSuccessLogin" class="popup">
        	<h4>职位订阅成功！</h4>
        	<p>我们将定期发送订阅邮件至：<a></a>，请注意查收。</p>
            <table width="100%">
            	<tr>
                	<td align="center"><a href="#loginPop" class="btn inline" title="登录">登 录</a></td>
                </tr>
            </table>
        </div><!--/#subscribeSuccessLogin-->
		
     <!-- 登录框 -->
	<div id="loginPop" class="popup" style="height:240px;">
       	<form id="loginForm">
			<input type="text" id="email" name="email" tabindex="1" placeholder="请输入登录邮箱地址" />
			<input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
			<span class="error" style="display:none;" id="beError">账号或密码有误，请重新输入</span>
		    <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
		    <a href="h/reset" class="fr" target="_blank">忘记密码？</a>
		    <input type="button" id="submitLogin" value="登 &nbsp; &nbsp; 录" onclick="ck_login()" />
		</form>
		<div class="login_right">
			<div>还没有拉勾帐号？</div>
			<a href="register" class="registor_now">立即注册</a>
		    <div class="login_others">使用以下帐号直接登录:</div>
		    <a href="h/ologin/auth/sina" target="_blank" class="icon_wb" title="使用新浪微博帐号登录"></a>
		    <a href="h/ologin/auth/qq" class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a>
		</div>
    </div><!--/#loginPop-->
    
     <!--退订-->	
    <div id="cancelSub" class="popup">
       	<h4>确认要退订该订阅？</h4>
       	<table width="100%">
       		<tr>
       			<td align="center"><p>点击确认后你将不再收到拉勾为你提供的精准职位推送。</p></td>
       		</tr>
        	<tr>
            	<td align="center">
            		<input type="button" class="btn_s" id="confirmCancel" value="确认退订" />
            		<a href="javascript:void(0)" class="btn_s">取消</a>
            	</td>
            </tr>
        </table>
    </div><!--/#cancelSub-->
</div>
<!------------------------------------- end ----------------------------------------->

<script src="style/js/sub.min.js"></script>
<!-- 退订 | 从邮箱进来订阅页  -->

<!-- 订阅成功弹出注册框 | 从邮箱进来订阅页  -->

<!-- 订阅成功弹出登录框 | 从邮箱进来订阅页  -->

<!-- 从激活页点换个邮箱进入订阅页 -->
			<div class="clear"></div>
			<input type="hidden" id="resubmitToken" value="f828aecf8b80414491d138ca1190fb6d" />
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