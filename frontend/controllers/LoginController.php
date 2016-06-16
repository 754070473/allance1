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
use yii\web\UrlManager;
/**
 * Site controller
 */
class LoginController extends Controller
{
    //public $layout='public';
    public $layout=false;
    public $enableCsrfValidation=false;
    /**
     * [actionLogin  登录
     * @return [type] [description]
     */

    public function actionLogin()
    {

       return $this->render('login.html');
    }
    /**
     * [actionDo_login 执行登录
     * @return [type] [description]
     */
    public function actionDo_login()
    {
    	return $this->redirect('index.php?r=index/index');
    }

    public function actionLogout()

    {
                        //打开session
                       $session = Yii::$app->session;
                        unset($session['adm_id']);
                       return $this->redirect('?r=login/login');
    }
    //登录判断账号密码
     public function actionSelect1()

    {
        //echo "11111";die;
        $connection = \Yii::$app->db;
        $request = Yii::$app->request;
                        $name= $request->post('name'); 
                         $pwd= $request->post('pwd'); 
                        //print_r($user);die;
        $row = (new \yii\db\Query())
                        ->select(['*'])
                        ->from('al_admin')
                        ->where(['a_account' =>$name,'a_pwd' =>$pwd])  
                       ->all();
                       //print_r($row['0']['a_pwd']);die;
       if(count($row)==1){
                     echo 1;
                   
       }else{
        echo 0;
        }
    }
    //登陆成功
    public function actionLogin1(){
          $connection = \Yii::$app->db;
        $request = Yii::$app->request;
                        $name= $request->post('name1'); 
                         $pwd= $request->post('pwd1'); 
                        //print_r($user);die;
        $row = (new \yii\db\Query())
                        ->select(['*'])
                        ->from('al_admin')
                        ->where(['a_account' =>$name,'a_pwd' =>$pwd])  
                       ->all();
                       $id=$row['0']['adm_id'];
                       //print_r($row['0']['adm_id']);die;

                       //打开session
                       $session = Yii::$app->session;
                       //把id存储session
                       $session['adm_id'] =$id;
                        //取出session
                        //$adm_id= $session['adm_id'];
                      return $this->redirect('index.php?r=index/index');

    }

}

?>

