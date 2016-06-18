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
 * GeneralizeController 企业推广
 */
class GeneralizeController extends Controller
{
     use ControlController;
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex 显示推广列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
       return $this->render('show.html');
    }
}
