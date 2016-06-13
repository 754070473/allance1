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
 *  PostController 表单编辑器
 */
class FormController extends Controller
{
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex 显示职位列表]
     * @return [type] [description]
     */
    public function actionForm()
    {
        
        return $this->render('form.html');
    }
}
