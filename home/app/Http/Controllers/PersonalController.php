<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
/**
 *   PersonalController  个人信息管理
 */

class PersonalController extends Controller {

    //我的简历
    public function jianli(Request $request){
    //
    	$query['per_id']=Session::get('per_id');//用户id
    	$query['i_name']=Session::get('i_name');//用户id
    	$per_id=$query['per_id'];
    	//个人账号信息
    	$query['personal']=DB::table('al_personal')
                ->select(['*'])
                ->where('per_id','=',"$per_id")
                ->limit(1)
                ->first();
                
    	//简历信息
    	$query['arr']=DB::table('al_resume')
                ->select('res_id', 'per_id', 'r_name', 'r_sex', 'r_year', 'r_phone', 'r_hotel', 't_edu', 'major_id', 'r_suffer', 
	                	'r_email', 'r_native', 'r_mantal', 'r_status', 'r_nature', 'r_pay', 'r_politics', 'r_ind', 
	                	'r_photo', 'r_addtime', 'r_show', 'r_type', 'last_time'
	                	, "al_post.i_name as post_name",'al_place.i_name as place_name','i_level')
                ->where('per_id','=',"$per_id")
                ->leftJoin('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
                ->leftJoin('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
                ->limit(1)
                ->first();
                //print_r($query['arr']);die;

                if(!$query['arr']){

                	$time=date('Y-m-d H:i:s');
                	$arr=DB::table('al_resume')->insert([
					    ['per_id' => "$per_id",'last_time'=>$time,'r_addtime'=>$time]
					]);
					$query['arr']=DB::table('al_resume')
	                ->select('res_id', 'per_id', 'r_name', 'r_sex', 'r_year', 'r_phone', 'r_hotel', 't_edu', 'major_id', 'r_suffer', 
	                	'r_email', 'r_native', 'r_mantal', 'r_status', 'r_nature', 'r_pay', 'r_politics', 'r_ind', 
	                	'r_photo', 'r_addtime', 'r_show', 'r_type', 'last_time'
	                	, "al_post.i_name as post_name",'al_place.i_name as place_name','i_level')
                	->where('per_id','=',"$per_id")
                	->leftJoin('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
                	->leftJoin('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
	                ->limit(1)
	                ->first();
					
                }
                //print_r($query['arr']);die;
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

                //print_r($query);
         
        return view("personal.jianli",$query);
        
    }

    //简历预览
    public function previews()
    {
        $query['per_id']=Session::get('per_id');//用户id
        $query['i_name']=Session::get('i_name');//用户id
        $per_id=$query['per_id'];
        //个人账号信息
        $query['personal']=DB::table('al_personal')
                ->select(['*'])
                ->where('per_id','=',"$per_id")
                ->limit(1)
                ->first();
                
        //简历信息
        $query['arr']=DB::table('al_resume')
                ->select('res_id', 'per_id', 'r_name', 'r_sex', 'r_year', 'r_phone', 'r_hotel', 't_edu',  'r_suffer', 
                        'r_email', 'r_native', 'r_mantal', 'r_status', 'r_nature', 'r_pay', 'r_politics', 'r_ind', 
                        'r_photo', 'r_addtime', 'r_show', 'r_type', 'last_time'
                        , "al_post.i_name as post_name",'al_place.i_name as place_name','i_level','companyName', 'positionName', 
                        'companyYearStart', 'companyMonthStart', 'companyYearEnd', 'companyMonthEnd','projectName', 'thePost', 'projectYearStart'
                        , 'projectMonthStart', 'projectYearEnd', 'projectMonthEnd', 'projectDescription', 'schoolName', 'schoolYearStart'
                        , 'schoolYearEnd', 'if_img','m_name')
                ->where('per_id','=',"$per_id")
                ->leftJoin('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
                ->leftJoin('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
                ->leftJoin('al_major', 'al_resume.major_id', '=', 'al_major.major_id')
                ->limit(1)
                ->first();
                //print_r($query['arr']);die;

                if(!$query['arr']){

                    $time=date('Y-m-d H:i:s');
                    $arr=DB::table('al_resume')->insert([
                        ['per_id' => "$per_id",'last_time'=>$time,'r_addtime'=>$time]
                    ]);
                    $query['arr']=DB::table('al_resume')
                    ->select('res_id', 'per_id', 'r_name', 'r_sex', 'r_year', 'r_phone', 'r_hotel', 't_edu', 'r_suffer', 
                        'r_email', 'r_native', 'r_mantal', 'r_status', 'r_nature', 'r_pay', 'r_politics', 'r_ind', 
                        'r_photo', 'r_addtime', 'r_show', 'r_type', 'last_time'
                        , "al_post.i_name as post_name",'al_place.i_name as place_name','i_level','m_name')
                    ->where('per_id','=',"$per_id")
                    ->leftJoin('al_place', 'al_resume.pla_id', '=', 'al_place.pla_id')
                    ->leftJoin('al_post', 'al_resume.post_id', '=', 'al_post.post_id')
                    ->leftJoin('al_major', 'al_resume.major_id', '=', 'al_major.major_id')
                    ->limit(1)
                    ->first();
                    
                }
                //print_r($query['arr']);die;
        //热门城市
        $res_id=$query['arr']->res_id;
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
    	return view("resumegl.preview",$query);
    }
    /**
     * 修改用户名称
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function per_i_name(Request $request)
    {
        $per_id=Session::get('per_id');//用户id
        $i_name=$request->input('i_name');
        Session::put('i_name',$i_name);//用户名称
        $data['i_name']=Session::get('i_name',$i_name);//用户名称

        $arr=DB::table('al_personal')
            ->where('per_id', $per_id)
            ->update($data);
            if($arr){
                return redirect('jianli');
            }else{
                return redirect('jianli');
            }

    }
    /**
     * 基本 信息 修改
     * @return [type] [description]
     */
    public function basic(Request $request)
    {
    	$res_id=$request->input('res_id');//个人信息id

    	$data['r_sex']=$request->input('gender');//性别
    	$data['r_name']=$request->input('name');//简历人名称

    	$data['r_phone']=$request->input('tel');//电话号
    	$data['r_email']=$request->input('email');//邮箱

    	$t_edu=$request->input('topDegree');//学历
    	if($t_edu=="初中"){$data['t_edu']="0";}elseif ($t_edu=="高中"){$data['t_edu']="1";}elseif ($t_edu=="中技"){$data['t_edu']="2";}elseif ($t_edu=="中专"){$data['t_edu']="3";}elseif ($t_edu=="大专"){$data['t_edu']="4";}elseif ($t_edu=="本科"){$data['t_edu']="5";}elseif ($t_edu=="硕士"){$data['t_edu']="6";}elseif ($t_edu=="博士"){$data['t_edu']="7"; }elseif ($t_edu=="博后"){$data['t_edu']="8"; }else{ $data['t_edu']=""; }
    	$r_suffer=$request->input('workyear');//工作经验
    	if($r_suffer=="应届生"){$data['r_suffer']="0";}elseif ($r_suffer=="无经验"){$data['r_suffer']="1";}elseif ($r_suffer=="1年以下"){$data['r_suffer']="2";}elseif ($r_suffer=="1-3年"){$data['r_suffer']="3";}elseif ($r_suffer=="3-5年"){$data['r_suffer']="4";}elseif ($r_suffer=="5-10年"){$data['r_suffer']="5";}elseif ($r_suffer=="10年以上"){$data['r_suffer']="6";}else{ $data['r_suffer']=""; }
    	$r_status=$request->input('currentState');//离职状态
    	if($r_status=="我目前已离职可快速到岗"){$data['r_status']="0";}elseif ($r_status=="我目前正在职正考虑换个新环境"){$data['r_status']="1";}elseif ($r_status=="我暂时不想找工作"){$data['r_status']="2";}elseif ($r_status=="目前暂无跳槽打算"){$data['r_status']="3";}elseif ($r_status=="我是应届毕业生"){$data['r_status']="4";}else{ $data['r_status']=""; }
    	//更新数据
    	$data['last_time']=date('Y-m-d H:i:s');
    	$arr=DB::table('al_resume')
            ->where('res_id', $res_id)
            ->update($data);
            if($arr){
            	return redirect('jianli');
            }else{
            	return redirect('jianli');
            }


    }
    //上传头像暂停
    public function uploadPhoto()
    {
    	echo "上传头像";
    }
    /**
     * 检测是否有这个职位
     * @param string $value [description]
     */
    public function postcheck(Request $request)
    {
    	$i_name=$request->input('i_name');
    	
    	$arr=DB::table('al_post')
                ->select(['*'])
                ->where('i_name','=',"$i_name")
                ->limit(1)
                ->first();
                if($arr)echo "1";
               	else echo "0";
    }
    /**
     * 修改期望工作
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function expectedwork(Request $request)
    {
    	//print_r($request->all());
    	$res_id=$request->input('res_id');//修改id
    	$place_name=$request->input('expectCity');//地区名称
    		$place=DB::table('al_place')
                ->select(['*'])
                ->where('i_name','=',"$place_name")
                ->limit(1)
                ->first();
                $data['pla_id']=$place->pla_id;
    	$i_name=$request->input('i_name');//职位名称
    		$post=DB::table('al_post')
                ->select(['*'])
                ->where('i_name','=',"$i_name")
                ->limit(1)
                ->first();
                $data['post_id']=$post->post_id;
    	$data['r_nature']=$request->input('type');//工作性质全职实习等等
    	$data['r_pay']=$request->input('expectSalary');//期望薪资
    	//print_r($data);
    	$data['last_time']=date('Y-m-d H:i:s');
    	$arr=DB::table('al_resume')
            ->where('res_id', $res_id)
            ->update($data);
            if($arr){
            	return redirect('jianli');
            }else{
            	return redirect('jianli');
            }

    }
    /**
     * 修改工作经历
     * @param string $value [description]
     */
    public function workexperience(Request $request)
    {
    	$res_id=$request->input('res_id');//修改id
    	$data['last_time']=date('Y-m-d H:i:s');

    	$data['companyName']=$request->input('companyName');//公司名称
    	$data['positionName']=$request->input('positionName');//职位名称
    	$data['companyYearStart']=$request->input('companyYearStart');//开始年份
    	$data['companyMonthStart']=$request->input('companyMonthStart');//开始月份

    	$companyYearEnd=$request->input('companyYearEnd');//开始月份
    	if($companyYearEnd=="至今"){
    		$data['companyYearEnd']=date('Y');
    	}else{
    		$data['companyYearEnd']=$request->input('companyYearEnd');
    	}
    	$companyMonthEnd=$request->input('companyMonthEnd');//开始月份
    	if($companyMonthEnd=="至今"){
    		$data['companyMonthEnd']=date('m');
    	}else{
    		$data['companyMonthEnd']=$request->input('companyMonthEnd');
    	}

    	$arr=DB::table('al_resume')
            ->where('res_id', $res_id)
            ->update($data);
            if($arr){
            	return redirect('jianli');
            }else{
            	return redirect('jianli');
            }
    }
    /**
     * 项目经验
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function projectexperience(Request $request)
    {
    	$res_id=$request->input('res_id');//修改id
    	$data['last_time']=date('Y-m-d H:i:s');
    	//print_r($request->all());
    	$data['projectName']=$request->input('projectName');//项目名称 
    	$data['thePost']=$request->input('thePost');//担任职务  
    	$data['projectYearStart']=$request->input('projectYearStart');//开始年份  
    	$data['projectMonthStart']=$request->input('projectMonthStart');//开始月份  

    	$projectYearEnd=$request->input('projectYearEnd');//开始月份
    	if($projectYearEnd=="至今"){
    		$data['projectYearEnd']=date('Y');
    	}else{
    		$data['projectYearEnd']=$request->input('projectYearEnd');
    	}
    	$projectMonthEnd=$request->input('projectMonthEnd');//开始月份
    	if($projectMonthEnd=="至今"){
    		$data['projectMonthEnd']=date('m');
    	}else{
    		$data['projectMonthEnd']=$request->input('projectMonthEnd');
    	}
    	$data['projectDescription']=$request->input('projectDescription');//项目描述
    	//print_r($data);
    	$arr=DB::table('al_resume')
            ->where('res_id', $res_id)
            ->update($data);
            if($arr){
            	return redirect('jianli');
            }else{
            	return redirect('jianli');
            }
    }
    /**
     * 检查是否有该专业
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function majorcheck(request $request)
    {
    	$m_name=$request->input('m_name');
    	
    	$arr=DB::table('al_major')
                ->select(['*'])
                ->where('m_name','=',"$m_name")
                ->limit(1)
                ->first();
                if($arr){
                	echo "1";
                }else{
					echo "0";
                }
               	
    }
    /**
     * 修改教育背景
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function educational(Request $request)
    {
    	$res_id=$request->input('res_id');//修改id
    	$data['last_time']=date('Y-m-d H:i:s');

    	$t_edu=$request->input('degree');//学历
    	if($t_edu=="初中"){$data['t_edu']="0";}elseif ($t_edu=="高中"){$data['t_edu']="1";}elseif ($t_edu=="中技"){$data['t_edu']="2";}elseif ($t_edu=="中专"){$data['t_edu']="3";}elseif ($t_edu=="大专"){$data['t_edu']="4";}elseif ($t_edu=="本科"){$data['t_edu']="5";}elseif ($t_edu=="硕士"){$data['t_edu']="6";}elseif ($t_edu=="博士"){$data['t_edu']="7"; }elseif ($t_edu=="博后"){$data['t_edu']="8"; }else{ $data['t_edu']=""; }
    	$professionalName=$request->input('professionalName');//专业名称
    	$arr=DB::table('al_major')
                ->select(['*'])
                ->where('m_name','=',"$professionalName")
                ->limit(1)
                ->first();
        $data['major_id']=$arr->major_id;//专业id

    	$data['schoolName']=$request->input('schoolName');//学校名称
    	$data['schoolYearStart']=$request->input('schoolYearStart');//学校名称
    	$data['schoolYearEnd']=$request->input('schoolYearEnd');//学校名称
    	//print_r($request->all());
    	//print_r($data);
    	  $arr=DB::table('al_resume')
            ->where('res_id', $res_id)
            ->update($data);
            if($arr){
            	return redirect('jianli');
            }else{
            	return redirect('jianli');
            }
    }
    /**
     * 自我简介
     * @param string $value [description]
     */
    public function description(Request $request)
    {
    	$res_id=$request->input('res_id');//修改id
    	$data['last_time']=date('Y-m-d H:i:s');
    	$data['r_ind']=$request->input('selfDescription');//自我描述
    	// print_r($request->all());
    	//print_r($data);
    	 $arr=DB::table('al_resume')
            ->where('res_id', $res_id)
            ->update($data);
            if($arr){
            	return redirect('jianli');
            }else{
            	return redirect('jianli');
            }

    }

}	

?>
