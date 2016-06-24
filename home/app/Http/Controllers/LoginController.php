<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
		      				$i_name=str_replace($i_name, "<font color='#99ffff'>$i_name</font>",$i_name);
		      				Session::put('i_name',$i_name);
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
		Session::flush('phone');
		return redirect('index');

	}







}	

?>