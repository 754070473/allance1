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
 *CompanyController 企业管理
 */
class CompanyController extends Controller
{
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex description]
     * @return [type] [description]
     */
    public function actionShow()
    {
        return $this->render('show.html');
    }
}
