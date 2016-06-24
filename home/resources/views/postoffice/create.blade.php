<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb"><head>
</script><script type="text/javascript" async="" src="style/js/conversion.js"></script><script src="style/js/allmobilize.min.js" charset="utf-8" id="allmobilize"></script><style type="text/css"></style>
<meta content="no-siteapp" http-equiv="Cache-Control">
<link  media="handheld" rel="alternate">
<!-- end 云适配 -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>发布新职位-招聘服务-拉勾网-最专业的互联网招聘平台</title>
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
<script type="text/javascript">
    $(function(){
     $.get("{{url('top')}}",function(m){
         $('#cache').html(m);
        
     })
    })

</script> 
<body>
<div id="cache">

</div>	
</body>

<body>
<!-- 头部 -->
<div id="body">


    <div id="container">
        
        	<div class="sidebar">
            	<a class="btn_create" href="create">发布新职位</a>
                <dl class="company_center_aside">
		<dt>我收到的简历</dt>
		<dd>
		<a href="">待处理简历</a> 
			</dd>
	<dd>
		<a href="canInterviewResumes">待定简历</a>
	</dd>
	<dd>
		<a href="haveNoticeResumes">已通知面试简历</a>
	</dd>
	<dd>
		<a href="haveRefuseResumes">不合适简历</a>
	</dd>
	<dd class="btm">
		<a href="autoFilterResumes">自动过滤简历</a> 
			</dd>
</dl>
<dl class="company_center_aside">
		<dt>我发布的职位</dt>
			<dd>
		<a href="positions">有效职位</a>
	</dd>
	<dd>
		<a href="positions">已下线职位</a>
	</dd>
	</dl>
                <div class="subscribe_side mt20">
   <div class="f14">想收到更多更好的简历？</div>
   <div class="f18 mb10">就用拉勾招聘加速助手 </div>
   <div>咨询：<a class="f16" href="mailto:jessica@lagou.com">jessica@lagou.com</a></div>
   <div class="f18 ti2em">010-57286512</div>
</div>
<div class="subscribe_side mt20">
   <div class="f14">加入互联网HR交流群</div>
   <div class="f18 mb10">跟同行聊聊</div>
   <div class="f24">338167634</div>
</div>            </div><!-- end .sidebar -->
            <div class="content">
            	<dl class="company_center_content">
                    <dt>
                        <h1>
                            <em></em>
                                                       		发布新职位
                           	                        </h1>
                    </dt>
                    <dd>
                    	<div class="ccc_tr">今日已发布 <span>0</span> 个职位   还可发布 <span>5</span> 个职位</div>
                    	<form action="{{url('postAdd')}}" method="post" id="jobForm">
                    		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" value="" name="id">
                            <input type="hidden" value="create" name="preview">
                            <input type="hidden" value="25927" name="companyId">
                            <input type="hidden" value="c29d4a7c35314180bf3be5eb3f00048f" name="resubmitToken">
                            <table class="btm">
                            	<tbody><tr>
                                	<td width="25"><span class="redstar">*</span></td>
                                	<td width="85">职位类别</td>
                                	<td>
                                    	<input type="hidden" id="positionType" value="" name="r_major">
                                        <input type="button" value="请选择职位类别" id="select_category" class="selectr selectr_380" >                                      
                                        <div class="dn" id="box_job" style="display: none;">
                                                                                            
                                               
                                            @foreach($arr as $k=>$v)
                                            <dl>
                                                    <dt>{{$v['i_name']}}</dt>
                                                    <dd>
                                                        <ul class="reset job_main">
                                                                                                                            
                                                                    @foreach($v['son'] as $kk=>$vv)

                                                                    <li>
                                                                    <span>{{$vv['i_name']}}</span>
                                                                                                                                        <ul class="reset job_sub dn">
                                                                                                                                                    @foreach($vv['son'] as $kkk=>$vvv)
                                                                                                                                                    <li>{{$vvv['i_name']}}</li>
                                                                                                                                                    @endforeach  
                                                                                                                                            </ul>
                                                                    </li>
                                                                    @endforeach                                                                       
                                                                                                                                    
                                                                                                                           
                                                                    
                                                                                                                    </ul>
                                                    </dd>
                                                </dl> 
                                                @endforeach                                             
                                        </div>
                                    </td>
                                </tr>
                            	<tr>
                                	<td><span class="redstar">*</span></td>
                                	<td>职位名称</td>
                                	<td>
                                    	<input type="text" placeholder="请输入职位名称，如：产品经理" value="" name="r_name" id="positionName">
                                    	                                    </td>
                                </tr>
                       
                            </tbody></table>
                            
                            <table class="btm">
                            	<tbody>                         
                                <tr>
                                	<td width="25"><span class="redstar">*</span></td>
                                	<td width="85">性别要求</td>
                                	<td>
                                    	<ul class="profile_radio clearfix reset">
                                    		                                             
                                                        <li>
                                                           男<em></em>
                                                           <input type="radio" name="r_sex" value="2"> 
                                                        </li>
                                                         
                                                        <li>
                                                           女<em></em>
                                                           <input type="radio" name="r_sex" value="1"> 
                                                       </li>
                                        </ul>

                                    </td>                                                                                                                                                                    
                                </tr>                                                                                                       </ul>
                                <tr>
                                	<td width="25"><span class="redstar">*</span></td>
                                	<td width="85">语言要求</td>
                                	<td>
                                    	<ul class="profile_radio clearfix reset">
                                    		                                             
                                                        <li>
                                                           中文<em></em>
                                                           <input type="radio" name="r_language" value="1"> 
                                                        </li>
                                                         
                                                        <li>
                                                           英文<em></em>
                                                           <input type="radio" name="r_language" value="0"> 
                                                       </li>
                                        </ul>

                                    </td>                                                                                                                                                                    
                                </tr>
                            	<tr>
                                	<td><span class="redstar">*</span></td>
                                	<td>月薪范围</td>
                                    <!--<h3><span>(最高月薪不能大于最低月薪的2倍)</span></h3> -->
                                	<td>
                                    	<div class="salary_range">
                                            <div>
                                                <input type="text" placeholder="最低月薪" value="" id="salaryMin" name="r_pay_down"> 
                                                <span>k</span>
                                            </div>
                                            <div>
                                                <input type="text" placeholder="最高月薪" value="" id="salaryMax" name="r_pay_up"> 
                                                <span>k</span>
                                            </div>
                                            <span>只能输入整数，如：9</span>
                                        </div>
                                    </td>
                                </tr>
                       
                            </tbody></table>

                            <table class="btm">
                            	<tbody><tr>
                                	<td width="25"><span class="redstar">*</span></td>
                                	<td width="85">工作年限</td>
                                	<td>
                                    	<input type="hidden" id="experience" value="" name="workYear">
                                        <input type="button" value="请选择工作年限" id="select_experience" class="selectr selectr_380" name="r_suffer">                                      
                                        <div class="boxUpDown boxUpDown_380 dn" id="box_experience" style="display: none;">
                                            <ul>
                                                                                                    <li>
                                                        不限
                                                    </li>
                                        	 	                                                    <li>
                                                        1年以下
                                                    </li>
                                        	 	                                                    <li>
                                                        1-3年
                                                    </li>
                                        	 	                                                    <li>
                                                        3-5年
                                                    </li>
                                        	 	                                                    <li>
                                                        5-10年
                                                    </li>
                                        	 	                                                    <li>
                                                        10年以上
                                                    </li>
                                        	 	                                            </ul>
                                    	</div>
                                    </td>
                                </tr>
                            	<tr>
                                	<td><span class="redstar">*</span></td>
                                	<td>学历要求</td>
                                    <!--<h3><span>(最高月薪不能大于最低月薪的2倍)</span></h3> -->
                                	<td>
                                    	<input type="hidden" id="education" value="" name="r_edu">
                                        <input type="button" value="请选择学历要求" id="select_education" class="selectr selectr_380" name="r_edu">                                      
                                        <div class="boxUpDown boxUpDown_380 dn" id="box_education" style="display: none;">
                                            <ul>
                                                                                                    <li>
                                                        不限
                                                    </li>
                                        	 	                                                    <li>
                                                        大专
                                                    </li>
                                        	 	                                                    <li>
                                                        本科
                                                    </li>
                                        	 	                                                    <li>
                                                        硕士
                                                    </li>
                                        	 	                                                    <li>
                                                        博士
                                                    </li>
                                        	 	                                            </ul>
                                    	</div>
                                    </td>
                                </tr>
                             
                                <tr>
                                	<td width="25"><span class="redstar">*</span></td>
                                	<td width="85">年龄要求</td>
                                	<td>
                                    	<input type="hidden" id="age" value="" name="workYear">
                                        <input type="button" value="请选择年龄" id="select_age" class="selectr selectr_380" name="r_age">                                      
                                        <div class="boxUpDown boxUpDown_380 dn" id="box_age" style="display: none;">
                                            <ul>
                                                
                                                	@for($i=18;$i < 60;$i++)
                                                	<li>
                                                     {{$i}}
                                                    </li>
                                                	@endfor
                                                
                                        	 	                                            </ul>
                                    	</div>
                                    </td>
                                </tr>
                               
                            </tbody></table>
                           
                            <table class="btm">
                            	<tbody>
                            	<tr>
                                	<td><span class="redstar">*</span></td>
                                	<td>职位描述</td>
                                	<td>
                                    	<span class="c9 f14">(建议分条描述工作职责等。请勿输入公司邮箱、联系电话及其他外链，否则将自动删除)</span>
                                    	
                                        <textarea name="r_describe" id="positionDetail" class="tinymce" style="display: none;" aria-hidden="true"></textarea><span role="application" aria-labelledby="positionDetail_voice" id="positionDetail_parent" class="mceEditor defaultSkin"><span class="mceVoiceLabel" style="display:none;" id="positionDetail_voice">富文本域</span><table cellspacing="0" cellpadding="0" role="presentation" id="positionDetail_tbl" class="mceLayout" style="width: 544px; height: 276px;"><tbody><tr role="presentation" class="mceFirst"><td class="mceToolbar mceLeft mceFirst mceLast" role="toolbar"><div aria-labelledby="positionDetail_toolbargroup_voice" role="group" id="positionDetail_toolbargroup" tabindex="-1"><span role="application"><span style="display:none;" class="mceVoiceLabel" id="positionDetail_toolbargroup_voice">工具栏</span><table align="" cellspacing="0" cellpadding="0" tabindex="-1" role="presentation" class="mceToolbar mceToolbarRow1 Enabled" id="positionDetail_toolbar1" aria-disabled="false" aria-pressed="false"><tbody><tr><td class="mceToolbarStart mceToolbarStartButton mceFirst"><span><!-- IE --></span></td><td style="position: relative"><a title="粗体(Ctrl B)" aria-labelledby="positionDetail_bold_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_bold" href="javascript:;" id="positionDetail_bold" role="button" tabindex="-1"><span class="mceIcon mce_bold"></span><span id="positionDetail_bold_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">粗体(Ctrl B)</span></a></td><td style="position: relative"><a title="斜体(Ctrl I)" aria-labelledby="positionDetail_italic_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_italic" href="javascript:;" id="positionDetail_italic" role="button" tabindex="-1"><span class="mceIcon mce_italic"></span><span id="positionDetail_italic_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">斜体(Ctrl I)</span></a></td><td style="position: relative"><a title="下划线(Ctrl U)" aria-labelledby="positionDetail_underline_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_underline" href="javascript:;" id="positionDetail_underline" role="button" tabindex="-1"><span class="mceIcon mce_underline"></span><span id="positionDetail_underline_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">下划线(Ctrl U)</span></a></td><td style="position: relative"><span tabindex="-1" aria-orientation="vertical" role="separator" class="mceSeparator"></span></td><td style="position: relative"><a title="左对齐" aria-labelledby="positionDetail_justifyleft_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_justifyleft" href="javascript:;" id="positionDetail_justifyleft" role="button" tabindex="-1"><span class="mceIcon mce_justifyleft"></span><span id="positionDetail_justifyleft_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">左对齐</span></a></td><td style="position: relative"><a title="居中" aria-labelledby="positionDetail_justifycenter_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_justifycenter" href="javascript:;" id="positionDetail_justifycenter" role="button" tabindex="-1"><span class="mceIcon mce_justifycenter"></span><span id="positionDetail_justifycenter_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">居中</span></a></td><td style="position: relative"><a title="右对齐" aria-labelledby="positionDetail_justifyright_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_justifyright" href="javascript:;" id="positionDetail_justifyright" role="button" tabindex="-1"><span class="mceIcon mce_justifyright"></span><span id="positionDetail_justifyright_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">右对齐</span></a></td><td style="position: relative"><span tabindex="-1" aria-orientation="vertical" role="separator" class="mceSeparator"></span></td><td style="position: relative"><a title="项目列表" aria-labelledby="positionDetail_bullist_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_bullist" href="javascript:;" id="positionDetail_bullist" role="button" tabindex="-1" aria-pressed="false"><span class="mceIcon mce_bullist"></span><span id="positionDetail_bullist_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">项目列表</span></a></td><td style="position: relative"><a title="编号列表" aria-labelledby="positionDetail_numlist_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_numlist" href="javascript:;" id="positionDetail_numlist" role="button" tabindex="-1" aria-pressed="false"><span class="mceIcon mce_numlist"></span><span id="positionDetail_numlist_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">编号列表</span></a></td><td style="position: relative"><span tabindex="-1" aria-orientation="vertical" role="separator" class="mceSeparator"></span></td><td style="position: relative"><a title="减少缩进" aria-labelledby="positionDetail_outdent_voice" onclick="return false;" onmousedown="return false;" class="mceButton mce_outdent mceButtonDisabled" href="javascript:;" id="positionDetail_outdent" role="button" tabindex="-1" aria-disabled="true"><span class="mceIcon mce_outdent"></span><span id="positionDetail_outdent_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">减少缩进</span></a></td><td style="position: relative"><a title="增加缩进" aria-labelledby="positionDetail_indent_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_indent" href="javascript:;" id="positionDetail_indent" role="button" tabindex="-1"><span class="mceIcon mce_indent"></span><span id="positionDetail_indent_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">增加缩进</span></a></td><td style="position: relative"><span tabindex="-1" aria-orientation="vertical" role="separator" class="mceSeparator"></span></td><td style="position: relative"><a title="撤销 (Ctrl Z)" aria-labelledby="positionDetail_undo_voice" onclick="return false;" onmousedown="return false;" class="mceButton mce_undo mceButtonDisabled" href="javascript:;" id="positionDetail_undo" role="button" tabindex="-1" aria-disabled="true"><span class="mceIcon mce_undo"></span><span id="positionDetail_undo_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">撤销 (Ctrl Z)</span></a></td><td style="position: relative"><a title="恢复 (Ctrl Y)" aria-labelledby="positionDetail_redo_voice" onclick="return false;" onmousedown="return false;" class="mceButton mce_redo mceButtonDisabled" href="javascript:;" id="positionDetail_redo" role="button" tabindex="-1" aria-disabled="true"><span class="mceIcon mce_redo"></span><span id="positionDetail_redo_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">恢复 (Ctrl Y)</span></a></td><td style="position: relative"><span tabindex="-1" aria-orientation="vertical" role="separator" class="mceSeparator"></span></td><td style="position: relative"><a title="插入/编辑 超链接" aria-labelledby="positionDetail_link_voice" onclick="return false;" onmousedown="return false;" class="mceButton mce_link mceButtonDisabled" href="javascript:;" id="positionDetail_link" role="button" tabindex="-1" aria-disabled="true"><span class="mceIcon mce_link"></span><span id="positionDetail_link_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">插入/编辑 超链接</span></a></td><td style="position: relative"><a title="取消超链接" aria-labelledby="positionDetail_unlink_voice" onclick="return false;" onmousedown="return false;" class="mceButton mce_unlink mceButtonDisabled" href="javascript:;" id="positionDetail_unlink" role="button" tabindex="-1" aria-disabled="true"><span class="mceIcon mce_unlink"></span><span id="positionDetail_unlink_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">取消超链接</span></a></td><td style="position: relative"><span tabindex="-1" aria-orientation="vertical" role="separator" class="mceSeparator"></span></td><td style="position: relative"><a title="插入水平线" aria-labelledby="positionDetail_hr_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_hr" href="javascript:;" id="positionDetail_hr" role="button" tabindex="-1"><span class="mceIcon mce_hr"></span><span id="positionDetail_hr_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">插入水平线</span></a></td><td style="position: relative"><a title="切换全屏模式" aria-labelledby="positionDetail_fullscreen_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_fullscreen" href="javascript:;" id="positionDetail_fullscreen" role="button" tabindex="-1" aria-pressed="false"><span class="mceIcon mce_fullscreen"></span><span id="positionDetail_fullscreen_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">切换全屏模式</span></a></td><td style="position: relative"><a title="插入/编辑 图片" aria-labelledby="positionDetail_image_voice" onclick="return false;" onmousedown="return false;" class="mceButton mceButtonEnabled mce_image" href="javascript:;" id="positionDetail_image" role="button" tabindex="-1"><span class="mceIcon mce_image"></span><span id="positionDetail_image_voice" style="display: none;" class="mceVoiceLabel mceIconOnly">插入/编辑 图片</span></a></td><td class="mceToolbarEnd mceToolbarEndButton mceLast"><span><!-- IE --></span></td></tr></tbody></table></span></div><a onfocus="tinyMCE.getInstanceById('positionDetail').focus();" title="转到工具按钮 - Alt-Q，转到编辑器 - Alt-Z，转到元素路径 - Alt-X。" accesskey="z" ><!-- IE --></a></td></tr><tr class="mceLast"><td class="mceIframeContainer mceFirst mceLast"><iframe frameborder="0" id="positionDetail_ifr" src="javascript:&quot;&quot;" allowtransparency="true" title="富文本域按 ALT-F10 定位到工具栏.按 ALT-0 获取帮助。" style="width: 100%; height: 253px; display: block;"></iframe></td></tr></tbody></table></span>
                                       	
                                    </td>
                                </tr>
                                <tr>
                                	<td><span class="redstar">*</span></td>
                                	<td>工作地址</td>
                                	<td>
                                    	<input type="text" placeholder="请输入详细的工作地址" value="" name="positionAddress" class="input_520" id="positionAddress">	
                                        <input type="hidden" value="" name="positionLng" id="lng">
                            			<input type="hidden" value="" name="positionLat" id="lat">
                                        <div class="work_place f14">我们将在职位详情页以地图方式精准呈现给用户  <a id="mapPreview" href="javascript:;">预览地图</a></div>
                                    </td>
                                </tr>
                            </tbody></table>
                            
                            <table>
                                <tr>
                                	<td width="25"></td>
                                	<td colspan="2">
                                    	<input type="submit" value="预览" id="jobPreview" class="btn_32">
                                    	<input type="button" value="发布" id="formSubmit" class="btn_32">
                                    </td>
                                </tr>
                         	</tbody></table>
                        </form>
                    </dd>
                </dl>
            </div><!-- end .content -->

<!------------------------------------- 弹窗lightbox ----------------------------------------->
<div style="display:none;">
	<!--联系方式弹窗-->	
        <div style="height:180px;" class="popup" id="telTip">
	        <form id="telForm">
	        	<table width="100%">
	            	<tbody><tr>
	            		<td align="center" class="f18">留个联系方式方便我们联系你吧！</td>
	            	</tr>
	            	<tr>
	                	<td align="center">
							<input type="text" maxlength="49" placeholder="请输入你的手机号码或座机号码" name="tel">
							<span style="display:none;" class="error" id="telError"></span>
						</td>
	                </tr>
	                <tr>
	                	<td align="center">
	                		<input type="submit" value="提交" class="btn">
	                	</td>
	                </tr>
	            </tbody></table>
            </form>
        </div><!--/#telTip-->
        
    <!--地图弹窗-->	
        <div class="popup" id="baiduMap">
        	<div class="mb10">点击地图可重新定位公司所在的位置</div>
	        <div id="allmap" style="overflow: hidden; position: relative; z-index: 0; 
	        background-color: rgb(243, 241, 236); color: rgb(0, 0, 0); text-align: left;">
	        <div style="overflow: visible; position: absolute; z-index: 0; left: 0px; top: 0px; cursor: grab;">
	        <div class="BMap_mask" style="position: absolute; left: 0px; top: 0px; z-index: 9; overflow: hidden; width: 0px; height: 0px;">
	        	
	        </div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;">
	        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 800;">
	        	
	        </div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 700;">
	        	
	        </div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 600;">
	        	
	        </div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 500;">
	        <label class="BMapLabel" unselectable="on" style="position: absolute; -moz-user-select: none; display: none; cursor: inherit; background-color: rgb(190, 190, 190); border: 1px solid rgb(190, 190, 190); padding: 1px; white-space: nowrap; font: 12px arial,simsun,sans-serif; z-index: -20000; color: rgb(190, 190, 190);">shadow</label></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 400;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 300;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 201;"></div><div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;"></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 1;"><div style="position: absolute; overflow: visible; z-index: -100; left: 0px; top: 0px; display: none;"></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 2; display: block;"><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 0; display: block;"><canvas style="position: absolute; width: 256px; height: 256px; left: -74px; top: -213px; background: none repeat scroll 0% 0% rgb(243, 241, 236);" width="256" height="256" id="_1_bg_6323_2355_15"></canvas></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 10; display: block;"><canvas style="position: absolute; width: 256px; height: 256px; left: -74px; top: -213px;" width="256" height="256" id="_1_poi_6323_2355_15"></canvas></div></div><div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 3;"></div></div><div style="position: absolute; z-index: 1201; top: 10px; right: 10px; width: 17px; height: 16px; background: url(style/images/img/st-close.pngquot) no-repeat scroll 0% 0% transparent; cursor: pointer; display: none;" title="退出全景"></div><div style="height: 32px; position: absolute; z-index: 30; -moz-user-select: none; bottom: 0px; right: auto; top: auto; left: 1px; display: none;" class=" anchorBL"><a title="到百度地图查看此区域" target="_blank" href="http://map.baidu.com/?sr=1" style="outline: medium none;"><img src="style/images/copyright_logo.png" style="border:none;width:77px;height:32px"></a></div><div style="position:absolute;z-index:0;top:0px;left:0px;overflow:hidden;visibility:hidden;cursor:-moz-grab" id="zoomer"><div style="top:0;left:0;" class="BMap_zoomer"></div><div style="top:0;right:0;" class="BMap_zoomer"></div><div style="bottom:0;left:0;" class="BMap_zoomer"></div><div style="bottom:0;right:0;" class="BMap_zoomer"></div></div><div unselectable="on" class=" BMap_stdMpCtrl BMap_stdMpType0 BMap_noprint anchorTL" style="width: 62px; height: 186px; bottom: auto; right: auto; top: 10px; left: 10px; position: absolute; z-index: 1100; -moz-user-select: none;"><div class="BMap_stdMpPan"><div title="向上平移" class="BMap_button BMap_panN"></div><div title="向左平移" class="BMap_button BMap_panW"></div><div title="向右平移" class="BMap_button BMap_panE"></div><div title="向下平移" class="BMap_button BMap_panS"></div><div class="BMap_stdMpPanBg BMap_smcbg"></div></div><div class="BMap_stdMpZoom" style="height: 141px; width: 62px;"><div title="放大一级" class="BMap_button BMap_stdMpZoomIn"><div class="BMap_smcbg"></div></div><div title="缩小一级" class="BMap_button BMap_stdMpZoomOut" style="top: 120px;"><div class="BMap_smcbg"></div></div><div class="BMap_stdMpSlider" style="height: 102px;"><div class="BMap_stdMpSliderBgTop" style="height: 102px;"><div class="BMap_smcbg"></div></div><div class="BMap_stdMpSliderBgBot" style="top: 19px; height: 87px;"></div><div title="放置到此级别" class="BMap_stdMpSliderMask"></div><div title="拖动缩放" class="BMap_stdMpSliderBar" style="cursor: grab; top: 19px;"><div class="BMap_smcbg"></div></div></div><div class="BMap_zlHolder"><div class="BMap_zlSt"><div class="BMap_smcbg"></div></div><div class="BMap_zlCity"><div class="BMap_smcbg"></div></div><div class="BMap_zlProv"><div class="BMap_smcbg"></div></div><div class="BMap_zlCountry"><div class="BMap_smcbg"></div></div></div></div></div><div unselectable="on" style="bottom: auto; right: 10px; top: 10px; left: auto; white-space: nowrap; cursor: pointer; position: absolute; z-index: 10; -moz-user-select: none;" class=" BMap_noprint anchorTR"><div style="-moz-user-select: none; float: left;"><div style="-moz-user-select: none; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.35); border-left: 1px solid rgb(139, 164, 220); border-top: 1px solid rgb(139, 164, 220); border-bottom: 1px solid rgb(139, 164, 220); background: none repeat scroll 0% 0% rgb(142, 168, 224); padding: 2px 6px; font: bold 12px/1.3em arial,simsun,sans-serif; text-align: center; white-space: nowrap; border-radius: 3px 0px 0px 3px; color: rgb(255, 255, 255);" title="显示普通地图">地图</div></div><div style="-moz-user-select: none; float: left;"><div style="-moz-user-select: none; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.35); border-left: 1px solid rgb(139, 164, 220); border-top: 1px solid rgb(139, 164, 220); border-bottom: 1px solid rgb(139, 164, 220); background: none repeat scroll 0% 0% rgb(255, 255, 255); padding: 2px 6px; font-family: arial,simsun,sans-serif; font-style: normal; font-variant: normal; font-size: 12px; line-height: 1.3em; font-size-adjust: none; font-stretch: normal; -moz-font-feature-settings: normal; -moz-font-language-override: normal; text-align: center; white-space: nowrap; color: rgb(0, 0, 0);" title="显示卫星影像">卫星</div><div style="-moz-user-select: none; position: absolute; top: 0px; left: 0px; z-index: -1; display: none;"><div style="border-right:1px solid #8ba4dc;border-bottom:1px solid #8ba4dc;border-left:1px solid #8ba4dc;background:white;font:12px arial,simsun,sans-serif;padding:0 8px 0 6px;line-height:1.6em;box-shadow:2px 2px 3px rgba(0, 0, 0, 0.35)" title="显示带有街道的卫星影像"><span class="BMap_checkbox" "="" checked="checked"></span><label style="vertical-align: middle; cursor: pointer;">混合</label></div></div></div><div style="-moz-user-select: none; float: left;"><div style="-moz-user-select: none; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.35); border-left: 1px solid rgb(139, 164, 220); border-width: 1px; border-style: solid; border-color: rgb(139, 164, 220); background: none repeat scroll 0% 0% rgb(255, 255, 255); padding: 2px 6px; font-family: arial,simsun,sans-serif; font-style: normal; font-variant: normal; font-size: 12px; line-height: 1.3em; font-size-adjust: none; font-stretch: normal; -moz-font-feature-settings: normal; -moz-font-language-override: normal; text-align: center; white-space: nowrap; border-radius: 0px 3px 3px 0px; color: rgb(0, 0, 0);" title="显示三维地图">三维</div></div></div><div unselectable="on" class=" BMap_scaleCtrl BMap_noprint anchorBL" style="bottom: 18px; right: auto; top: auto; left: 81px; width: 88px; position: absolute; z-index: 10; -moz-user-select: none;"><div unselectable="on" class="BMap_scaleTxt" style="background-color: transparent; color: black;">500&nbsp;米</div><div class="BMap_scaleBar BMap_scaleHBar" style="background-color: black;"><img src="style/images/mapctrls.png" style="border:none"></div><div class="BMap_scaleBar BMap_scaleLBar" style="background-color: black;"><img src="style/images/mapctrls.png" style="border:none"></div><div class="BMap_scaleBar BMap_scaleRBar" style="background-color: black;"><img src="style/images/mapctrls.png" style="border:none"></div></div><div unselectable="on" class=" BMap_omCtrl BMap_ieundefined BMap_noprint anchorBR quad4" style="width: 13px; height: 13px; bottom: 0px; right: 0px; top: auto; left: auto; position: absolute; z-index: 10; -moz-user-select: none;"><div class="BMap_omOutFrame" style="width: 149px; height: 149px;"><div class="BMap_omInnFrame" style="bottom: auto; right: auto; top: 5px; left: 5px; width: 142px; height: 142px;"><div class="BMap_omMapContainer"></div><div class="BMap_omViewMv" style="cursor: grab;"><div class="BMap_omViewInnFrame"><div></div></div></div></div></div><div class="BMap_omBtn BMap_omBtnClosed" style="bottom: 0px; right: 0px; top: auto; left: auto;"></div></div><div unselectable="on" class=" BMap_cpyCtrl BMap_noprint anchorBL" style="cursor: default; white-space: nowrap; -moz-user-select: none; color: black; background: none repeat scroll 0% 0% transparent; font: 11px/15px arial,simsun,sans-serif; bottom: 2px; right: auto; top: auto; left: 4px; position: absolute; z-index: 10;"><span _cid="1" style="display: inline;"><span style="font-size:11px">&copy; 2014 Baidu&nbsp;- Data &copy; <a style="display:inline;" href="http://www.navinfo.com/" target="_blank">NavInfo</a> &amp; <a style="display:inline;" href="http://www.cennavi.com.cn/" target="_blank">CenNavi</a> &amp; <a style="display:inline;" href="http://www.365ditu.com/" target="_blank">道道通</a></span></span></div></div>
        </div><!--/#baiduMap-->
</div>
<!------------------------------------- end ----------------------------------------->
<!-- <script type="text/javascript" src="style/js/tinymce.min.js"></script>
<script>
$(function(){
		
	/*textarea 编辑器*/
	tinymce.init({
	    selector: "textarea.tinymce",
	    // width: 100,
	    height: 225,
		language: "zh_CN",
		content_css: ctx + "/js/tinymce4/content.css",
		plugins: "contextmenu autolink code paste searchreplace",
	    contextmenu: "copy cut paste",
	    // paste_word_valid_elements: "",
	    paste_as_text: true,
	    // paste_webkit_styles: "color",//all | none
	    // paste_retain_style_properties: "font-size",//
	    menubar: false,
	    statusbar: false,
	    toolbar: [
	    	"undo redo | bold italic underline strikethrough | bullist numlist | alignleft aligncenter alignright | removeformat | code"
	    ],
	    save_enablewhendirty: function(e) {
	        console.log('dirty',e);
	    },
	    save_onsavecallback: function(e){
	        console.log('save',e);
	    },
	    setup: function (editor) {
	        editor.on('keyup', function (e) {  
	        	tinyMCE.triggerSave();
	        	var editorContent = tinyMCE.get(editor.id).getContent();
			    if(editorContent.length > 20){
					$("#" + editor.id).valid();
			    }
	        });
	    }
	});
});
</script> -->

<!-- old -->
<script src="style/js/jquery.tinymce.js" type="text/javascript"></script>
<script>
$(function(){
		
	/***********************************************
	** textarea 编辑器
	*/
	$('textarea.tinymce').tinymce({
		// Location of TinyMCE script
		script_url : ctx+'/js/tinymce/jscripts/tiny_mce/tiny_mce.js',

		// General options
		theme : "advanced",
		language : "zh-cn",
		plugins : "paste,autolink,lists,style,layer,save,advhr,advimage,advlink,iespell,inlinepopups,preview,media,searchreplace,contextmenu,fullscreen,noneditable,visualchars,nonbreaking",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,|,hr,fullscreen,image",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "none",//定义输入框下方是否显示状态栏，默认不显示
		theme_advanced_resizing : false,
		paste_auto_cleanup_on_paste: true,
		paste_as_text: true,
		auto_cleanup_word:true,
		paste_remove_styles: true,
		contextmenu: "copy cut paste",
        force_br_newlines: true,
        force_p_newlines: false,
        apply_source_formatting: false,
        remove_linebreaks: false,
        convert_newlines_to_brs: true,

		// Example content CSS (should be your site CSS)
		content_css : ctx+"/js/tinymce/examples/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		},
		onchange_callback: function(editor){
	        tinyMCE.triggerSave();
	        var editorContent = tinyMCE.get(editor.id).getContent();
		    if(editorContent.length &gt; 20){
				$("#" + editor.id).valid();
		    }
	    } 
	});
	
	$('#workAddress').focus(function(){
		$('#beError').hide();
	});
});
</script>
<!-- end old -->

<script src="style/js/jobs.min.js" type="text/javascript"></script>
<script src="http://api.map.baidu.com/api?v=2.0&amp;ak=A2c1a1ff1fe0750e3290660295aac602" type="text/javascript"></script><script src="http://api.map.baidu.com/getscript?v=2.0&amp;ak=A2c1a1ff1fe0750e3290660295aac602&amp;services=&amp;t=20140617153133" type="text/javascript"></script>
<script type="text/javascript">
//百度地图API功能
var map = new BMap.Map("allmap");
//控件添加
map.addControl(new BMap.NavigationControl());
map.addControl(new BMap.MapTypeControl());
map.addControl(new BMap.ScaleControl());
map.addControl(new BMap.OverviewMapControl());

var point = new BMap.Point(116.331398,39.897445);//初始化坐标点
map.centerAndZoom(point, 15);
/* map.centerAndZoom(, 15); */
map.enableScrollWheelZoom(true);//允许缩放
var gc = new BMap.Geocoder();//地址定位
var local = new BMap.LocalSearch(map, {
	  renderOptions:{map: map}
});
function showInfo(e){
	 map.clearOverlays();//清除所有覆盖物
	 //map.centerAndZoom(new BMap.Point(olng, olat), 11);//重定义中心点
	 //alert(e.point.lng + ", " + e.point.lat);
	 var marker = new BMap.Marker(new BMap.Point(e.point.lng, e.point.lat));  // 创建标注
	 marker.addEventListener("mouseup",function(em){//覆盖物监听事件--释放鼠标时定位覆盖物位置
		var pt = em.point;//移动后重新定位
		gc.getLocation(pt, function(rs){
		   var addComp = rs.addressComponents;
		   var label = new BMap.Label("我的坐标："+em.point.lng + ", " + em.point.lat+"  我的地址："+addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber,{offset:new BMap.Size(20,-10)});
			// marker.setLabel(label);//新坐标-新地址
			 if(rs){
	 				 var sContent =
					"&lt;h4 style='margin:0 0 5px 0;padding:0.2em 0'&gt;"+addComp.province+"&lt;/h4&gt;" + 
					"&lt;p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'&gt;"+rs.address+"&lt;/p&gt;" + 
					"&lt;/div&gt;";
				 	var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
				 	//图片加载完毕重绘infowindow
			 		marker.openInfoWindow(infoWindow);
	 			}
			
			  $('#lat').val(em.point.lat);
			  $('#lng').val(em.point.lng);
		});
	});
	marker.enableDragging();    //可拖拽
	map.addOverlay(marker);     // 将标注添加到地图中
	
	 /////////////////////地址定位
	 var pt = e.point;
	gc.getLocation(pt, function(rs){
	    var addComp = rs.addressComponents;
	    var label = new BMap.Label("我的坐标："+e.point.lng + ", " + e.point.lat+"  我的地址："+addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber,{offset:new BMap.Size(20,-10)});
	 			//marker.setLabel(label);
	 			if(rs){
	 				 var sContent =
					"&lt;h4 style='margin:0 0 5px 0;padding:0.2em 0'&gt;"+addComp.province+"&lt;/h4&gt;" + 
					"&lt;p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'&gt;"+rs.address+"&lt;/p&gt;" + 
					"&lt;/div&gt;";
				 	var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
				 	//图片加载完毕重绘infowindow
			 		marker.openInfoWindow(infoWindow);
	 			}  
	 			
	 		$('#lat').val(e.point.lat);
			$('#lng').val(e.point.lng);
	});
	
	//////////////////////重置中心点
	 olng = e.point.lng;
	 olat = e.point.lat;
}
map.addEventListener("click", showInfo);//地图点击事件

$(function(){
	$('#mapPreview').bind('click',function(){
		$.colorbox({inline:true, href:"#baiduMap",title:"公司地址"});
		var address = $('#positionAddress').val();
		var city = $('#workAddress').val();
	    map.setCurrentCity(city);
	    map.setZoom(15);
		gc.getPoint(address, function(point){
		  if (point) { 
		    map.centerAndZoom(point, 15);
			map.setZoom(15);
	    	map.setCenter(point);
		   	local.search(address);
		  }
		}, city); 
		/* map.addEventListener("tilesloaded",function(){
	    	map.setZoom(15);
	    }); */
	});
});
</script>

			<div class="clear"></div>
			<input type="hidden" value="c29d4a7c35314180bf3be5eb3f00048f" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
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


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>