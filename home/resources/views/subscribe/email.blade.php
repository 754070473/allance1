<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb"><head>
    </script><script type="text/javascript" async="" src="style/js/conversion.js"></script><script src="style/js/allmobilize.min.js" charset="utf-8" id="allmobilize"></script><style type="text/css"></style>
    <meta content="no-siteapp" http-equiv="Cache-Control">
    <link  media="handheld" rel="alternate">
    <!-- end 云适配 -->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>强强联合-最专业的互联网招聘平台</title>
    <meta content="23635710066417756375" property="qc:admins">
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
<body>
@if($arr == 0)
    {{$name}}，您好！非常抱歉，未匹配到适合您的职位；
    @else
<div id="body">
    <div id="container">
        <div class="clearfix">
            <div class="content_l recommend_list">
                <h2>强强联合网根据你的订阅信息为你推荐以下职位： <a class="more" href="{{url('subscribe')}}">修改订阅信息&gt;&gt;</a></h2>
                <ul class="hot_pos reset">
                    @foreach($arr as $key=>$val)
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a target="_blank" href="http://www.lagou.com/jobs/22194.html">{{$val->r_name}}</a>
                                &nbsp;
                                <span class="c9">[{{$val->m_place}}]</span>
                            </div>
                            <span><em class="c7">月薪：</em> {{$val->r_pay}}</span>
                            <span><em class="c7">经验：</em>
                                @if($val->r_suffer==0)应届生
                                @elseif($val->r_suffer==1)无经验
                                @elseif($val->r_suffer==2)1年以下
                                @elseif($val->r_suffer==3)1-3年
                                @elseif($val->r_suffer==4)3-5年
                                @elseif($val->r_suffer==5)5-10年
                                @elseif($val->r_suffer==6)10年以上
                                @endif
                            </span>
                            <span><em class="c7">最低学历：</em>
                                @if($val->r_edu==0)初中
                                @elseif($val->r_edu==1)高中
                                @elseif($val->r_edu==2)中技
                                @elseif($val->r_edu==3)中专
                                @elseif($val->r_edu==4)大专
                                @elseif($val->r_edu==5)本科
                                @elseif($val->r_edu==6)硕士
                                @elseif($val->r_edu==7)博士
                                @elseif($val->r_edu==8)博士后
                                @endif
                            </span>
                            <br>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a target="_blank" href="{{$val->m_url}}">{{$val->m_name}}</a></div>
                            <span><em class="c7">领域：</em> 移动互联网,游戏</span>
                            <br>
                            <span><em class="c7">阶段：</em> </span>
                            <ul class="companyTags reset">
                                <li>{{$val->m_welfare}}</li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="content_r">
                <div class="subscribe_side">
                    <a target="_blank" href="subscribe.html">
                        <div class="subpos"><span>订阅</span> 职位</div>
                        <div class="c7">强强联合网会根据你的筛选条件，定期将符合你要求的职位信息发给你
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
                    <img width="242" height="242" alt="拉勾微信公众号二维码" src="style/images/qrcode.jpg">
                    <span class="c7">扫描二维码，微信轻松搜工作</span>
                </div>
            </div>
        </div>
        <input type="hidden" id="userid" name="userid" value="314873">
        <div class="clear"></div>
        <input type="hidden" value="" id="resubmitToken">
        <a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
    </div><!-- end #container -->
</div><!-- end #body -->
<div id="footer">
    <div class="wrapper">
        <a rel="nofollow" target="_blank" href="about.html">联系我们</a>
        <a target="_blank" href="http://www.lagou.com/af/zhaopin.html">互联网公司导航</a>
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

<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div>
@endif
</body>
</html>