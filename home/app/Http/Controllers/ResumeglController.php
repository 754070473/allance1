<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  DB;
/**
 *   ResumeglController  简历信息管理
 */

class ResumeglController extends Controller{
  
    //简历
    public  function preview(){
        return view("resumegl.preview");
    }
    //简历
    public  function pre(Request $request){
        $id=$request->input('id');
        $users =DB::table('al_resume')
            ->where("res_id",$id)
            ->get();
         //print_r($users);die;


        return view("resumegl.pre",['users' => $users]);
    }
}