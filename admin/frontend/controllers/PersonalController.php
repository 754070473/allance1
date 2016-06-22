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
 *  PostController 个人
 */
class PersonalController extends Controller
{
     use ControlController;
	//public $layout='public';
    public $layout=false;
    public $enableCsrfValidation=false;
    /**
     * [actionIndex 显示职位列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
        $row=(new\yii\db\Query())
        ->select(['*'])
        ->from('al_personal')
        ->all(); 
        //print_r($row);die;
        return $this->render('show.html',array('arr'=>$row));
    }

    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
    	return $this->render('add.html');
    }
    //日志查询
    public function actionUser_log(){
        $connection = \Yii::$app->db;
        $request = Yii::$app->request;
                        $id= $request->get('id'); 
                        //print_r($id);
                        $row = (new \yii\db\Query())
                        ->select(['*'])
                        ->from('al_user_log')
                        ->where(['per_id' =>"$id"])
                        ->all();

                          return $this->render('user_log.html',array('arr'=>$row));
        
    }
}
