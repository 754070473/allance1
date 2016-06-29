<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;


/**
 *   IndexController  信息展示
 */

class ReController extends Controller
{
    //展示首页面
    public function companylist()
    {
        $users = DB::table('al_hang')->get();
        $user = DB::table('al_com_message')
            ->join('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
            ->select('*')
            ->get();
        // print_r($user);die;
        return view("index.companylist",["arr"=>$users],["ar"=>$user]);
    }
    public function hang(Request $request)
    {

        $type=$request->input('rr');
  //echo $type;die;
         session::put('type',$type);
        //$ty=session::get('type');
        //echo $ty;die;
        $user = DB::table('al_com_message')
            ->join('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
            ->select('*')
            ->where("m_type",$type)
            ->get();

       $use = DB::table('al_hang')->get();
        //print_r($use);die;
        return view("index.companylist",["ar"=>$user,'arr'=> $use]);

    }
    public function han(Request $request)
    {

        $id=$request->input('id');
        //print_r($id);die;
       $use = DB::table('al_com_message')->where("me_id",$id)->get();
       // $user = DB::table('al_hang')->get();
        //print_r($use);die;
        return view("index.companyshow",["ar"=>$use]);

    }


}