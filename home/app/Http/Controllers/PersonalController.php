<?php
namespace App\Http\Controllers;

/**
 *   PersonalController  个人信息管理
 */

class PersonalController extends Controller {

    //我的简历
    public  function jianli(){
        return view("personal.jianli");
    }
}	

?>
