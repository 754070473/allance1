﻿<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb"><head>
<script type="text/javascript" async="" src="style/js/conversion.js"></script>
<script src="style/js/allmobilize.min.js" charset="utf-8" id="allmobilize"></script>
<style type="text/css"></style>
<meta content="no-siteapp" http-equiv="Cache-Control">
<link  media="handheld" rel="alternate">
<!-- end 云适配 -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>平潭协创进出口贸易有限公司-拉勾网-最专业的互联网招聘平台</title>
<meta content="23635710066417756375" property="qc:admins">
<meta name="description" content="平潭协创进出口贸易有限公司 福建平潭协创进出口贸易有限公司 上海 移动互联网 天使轮 150-500人 测试的发打发打发大范德萨发">
<meta name="keywords" content="平潭协创进出口贸易有限公司 福建平潭协创进出口贸易有限公司 上海 移动互联网 天使轮 150-500人 测试的发打发打发大范德萨发">
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
<script src="style/js/ajaxCross.json" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
     $.get("{{url('top')}}",function(m){
         $('#cache').html(m);
        
     })
    })

</script>
</head>
<body>
<div id="body">
<div id="cache" style="padding-bottom:20px;">
    </div><!-- end #header -->
    <div id="container">
        <!-- <script src="style/js/swfobject_modified.js" type="text/javascript"></script> -->
        <div class="clearfix">
        				
            <div class="content_l">           
	                <div class="c_detail">
	                	<div style="background-color:#fff;" class="c_logo">
		                	<a title="上传公司LOGO" id="logoShow" class="inline cboxElement" href="#logoUploader">

		                		<!-- 公司的logo -->

	                			<img width="190" height="190" alt="公司logo" src="style/images/{{$arr->m_logo}}">
	                        		                        	
	                        	<span>更换公司图片<br>190px*190px 小于5M</span>
	                        </a>
		                </div>
		                
		                <!--  			                <div class="c_logo" style="background-color:#fff;">
			                	<div id="logoShow">
			                		<img src="style/images/logo_default.png" width="190" height="190" alt="公司logo" />
		                        	<span>更换公司图片<br />190px*190px 小于5M</span>
		                        </div>
		                        <input onchange="img_check(this,'http://www.lagou.com/cd/saveProfileLogo.json',25927,'logo');" type="file" id="logo" name="logo" title="支持jpg、jpeg、gif、png格式，文件小于5M" />
			                     
			                </div>
		                    <span class="error" id="logo_error" style="display:none;"></span>
						     -->
		                
	                    <div class="c_box companyName">
	                    		                   			<h2 title="公司名称">公司名称</h2>
	                   			                        
	                        	                        	<em class="unvalid"></em>
                        		<span class="va dn" style="display: none;">强强联合未认证企业</span>
	                        	<a  class="applyC" href="authSuccess">申请认证</a>
	                        	                        <div class="clear"></div>
	                       	
	                       		                   			<h1 title="{{$arr->m_name}}" id='bb' class="fullname">{{$arr->m_name}}</h1>
	                        	                        
	                        <form class="clear editDetail dn" id="editForm" style="display: none;">
	                            <input type="text" placeholder="请输入公司简称" maxlength="15" value="{{$arr->m_name}}" name="companyShortName" id="companyShortName" class="valid">
	                            <input type="hidden" name='mes_id' value="{{$arr->mes_id}}">
	                            <input type="hidden" id="_token" value="<?php echo csrf_token(); ?>">
	                            <input type="hidden" value="25927" id="companyId">
	                            <input type="submit" value="保存" id="saveDetail" class="btn_small">
	                            <a id="cancelDetail" class="btn_cancel_s" >取消</a>
		                    </form>
	                            
	                        <script>
	                        	$('#editForm').submit(function(){
	                        		
	                        		var data=$(this).serialize();
	                        		// alert(data);
	                        		$.ajax({
	                        			type:"get",
	                        			url:"save_company_name",
	                        			data:data,
	                        			success:function(e)
	                        			{
	                        				if(e==0)
	                        				{
	                        					alert('编辑失败');
	                        				}
	                        				else
	                        				{
	                        					$('#editForm').hide();
	                        					$('#bb').html(e);
	                        					$('#editCompanyDetail').show();
	                        				}
	                        			}

	                        		})
	                        		return false;
	                        		// var mes_id = $('#mes_id').val();
	                        		// alert(mes_id)
	                        		// var aa = $('#companyShortName').val();
	                        		// $.ajax({
	                        		// 	type:"get",
	                        		// 	url:"save_company_name",
	                        		// 	data:"aa="+aa+"&mes_id="+mes_id,
	                        		// 	success:function(e)
	                        		// 	{
	                        		// 		alert(e);
	                        		// 	}
	                        		// })

	                        	})
	                        </script>
	                        <h3 class="dn">已选择标签</h3>
	                        <ul style="overflow:auto" id="hasLabels" class="reset clearfix">
	                        	@foreach($welfare as $key=>$val)
			                        	<li><span name ="fuli[]">{{$val}}</span></li>
        		                   @endforeach	
        	                            <span id='bianji' ><li  class="link">编辑</li></span>
	                        </ul>
	                        <div class="dn" id="addLabels">
	                        	<a id="changeLabels" class="change" href="javascript:void(0)">换一换</a>
	                        	<input type="hidden" value="1" id="labelPageNo">
	                        	<input type="hidden"  id="m_id" value="{{$arr->mes_id}}">
	                            <input type="submit" value="贴上" class="fr" id="add_label">
                            	<input type="text" placeholder="添加自定义标签" name="label" id="label" class="label_form fr">	
	                            <div class="clear"></div>
	                            <ul class="reset clearfix"> </ul>
	                            <a id="save_cun" class="btn_small" href="javascript:void(0)">保存</a>
	                            <a id="cancelLabels" class="btn_cancel_s" href="javascript:void(0)">取消</a>
	                        </div>
	                    </div>

	                    <a title="编辑基本信息" class="c_edit" id="editCompanyDetail" href="javascript:void(0);" style="display: block;"></a>
	                	<div class="clear"></div>
	                </div>
                <script>
                	$('#save_cun').click(function(){
                		var m_id = $('#m_id').val();
                		// var hasLabels = $('.fuli[]');
                		var hasLabels = $('span[name="fuli[]"]');
                		var abc = [];
                		for(var i=0;i<hasLabels.length;i++){
                			abc[i]= hasLabels.eq(i).html();
                		}
                		// console.log(abc);
                		// alert(abc);
                		
                		$.ajax({
                			type:"get",
                			url:"save_company_welfare",
                			data:"m_id="+m_id+"&abc="+abc,
                			success:function(e)
                			{
                				if(e==1)
                				{
                					// $('#addLabels').hide();
                					// $('#bianji').show();
                					//不会了先来个刷新 以后改正
                					// window.history.go(0);
                					window.location.reload();
                				}
                				else
                				{
                					alert(e);
                				}
                			}
                		})
                	})
                </script>
                	<div class="c_breakline"></div>
       
       				<div id="Product">
        					        				
	        					<div class="product_wrap">

						    		<!--无产品 -->
									<dl class="c_section dn">
					                	<dt>
					                    	<h2><em></em>公司产品</h2>
					                    </dt>
					                    <dd>
					                    	<div class="addnew">
					                        	酒香不怕巷子深已经过时啦！<br>
												把自己优秀的产品展示出来吸引人才围观吧！<br>
					                            <a class="product_edit" href="javascript:void(0)">+添加公司产品</a>
					                        </div>
					                    </dd>
					                </dl>
	                
					            	<!--产品编辑-->
					                <dl id="newProduct" class="newProduct dn">
					                	<dt>
					                    	<h2><em></em>公司产品</h2>
					                    </dt>
					                    <dd>
					                        <form method="post"  action="save_company_save"  enctype="multipart/form-data" >
					                            <div class="new_product">
					                            	<input type="hidden" name='mes_id' value="{{$arr->mes_id}}">
					                            	<input type="hidden" name="_token" value="{{csrf_token()}}">
							                            <div class="product_upload dn productNo">
							                                <div style="background-color: rgb(147, 183, 187);">
							                                	<span>上传产品图片</span> 
							                                    <br>	
							                                   		 尺寸：380*220px  	大小：小于5M
							                                </div>
							                            </div>
							                            <div class="product_upload productShow">
							                            	<img width="380" height="220" src="style/images/product_default.png">
								                        	<span>更换产品图片<br>380*220px 小于5M</span>
								                        </div>
							                        
							                        <input type="file" title="支持jpg、jpeg、gif、png格式，文件小于5M" onchange="product_check(this,'http://www.lagou.com/c/upload.json','productNo','productShow','type','productInfos');" name="myfiles" id="myfiles0">
							                    	<input type="hidden" value="3" name="type" class="type"> 
							                    	<input type="hidden" value="images/product_default.png" name="productPicUrl" class="productInfos">   
							                    </div>
					                            <div class="cp_intro">
					                               	<input type="text" placeholder="请输入产品名称" value="{{$arr->product}}" name="product" class="valid">	
					                                <input type="text" placeholder="请输入产品网址" value="{{$arr->productUrl}}" name="productUrl" class="valid">	
					                                <textarea placeholder="请简短描述该产品定位、产品特色、用户群体等" maxlength="500" value="{{$arr->productProfile}}" class="s_textarea valid" name="productProfile">{{$arr->productProfile}}</textarea>	
					                                <div class="word_count fr">你还可以输入 <span>437</span> 字</div>
					                                <div class="clear"></div>
					                                <input type="submit" id='cpmc' value="保存" class="btn_small">
					                                <a class="btn_cancel_s product_delete" href="javascript:void(0)">删除</a>
					                        		<input type="hidden" value="11867" class="product_id">
					                            </div>
											</form>
					                    </dd>
					                </dl>
					                <!--有产品-->
					                <dl class="c_product">
					                	<dt>
					                    	<h2><em></em>公司产品</h2>
					                    </dt>
					                    <dd>
					                    	<img width="380" height="220" alt="发大发" src="style/images/product_default.png">
				                        	<div class="cp_intro">
        						               <h3><a target="_blank" href="{{$arr->productUrl}}">{{$arr->product}}</a></h3>
					                            <div class="scroll-pane" style="overflow: hidden; padding: 0px; width: 260px;">
					                            	
					                            <div class="jspContainer" style="width: 260px; height: 140px;"><div class="jspPane" style="padding: 0px; top: 0px; width: 260px;">
					                            	<div>{{$arr->productProfile}}</div></div></div></div>
					                        </div>
					                        <a title="编辑公司产品" class="c_edit product_edit" href="javascript:void(0)"></a>
					            			<!-- <a title="新增公司产品" class="c_add product_add" href="javascript:void(0)"></a> -->
					                    </dd>
					                </dl>
	            
	              				</div>
       								        						    			        			</div>   <!-- end #Product --> 
       	
       				<div id="Profile">
			            	<div class="profile_wrap">
					             <!--无介绍 -->
									<dl class="c_section dn" style="display: none;">
					                	<dt>
					                    	<h2><em></em>公司介绍</h2>
					                    </dt>
					                    <dd>
					                    	<div class="addnew">
					                        	详细公司的发展历程、让求职者更加了解你!<br>
					                            <a id="addIntro" href="javascript:void(0)">+添加公司介绍</a>
					                        </div>
					                    </dd>
					                </dl>
					            <!--编辑介绍-->
					                <dl class="c_section newIntro dn" style="display: none;">
					                    <dt>
					                        <h2><em></em>公司介绍</h2>
					                    </dt>
					                    <dd>
						                    <form id="companyDesForm">
						                    	<input type="hidden" id='me_id' value="{{$arr->mes_id}}">
						                        <textarea placeholder="请分段详细描述公" name="companyProfile" id="companyProfile" class="valid">
						                        	{{$arr->m_culture}}
						                        </textarea>		                                        
						                        <div class="word_count fr">你还可以输入 <span>955</span> 字</div>
						                        <div class="clear"></div>
						                        <input type="submit" value="保存" id="submitProfile" class="btn_small">
						                        <a id="delProfile" class="btn_cancel_s" href="javascript:void(0)">取消</a>
						                    </form>
					                    </dd>
					                </dl>
					            	
					            <!--有介绍-->
					               <dl class="c_section" style="display: block;">
					               		<dt>
					                   		<h2><em></em>公司介绍</h2>
					                   	</dt>
					                   	<dd>
					                   		<div id="jieshao" class="c_intro">{{$arr->m_culture}}</div>
					                   		<a title="编辑公司介绍" id="editIntro" class="c_edit" href="javascript:void(0)"></a>
					                   	</dd>
					               	</dl>
				            </div>
				                <script>
					            		$('#submitProfile').click(function(){
					            			var jieshao = $('#companyProfile').val();
					            			var me_id = $('#me_id').val();
					            			$.ajax({
					            				type:"get",
					            				url:"save_company_introduce",
					            				data:"jieshao="+jieshao+"&me_id="+me_id,
					            				success:function(e)
					            				{
					            					if(e==1)
					            					{
					            						window.location.reload();
					            					}
					            					else
					            					{
					            						alert(e);
					            					}
					            				}
					            			})
					            		})
					            	</script> 	
	     			</div><!-- end #Profile -->
      	
      	<!--[if IE 7]> <br /> <![endif]-->
	    
	        	 		        	<!--无招聘职位-->
						<dl id="noJobs" class="c_section">
		                	<dt>
		                    	<h2><em></em>招聘职位</h2>
		                    </dt>
		                    <dd>
		                    	<div class="addnew">
                                    <?php if(empty($aa)){?>
		                        	发布需要的人才信息，让伯乐和千里马尽快相遇……<br>
                                        <?php }?>
		                        	@foreach($aa as $key=>$val)
                                        @if($key < 3)
		                        	<span>{{$val->r_major}}</span><br>
                                            @else
                                    <span style="display: none" class="r_major">{{$val->r_major}}<br /></span>
                                            @endif
		                        	@endforeach
                                        <?php if(count($aa) > 2){?>
                                        <a href="javascript:void(0)" onclick="ck_show()" id="ck_show">显示所有</a><br>
                                        <?php }?>
		                            <a href="create">+添加招聘职位</a>
		                        </div>
		                    </dd>
		                </dl>
	          	
	          	<input type="hidden" value="" name="hasNextPage" id="hasNextPage">
	          	<input type="hidden" value="" name="pageNo" id="pageNo">
	          	<input type="hidden" value="" name="pageSize" id="pageSize">
          		<div id="flag"></div>
            </div>	<!-- end .content_l -->
            
            <div class="content_r">
            	<div id="Tags">
	            	<div id="c_tags_show" class="c_tags solveWrap" style="display: block;">
	                    <table><tbody><tr><td>地点</td><td>{{$arr->m_place}}</td></tr><tr><td>主页</td><td><a target="_blank" href="{{$arr->m_url}}">{{$arr->m_url}}</a></td></tr></tbody></table>
	                    <a id="editTags" class="c_edit" href="javascript:void(0)"></a>
	                </div>
	                <div id="c_tags_edit" class="c_tags editTags dn" style="display: none;">
		                <form id="tagForms">
		                    <table>
		                    	<input type="hidden" name='me_id' value="{{$arr->mes_id}}">
		                        <tbody><tr>
		                            <td>地点</td>
		                            <td>
		                            	<input type="text" placeholder="请输入地点(城市名)" value="{{$arr->m_place}}" name="city" id="city" class="valid">	
		                            </td>
		                        </tr>
		                        
		                        <tr>
		                            <td>主页</td>
		                            <td>
                            			<input type="text" placeholder="请输入网址" value="{{$arr->m_url}}" name="companyUrl" id="companyUrl" class="valid">	
		                            </td>
		                        </tr>
		                    </tbody></table>
		                    <input type="hidden" id="comCity" value="上海">
		                    <input type="hidden" id="comInd" value="移动互联网">
		                    <input type="hidden" id="comSize" value="150-500人">
		                    <input type="hidden" id="comUrl" value="{{$arr->m_url}}">
		                    <input type="submit" value="保存" id="submitFeatures" class="btn_small">
		                    <a id="cancelFeatures" class="btn_cancel_s" href="javascript:void(0)">取消</a>
		                    <div class="clear"></div>
		            	</form>
	                </div>
       			</div><!-- end #Tags -->
       			 <script>
                     function ck_show(){
                         if($('#ck_show').html() == '显示所有') {
                             $('.r_major').show();
                             $('#ck_show').html('收起');
                         }else{
                             $('.r_major').hide();
                             $('#ck_show').html('显示所有');
                         }
                     }
                	$('#tagForms').submit(function(){
                		
                		var data=$(this).serialize();
                		$.ajax({
                			type:"get",
                			url:"save_company_dlgz",
                			data:data,
                			success:function(e)
                			{
                				if(e==1)
                				{
                					window.location.reload();
                				}
                				else
                				{
                					alert(e);
                				}
                			}

                		})
                		return false;
                	})
                </script>

       			<dl class="c_section c_stages">
                	<dt>
                    	<h2><em></em>公司阶段</h2>
                    	<a title="编辑融资阶段" class="c_edit" href="javascript:void(0)"></a>
                    </dt>
                    <dd>
                    	<ul class="reset stageshow">
                    		<li>目前阶段：<span class="c5">{{$arr->m_type}}</span></li>
                    		                    	</ul>
                    	<form class="dn" id="stageform">
                    		<div class="stageSelect">
                    			<label>目前阶段</label>
                    			<input type="hidden" value="天使轮" id="financeStage" name="financeStage">
	                         	<input type="button" value="天使轮" id="select_fin" class="select_tags_short fl">
	                            <div class="selectBoxShort dn" id="box_fin" style="display: none;">
	                                 <ul class="reset">
	                                 		                                 		
		                                 						                           			<li>未融资</li>
				                           					                           		
	                                     	                                 		
		                                 						                           			<li class="current">天使轮</li>
				                           					                           		
	                                     	                                 		
		                                 						                           			<li>A轮</li>
				                           					                           		
	                                     	                                 		
		                                 						                           			<li>B轮</li>
				                           					                           		
	                                     	                                 		
		                                 						                           			<li>C轮</li>
				                           					                           		
	                                     	                                 		
		                                 						                           			<li>D轮及以上</li>
				                           					                           		
	                                     	                                 		
		                                 						                           			<li>上市公司</li>
				                           					                           		
	                                     	                                 </ul>
	                             </div>	
                    		</div>	
	                    	<ul id="stagesList" class="reset">
		                    				                    <li>
		                    		<label>融资阶段</label>
		                    		<input type="hidden" class="select_invest_hidden" name="select_invest_hidden">
				                    <input type="button" value="融资阶段" class="select_tags_short select_invest">
				                    <div class="selectBoxShort dn" style="display: none;">
				                        <ul class="reset">
				                        						                        						                        					                        							                        	<li>天使轮</li>
					                        						                        					                        							                        	<li>A轮</li>
					                        						                        					                        							                        	<li>B轮</li>
					                        						                        					                        							                        	<li>C轮</li>
					                        						                        					                        							                        	<li>D轮及以上</li>
					                        						                        					                        							                        	<li>上市公司</li>
					                        						                        				                        </ul>
				                    </div>
				                    <label>投资机构</label>
				                    <input type="text" placeholder="如真格基金" name="stageorg" value="">
		                    	</li>
		                    </ul>
		                    <input type="submit" value="保存" class="btn_small">
		                    <a id="cancelStages" class="btn_cancel_s" href="javascript:void(0)">取消</a>
		                    <div class="clear"></div>
		                    
		                    <div class="dn" id="cloneInvest">
		                    	<label>融资阶段</label>
	                    		<input type="hidden" class="select_invest_hidden" name="select_invest_hidden">
			                    <input type="button" value="发展阶段" class="select_tags_short select_invest">
			                    <div class="selectBoxShort dn" style="display: none;">
			                        <ul class="reset">
			                        					                        					                        				                        						                        	<li>天使轮</li>
				                        					                        				                        						                        	<li>A轮</li>
				                        					                        				                        						                        	<li>B轮</li>
				                        					                        				                        						                        	<li>C轮</li>
				                        					                        				                        						                        	<li>D轮及以上</li>
				                        					                        				                        						                        	<li>上市公司</li>
				                        					                        			                        </ul>
			                    </div>
			                    <label>投资机构</label>
			                    <input type="text" placeholder="如真格基金" name="stageorg">
		                    </div>
		                </form>
                    </dd>
                </dl><!-- end .c_stages -->
       				
	      
	       		<div id="Member">		
		       			       		<!--有创始团队-->
		                <dl class="c_section c_member">
		                	<dt>
		                    	<h2><em></em>公司创始人</h2>
	                    		<!-- <a title="添加创始人" class="c_add" href="javascript:void(0)"></a> -->
		                    </dt>
		                    <dd> 
		                    			                    				                    
			       					<div class="member_wrap">
			       						
				                        <!-- 无创始人 -->
				                        <div class="member_info addnew_right dn">
				                        	展示公司的领导班子，<br>提升诱人指数！<br>
				                            <a class="member_edit" href="javascript:void(0)">+添加成员</a>
				                        </div>
				                        
				                        <!-- 编辑创始人 -->
		                        		<div class="member_info newMember dn">
			                        		<form method='get' action='save_company_founder'>
					                            <div class="new_portrait">
						                            <div class="portrait_upload dn portraitNo">
						                                <span>上传创始人头像</span>
						                            </div>
						                            <div class="portraitShow">
						                            	<img width="120" height="120" src="style/images/leader_default.png">
							                        	<span>更换头像</span>
							                        </div>
							                        <input type="file" value="" title="支持jpg、jpeg、gif、png格式，文件小于5M" onchange="member_check(this,'http://www.lagou.com/c/upload.json','portraitNo','portraitShow','type','leaderInfos');" name="myfiles" id="profiles0">
							                    	<input type="hidden" value="7" name="type" class="type">
							                    	<input type="hidden" value="images/leader_default.png" name="photo" class="leaderInfos">
						                            <em>
												                                尺寸：120*120px <br> 	
												                                大小：小于5M
						                            </em>
						                        </div>
						                        <input type="text" placeholder="请输入创始人姓名" value="{{$arr->leadername}}" id="name" name="name" class="valid">	
					                            <input type="text" placeholder="请输入创始人当前职位" value="{{$arr->position}}" id="position" name="position">	
					                            <textarea placeholder="请输入创始人个人简介" maxlength="500" class="s_textarea valid" id="remark" name="remark">{{$arr->remark}}</textarea>	
					                            <div class="word_count fr">你还可以输入 <span>476</span> 字</div>
					                            <div class="clear"></div>
					                            <input type="hidden" name='me_id' value="{{$arr->mes_id}}">
					                            <input type="submit" value="保存" id="chuang" class="btn_small">
				                                <a class="btn_cancel_s member_delete" href="javascript:void(0)">删除</a>
				                        		<input type="hidden" value="11493" class="leader_id">
				                        	</form>
				                        </div>
				                        
				                        <!-- 显示创始人 -->
				                    	<div class="member_info">
	                    					<a title="编辑创始人" class="c_edit member_edit" href="javascript:void(0)"></a>
				                        	<div class="m_portrait">
				                            	<div></div>
				                            	<img width="120" height="120" alt="孙泰英" src="style/images/leader_default.png">
					                        </div>
				                            <div class="m_name">{{$arr->leadername}}</div>
				                            <div class="m_position">{{$arr->position}}</div>
				                    		<div class="m_intro">{{$arr->remark}}</div>
				                        </div>
				                        
				                     </div><!-- end .member_wrap -->
				                     </dd>
		                </dl>
		       			       	</div> <!-- end #Member -->
	       	
	       	
	       <!--公司深度报道-->
       
   	</div>
<script>
// 	$('#chuang').click(function(){
// 		var name = $('#name').val();
// 		var position = $('position').val();
// 		var remark = $('#remark').val();
// 		alert(name);
// 	})
</script>
<!-------------------------------------弹窗lightbox  ----------------------------------------->
<div style="display:none;">
	<div style="width:650px;height:470px;" class="popup" id="logoUploader">
		<object width="650" height="470" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="FlashID">
		  <param value="../../flash/avatar.swf?url=http://www.lagou.com/cd/saveProfileLogo.json" name="movie">
		  <param value="high" name="quality">
		  <param value="opaque" name="wmode">
		  <param value="111.0.0.0" name="swfversion">
		  <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
		  <param value="../../Scripts/expressInstall.swf" name="expressinstall">
		  <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
		  <!--[if !IE]>-->
		  <object width="650" height="470" data="../../flash/avatar.swf?url=http://www.lagou.com/cd/saveProfileLogo.json" type="application/x-shockwave-flash">
		    <!--<![endif]-->
		    <param value="high" name="quality">
		    <param value="opaque" name="wmode">
		    <param value="111.0.0.0" name="swfversion">
		    <param value="../../Scripts/expressInstall.swf" name="expressinstall">
		    <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
		    <div>
		      <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
		      <p><a href="http://www.adobe.com/go/getflashplayer"><img width="112" height="33" src="style/images/get_flash_player.gif" alt="获取 Adobe Flash Player"></a></p>
		    </div>
		    <!--[if !IE]>-->
		  </object>
		  <!--<![endif]-->
		</object>
	</div><!-- #logoUploader -->
</div>
<!------------------------------------- end ----------------------------------------->

<script src="style/js/company.min.js" type="text/javascript"></script>
<script>
var avatar = {};
avatar.uploadComplate = function( data ){
	var result = eval('('+ data +')');
	if(result.success){
		jQuery('#logoShow img').attr("src",ctx+ '/'+result.content);
		jQuery.colorbox.close();
	}
};
</script>
			<div class="clear"></div>
			<input type="hidden" value="af5b64a9520a4b7da6287ff3400dde11" id="resubmitToken">
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


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></div></body></html>