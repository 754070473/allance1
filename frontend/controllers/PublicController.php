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
 * Site controller
 */
class PublicController extends Controller
{
	 use ControlController;
	//public $layout='public';
    public $layout=false;
    public $enableCsrfValidation=false;
	/**
     * [actionLeft 主界面]
     * @return [type] [description]
     */
    public function actionMain()
    {
       return $this->render('main.html');
    }
    /**
     * [actionIndex 头部]
     * @return [type] [description]
     */
    public function actionTop()
    {

        return $this->render('top.html');
    }
   
    /**
     * [actionLeft 左侧菜单栏]
     * @return [type] [description]
     */
    public function actionLeft()
    {
       return $this->render('left.html');
    }
}
