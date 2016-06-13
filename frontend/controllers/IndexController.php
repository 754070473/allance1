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
class IndexController extends Controller
{
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex 主界面]
     * @return [type] [description]
     */
    public function actionIndex()
    {
        return $this->render('index.html');
    }
    public function actionIndex1()
    {
        return $this->render('index_1.html');
    }
    public function actionIndex2()
    {
        return $this->render('index_2.html');
    }
    public function actionIndex3()
    {
        return $this->render('index_3.html');
    }
    
}
