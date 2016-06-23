<?php
namespace App\Http\Controllers;
use DB;
use Session;

use Illuminate\Http\Request;

/**
 *   LoginController  账号登录
 */

class PublicController extends Controller {
	//展示头部
	public  function top(){
		$per_id=Session::get('per_id');//用户id
		
		$com_id=Session::get('com_id');//企业id
		if(!empty($per_id)){
			$key="1";//判断是否是个人登录
		}else if(!empty($com_id)){
			$key="2";//企业登录
		}else{
			$key="0";//没登录
		}
		/**生成静态化页面*/
            // ob_start(); //打开输出缓冲区  
            // $cacheTime = "10"; //设置缓存页面过期时间
            // $cacheDir = 'cache'; //设置缓存页面文件目录
            // if (!is_dir($cacheDir)) mkdir($cacheDir); //判断目录是否存在，否则创建目录  
            //     $cacheFile = './'.$cacheDir.'/'.(int)date("Ymd").'.html'; //缓存文件路径，文件以日期命名 
            //     is_file($cacheFile); 
            // if (!is_file($cacheFile) || time() - filemtime($cacheFile) > $cacheTime) {  
            //<!--页面输出部分内容。也是ob_get_contents()函数取得的全部内容-->
            
                 return view("public.top",["per_id"=>$per_id,'com_id'=>$com_id,'key'=>$key]);

            // $content = ob_get_contents(); //取得php页面输出的全部内容   
            // $fp = fopen($cacheFile, "w"); //输出内容写入文件  
            // fwrite($fp, $content); 
            // fclose($fp);
            // } else {
            //     echo $content = file_get_contents($cacheFile); //如果缓存文件已经存在，且未过期则读取  
            // }  
		
	}
	/**
	 * [left 左侧]
	 * @return [type] [description]
	 */
	public  function left(){
		return view("public.left");
	}
	/**中心*/
	public  function main(){
		$arr = $this->classify('al_post','p_pid');
		return view("public.main",['arr'=>$arr]);
	}

}	

?>