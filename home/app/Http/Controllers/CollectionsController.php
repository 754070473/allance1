<?php
namespace App\Http\Controllers;
use DB;
use Session;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 *   CollectionsController  收藏管理
 */

class CollectionsController extends Controller{

    //我收藏的职位
	public  function collections(){
		
		return view("collections.collections");
	}
}