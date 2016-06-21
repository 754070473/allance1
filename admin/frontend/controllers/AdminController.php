<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



/**
 *  PostController 管理员
 */
class AdminController extends Controller
{
    use ControlController;
    //public $layout='public';
    public $layout = false;
    public $enableCsrfValidation = false;

    /**
     * [actionIndex 显示职位列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $rows = (new \yii\db\Query())
            ->select(['*'])
            ->from('al_admin')
            ->all();


        return $this->render('zhang.html', ["arr" => $rows]);
    }

    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
        if (Yii::$app->request->isPost) {

            $request = Yii::$app->request;
            $name = $request->post('a_name');
            $pwd = $request->post('a_pwd');
            $pwd = md5($pwd);
            $re = rand(100000, 999999);
            $time = date("Y-m-d,h:i:s");
            $connection = \Yii::$app->db;
            $qq = $connection->createCommand()->insert('al_admin', [
                'a_account' => $re,
                'a_name' => $name,
                'a_pwd' => $pwd,
                'a_addtime' => $time,
            ])->execute();

            if ($qq) {
				$id = $connection->getLastInsertID();
				$content = '添加管理员'.$id.'-'.$name;
				$this->adminLog($content);
                return $this->render('show.html', ["arr" => $re]);
            } else {
                return $this->render('useradd.html');
            }
            //echo $name,$pwd,$re,$time;

        } else {
            return $this->render('useradd.html');
        }

    }

    //删除数据
    public function actionDel()
    {
        $request = Yii::$app->request;

        $id = $request->get('id');
        //echo  $id;die;
        $connection = \Yii::$app->db;
        $na = (new \yii\db\Query())
            ->select(['a_name'])
            ->from('al_admin')
            ->where(['adm_id' => $id])
            ->all();
        $name=$na['0']['a_name'];
      // echo $name;die;
        $re = $connection->createCommand()->delete('al_admin', "adm_id=$id")->execute();
        if ($re) {
            $content = '删除管理员'.$id.'-'.$name;
            $this->adminLog($content);
            return $this->redirect(array("admin/show"));
        } else {
            echo "<script>alert('删除失败')</script>";
        }
    }

    //修改跳转页面
    public function actionUpdate()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $rows = (new \yii\db\Query())
            ->from('al_admin')
            ->where(['adm_id' => $id])
            ->one();
        //print_r($rows);die;
        return $this->render('xiu.html', ["app" => $rows]);

    }
   //修改数据
    public function actionXiu()
    {
        $request = Yii::$app->request;

        $id = $request->post('id');
        $name = $request->post('a_name');
        $pwd = $request->post('a_pwd');
        $pwd = md5($pwd);
        $connection = \Yii::$app->db;
        $re = $connection->createCommand()->update('al_admin', ['a_name' => $name, 'a_pwd' => $pwd], "adm_id=$id")->execute();
        // $connection->createCommand()->delete('user', 'status = 0')->execute();
        if ($re) {
          //  $id = $connection->getLastInsertID();
            $content = '修改管理员'.$id.'-'.$name;
            $this->adminLog($content);
            return $this->redirect(array('admin/show'));
        } else {
            echo "<script>alert('修改失败')</script>";
        }
    }

    //管理员日志
    public function actionRi()
    {
       // $house_id=Yii::$app->request->get('id');
        //查询信息
       // $connection = \Yii::$app->db;


        $arr=Yii::$app->db->createCommand("select * from al_admin right join al_admin_log on al_admin.adm_id=al_admin_log.adm_id order by a_addtime desc")->queryall();
        return $this->render('ri.html', ["arr" =>$arr]);

    }
    //删除日志数据
    public function actionShan()
    {
        $request = Yii::$app->request;

        $id = $request->get('id');
        $connection = \Yii::$app->db;

        $na = (new \yii\db\Query())
            ->select(['a_name'])
            ->from('al_admin')
            ->where(['adm_id' => $id])

            ->all();
        $name=$na['0']['a_name'];

        $re = $connection->createCommand()->delete('al_admin_log', "alog_id=$id")->execute();

        if ($re) {

            $id = $connection->getLastInsertID();
            $content = '删除管理员'.$id.'-'.$name;
            $this->adminLog($content);
            return $this->redirect(array("admin/ri"));
        } else {
            echo "<script>alert('删除失败')</script>";
        }


    }
    //修改日志数据
    public function actionUpd()
    {
        $request = Yii::$app->request;

        $id = $request->get('id');
      //  $connection = \Yii::$app->db;

       // echo $id;  die;
         if($id){
             $connection = \Yii::$app->db;

             $na = (new \yii\db\Query())
                 ->select(['a_name'])
                 ->from('al_admin')
                 ->where(['adm_id' => $id])

                 ->all();
             $name=$na['0']['a_name'];
            // $id = $connection->getLastInsertID();
             $content = '修改日志'.$id.'-'.$name;
             $this->adminLog($content);
             return $this->redirect(array("admin/ri"));
         }else{
             echo "<script>alert('修改失败')</script>";
         }
    }
//批量删除数据
    public function actionPi()
    {
        $request = Yii::$app->request;

        $id = $request->post('id');
        $connection = \Yii::$app->db;
    //echo $id;  die;
        $qq=$connection->createCommand()->delete('al_admin_log',"alog_id in($id)")->execute();
        if($qq){
            $connection = \Yii::$app->db;

            $na = (new \yii\db\Query())
                ->select(['a_name'])
                ->from('al_admin')
                ->where(['adm_id' => $id])

                ->all();
            $name=$na['0']['a_name'];
            //$id = $connection->getLastInsertID();
            $content = '批量删除'.$id.'-'.$name;
            $this->adminLog($content);
          echo 1;
        }else{
            echo  2;
        }
    }
   public function actionUpdate1(){
//设置session变量：Yii::app()->session['var']='value';
//$id=Yii::app()->session['com_id'];
//移除：unset(Yii::app()->session['var']);

        // $row = (new \yii\db\Query())
        //                 ->select(['*'])
        //                 ->from('al_company')
        //                 ->where(['id' =>1])
                       
        //                ->all();

         return $this->render('update.html');
    }
    //修改管理员密码中的查询当前登录的管理员的旧密码
     public function actionSelect1(){
       // echo "111111111";
// 设置session变量：Yii::app()->session['var']='value';
// $id=Yii::app()->session['com_id'];
// 移除：unset(Yii::app()->session['var']);
         $connection = \Yii::$app->db;
        $request = Yii::$app->request;
                        $user= md5($request->post('user')); 
                        //print_r($user);die;
                         //打开session
                       $session = Yii::$app->session;
                         //取出session
                        $adm_id= $session['adm_id'];
                        //echo $adm_id;die;
        $row = (new \yii\db\Query())
                        ->select(['a_pwd'])
                        ->from('al_admin')
                        ->where(['adm_id' =>$adm_id])  
                       ->all();
                       //print_r($row['0']['a_pwd']);die;
       if($row['0']['a_pwd']==$user){
                     echo 1;
                     //return $this->render('update.html');
       }
    }
    //修改管理员密码
    public function actionUpdatepwd(){
                          //echo "1111111";die;
                         $connection = \Yii::$app->db;
                         $request = Yii::$app->request;
                          // $id=Yii::app()->session['com_id'];
                         //打开session
                       $session = Yii::$app->session;
                           //取出session
                        $adm_id= $session['adm_id'];     
                        $pwd= md5($request->post('pwd')); 
                        //print_r($pwd);die;
        $aa=$connection->createCommand()->update('al_admin', ['a_pwd'=>"$pwd"], "adm_id=$adm_id")->execute();
        if($aa){
             echo "<script>alert('修改成功');location.href='index.php?r=admin/update1'</script>";
              //return $this->render('');
        }
    }
	
	/**
	 *管理员赋权
	 */
	 public function actionEmpower()
	 {
		$request = Yii::$app->request;
		$adm_id = $request->get('id');
		$arr = $this->classify('al_privilege','p_pid');
		$row = (new \yii\db\Query())
                        ->select(['pri_id'])
                        ->from('al_admin_privilege')
                        ->where(['adm_id' =>$adm_id])  
                       ->all();
		foreach($arr as $key=>$val)
		{
			if(in_array($val['pri_id'],$row))
			{
				$arr[$key]['in'] = 1;
			}
			else
			{
				$arr[$key]['in'] = 0;
			}
			if(!empty($val['son']))
			{
				foreach($val['son'] as $k=>$v)
				{
					if(in_array($v['pri_id'],$row))
					{
						$arr[$key]['son'][$k]['in'] = 1;
					}
					else
					{
						$arr[$key]['son'][$k]['in'] = 0;
					}
				}
			}
		}
		
		return $this->render('empower.html',array('arr'=>$arr,'adm_id'=>$adm_id));
	 }

	//赋权入库
	 public function actionEmpowerinfo()
	 {
		$request = Yii::$app->request;
		$adm_id = $request->post('adm_id');
		$pri_id = $request->post('pri_id')?$request->post('pri_id'):"";
		if($pri_id == "")
		{
			echo "<script>alert('请先选择权限');window.history.go(-1)</script>";
		}
		$sql = "insert into al_admin_privilege (adm_id,pri_id) values";
		foreach($pri_id as $val)
		{
			$sql.="(".$adm_id.",".$val."),";
		}
		$sql = substr($sql,0,-1);
		$connection = \Yii::$app->db;
		$command = $connection->createCommand($sql);
		$re = $command->execute();
		if($re)
		{
			return $this->redirect(array("admin/show"));
		}
		else
		{
			echo "<script>alert('赋权失败，请稍后再试');window.history.go(-1)</script>";
		}
	 }
}