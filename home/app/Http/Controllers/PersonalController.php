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
    public  function jianli(Request $request){
    	
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
    	//公司信息
    	$query['arr']=DB::table('al_resume')
                ->select(['*'])
                ->where('per_id','=',"$per_id")
                ->limit(1)
                ->first();
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
               

                //print_r($query);
         
        return view("personal.jianli",$query);
        
    }
    //简历预览
    public function preview()
    {
    	return view("resumegl.preview");
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
                ->where('i_name','like',"%$i_name%")
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
    	
    }
}	

?>
