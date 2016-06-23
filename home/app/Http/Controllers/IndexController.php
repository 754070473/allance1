<?php
namespace App\Http\Controllers;
use DB;
use Session;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
/**
 *   IndexController  信息展示
 */

class IndexController extends Controller {
	
	//展示首页面
	public  function index(){
		return view("index.index");
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
        return view("index.companylist");
    }

	//展示关于 联系我们
	public function about()
	{
		return view("index.about");
	}
}	

?>
