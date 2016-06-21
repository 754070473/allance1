<?php
namespace App\Http\Controllers;

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
    	return view("accountset.updatePwd");
    }
}