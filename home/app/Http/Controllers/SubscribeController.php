<?php
namespace App\Http\Controllers;

/**
 *   SubscribeController  订阅管理
 */

class SubscribeController extends Controller{

    //我的职位订阅
    public  function subscribe(){
        return view("subscribe.subscribe");
    }

    //我的职位订阅1
    public  function subscribe01(){
        return view("subscribe.subscribe01");
    }
}