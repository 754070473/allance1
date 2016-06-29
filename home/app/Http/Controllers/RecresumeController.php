<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Request,Validator,DB,Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Cookie;
use Illuminate\Pagination\Paginator;
use Session;
/**
 *   RecresumeController  管理简历 收到的简历
 */

class RecresumeController extends Controller{

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