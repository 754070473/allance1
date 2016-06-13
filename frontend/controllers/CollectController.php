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
 *  PostController 收藏
 */
class CollectController extends Controller
{
	//public $layout='public';
    public $layout=false;
    /**
     * [actionIndex 显示职位列表]
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
