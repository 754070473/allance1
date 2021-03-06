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
 *  MemberController 会员管理
 */
class MemberController extends Controller
{
     use ControlController;
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex 显示会员列表]
     * @return [type] [description]
     */
    public function actionShow()
    {
        return $this->render('show.html');
    }
    /**
     * [actionAdd 添加]
     * @return [type] [description]
     */
    public function actionAdd()
    {
    	return $this->render('add.html');
    }
}
