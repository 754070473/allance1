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
Route::get('/index', 'IndexController@index');

//展示招聘信息详情
Route::get('/jobdetail', 'IndexController@jobdetail');

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

//公司列表
Route::get('/companylist', 'IndexController@companylist');

//展示关于 联系我们
Route::get('/about', 'IndexController@about');	

//账号绑定
Route::get('/accountBind', 'AccountsetController@accountBind');	

//找回密码
Route::get('/reset', 'AccountsetController@reset');    
   
//修改密码
Route::get('/updatePwd', 'AccountsetController@updatePwd'); 

//我收藏的职位
Route::get('/collections', 'CollectionsController@collections');

//公司详情
Route::get('/index04', 'CompanyglController@index04');
    
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
   
//填写公司信息
Route::get('/founder', 'CpregisterController@founder');
	
//填写公司信息
Route::get('/index01', 'CpregisterController@index01');	
	
//填写公司信息
Route::get('/index02', 'CpregisterController@index02');		

//填写公司信息
Route::get('/index03', 'CpregisterController@index03');		
	
//填写公司信息  发布职位
Route::get('/success', 'CpregisterController@success');	

//填写公司信息
Route::get('/tag', 'CpregisterController@tag');		 
	 
//展示登录界面
Route::get('/login', 'LoginController@login');	
	
//我的简历
Route::get('/jianli', 'PersonalController@jianli');
    
//发布新职位
Route::get('/create', 'PostofficeController@create');
	
//职位发布成功
Route::get('/index06', 'PostofficeController@index06');	

//有效职位
Route::get('/positions', 'RecresumeController@positions');	
	
//不合适简历
Route::get('/haveRefuseResumes', 'RecresumeController@haveRefuseResumes');	
	
//待定简历
Route::get('/canInterviewResumes', 'RecresumeController@canInterviewResumes');	
	
//自动过滤简历
Route::get('/autoFilterResumes', 'RecresumeController@autoFilterResumes');	

//注册
Route::get('/register', 'RegisterController@register');

//简历
Route::get('/preview', 'ResumeglController@preview');
   
//已投递简历状态
Route::get('/delivery', 'ResumetdController@delivery');

//我的职位订阅
Route::get('/subscribe', 'SubscribeController@subscribe');
  
//我的职位订阅1
Route::get('/subscribe01', 'SubscribeController@subscribe01');    

	