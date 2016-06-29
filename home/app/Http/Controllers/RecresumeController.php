<?php
namespace App\Http\Controllers;

use   DB;
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
        $re=DB::table('al_resume')
            ->where('res_id', $id)
            ->update(['status' => 1]);
        if($re){
            echo 1;
        }else{
            echo  0;
        }

    }
    public function tong(Request $request)
    {
        $id=$request->input('id');
        $re=DB::table('al_resume')
            ->where('res_id', $id)
            ->update(['status' => 2]);
        if($re){
            echo 1;
        }else{
            echo  0;
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