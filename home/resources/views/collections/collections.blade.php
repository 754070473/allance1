<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb"><head>
</script><script type="text/javascript" async="" src="style/js/conversion.js"></script><script src="style/js/allmobilize.min.js" charset="utf-8" id="allmobilize"></script><style type="text/css"></style>
<meta content="no-siteapp" http-equiv="Cache-Control">
<link  media="handheld" rel="alternate">
<!-- end 云适配 -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>我收藏的职位-招聘服务-拉勾网-最专业的互联网招聘平台</title>
<meta content="23635710066417756375" property="qc:admins">
<meta name="description" content="拉勾网是3W旗下的互联网领域垂直招聘网站,互联网职业机会尽在拉勾网">
<meta name="keywords" content="拉勾,拉勾网,拉勾招聘,拉钩, 拉钩网 ,互联网招聘,拉勾互联网招聘, 移动互联网招聘, 垂直互联网招聘, 微信招聘, 微博招聘, 拉勾官网, 拉勾百科,跳槽, 高薪职位, 互联网圈子, IT招聘, 职场招聘, 猎头招聘,O2O招聘, LBS招聘, 社交招聘, 校园招聘, 校招,社会招聘,社招">
<meta content="QIQ6KC1oZ6" name="baidu-site-verification">

<!-- <div class="web_root"  style="display:none">h</div> -->
<script type="text/javascript">
var ctx = "h";
console.log(1);
</script>
<link href="h/images/favicon.ico" rel="Shortcut Icon">
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
<div id="body">
<!--头部-->
<div id="cache">

</div>

    <div id="container">
        	  	
        <div class="clearfix">
            <div class="content_l">
            	<dl class="c_collections">
                    <dt>
                        <h1><em></em>我收藏的职位</h1>
                    </dt>
                    <dd>
                    	   <form id="collectionsForm">
                            <ul class="reset my_collections">
                            	<!-- 循环开始 start -->
                            	@foreach($arr as $key=>$val)
                               	    <li data-id="133340" id="a_{{$val->col_id}}">
                             		<a title="{{$val->m_name}}" target="_blank" href="{{url('/toudi?id=').$val->col_id}}">
                             			<img alt="{{$val->m_name}}" src="{{ url().'/style/images/'.$val->m_logo}}">
                             		</a>
                             		<div class="co_item">
                             			<h2 title="{{$val->r_name}}">
	                                        <a target="_blank" href="{{url('/toudi?id=').$val->col_id}}">
	                                        	<em>{{$val->r_name}}</em> 
	                                        	<span>（{{$val->r_pay}}K）</span>
	                                    	</a>
	                                    </h2>
	                                    <span class="co_time">发布时间：{{$val->r_addtime}}</span>
	                                    <div class="co_cate">{{$val->m_name}} / {{$val->i_name}} / {{$val->r_suffer}}年 / {{$val->r_edu}}</div>
	                                    <span class="co_youhuo c7">{{$val->m_welfare}}</span>
                                       				<a class="collection_link" target="_blank" href="{{url('/toudi?id=').$val->col_id}}">投个简历</a>
                                    <i></i>
                                        <a onclick="qu({{$val->col_id}})" class="collectionCancel collection_link collected" href="javascript:;">
                                        	取消收藏
                                        	<span>已取消收藏</span>
                                        </a>
                               		</div>
                            	</li>
                            	@endforeach
                            	<!-- 循环结束 end -->

                            	                            </ul>
                                                    </form>
                                            </dd>
                </dl>
            </div>	
            <div class="content_r">
            	<div class="mycenterR" id="myInfo">
            		<h2>我的信息</h2>
            		<a href="collections">我收藏的职位</a>
            		<br>
            		            		<a target="_blank" href="subscribe">我订阅的职位</a>
            		            	</div><!--end #myInfo-->
            					<div class="greybg qrcode mt20">
                	<img width="242" height="242" alt="拉勾微信公众号二维码" src="style/images/qr_delivery.png">
                    <span class="c7">扫描拉勾二维码，微信轻松搜工作</span>
                </div>
            </div>
       	</div>
<!-- <script src="style/js/collections.min.js"></script> -->
<script>
$(function(){
	$('.Pagination').pager({
	      currPage: 1,
	      pageNOName: "pageNo",
	      form: "collectionsForm",
	      pageCount: 1,
	      pageSize:  5
	});
});

function qu(id)
{
	$.ajax({
		type:"get",
		url:"cancel_collections",
		data:"id="+id,
		success:function(e)
		{
			// alert(e)
			if(e==1)
			{
				$('#a_'+id).remove();
			}
			else
			{
				alert(e);
			}

		}
	})
}
</script>
			<div class="clear"></div>
			<input type="hidden" value="4c6ae41d8c254f91becdb5f9ef2d4394" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->
	<div id="footer">
		<div class="wrapper">
			<a rel="nofollow" target="_blank" href="h/about">联系我们</a>
		    <a target="_blank" href="h/af/zhaopin">互联网公司导航</a>
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
					$('#noticeNo').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
					$('#noticeNoPage').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
				}else{
					$('#noticeDot-0').show();
					$('#noticeTip strong').text(notice.status[0]);
					$('#noticeTip').show();
					$('#noticeNo').text('('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
					$('#noticeNoPage').text(' ('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
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

<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>