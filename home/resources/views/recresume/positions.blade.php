﻿<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb"><head>
<script async="" src="style/js/analytics.js"></script><script type="text/javascript" async="" src="style/js/conversion.js"></script><script src="style/js/allmobilize.min.js" charset="utf-8" id="allmobilize"></script><style type="text/css"></style>
<meta content="no-siteapp" http-equiv="Cache-Control">
<link  media="handheld" rel="alternate">
<!-- end 云适配 -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>我发布的职位-招聘服务-强强联合-最专业的互联网招聘平台</title>
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
<script src="style/js/ajaxCross.json" charset="UTF-8"></script></head>
<script type="text/javascript">
    $(function(){
     $.get("{{url('top')}}",function(m){
         $('#cache').html(m);
        
     })
    })

</script>
<body>
	<!--头部-->
<div id="cache" style="padding-bottom:20px;">

</div>
</body>
<body>

<div id="body">

    <div id="container">
                	<div class="sidebar">
            	<a class="btn_create" href="create">发布新职位</a>
                <dl class="company_center_aside">
		<dt>我收到的简历</dt>
		<dd>
		<a href="unHandleResumes">待处理简历</a> 
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
			<dd class="current">
		<a href="positions">有效职位</a>
	</dd>
	<dd>
		<a href="aaaa">已下线职位</a>
	</dd>
	</dl>
            </div><!-- end .sidebar -->
            <div class="content">
            	<dl class="company_center_content">
                    <dt>
                        <h1>
                            <em></em>
                           有效职位 <span>（共<i style="color:#fff;font-style:normal" id="positionNumber">{{$num}}</i>个）</span>                        </h1>
                    </dt>
                    
                    <dd>
                    @foreach($res as $v)	
                    		                    	<form id="searchForm">
	                    		<input type="hidden" value="Publish" name="type">
			                	<ul class="reset my_jobs">
				                			                            	<li data-id="149594">
		                                    <h3>
		                                        <a target="_blank" title="随便写" href="">{{$v->r_major}}</a> 
		                                        <span>[{{$v->r_place}}]</span>
		                                        						                        		                                    </h3>
		                                    		                                  		<span class="receivedResumeNo"><a href="">应聘简历（{{$v->rec_id}}）</a></span>
		                                  			                                    <div>
		                                  			                                    	@if($v->r_iflogbook == 0)
		                                  			                                    	
                                                                                                非全日制                                                                 
		                                  			                                        
		                                  			                                        @else
		                                  			                                        
                                                                                                全日制                        
		                                  			                                        
		                                  			                                        @endif
		                                  			                                    	/
		                                  			                                    	{{$v->r_pay}}k
		                                  			                                    	/
		                                  			                                    	@if($v->r_suffer == 0)
		                                  			                                    	
                                                                                                应届生   
		                                  			                                        
		                                  			                                        @elseif($v->r_suffer == 1)
		                                  			                                        
                                                                                                无经验
		                                  			                                        
		                                  			                                        @elseif($v->r_suffer == 2)
		                                  			                                        
                                                                                                1年以下
		                                  			                                        
		                                  			                                        @elseif($v->r_suffer == 3)
		                                  			                                        
                                                                                                1-3年
		                                  			                                        
		                                  			                                        @elseif($v->r_suffer == 4)
		                                  			                                        
                                                                                                3-5年
		                                  			                                        
		                                  			                                        @elseif($v->r_suffer == 5)
		                                  			                                        
                                                                                                5-10年
		                                  			                                        
		                                  			                                        @elseif($v->r_suffer == 6)
		                                  			                                        
                                                                                                10年以上
		                                  			                                        
		                                  			                                        @endif
		                                  			                                        / 
		                                  			                                    	@if($v->r_edu == 0)
		                                  			                                    	
                                                                                                初中 
		                                  			                                        
		                                  			                                        @elseif($v->r_edu == 1)
		                                  			                                        
                                                                                                高中
		                                  			                                        
		                                  			                                        @elseif($v->r_edu == 2)
		                                  			                                        
                                                                                                中技
		                                  			                                        
		                                  			                                        @elseif($v->r_edu == 3)
		                                  			                                        
                                                                                                中专
		                                  			                                        
		                                  			                                        @elseif($v->r_edu == 4)
		                                  			                                       
                                                                                                大专
		                                  			                                        
		                                  			                                        @elseif($v->r_edu == 5)
		                                  			                                        
                                                                                                本科
		                                  			                                        
		                                  			                                        @elseif($v->r_edu == 6)
		                                  			                                        
                                                                                                硕士
		                                  			                                        
		                                  			                                        @elseif($v->r_edu == 7)
		                                  			                                        
                                                                                                博士
		                                  			                                        
		                                  			                                        @elseif($v->r_edu == 8)
		                                  			                                        
                                                                                                博后
		                                  			                                        
		                                  			                                        @endif


		                                  			                                    </div>
		                                    		                                    				                                    <div class="c9">发布时间：{{$v->r_addtime}}</div>
			                                    		                                    		                                    		                                    <div class="links">
		                                    			                                       	
		                                       			                                       	<a class="job_edit" href="{{url('ptedit')}}?id={{$v->rec_id}}">编辑</a>
		                                       	<a href="{{url('ptup')}}?id={{$v->rec_id}}">上线</a>                      
		                                        <a class="job_del" href="{{url('ptdel')}}?id={{$v->rec_id}}">删除</a>

		                                    </div>
		                                    		                                </li>
	                                	                           	</ul>
			                    			                </form>
			                    			@endforeach 
		                                    </dd>
		                                    {!! $res->render() !!}
		                                    <div class="Pagination">{!! $res->render() !!}</div>
		            
                </dl>
            </div>

            <!-- end .content -->
<script src="style/js/job_list.min.js" type="text/javascript"></script> 
			<div class="clear"></div>
			<input type="hidden" value="74fb1ce14ebf4e2495270b0fbad64704" id="resubmitToken">
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
<script src="style/js/tongji.js" type="text/javascript"></script>
<!--  -->
<script src="style/js/analytics01.js" type="text/javascript"></script><script type="text/javascript" src="style/js/h.js"></script>
<script type="text/javascript">
$(function(){
	$('#noticeDot-1').hide();
	$('#noticeTip a.closeNT').click(function(){
		$(this).parent().hide();
	});

	$('.Pagination').pager({
		      currPage: 1,
		      pageNOName: "page",
		      form: "searchForm",
		      pageCount: 30,
		      pageSize:  5 
		});
});
var index = Math.floor(Math.random() * 2);
var ipArray = new Array('42.62.79.226','42.62.79.227');
var url = "ws://" + ipArray[index] + ":18080/wsServlet?code=314873";
var CallCenter = {
		init:function(url){
			var _websocket = new WebSocket(url);
			_websocket.onopen = function(evt) {
				console.log("Connected to WebSocket server.");
			};
			_websocket.onclose = function(evt) {
				console.log("Disconnected");
			};
			_websocket.onmessage = function(evt) {
				//alert(evt.data);
				var notice = jQuery.parseJSON(evt.data);
				if(notice.status[0] == 0){
					$('#noticeDot-0').hide();
					$('#noticeTip').hide();
					$('#noticeNo').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery');
					$('#noticeNoPage').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery');
				}else{
					$('#noticeDot-0').show();
					$('#noticeTip strong').text(notice.status[0]);
					$('#noticeTip').show();
					$('#noticeNo').text('('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery');
					$('#noticeNoPage').text(' ('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery');
				}
				$('#noticeDot-1').hide();
			};
			_websocket.onerror = function(evt) {
				console.log('Error occured: ' + evt);
			};
		}
};
CallCenter.init(url);
</script>

<div id="cboxOverlay" style="display: none;"></div>
<div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
<div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div>
<div id="cboxTopCenter" style="float: left;"></div>
<div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>
