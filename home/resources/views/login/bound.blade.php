<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="23635710066417756375">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6">
<meta charset="UTF-8">
<title></title>
    <!-- global_domain FE_base.. -->
<script src="style/bound/v.htm" charset="utf-8"></script>
<script src="style/bound/analytics.js" async=""></script>
<script src="style/bound/a.js" async=""></script>
 <!-- 公共样式 -->    <!-- header样式 -->    <!-- footer样式 -->    <!-- 动态token，防御伪造请求，重复提交 -->
<script type="text/javascript">
    window.X_Anti_Forge_Token = '26905225-4fab-42aa-96a8-566297f2886a';
    window.X_Anti_Forge_Code = '25296366';
</script>
    <link rel="stylesheet" type="text/css" href="style/bound/mCustomScrollbar_ac2fb8b.css">
    <link rel="stylesheet" type="text/css" href="style/bound/layout_da7c8bd.css">
    <link rel="stylesheet" type="text/css" href="style/bound/main.css">
    <link rel="stylesheet" type="text/css" href="style/bound/widgets_3990de9.css">
<script charset="utf-8" class="lazyload" src="style/bound/jquery.js"></script>
<style charset="utf-8" class="lazyload">@import "http://pstatic.lagou.com/www/static/common/widgets/passport/css/loginpop_3e48624.css";</style>
<script charset="utf-8" class="lazyload" src="style/bound/lagou_5427c0e.js"></script>
</head>

<body style="width: 100%;">
    
	<!--C端头部通栏广告位-->


	<!--验证注册邮箱-->
	<!--
    @require "common/widgets/header_c/modules/emailvalid/main.less"
-->

    <input id="leaveFlagType" value="0" type="hidden">
    <input value="false" id="isVisiable_request_form_verifyCode" type="hidden">
    <input value="true" id="is_must_show_verify_code" type="hidden">
    <div id="container" class="clearfix">
        <div class="bindemail_container">
            <!--
    @require "account-c/modules/common/main.less"
    @require "account-c/modules/bind/main.less"
    @require "account-c/modules/popbox/main.less"
    @require "common/components/jquery-colorbox-custom/jquery-colorbox.css"
    @require "account-c/modules/bindEmail/main.less"
-->
<dl class="c_section user_firstBindContent" style="background-color:#fff;">
    <dt>
        <h2 style="margin:0;background:none;color:#333;">请关联你的拉勾帐号</h2>
    </dt>
    <dd>
        <div style="padding-bottom: 10px;" class="user_firstMainContent">
            <div class="user_bindLogin" id="user_selectAccount">
                <form action="{{url('bound_info')}}" method="get">
                    <label for="user_NoAccount" class="checked" value="0" id="user_NoAccount">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;创建一个拉勾帐号，并绑定你现在登录的@if($p_identifier_type == 0)<span class="oauthTypeClass">新浪微博</span>@else<span class="oauthTypeClass">QQ</span>@endif</label>
                    <p>绑定后，使用@if($p_identifier_type == 0)<span class="oauthTypeClass">新浪微博</span>@else<span class="oauthTypeClass">QQ</span>@endif或者拉勾帐号均可以登录到你现有的帐号。</p>
                    <div style="" class="user_hasAccountform user_noAccountform" id="user_noLagouAccount">
                        <!-- 新版绑定登录注册 -->
                        <div class="userbox bindclear">
                            <ul class="form_head bindclear">
                                <li class="active">
                                    <i class="icon icon_phone"></i> 手机号码注册
                                </li>
                                <li>
                                    <i class="icon icon_mail"></i> 邮箱注册
                                </li>
                            <span class="tab_active"></span>
                            </ul>
                            <input type="hidden" value="{{$p_identifier_type}}" name="p_identifier_type"/>
                            <input type="hidden" value="{{$p_identifier}}" name="p_identifier"/>
                            <div style="display: block;" class="form_body" data-view="phoneRegister">
                                <div style="display: block;" class="input_item bindclear" data-propertyname="credential" data-controltype="Phone">
                                    <input class="input input_white" id="" name="p_phone" placeholder="请输入常用手机号码" data-required="required" autocomplete="off" type="text">
                                </div>
                                <div style="display: block;" class="input_item bindclear" data-propertyname="request_form_verifyCode" data-controltype="VerifyCode">
                                    <input class="input input_white fl" style="width:130px !important; display:block;" name="" placeholder="请证明你不是机器人" data-required="required" autocomplete="off" type="text"><img src="style/bound/create.jpg" class="yzm">
                                    <a href="javascript:;" class="reflash"></a>
                                </div>
                                <div style="display: block;" class="input_item bindclear" data-propertyname="password" data-controltype="Password">
                                    <input class="input input_white" id="" name="p_pwd" placeholder="请输入密码" data-required="required" autocomplete="off" type="password">
                                </div>
                                <div class="input_item bindclear" style="margin-top: 16px; display: block;" data-propertyname="protocol" data-controltype="CheckBox">
                                    <label class="box_checkbox checked" for="checkbox" style="background:none;margin:0;font-size:14px;height:14px;line-height:14px;">
                                        <span style="background-position: -13px 1px;" class="checkbox_icon"></span><input value="" id="checkbox" class="checkbox" data-myvalue="agred" checked="checked" data-text="我已阅读并同意" type="checkbox">我已阅读并同意
                                        <a href="http://www.lagou.com/privacy.html" target="_blank">《拉勾用户协议》</a>
                                    </label>
                                </div>
                                <div style="display: block;" class="input_item bindclear" data-propertyname="submit" data-controltype="Botton">
                                    <input class="btn btn_green btn_active btn_block btn_lg" value="创建并绑定" type="submit">
                                </div>
                            </div>
                            <div class="form_body" data-view="emailRegister">
                                <div style="display: block;" class="input_item bindclear" data-propertyname="credential" data-controltype="Email">
                                    <input class="input input_white" id="" name="p_email" placeholder="请输入常用邮箱地址" data-required="required" autocomplete="off" type="text">
                                </div>
                                <div style="display: block;" class="input_item bindclear" data-propertyname="password" data-controltype="Password">
                                    <input class="input input_white" id="" name="p_pwd" placeholder="请输入密码" data-required="required" autocomplete="off" type="password">
                                </div>
                                <div style="display: none;" class="input_item bindclear" data-propertyname="request_form_verifyCode" data-controltype="VerifyCode">
                                    <input class="input input_white fl" style="width:130px !important; display:block;" id="" name="" placeholder="请证明你不是机器人" data-required="required" autocomplete="off" type="text"><img src="style/bound/create.jpg" class="yzm">
                                    
                                    <a href="javascript:;" class="reflash"></a>
                                </div>
                                <div style="display: block;" class="input_item bindclear" data-propertyname="protocol" data-controltype="CheckBox">
                                    <label class="box_checkbox checked" for="checkbox2" style="background:none;margin:0;font-size:14px;height:14px;line-height:14px;">
                                        <span style="background-position: -13px 1px;" class="checkbox_icon"></span><input value="" id="checkbox2" class="checkbox" checked="checked" data-myvalue="agred" data-text="我已阅读并同意" type="checkbox">我已阅读并同意
                                        <a href="http://www.lagou.com/privacy.html" target="_blank">《拉勾用户协议》</a>
                                    </label>
                                </div>
                                <div style="display: block;" class="input_item bindclear" data-propertyname="submit" data-controltype="Botton">
                                    <input class="btn btn_green btn_active btn_block btn_lg" value="创建并绑定" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{url('bound_login')}}" action="get">
                    <label for="user_HasAccount" value="1" id="user_HasAccount">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;你已在拉勾注册过拉勾帐号，使用已有帐号绑定现在登录的@if($p_identifier_type == 0)<span class="oauthTypeClass">新浪微博</span>@else<span class="oauthTypeClass">QQ</span>@endif</label>
                    <p style="padding-right: 26px;">如果你用自己的帐号登录过拉勾，可以选择此项，将两种登录方式的帐号绑定合并为一个帐号，绑定后，两种登录方式均可登录到合并后的帐号。</p>
                    <input type="hidden" value="{{$p_identifier_type}}" name="p_identifier_type"/>
                    <input type="hidden" value="{{$p_identifier}}" name="p_identifier"/>
                    <div class="user_hasAccountform" id="user_hasLagouAccountForm" style="display: none;">
                        <div class="userbox bindclear" style="margin-top:38px;" data-view="loginView">
                            <div style="display: block;" class="input_item bindclear" data-propertyname="credential" data-controltype="Phone">
                                <input class="input input_white" id="" name="p_account" placeholder="请输入已验证手机/邮箱" data-required="required" autocomplete="off" type="text">
                            </div>
                            <div style="display: block;" class="input_item bindclear" data-propertyname="password" data-controltype="Password">
                                <input class="input input_white" id="" name="p_pwd" placeholder="请输入密码" data-required="required" autocomplete="off" type="password">
                            </div>
                            <div style="display: none;" class="input_item bindclear" data-propertyname="request_form_verifyCode" data-controltype="VerifyCode">
                                <input class="input input_white fl" style="width:130px !important ; display:block;" id="" name="" placeholder="请证明你不是机器人" data-required="required" autocomplete="off" type="text"><img src="style/bound/create.jpg" class="yzm">
                                <a href="javascript:;" class="reflash"></a>
                            </div>
                            <div style="display: block;" class="input_item bindclear" data-propertyname="submit" data-controltype="Botton">
                                <input class="btn btn_green btn_active btn_block btn_lg" value="绑定" type="button">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </dd>
</dl>
            <!-- 弹窗lightbox -->
<div style="display:none;">
	<!-- 【情况1：第三方首次登录绑定自有帐号】 帐号绑定 : 帐号绑定成功后，未保留的帐号信息将不可恢复 -->	<!--  -->
    <div id="confirmBind1" class="popup " style="overflow:auto;">
	    <input value="1" id="oldAccountSecondConfirm" type="hidden">
	    <div class="user_bindSuccecc">点击“确认绑定”后，您<span>未选择的帐号信息</span> 将被彻底删除，包括： </div>
	    <div class="user_noRecoverInfos">
	    	<p class="noRecoverInfosContent">简历信息、投递记录、发布的职位、收到的简历</p>
	    </div>
        <div class="user_bindBtn"><a href="javascript:;" class="user_confirm click" id="user_confirmBind1">确认绑定</a>
        <a href="javascript:;" class="user_backReplace">返回修改</a></div>
    </div><!--/#confirmUnbind-->

    <!-- 【情况2：自有帐号登录绑定第三方】 帐号绑定 : 帐号绑定成功后，未保留的帐号信息将不可恢复 -->
    <div id="confirmBind2" class="popup " style="overflow:auto;">
	    <div class="user_bindSuccecc">点击“确认绑定”后，您<span>未选择的帐号信息</span> 将被彻底删除，包括：</div>
	    <div class="user_noRecoverInfos">
	    	<!-- <div class="noRecoverInfosTitle">不可恢复信息包括:</div> -->
	    	<p class="noRecoverInfosContent">简历信息、投递记录、发布的职位、收到的简历</p>
	    </div>
        <div class="user_bindBtn"><a href="javascript:;" class="user_confirm click" id="user_confirmBind2">确认绑定</a>
        <a href="javascript:;" class="user_backReplace">返回修改</a></div>
    </div><!--/#confirmUnbind-->
    <!-- 【情况3：第三方首次登录绑定自有帐号 新帐号时点击二次确认按钮】  -->
    <div id="confirmBind3" class="popup " style="overflow:auto;">
    	<input value="3" id="newAccountSecondConfirm" type="hidden">
	    <div class="user_bindSuccecc">点击“确认绑定”后，您<span>未选择的帐号信息</span> 将被彻底删除，包括： </div>
	    <div class="user_noRecoverInfos">
	    	<p class="noRecoverInfosContent">简历信息、投递记录、发布的职位、收到的简历</p>
	    </div>
        <div class="user_bindBtn"><a href="javascript:;" class="user_confirm click" id="newAccount_confirmBind1">确认绑定</a>
        <a href="javascript:;" class="user_backReplace">返回修改</a></div>
    </div><!--/#confirmUnbind-->

    <!-- 帐号绑定 : 绑定时发现需要绑定的帐号已经绑定了其他的帐号时提示  -->
    <div id="bindTips" class="popup" style="overflow:auto;">
     	<table>
         	<tbody><tr>
         		<td>
         			<h3 id="user_hasBindAccount">
         			</h3>
         			<div class="f18">你可以：</div>
         			<ul class="user_canOperatioin">
         				<li>1、重新换一个<span id="accountBindType"></span>帐号进行绑定</li>
         				<li>2、退出当前帐号，<span id="user_loginCurrentAccount"></span></li>
         			</ul>
         		</td>
         	</tr>
         	<tr>
         		<td align="center">
         			<a href="javascript:;" class="btn" id="user_confirmBindTips"><!-- 换个邮箱绑定 --></a>
         			<!-- TODO 重新定义退出的url-->
         			<a id="accountLogout" href="http://account.lagou.com/frontLogout.do" class="cancel">退出当前帐号</a>
         			<a id="passportLogout" href="http://passport.lagou.com/" class="cancel">退出当前帐号</a>
         		</td>
         	</tr>
        </tbody></table>
    </div><!--/#bindTips-->

   	<!--【已有帐号时候】 帐号绑定 : 绑定时发现需要需要绑定的帐号已经存在信息，需要选择保留一个帐号下信息，另一个帐号下信息被覆盖  -->
    <div id="bindReplace" class="popup" style="overflow:hidden; width:500px;height:390px;">
	    <form id="bindReplaceForm" style="width: 100%">
	     	<table height="100%" width="100%">
	         	<tbody><tr>
	         		<td class="border_btm">
	         			<h3>
	         				<div class="f20 c5">请选择需要保留的帐号信息：</div>
	         			</h3>
	         			<div class="red_18">绑定后只能保留一个帐号下的信息，另一个帐号信息将自动被覆盖，不可恢复！</div>
	         		</td>
	         	</tr>
	         	<tr>
	         		<td class="chooseAccount">
	         			<label class="">
	         				<em></em>
	         				<div>
	         					<div class="f16 c7">保留邮箱：<span class="c3" id="user_oldAccount" value="1"></span>帐号下的信息</div>
	         					<div class="acc_detail">
	         						<span>简历完整度：<i id="user_resumeScore"></i>分 </span>
					 				<span>投递职位数：<i id="user_jobCount"></i>个   </span>
					 			</div>
					 			<div class="acc_detail">
									<span>发布职位数：<i id="user_publishJob"></i>个 </span>
									<span>收到简历数：<i id="user_receiveCount"></i>份</span>
								</div>
	         				</div>
	         			</label>
	         			<label>
	         				<em></em>
	         				<div>
	         					<div class="f16 c7 ">保留
	         						<i id="user_typeAccount"></i>：
	         						<span class="c3" id="user_replaceAccount" value="2"></span>帐号下的信息
	         					</div>
	         					<div class="acc_detail">
	         						<span>简历完整度：<i id="user_replaceResumeScore"></i>分 </span>
					 				<span>投递职位数：<i id="user_replaceJobCount"></i>个   </span>
					 			</div>
					 			<div class="acc_detail">
									<span>发布职位数：<i id="user_replacePublishJob"></i>个 </span>
									<span>收到简历数：<i id="user_replaceReceiveCount"></i>份</span>
								</div>
	         					<span class="error" id="chooseRemainError" style="margin:0px;display:none"></span>
	         				</div>

	         			</label>

	         		</td>
	         	</tr>
	         	<tr>

	         		<td align="center">
	         			<a href="javascript:;" class="btn" id="user_confirmReplace">确 定</a>
	         			<a href="javascript:;" class="cancel" id="user_cancleReplace">取 消</a>
	         		</td>

	         	</tr>
	        </tbody></table>

        </form>
    </div><!--/#bindReplace-->

   <!-- 帐号绑定 : 绑定Email -->
   <div id="bindEmail" class="popup user_popup">
			<p class="bding_title">验证你的邮箱地址，完成邮箱帐号的绑定</p>
		   	<div class="form_body clearfix" data-view="emailbinding" style="display: block;">
				<div style="display: block;" class="input_item clearfix" data-propertyname="email" data-controltype="Email">
					<input class="input input_white" name="" placeholder="请输入常用邮箱地址" data-required="required" autocomplete="off" type="text">
				</div>
				<div class="input_item fl clearfix" data-propertyname="submit" data-controltype="Botton" style="margin-top: 26px; display: block;">
					<input class="btn btn_green btn_active btn_lg" value="完成绑定" type="button">
				</div>
				<div class="input_item fl clearfix" data-propertyname="concel" data-controltype="Botton" style="margin-top: 26px; display: block;">
					<input class="btn btn_link btn_lg" value="返回" type="button">
				</div>
			</div>
   </div>
    <div id="confirmbindEmail" class="popup user_popup">
   		<div class="user_confirmUnbind" my-email="验证邮件已发送至：jin@4glte.org"></div>
   		<div class="user_confirm_tips">请在当日内完成验证绑定邮箱帐号。</div>
   		<a href="javascript:;" class="cancel btn">确定</a>

   </div>

   <!-- 帐号绑定 : 邮箱绑定手机号 -->
    <div id="bindPhone" class="popup user_popup">
    	<p class="bding_title" style="margin-bottom:28px">验证你的手机号，完成手机帐号的绑定</p>
	   	 <div class="form_body clearfix" data-view="phonebinding" style="display: block;">
				<div class="input_item clearfix" data-propertyname="phone" data-controltype="Phone" style="display: block;">
					<input class="input input_white" id="" name="" placeholder="请输入常用手机号码" data-required="required" autocomplete="off" type="text">
				</div>
				<div style="display: block;" class="input_item" data-propertyname="verifyCode" data-controltype="PhoneVerificationCode">
					<div class="input_group clearfix">
						<input class="input input_white first_child" id="" name="" placeholder="请输入短信验证码" data-required="required" autocomplete="off" type="text">
						<input class="btn btn_green btn_active btn_lg last_child" value="获取验证码" data-required="required" type="button">
					</div>
				</div>
				<div class="input_item clearfix" data-propertyname="request_form_verifyCode" data-controltype="VerifyCode" style="display:none;">
					<input class="input input_white fl" style="width:130px; display:block;" name="" placeholder="请证明你不是机器人" data-required="required" autocomplete="off" type="text"><img src="style/bound/create.jpg" class="yzm">
					
					<a href="javascript:;" class="reflash"></a>
				</div>
				<div class="input_item fl clearfix" data-propertyname="submit" data-controltype="Botton" style="margin-top: 36px; display: block;">
					<input class="btn btn_green btn_active btn_block btn_lg" value="完成绑定" type="button">
				</div>
				<div class="input_item fl clearfix" data-propertyname="concel" data-controltype="Botton" style="margin-top: 36px; display: block;">
					<input class="btn btn_link btn_lg" value="返回" type="button">
				</div>
			</div>
   </div>
    <div id="confirmbindPhone" class="popup user_popup">
   		<div class="user_confirmUnbind" my-phone="已更换绑定手机  15321919577"></div>
   		<div class="user_confirm_tips">你可以使用此手机号码登录拉勾了</div>
   		<a href="javascript:;" class="cancel btn">确定</a>
   </div>
   <!-- 帐号绑定 : 改变手机号 -->
    <div id="changePhone" class="popup user_popup">
	   	 <p class="bding_title" style="margin-bottom:28px">验证你的手机号，完成手机帐号的绑定</p>
	   	 <div class="form_body clearfix" data-view="phonechange" style="display: block;">
				<div class="input_item clearfix" data-propertyname="phone" data-controltype="Phone" style="display: block;">
					<input class="input input_white" id="" name="" placeholder="请输入常用手机号码" data-required="required" autocomplete="off" type="text">
				</div>
				<div style="display: block;" class="input_item" data-propertyname="verifyCode" data-controltype="PhoneVerificationCode">
					<div class="input_group clearfix">
						<input class="input input_white first_child" id="" name="" placeholder="请输入短信验证码" data-required="required" autocomplete="off" type="text">
						<input class="btn btn_green btn_active btn_lg last_child" value="获取验证码" data-required="required" type="button">
					</div>
				</div>
				<div style="display: block;" class="input_item clearfix" data-propertyname="password" data-controltype="Password">
					<input class="input input_white" id="" name="" placeholder="确认你的登录密码" data-required="required" autocomplete="off" type="password">
				</div>
				<div class="input_item clearfix" data-propertyname="request_form_verifyCode" data-controltype="VerifyCode" style="display:none;">
					<input class="input input_white fl" style="width:130px; display:block;" name="" placeholder="请证明你不是机器人" data-required="required" autocomplete="off" type="text"><img src="style/bound/create.jpg" class="yzm">
					
					<a href="javascript:;" class="reflash"></a>
				</div>
				<div class="input_item fl clearfix" data-propertyname="submit" data-controltype="Botton" style="margin-top: 36px; display: block;">
					<input class="btn btn_green btn_active btn_block btn_lg" value="完成绑定" type="button">
				</div>
				<div class="input_item fl clearfix" data-propertyname="concel" data-controltype="Botton" style="margin-top: 36px; display: block;">
					<input class="btn btn_link btn_lg" value="返回" type="button">
				</div>
			</div>
   </div>

   <!-- 帐号绑定 : 确认取消绑定QQ -->
   <div id="confirmUnbindQQ" class="popup user_popup">
   		<div class="user_confirmUnbind">确认要解除与QQ的绑定吗？</div>
   		<div class="user_confirmNo">确认后，将不能使用QQ登录拉勾网</div>
   		<div class="user_bindBtn user_unbind">
   			<a href="javascript:;" class="user_confirm click" id="user_confirmUnbindQQ">确&nbsp;定</a>
   			<a href="javascript:;" class="cancel">取 消</a>
   		</div>
   </div>

	<!-- 帐号绑定 : 确认取消绑定sina微博 -->

   	 <div id="confirmUnbindSina" class="popup user_popup">
   		<div class="user_confirmUnbind">确认要解除与新浪微博的绑定吗？</div>
   		<div class="user_confirmNo">确认后，将不能使用新浪微博登录拉勾网</div>
   		<div class="user_bindBtn user_unbind">
   			<a href="javascript:;" class="user_confirm click" id="user_confirmUnbindSina">确&nbsp;定</a>
   			<a href="javascript:;" class="cancel">取 消</a>
   		</div>
    </div>

   	<!-- 帐号绑定 : 确认取消绑定微信 -->
   	 <div id="confirmUnbindWeixin" class="popup user_popup">
   		<div class="user_confirmUnbind">确认要解除与微信的绑定吗？</div>
   		<div class="user_confirmNo">确认后，将不能使用微信登录拉勾网</div>
   		<div class="user_bindBtn user_unbind">
   			<a href="javascript:;" class="user_confirm click" id="user_confirmUnbindWeixin">确&nbsp;定</a>
   			<a href="javascript:;" class="cancel">取 消</a>
   		</div>
   </div>

   	<!-- 修改密码 -->
	<div id="updatePassword" class="popup" style="overflow:hidden">
		<h3>修改密码成功，请重新登录</h3>
		<h4><span>5</span>秒后将自动退出</h4>
		<a href="http://account.lagou.com/frontLogout.do" class="btn">直接退出</a>
	</div>

   	<!-- 解除招聘服务 -->
	<div id="unbindService" class="popup" style="overflow:hidden">
		<h3>与当前公司的招聘服务解除成功！</h3>
		<h4><span>5</span>秒后页面将自动跳转至开通招聘服务页</h4>
		<a href="http://account.lagou.com/corpCenter/bindStep1.html" class="btn">立即跳转</a>
	</div>
	<div id="confirm_unbindService" class="popup" style="overflow:hidden">
		<h3>确认解除与当前公司的招聘服务吗？</h3>
		<h4>解除后，您通过该公司发布的职位和收到的简历都将不可见，且不可恢复</h4>
		<div class="confirm_unbindSeerviceBtn">
		<a href="javascript:;" class="btn" id="confirm_unbind">确认解除</a>
    	<a href="javascript:;" class="cancel" id="">取 消</a>
    	</div>
	</div>

</div>
<!-- end -->

            <div class="bindclear"></div>
            <input id="resubmitToken" value="" type="hidden">
            <input id="idCode" value="" type="hidden">
        </div>
        <!--
    @require "account-c/modules/loading/main.less"
-->
<!-- 加载图片盒子 -->
<div id="loadingDiv" class="dn"><img src="style/bound/ajax-loader_50c5e3e.gif" height="32" width="32"></div>
    </div>
    <a style="display: block;" id="backtop" title="回到顶部" rel="nofollow"></a>
<!-- feedback -->
<!--
    @require "common/widgets/footer_c/modules/feedback/feedback.less"
-->

<!--我要反馈按钮-->
<div id="product-fk">
	<div id="feedback-icon">
	<div class="fb-icon"></div>
	<span>我要反馈</span>
	<em class="error dn fk-limit">今天已经反馈足够多了，给产品经理点时间消化下吧~<i></i></em>
	<em class="error dn fk-suc">&nbsp;&nbsp;反馈提交成功！</em>
</div>
</div>

<div id="feedback-con">
	<div class="pfb-pho-close">
		<div class="pfb-pho"></div>
		<div class="pfb-close"></div>
	</div>
	<em class="error dn"><span>你还没填任何反馈呢</span><i></i></em>
	<form id="product-fb">
		<div class="pfb-txt">
			<textarea placeholder="我是拉勾的产品经理哈丁，把你遇到的问题，或是想要的功能告诉我吧（200字以内）" maxlength="200"></textarea>
		</div>
		<div class="pfb-email" style="height:60px;">
			<input name="email" placeholder="留下邮箱方便我们沟通（选填）" type="text">
			<span class="ensure">确定</span>
		</div>
	</form>
</div>

<div id="footer">
    <div class="wrapper">
        <i class="footer_lagou_icon"></i>
        <div class="inner_wrapper">
            <a class="footer_app" href="http://www.lagou.com/app/download.html" rel="nofollow">拉勾APP<span>new</span><img src="style/bound/CgqLKVaLdtWAKVC3AAEEpK9-Koc598.JPG" height="256" width="256"></a>
            <a href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
            <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<img src="style/bound/CgpzWlZNl0qAZitPAABXEpAOJx0071.JPG" height="242" width="242"></a>
            <a href="http://www.lagou.com/topic/whatisnew.html" target="_blank" rel="nofollow">版本更新</a>
            <a href="http://www.lagou.com/qa.html?t=1" target="_blank" rel="nofollow">帮助中心</a>
            <a href="http://www.lagou.com/about.html" target="_blank" rel="nofollow">联系我们</a>
            <a id="onlineService" href="javascript:void(0);" rel="nofollow">在线交流</a>
            <span class="tel">服务热线：<em>400-605-9900 (9:00 -18:00)</em></span>
        </div>
        <div class="copyright">
            <span><em>©</em>2016 Lagou </span>
            <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action" rel="nofollow">京ICP备14023790号-2</a>
            <span>京公网安备11010802017116号</span>
        </div>
    </div>
</div>
    <!-- jquery lib -->    <!-- analytics js file -->    <!-- plat analytics js file -->
<script type="text/javascript" src="style/bound/vendor_8eb7ff4.js"></script>
<script type="text/javascript">/*resourcemap*/
require.config({paths:{
  "common/components/template-helper/main": "http://pstatic.lagou.com/www/static/common/components/template-helper/main_9a48049",
  "common/widgets/common/msgPopup": "http://pstatic.lagou.com/www/static/common/widgets/common/msgPopup_20ea022"
}});</script>
<script type="text/javascript" src="style/bound/main_002.js"></script>
<script type="text/javascript" src="style/bound/widgets_a575c82.js"></script>
<script src="style/bound/h.js" type="text/javascript"></script>
<script type="text/javascript" src="style/bound/userinfo_7f282e9.js"></script>
<script type="text/javascript" src="style/bound/layout_a8cc99d.js"></script>
<script type="text/javascript" src="style/bound/main.js"></script>
<script type="text/javascript">
    require(['common/widgets/header_c/modules/emailvalid/main']);
    require(['common/widgets/passport/passport'], function() {

        /* 设置自动登录监听器 */
        PASSPORT.on('autologin:succ', function() {
            PASSPORT.util.tinfo('autologin:succ');
            window.location.reload();
        });
        PASSPORT.on('autologin:fail', function() {
            PASSPORT.util.tinfo('autologin:fail');
        });
        // 触发自动登录
        PASSPORT.auto();

        /* 设置弹窗登录监听器 */
        PASSPORT.on('popuplogin:succ', function() {
            PASSPORT.util.tinfo('popuplogin:succ');
            window.location.reload();
        });
        PASSPORT.on('popuplogin:fail', function() {
            PASSPORT.util.tinfo('popuplogin:fail');
        });
        // 触发弹窗登录
        //PASSPORT.popup();
        jQuery('.passport_login_pop').each(function() {
            jQuery(this).click(function() {
                PASSPORT.popup();
            });
        });


    });


    require(['account-c/modules/bindEmail/main']);


    require(['account-c/modules/loading/main']);


	require(['common/widgets/footer_c/modules/feedback/feedback']);


    require(['common/widgets/footer_c/layout/main']);

    $(document).ready(function () {
        var trigger = '#onlineService';
        var selector = '#online-chat-QQ';
        if ($(selector).length) { // 无需重复创建DOM节点
            return;
        }

        var $iframe = $('<iframe>', {
            id: selector.slice(1),
            src: 'http://widget.lgstatic.com/online-chat/main_aa75af6.html',
            style: 'margin:0;'
                 + 'padding:0;'
                 + 'width:100%;'
                 + 'height:100%;'
                 + 'border-width:0;'
                 + 'z-index:-99999;'
                 + 'left:0;'
                 + 'top:0;'
                 + 'position:fixed;'
        });
        $(document.body).append($iframe);

        var child = $iframe[0].contentWindow;
        var target = 'http://widget.lgstatic.com';

        $(trigger).on('click', function (e) {
            $iframe.css('z-index', 99999);
            child.postMessage({
                code: 0,
                status: 'open'
            }, target);
        });

        $(window).on('message', function (e) {
            var origin = e.origin || e.originalEvent.origin;
            if (origin.indexOf(target) === 0) { // 务必判断消息来源
                $iframe.css('z-index', -99999);
            }
        });
    });

    $(window).one('scroll', function (e) { // 360安全浏览器8.1版本之后花屏bugfix
        $(document.body).css('width', '100%');

        if (window.location.hash) { // 针对anchor links修复
            setTimeout(function () {
                $(document.body).css('width', 'auto');
            });
        }
    });
</script>



<div style="display: none;" id="cboxOverlay"></div><div style="display: none;" tabindex="-1" role="dialog" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><button id="cboxPrevious" type="button"></button><button id="cboxNext" type="button"></button><button id="cboxSlideshow"></button><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div><iframe style="margin:0;padding:0;width:100%;height:100%;border-width:0;z-index:-99999;left:0;top:0;position:fixed;" src="style/bound/main_aa75af6.htm" id="online-chat-QQ"></iframe></body></html>