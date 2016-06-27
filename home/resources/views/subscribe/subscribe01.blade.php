<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb"><head>
</script><script type="text/javascript" async="" src="style/js/conversion.js"></script><script src="style/js/allmobilize.min.js" charset="utf-8" id="allmobilize"></script><style type="text/css"></style>
<meta content="no-siteapp" http-equiv="Cache-Control">
<link  media="handheld" rel="alternate">
<!-- end 云适配 -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>职位订阅-强强联合-最专业的互联网招聘平台</title>
<meta content="23635710066417756375" property="qc:admins">
<meta name="description" content="拉勾网是3W旗下的互联网领域垂直招聘网站,互联网职业机会尽在拉勾网">
<meta name="keywords" content="拉勾,拉勾网,拉勾招聘,拉钩, 拉钩网 ,互联网招聘,拉勾互联网招聘, 移动互联网招聘, 垂直互联网招聘, 微信招聘, 微博招聘, 拉勾官网, 拉勾百科,跳槽, 高薪职位, 互联网圈子, IT招聘, 职场招聘, 猎头招聘,O2O招聘, LBS招聘, 社交招聘, 校园招聘, 校招,社会招聘,社招">
<meta content="QIQ6KC1oZ6" name="baidu-site-verification">

<!-- <div class="web_root"  style="display:none">http://www.lagou.com</div> -->
<script type="text/javascript">
var ctx = "http://www.lagou.com";
console.log(1);
</script>
<link href="http://www.lagou.com/images/favicon.ico" rel="Shortcut Icon">
<link href="style/css/style.css" type="text/css" rel="stylesheet">
<link href="style/css/external.min.css" type="text/css" rel="stylesheet">
<link href="style/css/popup.css" type="text/css" rel="stylesheet">
<link href="style/css/crate_subscrip.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="style/js/jquery.1.10.1.min.js"></script>
<script src="style/js/jquery.lib.min.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/ajaxfileupload.js"></script>
<script src="style/js/additional-methods.js" type="text/javascript"></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="style/js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript">
var youdao_conv_id = 271546; 
</script> 
<script src="style/js/conv.js" type="text/javascript"></script>
<script src="style/js/ajaxCross.json" charset="UTF-8"></script></head>
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
            	     <div class="selected s1">
	                	<h2>{{$arr->s_job}}</h2>
	                	<div class="sbox">
	                    	<a rel="1" class="sclose" href="javascript:void(0)"></a>
	                    	<a rel="1" class="sedit" href="javascript:void(0)"></a>
	                    </div>
	                   	<span>
	                    	{{$arr->s_place}}
	                    	/{{$arr->s_industry}}
	                    	/{{$arr->s_stage}}
	                    	/{{$arr->s_salary}}
	                    </span>
	                    <input type="hidden" id="oi1" name="orderId" value="61028">
	                    <input type="hidden" id="pn1" value="{{$arr->s_job}}">
	                    <input type="hidden" id="ci1" value="{{$arr->s_place}}">
	                    <input type="hidden" id="inf1" value="{{$arr->s_industry}}">
	                    <input type="hidden" id="fs1" value="{{$arr->s_stage}}">
	                    <input type="hidden" id="sa1" value="{{$arr->s_salary}}">
	                    <input type="hidden" id="smp1" value="{{$arr->s_day}}">
	                    <input type="hidden" id="em1" value="{{$arr->s_email}}">
	                </div>
                	                	            
	           <!--  	                <a href="javascript:void(0)"  class="btn_big"  id="subBtn">新建订阅</a>
	                	                <div class="apply_num">共可创建 <span>2</span> 个，还可创建 <span>1</span> 个</div>
	                <input type="hidden" id="orderCount" value="1" />
	                -->
          		<input type="hidden" value="1" id="orderCount">
                <input type="hidden" value="" name="id" id="orderId" />
                <div class="s_form" style="display:none">
                    <p>筛选下面的职位订阅条件，实现精准匹配的个性化职位定制，我们帮你挑工作！</p>
                    <dl>
                        <dt>
                        <h3>接收邮箱  <i class="rss_circle"></i>&nbsp; 发送周期 <em></em><span>（必填）</span></h3>
                        </dt>
                        <dd>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="text" id="subEmail" name="email" placeholder="请输入接收邮箱" value="{{$arr->s_email}}" />
                            <span id="emailError" class="error" style="display:none;">请输入接收邮箱</span>
                        </dd>
                        <dd>
                            <input type="hidden" id="select_day_hidden" name="sendMailPer" value="{{$arr->s_day}}" />
                            <ul class="s_radio clearfix" id="sendMailPer">
                                @if($arr->s_day == 3)
                                <li title="3" class="sendMailPer current">3天<em></em></li>
                                <li title="7" class="sendMailPer">7天</li>
                                @else
                                <li title="3" class="sendMailPer">3天</li>
                                <li title="7" class="sendMailPer current">7天<em></em></li>
                                @endif
                            </ul>
                            <span id="sendError" class="error" style="display:none;">请选择发送周期</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                        <h3>职位名称 <em></em><span>（必填）</span></h3>
                        </dt>
                        <dd>
                            <input type="hidden" id="select_job_hidden" name="positionName" value="{{$arr->s_job}}" />
                            <input type="button" class="select" id="select_job" value="{{$arr->s_job}}" />

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
                            <input type="hidden" id="select_city_hidden" name="city" value="{{$arr->s_place}}" />
                            <ul class="s_radio clearfix">
                                <li title="北京" @if($arr->s_place == '北京') class="city current"@else class="city" @endif>北京 @if($arr->s_place == '北京')<em></em>@endif</li>
                                <li title="上海" @if($arr->s_place == '上海') class="city current"@else class="city" @endif>上海 @if($arr->s_place == '上海')<em></em>@endif</li>
                                <li title="广州" @if($arr->s_place == '广州') class="city current"@else class="city" @endif>广州 @if($arr->s_place == '广州')<em></em>@endif</li>
                                <li title="深圳" @if($arr->s_place == '深圳') class="city current"@else class="city" @endif>深圳 @if($arr->s_place == '深圳')<em></em>@endif</li>
                                <li title="成都" @if($arr->s_place == '成都') class="city current"@else class="city" @endif>成都 @if($arr->s_place == '成都')<em></em>@endif</li>
                                <li title="杭州" @if($arr->s_place == '杭州') class="city current"@else class="city" @endif>杭州 @if($arr->s_place == '杭州')<em></em>@endif</li>
                            </ul>
                            <span id="cityError" class="error" style="display:none;">请选择工作地点 </span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                        <h3>发展阶段 <em></em></h3>
                        </dt>
                        <dd>
                            <input type="hidden" id="select_stage_hidden" name="financeStage" value="{{$arr->s_stage}}" />
                            <ul class="s_tips clearfix s_radio_sp">
                                <li title="初创型" class="financeStage @if($arr->s_stage == '初创型') current @endif">初创型@if($arr->s_stage == '初创型')<em></em>@endif<span class="dn">刚成立或已获得天使投资</span></li>
                                <li title="成长型" class="financeStage @if($arr->s_stage == '成长型') current @endif">初创型@if($arr->s_stage == '成长型')<em></em>@endif<span class="dn">已获得A轮/B轮/C轮融资</span></li>
                                <li title="成熟型" class="financeStage @if($arr->s_stage == '成熟型') current @endif">成熟型@if($arr->s_stage == '成熟型')<em></em>@endif<span class="dn">有D轮及以上的融资</span></li>
                                <li title="上市公司" class="financeStage @if($arr->s_stage == '上市公司') current @endif">上市公司@if($arr->s_stage == '上市公司')<em></em>@endif<span class="dn">上市公司</span></li>
                            </ul>
                            <span id="stageError" class="error" style="display:none;">请选择发展阶段 </span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>
                        <h3>行业领域 <em></em></h3>
                        </dt>
                        <dd>
                            <input type="hidden" id="select_industry_hidden" name="industryField" value="{{$arr->s_industry}}" />
                            <input type="button" class="select" id="select_industry" value="{{$arr->s_industry}}" />
                            <div id="box_industry" class="dn">
                                <ul class="reset">
                                    @foreach($industry as $i)
                                        <li @if($arr->s_industry == $i->h_name) class="current" @endif>{{$i->h_name}}</li>
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
                            <input type="hidden" id="select_salary_hidden" name="salary" value="{{$arr->s_salary}}" />
                            <input type="button" class="select" id="select_salary" value="{{$arr->s_salary}}" />
                            <div id="box_salary" class="dn">
                                <ul class="reset">
                                    <li @if($arr->s_salary == '2k以下') class="current" @endif>2k以下</li>
                                    <li @if($arr->s_salary == '2k-5k') class="current" @endif>2k-5k</li>
                                    <li @if($arr->s_salary == '5k-10k') class="current" @endif>5k-10k</li>
                                    <li @if($arr->s_salary == '10k-15k') class="current" @endif>10k-15k</li>
                                    <li @if($arr->s_salary == '15k-25k') class="current" @endif>15k-25k</li>
                                    <li @if($arr->s_salary == '50k以上') class="current" @endif>50k以上</li>
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
        function ck_sub() {
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
            if (subEmail == "" || select_day_hidden == "" || select_city_hidden == "" || select_stage_hidden == "" || select_industry_hidden == "") {
                if (subEmail == "") {
                    $('#emailError').show();
                }
                if (select_day_hidden == "") {
                    $('#sendError').show();
                }
                if (select_job_hidden == "") {
                    $('#positionError').show();
                }
                if (select_city_hidden == "") {
                    $('#cityError').show();
                }
                if (select_stage_hidden == "") {
                    $('#stageError').show();
                }
                if (select_industry_hidden == "") {
                    $('#fieldError').show();
                }
                if (select_salary_hidden == "") {
                    $('#salaryError').show();
                }
            } else {
                $.ajax({
                    type: 'GET',
                    url: '{{url("subinfo")}}',
                    data: 'email=' + subEmail + '&day=' + select_day_hidden + '&job=' + select_job_hidden + '&city=' + select_city_hidden + '&stage=' + select_stage_hidden + '&industry=' + select_industry_hidden + '&salary=' + select_salary_hidden,
                    success: function (msg) {
                        if (msg == 0) {
                            $.colorbox({
                                inline: !0,
                                href: "#loginPop",
                                title: "登录"
                            });
                        }
                        else if (msg == 1) {
                            $('#r_email').html(subEmail);
                            $.colorbox({
                                inline: !0,
                                href: "#subscribeSuccessLogined",
                                title: "订阅"
                            });
                        }
                        else {
                            alert('系统繁忙，请稍后再试')
                        }
                    }
                })
            }
        }

        $('#subEmail').blur(function () {
            var subEmail = $('#subEmail').val();
            if (subEmail == "") {
                $('#emailError').show();
            } else {
                $('#emailError').hide();
            }
        });
        $('#select_job').click(function () {
            $('#positionError').hide();
        });
        $('.sendMailPer').click(function () {
            $('#sendError').hide();
        });
        $('.city').click(function () {
            $('#cityError').hide();
        });
        $('.financeStage').click(function () {
            $('#stageError').hide();
        });
        $('#select_industry').click(function () {
            $('#fieldError').hide();
        });
        $('#select_salary').click(function () {
            $('#salaryError').hide();
        });

        function ck_login() {
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax({
                type: 'GET',
                url: 'login_pro',
                data: 'name=' + email + '&pwd=' + password,
                success: function (msg) {
                    if (msg == 4) {
                        ck_sub();
                    }
                    else {
                        $('#beError').show();
                    }
                }
            })
        }
    $('.sedit').click(function(){
        $('.s_form').show();
    });
    $('.sclose').click(function(){
        $.colorbox({
            inline: !0,
            href: "#cancelSub",
            title: "退订"
        });
    });
        //退订
    $(document).on('click','#confirmCancel',function(){
        alert(1);
        $.ajax({
            url : '{{url("subdel")}}',
            success : function(msg){
                if(msg==1){
                    $('#cancelSub').colorbox.close();
                    $('.content_l').html('<center><a href="{{url('subscribe')}}" class="crateSubscrip">创建订阅</a></center>')
                }
            }
        })
    });
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
      <input type="hidden" id="userid" name="userid" value="314873">

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
                <p>现在只需设置密码就可成功注册强强联合，并可长期保存及管理订阅信息。</p>
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
                                    我已阅读并同意<a href="h/privacy" target="_blank">《强强联合用户协议》</a>
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
                        <td align="center"><p>点击确认后你将不再收到强强联合为你提供的精准职位推送。</p></td>
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
			<input type="hidden" value="37509432fb9e453a815da48821b7bf01" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->
	<div id="footer">
		<div class="wrapper">
			<a rel="nofollow" target="_blank" href="about">联系我们</a>
		    <a target="_blank" href="http://www.lagou.com/af/zhaopin">互联网公司导航</a>
		    <a rel="nofollow" target="_blank" href="http://e.weibo.com/lagou720">拉勾微博</a>
		    <a rel="nofollow" href="javascript:void(0)" class="footer_qr">拉勾微信<i></i></a>
			<div class="copyright">&copy;2013-2014 Lagou <a href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action" target="_blank">京ICP备14023790号-2</a></div>
		</div>
	</div>

<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->

<script type="text/javascript">
$(function(){
	$('#noticeDot-1').hide();
	$('#noticeTip a.closeNT').click(function(){
		$(this).parent().hide();
	});
});
</script>

<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>