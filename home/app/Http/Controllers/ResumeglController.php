<?php
namespace App\Http\Controllers;

/**
 *   ResumeglController  简历信息管理
 */

class ResumeglController extends Controller{
  
    //简历
    public  function preview(){
        return view("resumegl.preview");
    }
}