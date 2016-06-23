<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
	
	 /**
     * 无限极分类数组处理
     * @param $table  表名
     * @param $pid_name pid字段名
     * @param int $pid
     * @return array
     */
    public function classify($table,$pid_name,$pid=0){
		$dbh = DB::connection()->getPdo();
		$dbh->query('set names utf8;');
		$rescolumns = $dbh->query("SHOW FULL COLUMNS FROM ".$table)->fetch();
        $k = $rescolumns['Field'];
        //查询表中根分类
        $stmt = $dbh->query("select * from $table where $pid_name = $pid");
		$arr = $stmt->fetchAll($dbh::FETCH_ASSOC);
		$dbh = null;
        //查询子分类
        foreach($arr as $key=>$val)
		{
            $arr[$key]['son']=$this->classify($table,$pid_name,$pid=$val[$k]);
        }
        return $arr;
    }

}
