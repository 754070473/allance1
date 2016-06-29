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
    	 $place = DB::table('al_place')->where('p_pid',0)->get();
        $users = DB::table('al_hang')->get();
        $user = DB::table('al_com_message')
            ->join('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
            ->select('*')
            ->get();
        // print_r($user);die;
        return view("index.companylist",["arr"=>$users,"ar"=>$user,"place"=>$place]);
    }
    //个人地址找企业
    public function place_list(Request $request){
    	//echo "1111111";die;
    	$i_name=$request->input('i_name');
    	//echo "$i_name";die;
    	 session::put('name',$i_name);
    	 $user = DB::table('al_com_message')
           ->where('m_place',$i_name)
            ->select('*')
            ->get();
            //echo "$user";die;
           
return view("index.companyshow",["ar"=>$user]);
    } 
    //个人公司规模找企业
    public function type(Request $request)
    {

        $type=$request->input('rr');
  //echo $type;die;
         session::put('rr',$type);
         if( session::get('name')){
         	$i_name=session::get('name');
         	 $place = DB::table('al_place')->where('p_pid',0)->get();
        $users = DB::table('al_hang')->get();
          $user = DB::table('al_com_message')
            ->join('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
            ->select('*')
            ->where("m_type",$type)
             ->where("m_place",$i_name)
            ->get();

       $use = DB::table('al_hang')->get();
        //print_r($use);die;
         return view("index.companylist",["arr"=>$users,"ar"=>$user,"place"=>$place]);
         }else{
         	 $place = DB::table('al_place')->where('p_pid',0)->get();
        $users = DB::table('al_hang')->get();
         	 $user = DB::table('al_com_message')
            ->join('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
            ->select('*')
            ->where("m_type",$type)
            ->get();

       $use = DB::table('al_hang')->get();
        //print_r($use);die;
       return view("index.companylist",["arr"=>$users,"ar"=>$user,"place"=>$place]);
         }
        
  
       

    }
    public function hang(Request $request)
    {
    	  $me_id=$request->input('me_id');
    	 // echo "$me_id";die;
           if(session::get('name')){
           	  $me_id=$request->input('me_id');
	           	$i_name=session::get('name');
	             $user = DB::table('al_com_message')
	               ->join('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
	               ->select('*')
	               ->where('m_place',$i_name)
	                ->where('al_com_message.me_id',$me_id)
	               >get();
	                return view("index.companyshow",["ar"=>$user]);
           }else if(session::get('name') && session::get('rr')){
           	  $me_id=$request->input('me_id');
	          $i_name=session::get('name');
	           $rr=session::get('rr');
	             $user = DB::table('al_com_message')
	               ->join('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
	               ->select('*')
	               ->where('m_place',$i_name)
	               ->where('al_com_message.me_id',$me_id)
	               ->where('m_type',$rr)
	               ->get();
	               echo "$rr";die;
	               return view("index.companyshow",["ar"=>$user]);
           }else{
           	  $me_id=$request->input('me_id');
           	  //echo "$me_id";die;
           	$user = DB::table('al_com_message')
	               ->join('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
	               ->select('*')
	               ->where('al_com_message.me_id',$me_id)
	               ->get();
	            //print_r"$user";die;
                           return view("index.companyshow",["ar"=>$user]);
           }
    }


}