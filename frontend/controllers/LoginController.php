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
        return $this->redirect('?r=login/login');
    }
}
?>

