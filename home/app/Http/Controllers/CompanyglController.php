<?php
namespace App\Http\Controllers;

/**
 *   CompanyglController  企业信息管理
 */

class CompanyglController extends Controller {
	

    //公司详情
    public function index04()
    {
        return view("companygl.index04");
    }

	//申请公司认证
    public  function auth(){
        return view("companygl.auth");
    }

    //申请公司认证  等待审核
    public  function authSuccess(){
        return view("companygl.authSuccess");
    }

    

    //开通招聘服务（1）
    public  function bindstep1(){
        return view("companygl.bindstep1");
    }
    
    //开通招聘服务（2）
    public  function bindStep2(){
        return view("companygl.bindStep2");
    }

    //开通招聘服务（3）
    public  function bindStep3(){
        return view("companygl.bindStep3");
    }
}	

?>