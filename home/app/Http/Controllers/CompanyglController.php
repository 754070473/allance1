<?php
namespace App\Http\Controllers;
use DB,Session;
use Request;
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
        // echo $mes_id;die;
        $data['arr'] = DB::table('al_com_message')
        ->leftjoin('al_recruit', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
        
        ->where('al_com_message.mes_id',$mes_id)
        ->first();
        $data['aa'] = DB::table('al_com_message')
        ->leftjoin('al_recruit', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
        
        ->where('al_com_message.mes_id',$mes_id)
        ->get();
        // DB::table('al_com_message')
        // print_r($data['arr']);
        $m_welfare= $data['arr']->m_welfare;
        $data['welfare'] = explode(',',$m_welfare);

        // print_r($data['welfare']);die;
        // print_r($data);
        return view("companygl.index04",$data);
    }
    // 修改 公司名
    public function save_company_name(Request $request)
    {
        $mes_id = $request::input('mes_id');
        $m_name = $request::input('companyShortName');
        // echo $m_name;
        $res = DB::table('al_com_message')
            ->where('mes_id', $mes_id)
            ->update(['m_name' => $m_name]);
            if($res)
            {
                echo $m_name;
            }
            else
            {
                echo '0';
            }
    }

    //编辑 公司福利
    public function save_company_welfare()
    {
        $mes_id = Request::input('m_id');
        $abc = Request::input('abc');
        // echo $abc;
      $res = DB::table('al_com_message')
            ->where('mes_id', $mes_id)
            ->update(['m_welfare' => $abc]);
            if($res)
            {
                echo 1;
            }
            else
            {
                echo '失败';
            }

    }

    // 编辑 公司介绍
    public function save_company_introduce()
    {
        $mes_id = Request::input('me_id');
        $jieshao = Request::input('jieshao');
         // echo $jieshao;
          $res = DB::table('al_com_message')
            ->where('mes_id', $mes_id)
            ->update(['m_culture' => $jieshao]);
            if($res)
            {
                echo 1;
            }
            else
            {
                echo '失败';
            }
    }

    //公司详情  编辑 地点  领域   规模  主页 
    public function save_company_dlgz()
    {
        $city = Request::input('city');
        $industryField = Request::input('industryField');   //领域
        $companySize = Request::input('companySize');       //规模
        $companyUrl = Request::input('companyUrl');         //企业地址
        $mes_id = Request::input('me_id');         
        // $i_name = DB::table('al_place')->where('i_name', $city)->first();
        // $m_place = $i_name->pla_id;
        $res = DB::table('al_com_message')
            ->where('mes_id', $mes_id)
            ->update(['m_place' => $city,'m_url'=>$companyUrl]);
            if($res)
            {
                echo 1;
            }
            else
            {
                echo '失败';
            }
    }

    //编辑公司历程
    public function save_company_course()
    {
        $mes_id = Request::input('me_id'); 
        $remark = Request::input('remark'); 
    }

    //编辑创始人
    public function save_company_founder()
    {
       $leadername =  Request::input('name'); 
       $position =  Request::input('position'); 
       $remark =  Request::input('remark'); 
       $mes_id =  Request::input('me_id'); 
       $res = DB::table('al_com_message')
            ->where('mes_id', $mes_id)
            ->update(['leadername' => $leadername,'position'=>$position,'remark'=>$remark]);
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
        
    }

    // 添加公司 产品
    public function save_company_product()
    {
        $data = Request::input();
        print_r($data);
    }
    //编辑公司产品
    public function save_company_save()
    {
        $product = Request::input('product');
        $productUrl = Request::input('productUrl');
        $productProfile = Request::input('productProfile');
        $mes_id = Request::input('mes_id');
        $res = DB::table('al_com_message')
            ->where('mes_id', $mes_id)
            ->update(['product' => $product,'productUrl'=>$productUrl,'productProfile'=>$productProfile]);
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

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