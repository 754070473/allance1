<?php
namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session,DB,Request;
// use App\Personal;
/**
 *   AccountsetController  账号设置
 */

class AccountsetController extends Controller{

    //账号绑定
    public function accountBind()
    {
    	return view("accountset.accountBind");
    }

    //找回密码
    public function reset()
    {
    	return view("accountset.reset");
    }

    //修改密码
    public function updatePwd()
    {
        $id = session::get('per_id');
        // $id=1;
        $row = DB::table('al_personal')->where('per_id',$id)->first();
        $email['aa'] = $row->i_name;
        return view("accountset.updatePwd",$email);
       
    }
    public function pass(Request $request)
    {
        $id = session::get('per_id');
        // $id=1;
        $j_pwd = $request::input('oldPassword');
        $n_pwd = $request::input('newPassword');
        $row = DB::table('al_personal')->where('per_id',$id)->first();
        $pwd = $row->p_pwd;
        // echo $j_pwd;
        if($j_pwd==$pwd)
        {
            $re = DB::table('al_personal')
            ->where('per_id',$id)
            ->update(['p_pwd' =>$n_pwd]);
            if($re)
            {
                echo '1';
            }
            else
            {
                echo '修改失败';
            }
        } 
        else
        {
            echo '你输入的密码不正确';
        }             
    }
}