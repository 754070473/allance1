<?php
namespace App\Http\Controllers;
/**
 *   IndexController  信息展示
 */
use DB;

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

    //个人找职位
    public function companylist()
    {
        return view("index.companylist");
    }
     //公司找简历
    public function company()

    {
          $arr = DB::table('al_post')
                         ->get();
          $arr = DB::table('al_place')
                         ->get();
       $users = DB::table('al_resume')
            ->join('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
            ->join('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
            ->select('al_resume.*', 'al_post.i_name as p_name', 'al_place.i_name')
             ->where('r_show',0)
             ->where('r_type',0)
             ->where('if_img',0)
            ->paginate(15);
        // print_r($users);die;

        return view('index.company', ['users' => $users],['arr'=>$arr]);

     // return view("index.company");
    }


	//展示关于 联系我们
	public function about()
	{
		return view("index.about");
	}
}	

?>
