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
 *  PostController 权限
 */
class PrivilegeController extends Controller
{
     use ControlController;
	//public $layout='public';
    public $enableCsrfValidation = false;
    public $layout=false;
    /**
     * [actionIndex 显示职位列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $arr = $this->classify('al_privilege','p_pid');
        return $this->render('show.html',array('arr'=>$arr));
    }
    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
    	$request = Yii::$app->request;
		$name = $request->post('name');
		$controller = $request->post('controller');
		$function = $request->post('function');
		$id = $request->post('id');
		$time = date('Y-m-d H:i:s',time());
		$connection = \Yii::$app->db;
         $re = $connection->createCommand()->insert('al_privilege', ['i_name' => $name,'i_controller' => $controller,'i_function' => $function,'i_addtime' => $time,'p_pid' => $id])->execute();
		if($re)
		{
			$id = $connection->getLastInsertID();
				$content = '添加权限'.$id.'-'.$name;
				$this->adminLog($content);
			echo $id.','.$time;
		}
		else
		{
			echo 0;
		}
    }
	/**
	 * [actionUpd 修改]
	 * 
	 */
	 public function actionUpd(){
         $request = Yii::$app->request;
		 $id = $request->post('id');
		 $name = $request->post('name');
		 $value = $request->post('value');
         $time = date('Y-m-d H:i:s',time());
         $connection = \Yii::$app->db;
		 $command = $connection->createCommand("SELECT i_name FROM al_privilege WHERE pri_id=$id")->queryOne();
		 $old_name = $command['i_name'];
         $re = $connection->createCommand()->update('al_privilege', ["$name" => $value,'i_addtime'=>$time], "pri_id=$id")->execute();
         if($re){
				$content = '修改权限'.$id.'-'.$name.'->'.$old_name;
				$this->adminLog($content);
             echo $time;
         }else{
             echo 0;
         }
	 }
	 /**
	 * [actionDel 删除]
	 * 
	 */
	 public function actionDel(){
         $request = Yii::$app->request;
		 $id = $request->post('id');
         $connection = \Yii::$app->db;
         $command = $connection->createCommand("SELECT i_name FROM al_privilege WHERE pri_id=$id")->queryOne();
         $old_name = $command['i_name'];
         $re = $connection->createCommand()->delete('al_privilege', "pri_id = $id")->execute();
         if($re){
             $content = '删除权限'.$id.'-'.$old_name;
             $this->adminLog($content);
             echo 1;
         }else{
             echo 0;
         }
	 }
}
