<?php
namespace App\Http\Controllers;

/**
 *    ResumetdController  简历投递
 */

class ResumetdController extends Controller{

    //已投递简历状态
    public  function  delivery(){
        return view("resumetd.delivery");
    }
  
}