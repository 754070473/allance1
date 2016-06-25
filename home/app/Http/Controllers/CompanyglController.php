<?php
namespace App\Http\Controllers;
use DB,Session;
/**
 *   CompanyglController  企业信息管理
 */

class CompanyglController extends Controller {
	

    //公司详情
    public function index04()
    {
        $com_id = session::get('com_id');
        $com_id = 1;    //测试数据
        $name = DB::table('al_company')
        ->where('com_id',$com_id)
        ->first();
        // print_r($name);die;
        $mes_id = $name->mes_id;
        $data['arr'] = DB::table('al_com_message')
        ->join('al_recruit', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
        ->where('al_com_message.mes_id',$mes_id)
        ->first();
        $m_welfare= $data['arr']->m_welfare;
        $data['welfare'] = explode(',',$m_welfare);

        // print_r($data['welfare']);die;
        return view("companygl.index04",$data);
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