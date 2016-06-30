<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Request,Validator,DB,Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Cookie;
use Illuminate\Pagination\Paginator;
use Session;

/**
 *   CpzwglController  管理职位
 */

class CpzwglController extends Controller{

	//有效职位
	public function positions()
	{

		//接受企业id
        $com_id=Session::get('com_id');
        if(!isset($com_id))
        {
             return redirect()->action('LoginController@company_login');
        }
        //查询企业信息id
        $company=DB::table('al_company')->where('com_id',"$com_id")->first();
        $mes_id=$company->mes_id;

        //接受页码
        $page=Request::input('page');
        $page=isset($page)?$page:1;

        //查询
        $res = DB::table('al_recruit')
                   ->where('r_status','=',0,'and','mes_id','=',$mes_id)
                   ->orderBy('rec_id','desc')
                   ->paginate(5);

        $num = DB::table('al_recruit')
                   ->where('r_status','=',0,'and','mes_id','=',$mes_id)
                   ->count();
        $pageCount =ceil($num/5);
		return view("cpzwgl.positions",['res'=>$res,'num'=>$num,'pageCount'=>$pageCount,'page'=>$page]);
	}
    
    //删除有效的简历
    public function ptdel()
    {
    	 //接受删除id
         $id=Request::input('id');

         //查询职位状态
         $status = DB::table('al_recruit')->where('rec_id',$id)->first();
         $r_status=$status->r_status;

         //删除数据
         $ptdel = DB::table('al_recruit')
                    ->where('rec_id','=',$id)
                    ->delete();   

        if($ptdel)
        {
        	 if($r_status == 0)
            {
                $this->userlog('有效职位删除');
                return redirect('positions');
            }
            else
            {
                $this->userlog('已下线职位删除');
                return redirect('unpositions');
            }
        } 
        else
        {
        	echo "<script>alert('删除失败')</script>";
            if($r_status == 1)
            {
                return  redirect('positions');
            }
            else
            {
                return  redirect('unpositions');
            }
        }
                                
    }

    //有效职位下线
    public function ptdown()
    {
    	//接受下线id
    	$id=Request::input('id');
    	//修改数据
    	$ptdel = DB::table('al_recruit')
                    ->where('rec_id',$id)
                    ->update(['r_status'=>1]);
        //判断
        if($ptdel)
        {
            $this->userlog('有效职位下线');
            return redirect('positions');
        } 
        else
        {
        	echo "<script>alert('下线失败')</script>";
            return  redirect('positions');
        }
    }

    //有效职位编辑
    public function ptedit()
    {
        //职位类型
        $arr = $this->classify('al_post','p_pid');     //递归处理数据 

        //查询推广类型
        $re = DB::table('al_generalize_type')->get();


    	//接受编辑id
    	$id=Request::input('id');
        //查询此id的数据
        $res = DB::table('al_recruit')->where('rec_id', $id)->first();
        $r_pay = $res->r_pay;
        $r_pay_num = strpos("$r_pay","-");
        $r_pay_num2 = $r_pay_num+1;
        //最低薪资
        $salary_min = substr("$r_pay",0,"$r_pay_num");

        //最高薪资
        $salary_max = substr("$r_pay","$r_pay_num2");

        //工作年限
        if($res->r_suffer == 0)
        {
             $r_suffer='应届生';
        }
        elseif($res->r_suffer == 1)
        {
             $r_suffer='无经验';
        }
        elseif($res->r_suffer == 2)
        {
             $r_suffer='1年以下';
        }
        elseif($res->r_suffer == 3)
        {
             $r_suffer='1-3年';
        }
        elseif($res->r_suffer == 4)
        {
             $r_suffer='3-5年';
        }
        elseif($res->r_suffer == 5)
        {
             $r_suffer='5-10年';
        }
        elseif($res->r_suffer == 6)
        {
             $r_suffer='10年以上';
        }

        //学历要求
        if($res->r_edu == 0)
        {
            $r_edu='初中';
        }
        elseif($res->r_edu == 1)
        {
            $r_edu='高中';
        }
        elseif($res->r_edu == 2)
        {
            $r_edu='中技';
        }
        elseif($res->r_edu == 3)
        {
            $r_edu='中专';
        }
        elseif($res->r_edu == 4)
        {
            $r_edu='大专';
        }
        elseif($res->r_edu == 5)
        {
            $r_edu='本科';
        }
        elseif($res->r_edu == 6)
        {
            $r_edu='硕士';
        }
        elseif($res->r_edu == 7)
        {
            $r_edu='博士';
        }
        elseif($res->r_edu == 8)
        {
            $r_edu='博后';
        }

        //判断推广方法是否存在
        if($res->g_type_id)
        {
	        //查询此条数据的推广方式
	        $tui = DB:: table('al_generalize_type')
	                   ->where('g_type_id',$res->g_type_id)
	                   ->first();
	        $tg = $tui->g_type_name;
	    }
	    else
	    {
	    	$tg='';
	    }
        //修改页面
        return view("cpzwgl.create",
        	['res'=>$res,
        	 'arr'=>$arr,
        	 're'=>$re,
        	 'tg'=>$tg,
        	 'r_suffer'=>$r_suffer,
        	 'r_edu'=>$r_edu,
             'salary_max'=>$salary_max,
             'salary_min'=>$salary_min
        	]);
    }

    //有效职位编辑2
    public function ptedit2()
    {
        //接受企业id
        $com_id=Session::get('com_id');
        //查询企业信息id
        $company=DB::table('al_company')->where('com_id',"$com_id")->first();
        $mes_id=$company->mes_id;
          
		//接值
        $rec_id=Request::input("rec_id");
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

        //查询职位状态
        $status = DB::table('al_recruit')->where('rec_id',$rec_id)->first();
        $r_status=$status->r_status;

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

        //修改时间
        $r_addtime=date('Y-m-d H:i:s',time());
        
        //价格
        $r_pay = $r_pay_down.'-'.$r_pay_up;

        $ptupdate =DB::table('al_recruit')
            ->where('rec_id', $rec_id)
            ->update([
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
        if($ptupdate)
        {
            if($r_status == 0)
            {
                $this->userlog('编辑有效职位');
                return redirect('positions');
            }
            else
            {
                $this->userlog('编辑下线职位');
                return redirect('unpositions');
            }
        	
        } 
        else
        {
            echo "<script>alert('编辑失败')</script>";
            if($r_status == 1)
            {
                return  redirect('positions');
            }
            else
            {
                return  redirect('unpositions');
            }
        }
    }

    //已下线职位
    public function unpositions()
    {
        //接受企业id
        $com_id=Session::get('com_id');
        if(!isset($com_id))
        {
             return redirect()->action('LoginController@company_login');
        }
        //查询企业信息id
        $company=DB::table('al_company')->where('com_id',"$com_id")->first();
        $mes_id=$company->mes_id;

        //接受页码
        $page=Request::input('page');
        $page=isset($page)?$page:1;

        //查询
        $res = DB::table('al_recruit')
                   ->where('r_status','=',1,'and','mes_id','=',$mes_id)
                   ->orderBy('rec_id','desc')
                   ->paginate(5);
        $num = DB::table('al_recruit')
                   ->where('r_status','=',1,'and','mes_id','=',$mes_id)
                   ->count();
        $pageCount =ceil($num/5);

		return view("cpzwgl.unpositions",['res'=>$res,'num'=>$num,'pageCount'=>$pageCount,'page'=>$page]);
    }

    //上线
    public function ptup()
    {
        //接受上线id
        $id=Request::input('id');
        //修改数据
        $ptdel = DB::table('al_recruit')
                    ->where('rec_id',$id)
                    ->update(['r_status'=>0]);
        //判断
        if($ptdel)
        {
            $this->userlog('职位上线');
            return redirect('unpositions');
        } 
        else
        {
            echo "<script>alert('上线失败')</script>";
            return  redirect('unpositions');
        }
    }

}