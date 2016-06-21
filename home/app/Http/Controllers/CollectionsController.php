<?php
namespace App\Http\Controllers;

/**
 *   CollectionsController  收藏管理
 */

class CollectionsController extends Controller{

    //我收藏的职位
	public  function collections(){
		return view("collections.collections");
	}
}