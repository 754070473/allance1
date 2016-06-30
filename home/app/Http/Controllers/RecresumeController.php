<?php
namespace App\Http\Controllers;

use   DB;
use Mail;
use Illuminate\Http\Request;

/**
 *   RecresumeController  管理简历 收到的简历
 */

class RecresumeController extends Controller{

	//不合适简历
	public function haveRefuseResumes()
	{
        $users = DB::table('al_resume')
            ->where("status",1)
            ->get();
        // print_r($users);die;

       // return view("recresume.canInterviewResumes");
		return view("recresume.haveRefuseResumes",['users' => $users]);
	}
    //通知面试
    public function mian()
    {
        $users = DB::table('al_resume')
            ->where("status",2)
            ->get();
        // print_r($users);die;

        // return view("recresume.canInterviewResumes");
        return view("recresume.haveRefuseResume",['users' => $users]);
    }

	//待定简历
	public function canInterviewResumes()
	{
        $users = DB::table('al_resume')
            ->where("status",0)
            ->get();
   // print_r($users);die;

		return view("recresume.canInterviewResumes",['users' => $users]);
	}
    //待定简历
    public function zhi()
    {
        $users = DB::table('al_resume')
            ->where("status",2)
            ->get();
        // print_r($users);die;

        return view("recresume.canInterviewResumes",['users' => $users]);
    }
    public function can(Request $request)
    {
        $id=$request->input('id');
        $content=$request->input('content')?$request->input('content'):"";
        global $email;
        $email = DB::table('al_resume')->where('res_id', $id)->value('r_email');
        $imgPath = 'http://localhost/php_9/allance1/home/public/style/images/logo.png';
        $flag = Mail::send('recresume.mail',['content'=>$content,'imgPath'=>$imgPath],function($message){
        $to = $GLOBALS['email'];
        $message ->to($to)->subject('面试通知--强强联合网站');
        });
        if($flag){
            $re=DB::table('al_resume')
                ->where('res_id', $id)
                ->update(['status' => 1]);
            if($re){
                echo 1;
            }else{
                echo  0;
            }
        }else{
            echo 2;
        }
    }
    public function tong(Request $request)
    {
        $id=$request->input('id');
        $subject=$request->input('subject')?$request->input('subject'):"";
        $date=$request->input('date')?$request->input('date'):"";
        $place=$request->input('place')?$request->input('place'):"";
        $man=$request->input('man')?$request->input('man'):"";
        $phone=$request->input('phone')?$request->input('phone'):"";
        $content=$request->input('content')?$request->input('content'):"";
        global $email;
        $email = DB::table('al_resume')->where('res_id', $id)->value('r_email');
        $name = DB::table('al_resume')->where('res_id', $id)->value('r_name');
        $imgPath = 'http://localhost/php_9/allance1/home/public/style/images/logo.png';
        $flag = Mail::send('recresume.email',['subject'=>$subject,'name'=>$name,'date'=>$date,'place'=>$place,'man'=>$man,'phone'=>$phone,'content'=>$content,'imgPath'=>$imgPath],function($message){
            $to = $GLOBALS['email'];
            $message ->to($to)->subject('面试通知--强强联合网站');
        });
        if($flag){
            $re=DB::table('al_resume')
                ->where('res_id', $id)
                ->update(['status' => 2]);
            if($re){
                echo 1;
            }else{
                echo  0;
            }
        }else{
            echo 2;
        }
    }
      // 建立删除
    public function del(Request $request)
    {
        $id=$request->input('id');
       // echo   $id;die;
        $re=DB::table('al_resume')->where('res_id','=',$id )->delete();
       //$re=DB::delete("delete from al_resume  where  mes_id='$id'");
      if($re){
          echo 1;
      }else{
          echo  0;
      }


    }
    //自动过滤简历
	public  function autoFilterResumes(){
		return view("recresume.autoFilterResumes");
	}

}