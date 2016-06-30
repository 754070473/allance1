<?php
namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
/**
 *   CpregisterController  企业注册
 */

class CpregisterController extends Controller{

	//填写公司信息第一步
	public function index01(Request $request)
	{
		//$method=$request->method();
		

			$query['com_id']=Session::get('com_id');//企业id
	    	$query['c_phone']=Session::get('c_phone');//企业手机号
	    	$query['c_email']=Session::get('c_email');//用登录邮箱
	    	$com_id=$query['com_id'];
	    	//企业账号信息
	    	$query['arr']=DB::table('al_company')
	                ->select(['*'])
	                ->where('com_id','=',"$com_id")
	                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                ->limit(1)
	                ->first();
	                if($query['arr']->mes_id==""){

	                	DB::table('al_com_message')->insert(['m_name'=>""]);
	                	$id=DB::getPdo()->lastInsertId();//刚插入的id
	                	DB::table('al_company')
				            ->where('com_id','=',"$com_id")
				            ->update(['mes_id'=>"$id"]);
				  		$query['arr']=DB::table('al_company')
			                ->select(['*'])
			                ->where('com_id','=',"$com_id")
			                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                ->limit(1)
			                ->first();
	                	 
	                }
	                //行业领域
	                $query['hang']=DB::table('al_hang')
	                ->select(['*'])
	                ->get();
	                //print_r($query);die;
			return view("cpregister.index01",$query);
		
                
    	


	}
	/**
	 * 执行公司信息的修改
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function index01_pro(Request $request)
	{
		//$data['m_logo']=$this->imgUpload('m_logo');
		$data['m_name']=$request->input('m_name');//公司名称
		$data['m_url']=$request->input('m_url');//公司地址
		$data['m_place']=$request->input('m_place');//公司地址
		$data['m_type']=$request->input('m_type');//发展阶段
		$data['m_course']=$request->input('m_course');//企业介绍
		$mes_id=$request->input('mes_id');//企业信息id
		$industryField=$request->input('industryField');//行业领域
		 $arr=DB::table('al_hang')
	                ->select(['*'])
	                ->where('h_name','=',"$industryField")
	                ->first();
	        $data['me_id']=$arr->me_id;
          DB::table('al_com_message')
            ->where('mes_id','=',"$mes_id")
            ->update($data);      
		
		//print_r($request->all());die;
	}
	//填写公司信息 第二部
	public function tag()
	{
		$query['com_id']=Session::get('com_id');//企业id
	    	$query['c_phone']=Session::get('c_phone');//企业手机号
	    	$query['c_email']=Session::get('c_email');//用登录邮箱
	    	$com_id=$query['com_id'];
	    	//企业账号信息
	    	$query['arr']=DB::table('al_company')
	                ->select(['*'])
	                ->where('com_id','=',"$com_id")
	                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                ->limit(1)
	                ->first();
	                if($query['arr']->mes_id==""){

	                	DB::table('al_com_message')->insert(['m_name'=>""]);
	                	$id=DB::getPdo()->lastInsertId();//刚插入的id
	                	DB::table('al_company')
				            ->where('com_id','=',"$com_id")
				            ->update(['mes_id'=>"$id"]);
				  		$query['arr']=DB::table('al_company')
			                ->select(['*'])
			                ->where('com_id','=',"$com_id")
			                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                ->limit(1)
			                ->first();
	                }
	                $m_welfare=$query['arr']->m_welfare;
	                $query['m_welfare']=explode(',', $m_welfare);
	               // print_r($query['m_welfare']);die;
		return view("cpregister.tag",$query);
	}
	public function tag_pro(Request $request)
	{
		$mes_id=$request->input('mes_id');
		$data['m_welfare']=$request->input('m_welfare');
		$arr=DB::table('al_com_message')
            ->where('mes_id','=',"$mes_id")
            ->update($data);  
            if($arr){
            	echo "1";
            }else{
            	echo "0"; 
            }
	}
    //填写公司信息第三步
	public function founder(Request $request)
	{
		if(!$request->isMethod('post')){ 
			$query['com_id']=Session::get('com_id');//企业id
	    	$query['c_phone']=Session::get('c_phone');//企业手机号
	    	$query['c_email']=Session::get('c_email');//用登录邮箱
	    	$com_id=$query['com_id'];
	    	//企业账号信息
	    	$query['arr']=DB::table('al_company')
	                ->select(['*'])
	                ->where('com_id','=',"$com_id")
	                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                ->limit(1)
	                ->first();
	                if($query['arr']->mes_id==""){

	                	DB::table('al_com_message')->insert(['m_name'=>""]);
	                	$id=DB::getPdo()->lastInsertId();//刚插入的id
	                	DB::table('al_company')
				            ->where('com_id','=',"$com_id")
				            ->update(['mes_id'=>"$id"]);
				  		$query['arr']=DB::table('al_company')
			                ->select(['*'])
			                ->where('com_id','=',"$com_id")
			                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                ->limit(1)
			                ->first();
	                }
			return view("cpregister.founder",$query);
		}else{

    		//print_r($request->all());
    		$data['leadername']=$request->input('leadername');
    		$data['position']=$request->input('position');
    		$data['weibo']=$request->input('weibo');
    		$data['remark']=$request->input('remark');
    		$mes_id=$request->input('mes_id');
    		$arr=DB::table('al_com_message')
            ->where('mes_id','=',"$mes_id")
            ->update($data);  
            if($arr){
            	return redirect('index02'); 
            }else{
            	return redirect('founder'); 
            }

		}
	}


	//填写公司信息第四部
	public function index02(Request $request)
	{
		if(!$request->isMethod('post')){
			$query['com_id']=Session::get('com_id');//企业id
	    	$query['c_phone']=Session::get('c_phone');//企业手机号
	    	$query['c_email']=Session::get('c_email');//用登录邮箱
	    	$com_id=$query['com_id'];
	    	//企业账号信息
	    	$query['arr']=DB::table('al_company')
	                ->select(['*'])
	                ->where('com_id','=',"$com_id")
	                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                ->limit(1)
	                ->first();
	                if($query['arr']->mes_id==""){

	                	DB::table('al_com_message')->insert(['m_name'=>""]);
	                	$id=DB::getPdo()->lastInsertId();//刚插入的id
	                	DB::table('al_company')
				            ->where('com_id','=',"$com_id")
				            ->update(['mes_id'=>"$id"]);
				  		$query['arr']=DB::table('al_company')
			                ->select(['*'])
			                ->where('com_id','=',"$com_id")
			                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                ->limit(1)
			                ->first();
	                }
			return view("cpregister.index02",$query);
		}else{
			//print_r($request->all());die;

			$data['product']=$request->input('product');
			$data['productUrl']=$request->input('productUrl');
			$data['productProfile']=$request->input('productProfile');
    		
    		$mes_id=$request->input('mes_id');
    		$arr=DB::table('al_com_message')
            ->where('mes_id','=',"$mes_id")
            ->update($data);  
            if($arr){
            	return redirect('index03'); 
            }else{
            	return redirect('index02'); 
            }
		}
	}

	//填写公司信息第五步
	public function index03(Request $request)
	{
		if(!$request->isMethod('post')){
			$query['com_id']=Session::get('com_id');//企业id
	    	$query['c_phone']=Session::get('c_phone');//企业手机号
	    	$query['c_email']=Session::get('c_email');//用登录邮箱
	    	$com_id=$query['com_id'];
	    	//企业账号信息
	    	$query['arr']=DB::table('al_company')
	                ->select(['*'])
	                ->where('com_id','=',"$com_id")
	                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                ->limit(1)
	                ->first();
	                if($query['arr']->mes_id==""){

	                	DB::table('al_com_message')->insert(['m_name'=>""]);
	                	$id=DB::getPdo()->lastInsertId();//刚插入的id
	                	DB::table('al_company')
				            ->where('com_id','=',"$com_id")
				            ->update(['mes_id'=>"$id"]);
				  		$query['arr']=DB::table('al_company')
			                ->select(['*'])
			                ->where('com_id','=',"$com_id")
			                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                ->limit(1)
			                ->first();
	                }
	                return view("cpregister.index03",$query);
		}else{
			//print_r($request->all());die;

			$data['m_desc']=$request->input('m_desc');
			$data['m_logo']=$this->imgUpload('m_logo');//公司logo
			
    		
    		$mes_id=$request->input('mes_id');
    		$arr=DB::table('al_com_message')
            ->where('mes_id','=',"$mes_id")
            ->update($data);  
            if($arr){
            	return redirect('success'); 
            }else{
            	return redirect('success'); 
            }
		}
		
	}

	//填写公司信息  发布职位
	public function success(Request $request)
	{
		$query['com_id']=Session::get('com_id');//企业id
	    	$query['c_phone']=Session::get('c_phone');//企业手机号
	    	$query['c_email']=Session::get('c_email');//用登录邮箱
	    	$com_id=$query['com_id'];
	    	//企业账号信息
	    	$query['arr']=DB::table('al_company')
	                ->select(['*'])
	                ->where('com_id','=',"$com_id")
	                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
	                ->limit(1)
	                ->first();
	                if($query['arr']->mes_id==""){

	                	DB::table('al_com_message')->insert(['m_name'=>""]);
	                	$id=DB::getPdo()->lastInsertId();//刚插入的id
	                	DB::table('al_company')
				            ->where('com_id','=',"$com_id")
				            ->update(['mes_id'=>"$id"]);
				  		$query['arr']=DB::table('al_company')
			                ->select(['*'])
			                ->where('com_id','=',"$com_id")
			                ->leftJoin('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                //->join('al_com_message', 'al_company.mes_id', '=', 'al_com_message.mes_id')
			                ->limit(1)
			                ->first();
	                }
		return view("cpregister.success",$query);
	}


}