<?php
namespace App\Http\Controllers;

/**
 *   RecresumeController  管理简历 收到的简历
 */

class RecresumeController extends Controller{

	//有效职位
	public function positions()
	{
		return view("recresume.positions");
	}

	//不合适简历
	public function haveRefuseResumes()
	{
		return view("recresume.haveRefuseResumes");
	}

	//待定简历
	public function canInterviewResumes()
	{
		return view("recresume.canInterviewResumes");
	}

	//自动过滤简历
	public  function autoFilterResumes(){
		return view("recresume.autoFilterResumes");
	}

}