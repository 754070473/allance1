<?php
namespace App\Http\Controllers;

/**
 *   PostofficeController  发布职位
 */

class PostofficeController extends Controller{

	//发布新职位
	public function create()
	{
		return view("postoffice.create");
	}

	//职位发布成功
	public function index06()
	{
		return view("postoffice.index06");
	}

}