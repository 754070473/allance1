<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//展示首页面
Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');
/**
 * 公共样式
 */
Route::any('/top', 'PublicController@top');
Route::any('/left', 'PublicController@left');
Route::any('/main', 'PublicController@main');

//展示招聘信息详情
Route::get('/jobdetail', 'IndexController@jobdetail');
//验证登录(email)
Route::get('/jobdetail_login', 'IndexController@jobdetail_login');
Route::get('/jobdetail_tou', 'IndexController@jobdetail_tou');
//收藏职位
Route::get('/collections_shoucang', 'IndexController@collections_shoucang');


//展示招聘信息详情2
Route::get('/jobdetail1', 'IndexController@jobdetail1');

//招聘列表（可搜索）  
Route::get('/list', 'IndexController@lists');    
    
//招聘信息列表（展示）
Route::get('/mList', 'IndexController@mList');     

//招聘信息详情（单个）
Route::get('/myhome', 'IndexController@myhome');

//招聘信息展示（可以投个简历）
Route::get('/toudi', 'IndexController@toudi');

//个人找职位
Route::get('/companylist', 'ReController@companylist');
//公司找简历
Route::get('/company', 'IndexController@company');
//查找详细信息
Route::get('/select_all', 'IndexController@select_all');
//查找详细信息
Route::get('/select_al', 'IndexController@select_al');
//查找个人简历详细信息
Route::get('/gerenlist', 'IndexController@gerenlist');
//展示关于 联系我们
Route::get('/about', 'IndexController@about');	

//账号绑定
Route::get('/accountBind', 'AccountsetController@accountBind');	

//找回密码
Route::get('/reset', 'AccountsetController@reset');    
   
//修改密码
Route::get('/updatePwd', 'AccountsetController@updatePwd'); 


//找回企业密码
Route::get('/companypwdl', 'AccountsetController@companypwdl');    

//企业密码
Route::get('/companypwd', 'AccountsetController@companypwd'); 
//修改企业密码
Route::get('/companyupdate', 'AccountsetController@companyupdate'); 
//我收藏的职位
Route::get('/collections', 'CollectionsController@collections');

//公司详情
    
//公司详情 修改公司名称
Route::get('save_company_name', 'CompanyglController@save_company_name');
//公司详情  编辑公司的福利
Route::get('save_company_welfare', 'CompanyglController@save_company_welfare');
//公司详情 添加公司的产品
Route::post('save_company_product', 'CompanyglController@save_company_product');
//公司详情 编辑公司的产品
Route::post('save_company_save', 'CompanyglController@save_company_save');
//公司详情  编辑公司介绍
Route::get('save_company_introduce', 'CompanyglController@save_company_introduce');
//公司详情  编辑 地点  领域   规模  主页 
Route::get('save_company_dlgz', 'CompanyglController@save_company_dlgz');
//公司详情 编辑公司历程
Route::get('save_company_course', 'CompanyglController@save_company_course');
//公司详情 编辑创始人
Route::get('save_company_founder', 'CompanyglController@save_company_founder');

//申请公司认证
Route::get('/auth', 'CompanyglController@auth');	
    
//申请公司认证  等待审核
Route::get('/authSuccess', 'CompanyglController@authSuccess');    
    
//开通招聘服务（1）
Route::get('/bindstep1', 'CompanyglController@bindstep1');     

//开通招聘服务（2）    
Route::get('/bindStep2', 'CompanyglController@bindStep2');
    
//开通招聘服务（3）
Route::get('/bindStep3', 'CompanyglController@bindStep3');
   
//填写公司信息第3步
Route::any('/founder', 'CpregisterController@founder');
	
//填写公司信息第一步
Route::any('/index01', 'CpregisterController@index01');	
Route::any('/index01_pro', 'CpregisterController@index01_pro');	
	
//填写公司信息第4步
Route::any('/index02', 'CpregisterController@index02');		

//填写公司信息第5步
Route::any('/index03', 'CpregisterController@index03');		
	
//填写公司信息  发布职位
Route::any('/success', 'CpregisterController@success');	

//填写公司信息第2步
Route::any('/tag', 'CpregisterController@tag');		 
Route::any('/tag_pro', 'CpregisterController@tag_pro');		 
	 
//展示个人登录界面
Route::any('/login', 'LoginController@login');	
//个人与企业注册
Route::any('/login_register', 'LoginController@login_register');	
//执行个人登录
Route::any('/login_pro', 'LoginController@login_pro');
//验证企业个人唯一
Route::any('/loginone', 'LoginController@loginone');
Route::get('/logout', 'LoginController@logout');
//企业登录页面
Route::get('/company_login', 'LoginController@company_login');
//执行企业登录页面
Route::get('/company_login_pro', 'LoginController@company_login_pro');

//我的简历
Route::get('/jianli', 'PersonalController@jianli');

//个人简历信息
Route::any('/previews', 'PersonalController@previews');
Route::any('/basic', 'PersonalController@basic');//基本 信息 修改
Route::any('/uploadPhoto', 'PersonalController@uploadPhoto');//上传头像
Route::any('/postcheck', 'PersonalController@postcheck');//职位检测
Route::any('/expectedwork', 'PersonalController@expectedwork');//修改期望工作
Route::any('/workexperience', 'PersonalController@workexperience');//修改工作经历
Route::any('/projectexperience', 'PersonalController@projectexperience');//修改项目经验
Route::any('/educational', 'PersonalController@educational');//修改教育背景
Route::any('/majorcheck', 'PersonalController@majorcheck');//检查是否有该专业
Route::any('/description', 'PersonalController@description');//自我描述
Route::any('/per_i_name', 'PersonalController@per_i_name');//修改用户名称

    
//发布新职位
Route::get('/create', 'PostofficeController@create');
Route::post('/postAdd', 'PostofficeController@postAdd');
	
//职位发布成功
Route::get('/index06', 'PostofficeController@index06');	

//有效职位
Route::get('/positions', 'CpzwglController@positions');

//有效职位删除	
Route::get('/ptdel','CpzwglController@ptdel');
//有效职位下线
Route::get('/ptdown','CpzwglController@ptdown');
//有效职位编辑
Route::get('/ptedit','CpzwglController@ptedit');
//有效职位编辑2
Route::any('/ptedit2','CpzwglController@ptedit2');

//已下线职位
Route::any('/unpositions', 'CpzwglController@unpositions');	
//职位上线
Route::any('/ptup', 'CpzwglController@ptup');	
	
//不合适简历
Route::get('/haveRefuseResumes', 'RecresumeController@haveRefuseResumes');
//通知面试
Route::get('/haveNotice', 'RecresumeController@mian');
//待定简历
Route::get('/canInterviewResumes', 'RecresumeController@canInterviewResumes');
//待定修改
Route::get('/can', 'RecresumeController@can');
//通知面试
Route::get('/tong', 'RecresumeController@tong');
//删除简历
Route::get('/del', 'RecresumeController@del');
//待定成功
Route::get('tiao', 'RecresumeController@canInterviewResumes');
//待定成功
Route::get('zhi', 'RecresumeController@canInterviewResumes');
//自动过滤简历
Route::get('/autoFilterResumes', 'RecresumeController@autoFilterResumes');	

//注册
Route::get('/register/', 'RegisterController@register');

//简历
Route::get('/preview', 'ResumeglController@preview');
   
//查看简历
Route::get('/pre', 'ResumeglController@pre');
//已投递简历状态
Route::get('/delivery', 'ResumetdController@delivery');

//我的职位订阅
Route::get('/subscribe', 'SubscribeController@subscribe');
  
//我的职位订阅1
Route::get('/subscribe01', 'SubscribeController@subscribe01');

//职位订阅删除
Route::get('/subdel','SubscribeController@subdel');

//职位订阅添加
Route::get('/subinfo','SubscribeController@subinfo');

//发送邮件测试
Route::get('/send','SubscribeController@send');
//公司找详细简历
Route::get('/gerenlist', 'IndexController@gerenlist');
// //公司找个人地址	
// Route::get('/select_all', 'IndexController@select_all');
//个人找职位地点
Route::get('/place_list', 'ReController@place_list');
Route::get('/type', 'ReController@type');
Route::get('/hang', 'ReController@hang');
Route::get('/geren', 'ReController@geren');
Route::any('/search', 'PublicController@search');//职位搜索
Route::any('/searchajax', 'PublicController@searchajax');//ajax职位搜索