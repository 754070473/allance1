<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
 *   IndexController  信息展示
 */

use App\Http\Controllers\Controller;
use DB, Redirect, Input, Response,Session;
   header("content-type:text/html;charset=utf-8");
class IndexController extends Controller {
	
	//展示首页面
	public  function index(){
      $rous= DB::table('al_com_message')->get();
        //print_r($rous);

		return view("public.main",["arr"=>$rous]);
	}
    
    //展示招聘信息详情
    public function jobdetail()
    {
    	return view("index.jobdetail");
    }

    //展示招聘信息详情2
    public function jobdetail1()
    {
    	return view("index.jobdetail1");
    }
    
    //招聘列表（可搜索）
    public function lists()
    {
    	return view("index.list");
    }

    //招聘信息列表（展示）
    public function mList()
    {
    	return view("index.mList");
    }

    //招聘信息详情（单个）
    public function myhome()
    {
    	return view("index.myhome");
    }
   
    //招聘信息展示（可以投个简历）
    public function toudi()
    {
        return view("index.toudi");
    }

    //公司列表
    public function companylist()
    {
       //$arr= DB::table('al_com_message')->get();
        //print_r($arr);die;
        $arr = DB::table('al_com_message')
            ->join('al_recruit', 'al_com_message.mes_id', '=', 'al_recruit.mes_id')
            ->select('*')
            ->get();
        $ar = DB::table('al_hang')->get();
         //1print_r($users);die;
        return view("index.companylist",["ar"=>$arr,'ap'=>$ar]);
    }
    //公司查询
    public function hang(Request $request)
    {
        $id=$request->input('id');
        //print_r($id);die;
        $arr = DB::table('al_com_message')
            ->join('al_recruit', 'al_com_message.mes_id', '=', 'al_recruit.mes_id')
            ->where("h_id",$id)
            ->select('*')
            ->get();
      //  $arr= DB::table('al_com_message')->get();
      // print_r($arr);die;
        return view('index.companyshow', ['ar' => $arr]);

    }
	//展示关于 联系我们
	public function about()
	{
		return view("index.about");
	}

}	

?>
