<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Mail;
/**
 *   SubscribeController  订阅管理
 */

class SubscribeController extends Controller{

    //我的职位订阅
    public  function subscribe(){
        $per_id = Session::get('per_id')?Session::get('per_id'):"";

        //职位
        $post = $this->classify('al_post','p_pid');
        $industry = DB::table('al_hang')->get();
        if($per_id == "")
        {
            return view("subscribe.subscribe",['post'=>$post,'industry'=>$industry]);
        }
        else
        {
            $arr = DB::table('al_subscrip')->where('per_id', "$per_id")->first();
            if(empty($arr))
            {
                return view("subscribe.subscribe",['post'=>$post,'industry'=>$industry]);
            }
            else
            {
                return view("subscribe.subscribe01",['post'=>$post,'arr'=>$arr,'industry'=>$industry]);
            }
        }
    }

    //订阅职位添加
    public function subinfo(Request $request){
        $per_id = Session::get('per_id')?Session::get('per_id'):"";
        if(empty($per_id))
        {
            echo 0;
        }
        else
        {
            $email = $request->input('email');
            $day = $request->input('day');
            $job = $request->input('job');
            $city = $request->input('city');
            $stage = $request->input('stage');
            $industry = $request->input('industry');
            $salary = $request->input('salary');
            $time = date('Y-m-d',time());
            $next_time = date("Y-m-d",strtotime("+$day days"));
            $arr = DB::table('al_subscrip')->where('per_id', "$per_id")->first();
            if(empty($arr)) {
                $re = DB::insert('insert into al_subscrip (s_email, s_day, s_job, s_place, s_stage, s_industry, s_salary, s_time,next_time, per_id) values (?, ?,?,?,?,?,?,?,?,?)', [$email, $day, $job, $city, $stage, $industry, $salary, $time,$next_time, $per_id]);
                if ($re) {
                    $this->userlog('订阅职位');
                    echo 1;
                } else {
                    echo 2;
                }
            }
            else
            {
                $re = DB::table('al_subscrip')
                    ->where('per_id',$per_id)
                    ->update(['s_email' => $email,'s_day'=>$day,'s_job'=>$job,'s_place'=>$city,'s_stage'=>$stage,'s_industry'=>$industry,'s_salary'=>$salary,'s_time'=>$time,'next_time'=>$next_time]);
                if ($re) {
                    $this->userlog('修改订阅');
                    echo 1;
                } else {
                    echo 2;
                }
            }
        }
    }
    //订阅删除
    public function subdel()
    {
        $per_id = Session::get('per_id')?Session::get('per_id'):"";
        if(empty($per_id)){
            echo 0;
        }else{
            $re = DB::table('al_subscrip')->where('per_id', '=', $per_id)->delete();
            if($re){
                $this->userlog('退订职位');
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    //订阅邮箱推送
    public function send()
    {
        ignore_user_abort(); //即使Client断开(如关掉浏览器)，PHP脚本也可以继续执行.
        set_time_limit(0); // 执行时间为无限制，php默认的执行时间是30秒，通过set_time_limit(0)可以让程序无限制的执行下去
//        $interval=60*60*24; // 每隔一天运行
        $interval=60*5; // 每隔5分钟运行
        do{
            $time = date('Y-m-d',time());
            $sub = DB::table('al_subscrip')->where('next_time', '=', $time)->get();
            if(!empty($sub)){
                foreach($sub as $val)
                {
                    $user = DB::table('al_personal')->where('per_id', $val->per_id)->first();
                    if($user->i_name=="")
                    {
                        $name = $user->p_email;
                    }else{
                        $name = $user->i_name;
                    }
                    $arr = DB::table('al_recruit')
                        ->join('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                        ->where('r_status',1)
                        ->where('m_place',$val->s_place)
                        ->where('r_name',$val->s_job)
                        ->get();
                    if(empty($arr)){
                        $arr = 0;
                    }
                    /*$day = $val->s_day;
                    $next_time = date("Y-m-d",strtotime("+$day days"));
                    DB::table('al_subscrip')
                        ->where('sub_id', $val->sub_id)
                        ->update(['next_time' => $next_time]);*/
                    global $email;
                    $email = $val->s_email;
                    $flag = Mail::send('subscribe.email',['name'=>$name,'arr'=>$arr],function($message){
                        $to = $GLOBALS['email'];
                        $message ->to($to)->subject('强强联合招聘网站职位订阅');
                    });
                    if($flag){
                        echo '发送邮件成功，请查收！';
                    }else{
                        echo '发送邮件失败，请重试！';
                    }
                }
            }
            sleep($interval); // 等待一天
        }while(true);
    }
}