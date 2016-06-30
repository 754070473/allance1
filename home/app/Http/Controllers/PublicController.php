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
		//个人
		$per_id=Session::get('per_id');//用户id
		$query['i_name']=Session::get('i_name');//用户id
		//企业
		$com_id=Session::get('com_id');//企业id
		$query['c_phone']=Session::get('c_phone');
		$query['c_email']=Session::get('c_email');
		if(!empty($per_id)){
			$query['key']="1";//判断是否是个人登录
		}else if(!empty($com_id)){
			
            //根据企业id查询在企业表中是否有企业id(mes_id)
            $user = DB::table('al_company')->where('com_id', $com_id)->first();
            $mes_id = $user->mes_id;
            if(empty($mes_id))
            {
                $query['dz'] = 'index01';
            }
            else
            {
                $mes = DB::table('al_com_message')->where('mes_id', $mes_id)->first();
                $m_name = $mes->m_name;
                $m_url = $mes->m_url;
                $m_place = $mes->m_place;
                $m_type = $mes->m_type;
                $me_id = $mes->me_id;
                $welfare = $mes->m_welfare;
                $leadername = $mes->leadername;  //创始人姓名
                $position = $mes->position;  //创始人 职位
                $weibo = $mes->weibo;  //创始人微博
                $remark = $mes->remark;  //创始人介绍
                $product = $mes->product;  //产品名称
                $productUrl = $mes->productUrl;  //产品地址
                $productProfile = $mes->productProfile;  //产品地址
                $m_logo = $mes->m_logo;  //公司logo
                $m_desc = $mes->m_desc;  //产品介绍
                if(empty($m_name)||empty($m_url)||empty($m_place)||empty($m_type)||empty($me_id))
                {
                    $query['dz'] = 'index01';  //添加企业信息1
                }
                elseif(isset($m_name)&&isset($m_url)&&isset($m_place)&&isset($m_type)&&isset($me_id)||empty($welfare))
                {
                    $query['dz'] = 'tag';       //添加企业信息2
                }
                elseif(isset($m_name)&&isset($m_url)&&isset($m_place)&&isset($m_type)&&isset($me_id)&&isset($welfare)||empty($leadername)||empty($position)||empty($weibo)||empty($remark))
                {
                    $query['dz'] = 'founder';   //添加企业信息3
                }
                elseif(isset($m_name)&&isset($m_url)&&isset($m_place)&&isset($m_type)&&isset($me_id)&&isset($welfare)&&isset($leadername)&&isset($position)&&isset($weibo)&&isset($remark)||empty($product)||empty($productProfile)||empty($productUrl))
                {
                    $query['dz'] = 'index02';   //添加企业信息4
                }
                elseif(isset($m_name)&&isset($m_url)&&isset($m_place)&&isset($m_type)&&isset($me_id)&&isset($welfare)&&isset($leadername)&&isset($position)&&isset($weibo)&&isset($remark)&&isset($product)&&isset($productProfile)&&isset($productUrl)||empty($m_logo)||empty($m_desc))
                {
                    $query['dz'] = 'index03';   //添加企业信息5
                }
                else
                {
                    $query['dz'] = 'index03';   //企业信息
                }
                $query['key']="2";//企业登录
            }

		}else{
			$query['key']="0";//没登录
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
                // print_r($query);
                 return view("public.top",$query);

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
        $now_time = date('Y-m-d H:i:s',time());
		$arr = $this->classify('al_post','p_pid');
        $data = DB::select('select * from al_generalize_type');
        foreach($data as $key=>$val)
        {
            $data[$key]->son = DB::table('al_recruit')
                ->join('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->join('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->where('g_type_id', '=', $val->g_type_id)
                ->where('r_status',1)
                ->get();
            foreach ($data[$key]->son as $k => $v) {
                $time = $this->time($v->r_addtime, $now_time);
                if ($time['d'] > 0) {
                    $data[$key]->son[$k]->r_addtime = $time['d'] . '天前发布';
                } elseif ($time['h'] > 0) {
                    $data[$key]->son[$k]->r_addtime = $time['h'] . '小时前发布';
                } elseif ($time['m'] > 4) {
                    $data[$key]->son[$k]->r_addtime = $time['m'] . '分钟前发布';
                } else {
                    $data[$key]->son[$k]->r_addtime = '刚刚发布';
                }
            }
        }
		return view("public.main",['arr'=>$arr,'data'=>$data]);
	}

    /**
     * 获取时间相差天、时、分、秒数
     * @param $one 初始时间
     * @param $tow 结束时间
     * @return array
     */
    public function time($one,$tow){
        $one = strtotime($one);
        $tow = strtotime($tow);
        $cle = $tow - $one; //得出时间戳差值

        /* 这个只是提示
        echo floor($cle/60); //得出一共多少分钟
        echo floor($cle/3600); //得出一共多少小时
        echo floor($cle/3600/24); //得出一共多少天
        */
        /*Rming()函数，即舍去法取整*/
        $d = floor($cle/3600/24);
        $h = floor(($cle%(3600*24))/3600);  //%取余
        $m = floor(($cle%(3600*24))%3600/60);
        $s = floor(($cle%(3600*24))%60);

        return array('d'=>$d,'h'=>$h,'m'=>$m,'s'=>$s);
    }
}	

?>