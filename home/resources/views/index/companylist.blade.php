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

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                	                                @foreach($place as $k=>$plac)
	                                                            <li >
                                	<a href="javascript:void(0)" id="i_{{$plac->pla_id}}" onclick="place({{$plac->pla_id}})" i_name="{{$plac->i_name}}">{{$plac->i_name}}</a> 
                                	                                	|
                                	                                </li>
                                	                                @endforeach
	                            	  								    								    </li>
	                        </ul>
	                    </dt>
	                    <dd>
	                        <dl>
	                            <dt>发展阶段：</dt>
	                            <dd>
	                            			             <a href="type?&rr=初创型">初创型</a>
                                                                                          <a href="type?&rr=成长型">成长型</a>
                                                                                          <a href="type?&rr=成熟型"> 成熟型</a>
                                                                                          <a href="type?&rr=已上市">已上市</a>
		                                	                                	                            </dd>
	                        </dl>
	                        <dl>
	                            <dt>行业领域：</dt>
	                            <dd>
                                    @foreach($arr as  $k=>$v)

                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


                                        <a href="javascript:void(0)"  onclick="fun({{$v->me_id}})">{{$v->h_name}}</a>
                                        @endforeach

		                                	                                	                            </dd>
	                        </dl>
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
	                    </dd>
	                </dl>
                <ul class="hc_list reset" id="so">
                        @foreach($ar as  $k=>$v)

			                        <a href="h/c/25829" target="_blank">

                                            <?php if(($k+1)%3==1){  ?>
                                            <li  style="clear:both;" >
                                                <?php }else{?>
                                            <li>
                                                <?php } ?>
                                                <a href="geren?mes_id={{$v->mes_id}}"  target="_blank">
                                                    <h3 title="CCIC">公司</h3>


                                                    <div class="comLogo">

                                                        <img src="style/images/{{$v->m_logo}}" width="190" height="190" alt="CCIC" />
                                                        <ul>
                                                            <li>{{$v->m_name}}</li>

                                                            <li> {{$v->h_name}}</li>

                                                        </ul>
                                                    </div>
                                                </a>
                                                <ul class="reset ctags">
                                                    <?php
                                                    if(strpos($v->m_welfare,',')){
                                                    $m_welfare = explode(',',$v->m_welfare);
                                                    foreach($m_welfare as $vv){
                                                    ?>
                                                    <li><?php echo $vv?></li>
                                                    <?php }}else{?>
                                                    <li>{{$v->m_welfare}}</li>
                                                    <?php }?>

                                                </ul>
                                            </li>
                                        @endforeach
                                        </ul>

		                		               	<div class="Pagination"></div>

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
<script>
//$(function(){
//	/*分页 */
// 	 	 				 		$('.Pagination').pager({
//	      currPage: 1,
//	      pageNOName: "pn",
//	      form: "companyListForm",
//	      pageCount: 20,
//	      pageSize: 5
//	});

   {{--function  ww(rr){--}}
       {{--$.ajax({--}}
           {{--type: "GET",--}}
           {{--url: "{{url('type')}}",--}}
           {{--data: "rr="+rr,--}}
           {{--success: function(msg){--}}

           {{--}--}}
       {{--});--}}

   {{--}--}}
    function fun(me_id){
    	//alert(me_id);
        $.ajax({
            type: "GET",
            url: "{{url('hang')}}",
            data: "me_id="+me_id,
            success: function(msg){
            	//alert(msg);
              $("#so").html(msg)
            }
        });
    }
function place(pla_id){
	var i_name = $('#i_'+pla_id).attr('i_name');
	//alert(i_name);
         $.ajax({
            type: "GET",
            url: "{{url('place_list')}}",
            data: "i_name="+i_name,
            success: function(msg){
            	//alert(msg);
              $("#so").html(msg)
            }
        });	
}
// function gerenlist(mes_id){

//   alert(i_name);
//          $.ajax({
//             type: "GET",
//             url: "{{url('gerenlist')}}",
//             data: "mes_id="+mes_id,
//             success: function(msg){
//               //alert(msg);
//               $("#so").html(msg)
//             }
//         }); 
// }
</script>       	
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