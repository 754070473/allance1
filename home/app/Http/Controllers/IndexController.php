<?php
namespace App\Http\Controllers;
use DB;
use Session;

use Request;


/**
 *   IndexController  信息展示
 */

class IndexController extends Controller {
	//展示首页面
	public  function index(){
        $this->integral();
        //获取客户端ip
        $ip = $this->getIP();
        $time = date('Y-m-d',time());
        $sel_ip = DB::table('al_ip')->where('ip', $ip)->first();
        if(empty($sel_ip))
        {
            DB::table('al_ip')->insert(
                ['ip' => $ip, 'ip_time' => $time]);
        }
        else
        {
            if($sel_ip->ip_time != $time)
            {
                DB::table('al_ip')
                    ->where('ip_id', $sel_ip->ip_id)
                    ->update(['ip_time' => $time]);
            }
        }
        return view("index.index");
	}

    //展示招聘信息详情
    public function jobdetail()
    {
        $per_id = session::get('per_id');
        $rec_id = Request::input('rec_id');
        if(empty($per_id))
        {
            $pd = Request::input('pd');
            if(!empty($pd))
            {
                // echo 1;
                session::put('per_id',$pd);
                $per_id = $pd;
                $arr['data'] = DB::table('al_personal')
                        ->join('al_resume', 'al_resume.per_id', '=', 'al_personal.per_id')
                        ->where('al_personal.per_id',$per_id)
                        ->get();
                $user = DB::table('al_collect')->where('per_id', $per_id)->first();
                  if(empty($user))
                    {
                        $arr['aa'] = 0; 
                    }
                    else
                    {
                        $r_id = $user->rec_id;
                        if($r_id==$rec_id)
                        {
                           $arr['aa'] = 1; 
                        }
                        else
                        {
                            $arr['aa'] = 0; 
                        }
                        
                    }
            }
            $arr['data'] = DB::table('al_personal')
                        ->join('al_resume', 'al_resume.per_id', '=', 'al_personal.per_id')
                        ->where('al_personal.per_id',$per_id)
                        ->get();
                $arr['aa'] = 0;
                // $per_id = 1;                     //测试用户id
                $arr['row'] = DB::table('al_recruit')
                            ->join('al_place', 'al_place.pla_id', '=', 'al_recruit.pla_id')
                            ->join('al_com_message', 'al_com_message.mes_id', '=', 'al_recruit.mes_id')
                            ->where('rec_id', $rec_id)->first();
                            $arr['per_id'] = $per_id ?$per_id : '' ;
                            // print_r($arr);
                            // echo $arr['per_id'];die();
            	return view("index.jobdetail",$arr);
            
        }
        else
        {
            $arr['data'] = DB::table('al_personal')
                        ->join('al_resume', 'al_resume.per_id', '=', 'al_personal.per_id')
                        ->get();
            
            $arr['row'] = DB::table('al_recruit')
                        ->join('al_place', 'al_place.pla_id', '=', 'al_recruit.pla_id')
                        ->join('al_com_message', 'al_com_message.mes_id', '=', 'al_recruit.mes_id')
                        ->where('rec_id', $rec_id)->first();
                        $arr['per_id'] = $per_id ?$per_id : '' ;
                $user = DB::table('al_collect')->where('per_id', $per_id)->first();
                if(empty($user))
                {
                    $arr['aa'] = 0; 
                }
                else
                {
                    $r_id = $user->rec_id;
                    if($r_id==$rec_id)
                    {
                       $arr['aa'] = 1; 
                    }
                    else
                    {
                        $arr['aa'] = 0; 
                    }
                    
                }
                 $arr['aa'] = 0;
            return view("index.jobdetail",$arr);
        }
        // echo $per_id;
    }
    public function jobdetail_login()
    {

        $p_email = Request::input('email');
        $p_pwd = Request::input('password');
       // echo $p_pwd;
        $res = DB::table('al_personal')->where('p_email', $p_email)->first();
        $pwd = $res->p_pwd;
        if($pwd==md5($p_pwd))
        {
            echo $res->per_id;
        }
        else
        {
            echo 0;
        }
    }

    public function jobdetail_tou()
    {
        $mes_id = Request::input('mes_id');  //企业信息id
        // 根据企业信息id查询企业账号id
        $row = DB::table('al_company')->where('mes_id', $mes_id)->first();
        $com_id = $row->com_id;                //企业账号id
        $res_id = Request::input('res_id');  //简历表id

        // 先查询是不是有这条数据有的话就把时间更新一下
        $user = DB::table('al_deliver')->where('com_id',$com_id)->first();
        $r_id = $user->res_id;
        $del_id = $user->del_id;
        if($r_id==$res_id)
        {
            $res = DB::table('al_deliver')
            ->where('del_id', $del_id)
            ->update(['d_time' => date('Y-m-d H:i:s',time())]);
        }
        else
        {
            //将简历投递的信息添加到投递表中
            $res = DB::table('al_deliver')->insert(
                ['com_id' => $com_id, 'res_id' => $res_id,'d_time'=>date('Y-m-d H:i:s',time()) ]);
            
        }
            if($res)
            {
                return redirect('jobdetail');
            }
            else
            {
                echo "<script>alert('cuowu');window.location.href='jobdetail'</script>";
            }
    }
    //收藏职位
    public function collections_shoucang()
    {
        $per_id = session::get('per_id');
        $rec_id = Request::input('rec_id');
        $user = DB::table('al_collect')->where('per_id', $per_id)->first();
        if(empty($user))
        {
            //添加到收藏表中
            $res = DB::table('al_collect')->insert(
                ['per_id' => $per_id, 'rec_id' => $rec_id ,'c_time'=> date('Y-m-d H:i:s',time())]);
            if($res)
            {
                echo $rec_id;   //成功收藏
            }
            else{
                echo 2;     //收藏失败
            }
        }
        else
        {
             $r_id = $user->rec_id;
                if($r_id==$rec_id)
                {
                    echo 0;  //已收藏
                }
                else
                {
                    echo 1;  //没有收藏
                }       
        }
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
         
       $acc = DB::table('al_place')
                 ->where('p_pid',0)
                ->get();
// print_r($acc);die; 
                $ar = $this->classify('al_post','p_pid');
       $users = DB::table('al_resume')
            ->join('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
            ->join('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
            ->select('al_resume.*', 'al_post.i_name as p_name', 'al_place.i_name')
             ->where('r_show',0)
             ->where('r_type',0)
             ->where('if_img',0)
            ->paginate(15);
        //print_r($ar);die;
        return view('index.company', ['acc'=>$acc,'ar'=>$ar,'users' => $users]);

     // return view("index.company");
    }
 //公司找简历详细信息
    public function select_all(Request $request)
    {

        $id=$request->input('id');
      //echo ($id);die;

//        $acc = DB::table('al_place')
//                  ->where('p_pid',0)
                 
//                 ->get();
// //print_r($acc);die; 
//                 $ar = $this->classify('al_post','p_pid');
       $users = DB::table('al_resume')
            ->join('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
            ->join('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
            ->select('al_resume.*', 'al_post.i_name as p_name', 'al_place.i_name')
             ->where('al_place.pla_id',"$id")
             ->where('r_show',0)
             ->where('r_type',0)
             ->where('if_img',0)
            ->paginate(15);
        // 存储数据到session...
               session(['pla_id' =>$id]);
  
//echo "$value";die;
       return view('index.companyshowlist', ['users' => $users]);
 
    }
    //公司找简历详细信息
    public function select_al(Request $request)
    {

        $post_id=$request->input('id');
      //echo ($post_id);die;

       // $acc = DB::table('al_place')
       //           ->where('p_pid',0)
                 
       //          ->get();
//print_r($acc);die; 
                // $ar = $this->classify('al_post','p_pid');
                if(empty(session('pla_id'))){

             $users = DB::table('al_resume')
            ->join('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
            ->join('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
            ->select('al_resume.*', 'al_post.i_name as p_name', 'al_place.i_name')
             ->where('al_post.post_id',"$post_id")
             ->where('r_show',0)
             ->where('r_type',0)
             ->where('if_img',0)
            ->paginate(15);
                }else{
                    // 从session中获取数据...
             $pla_id = session('pla_id');
                    $users = DB::table('al_resume')
            ->join('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
            ->join('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
            ->select('al_resume.*', 'al_post.i_name as p_name', 'al_place.i_name')
             ->where('al_post.post_id',"$post_id")
             ->where('al_place.pla_id',"$pla_id")
             ->where('r_show',0)
             ->where('r_type',0)
             ->where('if_img',0)
            ->paginate(15);
                }
       
      
  
//echo "$value";die;
       return view('index.companyshowlist', ['users' => $users]);
       
}
//简历详情
public  function gerenlist(Request $request){
     $res_id=$request->input('id');
     $users = DB::table('al_resume')
            ->join('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
            ->join('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
            ->select('al_resume.*', 'al_post.i_name as p_name', 'al_place.i_name')
             ->where('res_id',"$res_id")
            ->get();
     //echo "$res_id";die;
            //print_r($users);die;
      return view('index.geren', ['users' => $users]);

}

	//展示关于 联系我们
	public function about()
	{
		return view("index.about");
	}

    //获取ip
    function getIp(){
        $onlineip='';
        if(getenv('HTTP_CLIENT_IP')&&strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')){
            $onlineip=getenv('HTTP_CLIENT_IP');
        } elseif(getenv('HTTP_X_FORWARDED_FOR')&&strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown')){
            $onlineip=getenv('HTTP_X_FORWARDED_FOR');
        } elseif(getenv('REMOTE_ADDR')&&strcasecmp(getenv('REMOTE_ADDR'),'unknown')){
            $onlineip=getenv('REMOTE_ADDR');
        } elseif(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],'unknown')){
            $onlineip=$_SERVER['REMOTE_ADDR'];
        }
        return $onlineip;
    }

}

?>
