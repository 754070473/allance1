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
 *  PostController 简历
 */
class ResumeController extends Controller
{
	//public $layout='public';
    public $layout=false;

    public $enableCsrfValidation=false;
    /**
     * [actionIndex 显示简历列表]
     * @return [type] [description]
     */
    public function actionShow()

    {
        //$id=1;
        $row = (new \yii\db\Query())
    ->select(['*'])
    ->from('al_resume')
     ->all();
//->where(['per_id'=>$id])

//print_r($row);die;
   return $this->render('show.html',array('arr'=>$row));
        

    }

    //审核简历
    public function actionUpdate(){
                 $connection = \Yii::$app->db;
        $request = Yii::$app->request;
                        $id= $request->get('id'); 
                        $aa=$connection->createCommand()->update('al_resume', ['r_type'=>"1"], "res_id= $id")->execute();
        if($aa){
                          return $this->redirect('index.php?r=resume/show');
                       }
    }
    public function actionUpdate2(){
                 $connection = \Yii::$app->db;
        $request = Yii::$app->request;
                        $id= $request->get('id'); 
                        $aa=$connection->createCommand()->update('al_resume', ['r_type'=>"0"], "res_id= $id")->execute();
        if($aa){
                          return $this->redirect('index.php?r=resume/show');
                       }
    }
    
    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
    	return $this->render('add.html');
    }
    /**
     * [actionAdd 照片]
     * @return [type] [description]
     */
    public function actionPhoto()
    {
        $row=(new\yii\db\Query())
        ->select(['*'])
        ->from('al_resume')
        ->all();

    	return $this->render('photo.html',array('arr'=>$row));
    }
     //审核头像
    public function actionUpdate3(){
                 $connection = \Yii::$app->db;
        $request = Yii::$app->request;
                        $id= $request->get('id'); 
                        $aa=$connection->createCommand()->update('al_resume', ['if_img'=>"1"], "res_id= $id")->execute();
        if($aa){
                          return $this->redirect('index.php?r=resume/photo');
                       }
    }
    public function actionUpdate4(){
                 $connection = \Yii::$app->db;
        $request = Yii::$app->request;
                        $id= $request->get('id'); 
                        $aa=$connection->createCommand()->update('al_resume', ['if_img'=>"0"], "res_id= $id")->execute();
        if($aa){
                          return $this->redirect('index.php?r=resume/photo');
                       }
    }
}
