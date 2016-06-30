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
        //print_r($data);die;
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
    // 搜索
    public function search(Request $request)
    {
        $query['name']=$request->input('name');

        $name=$request->input('name');


        $now_time = date('Y-m-d H:i:s',time());
        $query['arr']=DB::table('al_recruit')
            ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
            ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
            ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')
            ->where('r_name','like',"%$name%")
            ->where('r_status',1)
            ->paginate(5);
            foreach ($query['arr'] as $k => $v) {

                $time = $this->time($v->r_addtime, $now_time);
                if ($time['d'] > 0) {
                    $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                } elseif ($time['h'] > 0) {
                    $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                } elseif ($time['m'] > 4) {
                    $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                } else {
                    $query['arr'][$k]->r_addtime = '刚刚发布';
                }

            } 
            //热门城市
//        $res_id=$query['arr']->res_id;
        $query['hot']=DB::table('al_place')->select(['*'])->where('i_level','like',"%1%")->get();
        //ABCDEF
        $query['ABCDEF']=DB::table('al_place')->select(['*'])->where('i_level','like',"%A%")->orwhere('i_level','like',"%B%")->orwhere('i_level','like',"%C%")->orwhere('i_level','like',"%D%")->orwhere('i_level','like',"%E%")->orwhere('i_level','like',"%F%")->get();
        //GHIJ
        $query['GHIJ']=DB::table('al_place')->select(['*'])->where('i_level','like',"%G%")->orwhere('i_level','like',"%H%")->orwhere('i_level','like',"%I%")->orwhere('i_level','like',"%J%")->get();
        //KLMN
        $query['KLMN']=DB::table('al_place')->select(['*'])->where('i_level','like',"%K%")->orwhere('i_level','like',"%L%")->orwhere('i_level','like',"%M%")->orwhere('i_level','like',"%N%")->get();
        //OPQR
        $query['OPQR']=DB::table('al_place')->select(['*'])->where('i_level','like',"%O%")->orwhere('i_level','like',"%P%")->orwhere('i_level','like',"%Q%")->orwhere('i_level','like',"%R%")->get();
        //STUV
         $query['STUV']=DB::table('al_place')->select(['*'])->where('i_level','like',"%S%")->orwhere('i_level','like',"%T%")->orwhere('i_level','like',"%U%")->orwhere('i_level','like',"%V%")->get();
        //WXYZ
         $query['WXYZ']=DB::table('al_place')->select(['*'])->where('i_level','like',"%W%")->orwhere('i_level','like',"%X%")->orwhere('i_level','like',"%Y%")->orwhere('i_level','like',"%Z%")->get();
          //期望城市
          //print_r($query);die;
        return view('index.search',$query);
    }

    public function searchajax(Request $request)
    {
        $r_suffer=$request->input('r_suffer');
        if($r_suffer=="应届生"){$r_suffer="0";}elseif ($r_suffer=="无经验"){$r_suffer="1";}elseif ($r_suffer=="1年以下"){$r_suffer="2";}elseif ($r_suffer=="1-3年"){$r_suffer="3";}elseif ($r_suffer=="3-5年"){$r_suffer="4";}elseif ($r_suffer=="5-10年"){$r_suffer="5";}elseif ($r_suffer=="10年以上"){$r_suffer="6";}else{ $r_suffer=""; }
        $r_edu=$request->input('r_edu');
        if($r_edu=="初中"){$r_edu="0";}elseif ($r_edu=="高中"){$r_edu="1";}elseif ($r_edu=="中技"){$r_edu="2";}elseif ($r_edu=="中专"){$r_edu="3";}elseif ($r_edu=="大专"){$r_edu="4";}elseif ($r_edu=="本科"){$r_edu="5";}elseif ($r_edu=="硕士"){$r_edu="6";}elseif ($r_edu=="博士"){$r_edu="7"; }elseif ($r_edu=="博后"){$r_edu="8"; }else{ $r_edu=""; }
        $r_pay=$request->input('r_pay');//薪资
        if($r_pay=='不限'){ $r_pay="";}

        $r_name=$request->input('r_name');//职位名称
        $pla_id=$request->input('pla_id');//地区
         //echo $pla_id;
        // echo $r_suffer;//经验
        // echo $r_edu;//学历
        if(!empty($r_suffer)){
            $key="1";
        }else if(!empty($r_edu)){
           $key="2";
        }else if(!empty($pla_id)){
            $key="3";
        }else if(!empty($r_pay)){
            $key="4";
        }else if(!empty($r_name)){
           $key="5";
        }else if(!(empty($r_name)&&empty($pla_id))){
           $key="6";
        }else if(!( empty($r_name)&&empty($r_pay) )){
            $key="7";
        }else if(!( empty($r_name)&&empty($r_edu) )){
           $key="8";
        }else if(!( empty($r_name)&&empty($r_suffer) )){
            $key="9";
        }else if(!( empty($r_name)&&empty($pla_id)&&empty($r_pay) )){
            $key="10";
        }else if(!( empty($r_name)&&empty($pla_id)&&empty($r_edu) )){
            $key="11";
        }else if(!( empty($r_name)&&empty($pla_id)&&empty($r_suffer) )){
            $key="12";
        }else if(!( empty($r_name)&&empty($r_pay)&&empty($r_edu) )){
           $key="13";
        }else if(!( empty($r_name)&&empty($r_pay)&&empty($r_suffer) )){
            $key="14";
        }else if(!( empty($pla_id)&&empty($r_pay)&&empty($r_edu) )){
            $key="15";
        }else if(!( empty($pla_id)&&empty($r_pay)&&empty($r_suffer) )){
            $key="16";
        }else if(!( empty($r_edu)&&empty($r_pay)&&empty($r_suffer) )){
            $key="17";
        }else if(!( empty($r_name)&&empty($pla_id)&&empty($r_pay)&&empty($r_edu) )){
           $key="18";
        }else if(!( empty($r_name)&&empty($pla_id)&&empty($r_pay)&&empty($r_suffer) )){
            $key="19";
        }else if(!( empty($r_name)&&empty($r_edu)&&empty($r_pay)&&empty($r_suffer) )){
            $key="20";
        }else if(!( empty($r_name)&&empty($r_edu)&&empty($r_pay)&&empty($r_suffer)&&empty($pla_id) )){
           $key="21";
        }else{
            $key="";
        }

       if($key=="1"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_suffer','=',"$r_suffer")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="2"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
            ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_edu','=',"$r_edu")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="3"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('i_name','=',"$pla_id")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="4"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_pay','=',"$r_pay")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="5"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                 ->where('r_name','like',"%$r_name%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="6"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_name','like',"%$r_name%")
                ->where('i_name','=',"$pla_id")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="7"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_name','like',"%$r_name%")
                ->where('r_pay','like',"%r_pay%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="8"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_name','like',"%$r_name%")
                ->where('r_edu','like',"%r_edu%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="9"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_name','like',"%$r_name%")
                ->where('r_suffer','like',"%r_suffer%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="10"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_name','like',"%$r_name%")
                ->where('r_pay','like',"%r_pay%")
                ->where('i_name','like',"%pla_id%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="11"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_name','like',"%$r_name%")
                ->where('r_edu','like',"%r_edu%")
                ->where('i_name','like',"%pla_id%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="12"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_name','like',"%$r_name%")
                ->where('r_suffer','like',"%r_suffer%")
                ->where('i_name','like',"%pla_id%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="13"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_name','like',"%$r_name%")
                ->where('r_pay','like',"%r_pay%")
                ->where('r_edu','like',"%r_edu%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="14"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('r_name','like',"%$r_name%")
                ->where('r_pay','like',"%r_pay%")
                ->where('r_suffer','like',"%r_suffer%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="15"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('i_name','like',"%$pla_id%")
                ->where('r_pay','like',"%r_pay%")
                ->where('r_edu','like',"%r_edu%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="16"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')

                ->where('r_status',1)
                ->where('i_name','like',"%$pla_id%")
                ->where('r_pay','like',"%r_pay%")
                ->where('r_suffer','like',"%r_suffer%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="17"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')
                ->where('r_status',1)
                ->where('r_edu','like',"%$r_edu%")
                ->where('r_pay','like',"%r_pay%")
                ->where('r_suffer','like',"%r_suffer%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="18"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')
                ->where('r_status',1)
                ->where('r_edu','like',"%$r_edu%")
                ->where('r_pay','like',"%r_pay%")
                ->where('r_name','like',"%r_name%")
                ->where('i_name','like',"%pla_id%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="19"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')
                ->where('r_status',1)
                ->where('r_suffer','like',"%$r_suffer%")
                ->where('r_pay','like',"%r_pay%")
                ->where('r_name','like',"%r_name%")
                ->where('i_name','like',"%pla_id%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="20"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')
                ->where('r_status',1)
                ->where('r_suffer','like',"%$r_suffer%")
                ->where('r_pay','like',"%r_pay%")
                ->where('r_name','like',"%r_name%")
                ->where('r_edu','like',"%r_edu%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else if($key=="21"){
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')
                ->where('r_status',1)
                ->where('r_suffer','like',"%$r_suffer%")
                ->where('r_pay','like',"%r_pay%")
                ->where('r_name','like',"%r_name%")
                ->where('r_edu','like',"%r_edu%")
                ->where('i_name','like',"%pla_id%")
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }else{
            $now_time = date('Y-m-d H:i:s',time());
            $query['arr']=DB::table('al_recruit')
                ->leftjoin('al_com_message', 'al_recruit.mes_id', '=', 'al_com_message.mes_id')
                ->leftjoin('al_hang', 'al_com_message.me_id', '=', 'al_hang.me_id')
                ->leftjoin('al_place', 'al_recruit.pla_id', '=', 'al_place.pla_id')
                ->where('r_status',1)
                ->paginate(20);
                foreach ($query['arr'] as $k => $v) {

                    $time = $this->time($v->r_addtime, $now_time);
                    if ($time['d'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['d'] . '天前发布';
                    } elseif ($time['h'] > 0) {
                        $query['arr'][$k]->r_addtime = $time['h'] . '小时前发布';
                    } elseif ($time['m'] > 4) {
                        $query['arr'][$k]->r_addtime = $time['m'] . '分钟前发布';
                    } else {
                        $query['arr'][$k]->r_addtime = '刚刚发布';
                    }
                } 
                $query['arr']=$this->objtoarr($query['arr']);
                //print_r($query['arr']);die;
                echo json_encode($query['arr']);die; 
        }
                


    }







}	

?>