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
	
	//展示登录界面
	public  function login(Request $request){
		$phone=Session::get('phone');
		return view("login.login",['phone'=>$phone]);
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
		

        
       //  if($arr){
       //  	//设置用户失效
       //  	$session=$this->session->userdata('name');
       //  	//print_r($session);die;
       //  	if($session==""){
       //  		//时间清零后修改登录字段
       //          $this->db->update('tea_client',array('num'=>'0'),"cli_id='$cli_id'");
       //          if($arr[0]['num']<3){
       //              if($arr[0]['cli_pwd']==$cli_pwd){
       //                  //密码正确 修改字段num=0 登陆成功
       //                 	$this->session->set_userdata('cli_id',$cli_id);  //用户id
	      // 				$u_name=str_replace($cli_name, "<font color='#99ffff'>$cli_name</font>",$cli_name);
       //                  $this->session->set_userdata('cli_name',$cli_name); //用户姓名
       //                 	$this->session->set_userdata('cli_account',$cli_account); //用户姓名
       //                 //  //取出用户权限
       //                 //  $access=$this->getAccess($id);
       //                 echo 1;
       //              }else{
       //                  //密码不正确 给用户提示 修改num字段  每错误一次使其加1
       //                  $num=$arr[0]['num'];
       //                  $num+=1;
       //                 $this->db->update('tea_client',array('num'=>$num),"cli_id='$cli_id'");
       //                 echo "你输入的密码不正确，还有".(3-$num)."次机会";
       //              }
       //          }else{
       //          	 //锁定半分钟
       //          	 //$this->input->cookie('u_name',$data['u_name'],90);
       //          	 $this->session->set_userdata('name',$data['cli_name'],20);
       //          	 $this->session->set_tempdata('name',$data['cli_name'],20);
       //              echo "该账号已被锁定无法登陆，请联系管理员";
       //          }
       //  	}else{
       //  		echo "2";
       //  	}

       //  }else{
       //  	echo "该账号不存在，请核对";
       // }



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
		}
		Session::put('phone',$phone);  
		return redirect('login');


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