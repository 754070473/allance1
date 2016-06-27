<?php
namespace App\Http\Controllers;
use Session,DB,Request;
/**
 *   CollectionsController  收藏管理
 */

class CollectionsController extends Controller{

    //我收藏的职位
	public  function collections(){
		$id = session::get('per_id');
		$id = 1;
		$data['arr'] = DB::table('al_collect')         
            ->join('al_personal', function($join)  
            {  
                $join->on('al_collect.per_id', '=', 'al_personal.per_id');  
            })
            ->join('al_recruit',function($join)
            {
            	$join->on('al_collect.rec_id', '=', 'al_recruit.rec_id');
            })
            ->join('al_com_message',function($join)
            {
            	$join->on('al_recruit.mes_id','=','al_com_message.mes_id');
            })
            ->join('al_place',function($join)
            {
            	$join->on('al_com_message.m_place','=','al_place.pla_id');
            })
            ->where('al_collect.per_id',$id)
            ->get();
            // print_r($data);
           
		return view("collections.collections",$data);
	}
    //取消收藏
    public function ceancel()
    {
        $id = Request::input('id');
        $res = DB::table('al_collect')->where('col_id',$id)->delete();
        if($res)
        {
            echo 1;
        }
        else
        {
            echo '删除失败';
        }
    }
}