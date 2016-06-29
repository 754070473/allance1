<?php

namespace App\Http\Controllers;
use Storage,Input;
use DB;
use Session;
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
    /**
     * 获取当前控制器与方法
     *
     * @return array
     */
    public function getCurrentAction()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);

        return ['controller' => $class, 'method' => $method];
    }

    //积分控制
    public function integral()
    {
        $com_id = Session::get('com_id')?Session::get('com_id'):"";
        if($com_id != "")
        {
            $url = $this->getCurrentAction();
            $function = $url['method'];
            $controller = substr($url['controller'], strpos($url['controller'], 'Controllers') + 12, -10);
            $integral = DB::table('al_integral')->where('i_controller', $controller)->where('i_function', $function)->first();
            if (!empty($integral))
            {
                DB::table('al_company')->increment('c_integral', $integral->i_num);
            }
        }
    }

    /**
     * 会员日志
     * @param $content 操作内容
     */
    public function userlog($content)
    {
        $com_id = Session::get('com_id')?Session::get('com_id'):"";
        $per_id = Session::get('per_id')?Session::get('per_id'):"";
        $time = date('Y-m-d H:i:s',time());
        if($com_id!="")
        {
            DB::table('al_user_log')->insert(
                ['com_id' => $com_id, 'u_content' => $content, 'u_time' => $time]);
        }
        elseif($per_id!="")
        {
            DB::table('al_user_log')->insert(
                ['per_id' => $per_id, 'u_content' => $content, 'u_time' => $time]);
        }
    }

    public function imgUpload($upload)
    {
        $file = Input::file($upload);
        if($file -> isValid()){
            $clientName = $file -> getClientOriginalName(); //图片名称
            $tmpName = $file ->getFileName();//缓存在tmp文件夹中的文件名例如php8933.tmp 这种类型的.
            $realPath = $file -> getRealPath(); //这个表示的是缓存在tmp文件夹下的文件的绝对路径
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $mimeTye = $file -> getMimeType();
            $newName = md5(date('ymdhis').$clientName)."."."$entension";//修改图片名称
            $path = $file -> move('upload/',$newName);
            return $path;
        }
    }
}
