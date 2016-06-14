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
    	return $this->render('photo.html');
    }
}
