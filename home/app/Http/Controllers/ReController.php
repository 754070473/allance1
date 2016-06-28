<?php
namespace App\Http\Controllers;
use DB;
use Session;


/**
 *   IndexController  信息展示
 */

class ReController extends Controller
{
    //展示首页面
    public function companylist()
    {
        return view("index.companylist");
    }
}