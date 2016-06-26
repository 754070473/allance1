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
        if($per_id == "")
        {
            return view("subscribe.subscribe",['post'=>$post]);
        }
        else
        {
            $arr = DB::table('al_subscrip')->where('per_id', "$per_id")->first();
            if(empty($arr))
            {
                return view("subscribe.subscribe",['post'=>$post]);
            }
            else
            {
                return view("subscribe.subscribe01",['post'=>$post,'arr'=>$arr]);
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
            $time = date('Y-m-d H:i:s', time());
            $re = DB::table('al_subscrip')->insert(['s_email' => "$email", 's_day' => "$day", 's_job' => "$job", 's_city' => "$city", 's_stage' => "$stage", 's_industry' => "$industry", 's_salary' => "$salary", 's_time' => "$time"]);
            if($re)
            {
                echo 1;
            }
            else
            {
                echo 2;
            }
        }
    }
}