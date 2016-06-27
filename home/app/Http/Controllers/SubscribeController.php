<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
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
            $time = date('Y-m-d H:i:s',time());
            $arr = DB::table('al_subscrip')->where('per_id', "$per_id")->first();
            if(empty($arr)) {
                $re = DB::insert('insert into al_subscrip (s_email, s_day, s_job, s_place, s_stage, s_industry, s_salary, s_time, per_id) values (?, ?,?,?,?,?,?,?,?)', [$email, $day, $job, $city, $stage, $industry, $salary, $time, $per_id]);
                if ($re) {
                    echo 1;
                } else {
                    echo 2;
                }
            }
            else
            {
                $re = DB::table('al_subscrip')
                    ->where('per_id',$per_id)
                    ->update(['s_email' => $email,'s_day'=>$day,'s_job'=>$job,'s_place'=>$city,'s_stage'=>$stage,'s_industry'=>$industry,'s_salary'=>$salary,'s_time'=>$time]);
                if ($re) {
                    echo 1;
                } else {
                    echo 2;
                }
            }
        }
    }

    public function subdel()
    {
        $per_id = Session::get('per_id')?Session::get('per_id'):"";
        if(empty($per_id)){
            echo 0;
        }else{
            $re = DB::table('al_subscrip')->where('per_id', '=', $per_id)->delete();
            if($re){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
}