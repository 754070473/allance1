<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Request,Validator,DB;
use App\Http\Controllers\Controller;
use App\Models\Alpost;
use Session;
/**
 *   PostofficeController  发布职位
 */

class PostofficeController extends Controller{

	//发布新职位
	public function create()
	{   
        //职位类型
        $arr = $this->classify('al_post','p_pid');     //递归处理数据 

        //查询推广类型
        $res = DB::table('al_generalize_type')->get();

        //递归处理地址
        $place = $this->classify('al_place','p_pid');     
		return view("postoffice.create",["arr"=>$arr,"res"=>$res,"place"=>$place]);
	}

	//数据入库
	public function postAdd()
	{
        //接受企业id
        $com_id=Session::get('com_id');
        //查询企业信息id
        $company=DB::table('al_company')->where('com_id',"$com_id")->first();
        $mes_id=$company->mes_id;
          
		//接值
		$r_major=htmlspecialchars(Request::input('r_major'));
	    $r_name=htmlspecialchars(Request::input('r_name'));
	    $r_sex=htmlspecialchars(Request::input('r_sex'));
	    $r_language=htmlspecialchars(Request::input('r_language'));
	    $r_pay_down=htmlspecialchars(Request::input('r_pay_down'));
	    $r_pay_up=htmlspecialchars(Request::input('r_pay_up'));
	    $r_suffer=htmlspecialchars(Request::input('r_suffer'));
	    $r_edu=htmlspecialchars(Request::input('r_edu'));
	    $r_describe=htmlspecialchars(Request::input('r_describe'));
        $r_place=htmlspecialchars(Request::input('r_place'));
        $r_age=htmlspecialchars(Request::input('r_age'));
        $r_iflogbook=htmlspecialchars(Request::input('r_iflogbook'));
        $g_type=htmlspecialchars(Request::input('g_type'));
        $r_time=htmlspecialchars(Request::input('r_time'));


        //查询分类id
        $fen = DB::table('al_generalize_type')->where('g_type_name', "$g_type")->first();
        $g_type_id=$fen->g_type_id;

        //判断r_edu
        if($r_edu=='初中')
        {
             $r_edu=0;
        }
        elseif($r_edu=='高中')
        {
             $r_edu=1;
        }
        elseif($r_edu=='中技')
        {
             $r_edu=2;
        }
        elseif($r_edu=='中专')
        {
             $r_edu=3;
        }
        elseif($r_edu=='大专')
        {
             $r_edu=4;
        }
        elseif($r_edu=='本科')
        {
             $r_edu=5;
        }
        elseif($r_edu=='硕士')
        {
             $r_edu=6;
        }
        elseif($r_edu=='博士')
        {
             $r_edu=7;
        }
        elseif($r_edu=='博后')
        {
             $r_edu=8;
        }

        //发布时间
        $r_addtime=date('Y-m-d H:i:s',time());
        
        //价格
        $r_pay = $r_pay_down.'-'.$r_pay_up;
        //入库
        $re = DB::table('al_recruit')->insert([
        	'r_major'=>$r_major,
            'r_name'=>$r_name,
            'r_sex'=>$r_sex,
            'r_language'=>$r_language,
            'r_pay'=>$r_pay,
            'r_suffer'=>$r_suffer,
            'r_describe'=>$r_describe,
            'r_addtime'=>$r_addtime,
            'mes_id'=>$mes_id,
            'r_place'=>$r_place,
            'r_age'=>$r_age,
            'r_iflogbook'=>$r_iflogbook,
            'r_edu'=>$r_edu,
            'r_time'=>$r_time,
            'g_type_id'=>$g_type_id
        ]);

        //判断
        if($re)
        {
             return redirect('/index06');
        }
        else
        {
             echo "<script>alert('发布失败')</script>".Request::action("PostofficeController@create");
        }
	}
    
	//职位预览
    public function jobyl()
    {
        return view('postoffice.jobyl');
    }

	//职位发布成功
	public function index06()
	{
		return view("postoffice.index06");
	}

}