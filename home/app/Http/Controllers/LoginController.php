<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use App\libraries\qq\connect;
use App\libraries\qq\cla\QC;
/**
 *   LoginController  账号登录
 */

class LoginController extends Controller {
	
	//展示个人登录界面
	public  function login(Request $request){
		$phone=Session::get('phone');
		return view("login.login",['phone'=>$phone]);
	}
	/**
	 * 展示企业登录
	 * @return [type] [description]
	 */
	public function company_login()
	{
		$phone=Session::get('phone');
		return view("login.company_login",['phone'=>$phone]);
	}
	/**
	 * 执行企业登录
	 * @return [type] [description]
	 */
	public function company_login_pro(Request $request)
	{
		//登录验证
		//$u_pwd = do_hash($_POST['u_pwd'],'md5'); // MD5加密
		//$this->load->helper('security');
		$data=$request->all();
		$name=$request->input('name');
		$pwd=md5($request->input('pwd'));

		if (preg_match("/^1[34578]{1}\d{9}$/",$name)) {
			$arr=DB::table('al_company')
                ->select(['*'])
                ->where('c_phone','=',"$name")
                ->limit(1)
                ->get();
               foreach($arr as $k=>$v){
		            $com_id=$arr[$k]->com_id;
		            $c_phone=$arr[$k]->c_phone;
		        }
		          if($arr){
			        	//时间清零后修改登录字段
	                    if($arr[0]->c_pwd==$pwd){
	                        //密码正确 修改字段num=0 登陆成功
	                        Session::put('com_id',$com_id);
	                        Session::put('c_phone',$c_phone);
                            $this->userlog('手机号登录');
	                       echo "1";
	                    }else{
	                       echo "2";
	                    }
			        }else{
			        	echo "3";
			        }
		}else{
			$arr=DB::table('al_company')
                ->select(['*'])
                ->where('c_email','=',"$name")
                ->limit(1)
                ->get();
            foreach($arr as $k=>$v){
	           $com_id=$arr[$k]->com_id;
		       $c_email=$arr[$k]->c_email;
	        }
	        if($arr){
	        	//时间清零后修改登录字段
                if($arr[0]->c_pwd==$pwd){
                    //密码正确 修改字段num=0 登陆成功
                    Session::put('com_id',$com_id);
                    Session::put('c_email',$c_email);
                    $this->userlog('邮箱登录');
                   echo "4";
                }else{
                   echo "2";
                }
	        }else{
	        	echo "3";
	        }
		}
	}
	/**
	 * [login_pro 执行个人登录]
	 * @return [type] [description]
	 */
	public function login_pro(Request $request)
	{
		//登录验证
		//$u_pwd = do_hash($_POST['u_pwd'],'md5'); // MD5加密
		//$this->load->helper('security');
		$data=$request->all();
		$name=$request->input('name');
		$pwd=md5($request->input('pwd'));

		if (preg_match("/^1[34578]{1}\d{9}$/",$name)) {
			$arr=DB::table('al_personal')
                ->select(['*'])
                ->where('p_phone','=',"$name")
                ->limit(1)
                ->get();
               foreach($arr as $k=>$v){
		            $per_id=$arr[$k]->per_id;
		            $p_phone=$arr[$k]->p_phone;
		            $i_name=$arr[$k]->i_name;
		        }
		          if($arr){
			        	//时间清零后修改登录字段
	                    if($arr[0]->p_pwd==$pwd){
	                        //密码正确 修改字段num=0 登陆成功
	                        Session::put('per_id',$per_id);
	                        Session::put('p_phone',$p_phone);
		      				//$i_name=str_replace($i_name, "<font color='#99ffff'>$i_name</font>",$i_name);
		      				Session::put('i_name',$i_name);
                            $this->userlog('手机号登录');
	                       echo "1";
	                    }else{
	                       echo "2";
	                    }
			        }else{
			        	echo "3";
			        }
		}else{
			$arr=DB::table('al_personal')
                ->select(['*'])
                ->where('p_email','=',"$name")
                ->limit(1)
                ->get();
            foreach($arr as $k=>$v){
	            $per_id=$arr[$k]->per_id;
	            $p_email=$arr[$k]->p_email;
	            $i_name=$arr[$k]->i_name;
	        }
	        if($arr){
	        	//时间清零后修改登录字段
                if($arr[0]->p_pwd==$pwd){
                    //密码正确 修改字段num=0 登陆成功
                    Session::put('per_id',$per_id);
                    Session::put('p_email',$p_email);
      				//$i_name=str_replace($i_name, "<font color='#99ffff'>$i_name</font>",$i_name);
      				Session::put('i_name',$i_name);
                    $this->userlog('邮箱登录');
                   echo "4";
                }else{
                   echo "2";
                }
	        }else{
	        	echo "3";
	        }
		}


	}
	/**
	 * [pro_login 执行注册]
	 * @return [type] [description]
	 */
	public function login_register(Request $request)
	{
		$type=$request->input('type');

		$phone=$request->input('phone'); //账号
		$email=$request->input('email'); //账号
		$pwd=md5($request->input('password'));//密码

		$time=date('Y-m-d H:i:s',time());

		//判断是个人注册还是企业注册
		if($type=='1')
		{//企业注册
			//检测是否唯一
			//判断是否是邮箱注册还是手机注册
			if (preg_match("/^1[34578]{1}\d{9}$/",$phone)) {

				$arr=DB::table('al_company')->insert(
				    array(	
				    		'c_phone' =>$phone,
				    		'c_email' =>$email,
				     		'c_pwd' =>$pwd
				    	)
					);
			}
			Session::put('phone',$phone);  
			
			return redirect('company_login');
		}
		else
		{//个人注册
			//检测是否唯一
			//判断是否是邮箱注册还是手机注册
			if (preg_match("/^1[34578]{1}\d{9}$/",$phone)) {
				$arr=DB::table('al_personal')->insert(
				    array(	
				    		'p_phone' =>$phone,
				    		'p_email' =>$email,
				     		'p_pwd' =>$pwd,
				     		'p_firsttime'=>$time
				    	)
					);
			}
			Session::put('phone',$phone);  
			return redirect('login');
		}
		


	}
	/**
	 * [loginone 验证用户唯一]
	 * @return [type] [description]
	 */
	public function loginone(Request $request){
		$phone=$request->input('phone'); 
		$email=$request->input('email'); 
		$type=$request->input('type');
		//判断是个人注册还是企业注册
		if($type=='1')
		{//企业注册
			//检测是否唯一
			//判断是否是邮箱注册还是手机注册
			if (preg_match("/^1[34578]{1}\d{9}$/",$phone)) {
				$company = DB::table('al_company')
                ->where('c_phone', 'like', "%$phone%")
                ->get();
                if ($company) {
                	echo "1";
                } else {
                	echo "2";
                }
			} else {
				$company = DB::table('al_company')
                ->where('c_email', 'like', "%$email%")
                ->get();
                if ($company) {
                	echo "1";
                } else {
                	echo "2";
                }
			}
			
                
		}
		else
		{//个人注册
			//检测是否唯一
			//判断是否是邮箱注册还是手机注册
			if (preg_match("/^1[34578]{1}\d{9}$/",$phone)) {
				$personal = DB::table('al_personal')
                ->where('p_phone', 'like', "%$phone%")
                ->get();
                if ($personal) {
                	echo "1";
                } else {
                	echo "2";
                }
			} else {
				$personal = DB::table('al_personal')
                ->where('p_email', 'like', "%$email%")
                ->get();
                if ($personal) {
                	echo "1";
                } else {
                	echo "2";
                }
			}
		}
		
	}

	public function logout(Request $request)
	{
        $this->userlog('退出');
		Session::flush('phone');
		return redirect('index');

	}

    public function weibo(){
		return view('weibo.callback');
    }

    //个人用户绑定
    public function bound(Request $request) {
        $p_identifier      = $request->input('identifier');
        $p_identifier_type = $request->input('identifier_type');
        $user = DB::table('al_personal')->where('p_identifier' , $p_identifier)->where('p_identifier_type' , $p_identifier_type)->first();
        if(empty($user)) {
            return view('login.bound', ['p_identifier' => $p_identifier, 'p_identifier_type' => $p_identifier_type]);
        } else {
            if($p_identifier_type == 0) {
                Session::put('per_id', $user->per_id);
                Session::put('p_phone', $user->p_phone);
                Session::put('i_name', $user->i_name);
                $this->userlog('新浪微博登录');
                return redirect('index');
            } else {
                Session::put('per_id', $user->per_id);
                Session::put('p_phone', $user->p_phone);
                Session::put('i_name', $user->i_name);
                $this->userlog('QQ登录');
                return redirect('index');
            }
        }
    }

    //绑定注册
    public function bound_info(Request $request){
        $p_identifier      = $request->input('p_identifier');
        $p_identifier_type = $request->input('p_identifier_type');
        $p_phone           = $request->input('p_phone') ? $request->input('p_phone') : "";
        $p_email           = $request->input('p_email') ? $request->input('p_email') : "";
        $pwd               = md5($request->input('pwd'));
        if($p_phone == ""){
            $i_name = $p_email;
        }else{
            $i_name = $p_phone;
        }
        $arr=DB::table('al_personal')->insert(
            array(
                'p_identifier' =>$p_identifier,
                'p_identifier_type' =>$p_identifier_type,
                'p_phone' =>$p_phone,
                'i_name' =>$i_name,
                'p_email' =>$p_email,
                'p_pwd' =>$pwd
            )
        );
        if($arr){
            return redirect('login');
        }
    }

	//QQ第三方登录
	public function qqLogin(){
		connect::display();
	}
	//QQ返回用户信息
	public function qqCallback(Request $request) {
		$code      = $request->input('code');
		$state      = $request->input('state');
		$qc = new connect();
		$open_id = $qc->callback($code,$state);
		$type = 1;
		return redirect('bound?identifier='.$open_id.'&identifier_type='.$type);
	}
}	

?>